<?php

namespace App\Http\Controllers;

use App\Services\Keranjang;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RuntimeException;

class CheckoutController extends Controller
{
    public function index()
    {
        $daftarItem = Keranjang::daftarItem();

        // Tidak boleh checkout kalau keranjang kosong
        if ($daftarItem->isEmpty()) {
            return redirect()
                ->route('keranjang.index')
                ->with('gagal', 'Keranjang Anda masih kosong.');
        }

        $totalHarga = Keranjang::totalHarga();

        return view(
            'user_front.checkout.index',
            compact('daftarItem', 'totalHarga')
        );
    }

    public function proses(Request $request)
    {
        $daftarItem = Keranjang::daftarItem();

        if ($daftarItem->isEmpty()) {
            return redirect()
                ->route('keranjang.index')
                ->with('gagal', 'Keranjang Anda masih kosong.');
        }

        // 1. Validasi isian
        $data = $request->validate([
            'nama_pemesan' => ['required', 'string', 'min:3', 'max:100'],
            'email'        => ['required', 'email', 'max:100'],
            'telepon'      => [
                'required',
                'string',
                'min:9',
                'max:20',
                'regex:/^[0-9+\-\s]+$/',
            ],
            'alamat'       => ['required', 'string', 'min:10', 'max:500'],
            'kota'         => ['required', 'string', 'max:100'],
            'kode_pos'     => ['nullable', 'string', 'max:10'],
            'catatan'      => ['nullable', 'string', 'max:500'],
        ], [
            'nama_pemesan.required' => 'Nama penerima wajib diisi.',
            'nama_pemesan.min'      => 'Nama penerima minimal 3 karakter.',
            'email.required'        => 'Email wajib diisi.',
            'email.email'           => 'Format email tidak benar.',
            'telepon.required'      => 'Nomor telepon wajib diisi.',
            'telepon.regex'         => 'Nomor telepon hanya boleh berisi angka, tanda +, tanda -, atau spasi.',
            'telepon.min'           => 'Nomor telepon minimal 9 karakter.',
            'alamat.required'       => 'Alamat lengkap wajib diisi.',
            'alamat.min'            => 'Alamat lengkap minimal 10 karakter.',
            'kota.required'         => 'Kota wajib diisi.',
        ]);

        // 2. Simpan pesanan dalam satu transaksi database
        try {
            $pesanan = DB::transaction(function () use ($data, $daftarItem) {
                $subtotal = 0;
                $baris = [];

                foreach ($daftarItem as $item) {
                    $produk = Produk::lockForUpdate()
                        ->find($item->produk->id);

                    if (! $produk || $produk->status !== 'aktif') {
                        throw new RuntimeException(
                            'Produk ' . $item->produk->nama_produk
                            . ' sudah tidak tersedia.'
                        );
                    }

                    if ($produk->stok < $item->jumlah) {
                        throw new RuntimeException(
                            'Stok ' . $produk->nama_produk
                            . ' tinggal ' . $produk->stok . ' buah.'
                        );
                    }

                    $subtotalBaris = $produk->harga * $item->jumlah;
                    $subtotal += $subtotalBaris;

                    // Simpan snapshot nama dan harga saat transaksi
                    $baris[] = [
                        'produk_id'   => $produk->id,
                        'nama_produk' => $produk->nama_produk,
                        'harga'       => $produk->harga,
                        'jumlah'      => $item->jumlah,
                        'subtotal'    => $subtotalBaris,
                    ];

                    // Kurangi stok produk
                    $produk->decrement('stok', $item->jumlah);
                }

                $pesanan = Pesanan::create(array_merge($data, [
                    'kode_pesanan' => $this->buatKode(),
                    'subtotal'     => $subtotal,
                    'ongkir'       => 0,
                    'total'        => $subtotal,
                    'status'       => 'baru',
                ]));

                $pesanan->detail()->createMany($baris);

                return $pesanan;
            });
        } catch (RuntimeException $e) {
            return back()
                ->with('gagal', $e->getMessage())
                ->withInput();
        }

        // 3. Kosongkan keranjang setelah transaksi berhasil
        Keranjang::kosongkan();

        // 4. Simpan kode pesanan terakhir di session
        session([
            'pesanan_terakhir' => $pesanan->kode_pesanan,
        ]);

        return redirect()->route(
            'checkout.selesai',
            $pesanan->kode_pesanan
        );
    }

    /**
     * Membuat nomor pesanan, contoh: INV-20261029-A7K3.
     */
    private function buatKode(): string
    {
        do {
            $kode = 'INV-' . now()->format('Ymd') . '-'
                . strtoupper(Str::random(4));
        } while (
            Pesanan::where('kode_pesanan', $kode)->exists()
        );

        return $kode;
    }
}
