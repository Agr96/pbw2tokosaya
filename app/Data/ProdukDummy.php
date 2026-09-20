<?php

namespace App\Data;

/**
 * Sumber data sementara untuk Pertemuan 2.
 * Di Minggu 4 kelas ini akan diganti dengan Model Eloquent (Produk::all()).
 */
class ProdukDummy
{
    public static function semua(): array
    {
        return [
            [
                'id'        => 1,
                'nama'      => 'Summer black dress',
                'kategori'  => 'Women',
                'harga'     => 19.99,
                'harga_coret' => 24.99,
                'gambar'    => 'assets/images/products/1.jpg',
                'deskripsi' => 'Dress hitam berbahan ringan, nyaman dipakai seharian.',
            ],
            [
                'id'        => 2,
                'nama'      => 'Black suit',
                'kategori'  => 'Women',
                'harga'     => 29.99,
                'harga_coret' => null,
                'gambar'    => 'assets/images/products/2.jpg',
                'deskripsi' => 'Setelan formal dengan potongan modern.',
            ],
            [
                'id'        => 3,
                'nama'      => 'Black long dress',
                'kategori'  => 'Women, Accessories',
                'harga'     => 15.99,
                'harga_coret' => 19.99,
                'gambar'    => 'assets/images/products/3.jpg',
                'deskripsi' => 'Dress panjang untuk acara semi formal.',
            ],
            [
                'id'        => 4,
                'nama'      => 'Black leather jacket',
                'kategori'  => 'Women',
                'harga'     => 39.99,
                'harga_coret' => 49.99,
                'gambar'    => 'assets/images/products/4.jpg',
                'deskripsi' => 'Jaket kulit sintetis, tahan angin.',
            ],
        ];
    }

    public static function cari(int $id): ?array
    {
        foreach (self::semua() as $produk) {
            if ($produk['id'] === $id) {
                return $produk;
            }
        }

        return null;
    }
}
