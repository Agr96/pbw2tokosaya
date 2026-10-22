@extends('user_front.layouts.app')
@section('judul', $produk->nama_produk)

@section('konten')
    <!-- Breadcrumbs -->
    <div class="container mx-auto px-4 mt-6">
        <a href="{{ route('home') }}"
           class="text-gray-500 hover:text-primary transition">
            {{ __('web.beranda') }}
        </a>

        <span class="mx-2 text-gray-400">&gt;</span>

        <a href="{{ route('produk.index') }}"
           class="text-gray-500 hover:text-primary transition">
            {{ __('web.produk') }}
        </a>

        <span class="mx-2 text-gray-400">&gt;</span>

        <span class="text-black font-semibold">
            {{ $produk->nama_produk }}
        </span>
    </div>


    <!-- Product info -->
    <section id="product-info" class="mb-20">
        <div class="container mx-auto px-4">

            <div class="py-6">

                <div class="flex flex-col lg:flex-row gap-10">

                    <!-- Image Section -->
                    <div class="w-full lg:w-1/2">

                        @if ($produk->gambar)
                            <img src="{{ asset('storage/' . $produk->gambar) }}"
                                 alt="{{ $produk->nama_produk }}"
                                 class="w-full rounded-lg">
                        @endif

                    </div>

                    <!-- Checkout button -->
                    @if ($produk->stok > 0)

                        <form action="{{ route('keranjang.tambah', $produk) }}" method="POST" class="mb-6">
                            @csrf

                            <div class="mb-6">
                                <label for="jumlah" class="block font-medium mb-2">{{ __('web.jumlah') }}</label>

                                <div class="flex items-center">
                                    <button type="button" onclick="ubahJumlah(-1)"
                                            class="w-10 h-10 rounded-full bg-gray-100 font-bold text-xl">&minus;</button>

                                    <input type="number" name="jumlah" id="jumlah"
                                           value="1" min="1" max="{{ $produk->stok }}"
                                           class="w-16 text-center border border-gray-300 rounded p-2 mx-2">

                                    <button type="button" onclick="ubahJumlah(1)"
                                            class="w-10 h-10 rounded-full bg-gray-100 font-bold text-xl">+</button>
                                </div>
                            </div>

                            <button type="submit"
                                    class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">
                                {{ __('web.masuk_keranjang') }}
                            </button>
                        </form>

                    @else

                        <div class="bg-gray-100 rounded-lg p-4 mb-6 text-center">
                            <p class="font-semibold mb-0">{{ __('web.stok_habis') }}</p>
                        </div>

                    @endif
                    <!-- tambahan -->
                    @push('scripts')
                        <script>
                            function ubahJumlah(langkah) {
                                const kotak = document.getElementById('jumlah');
                                const baru  = parseInt(kotak.value) + langkah;
                                const batas = parseInt(kotak.max);

                                if (baru >= 1 && baru <= batas) {
                                    kotak.value = baru;
                                }
                            }
                        </script>
                    @endpush

                    <!-- Product Details Section -->
                    <div class="w-full lg:w-1/2">

                        <h1 class="text-3xl md:text-4xl font-bold mb-4 text-black">
                            {{ $produk->nama_produk }}
                        </h1>


                        <p class="mb-4 text-gray-500">
                            {{ __('web.kategori') }}:
                            <span class="font-bold text-primary">
                                {{ $produk->kategori->nama_kategori }}
                            </span>
                        </p>


                        <p class="text-3xl font-bold my-6 text-black">
                            {{ $produk->hargaRupiah() }}
                        </p>


                        @if ($produk->hargaCoretRupiah())
                            <p class="text-lg line-through text-gray-400">
                                {{ $produk->hargaCoretRupiah() }}
                            </p>
                        @endif


                        <hr class="my-6 border-gray-200">


                        <!-- Product Description -->
                        <h3 class="text-xl font-bold mb-4 text-black">
                            {{ __('web.spesifikasi') }}
                        </h3>

                        <div class="text-gray-500 leading-relaxed mb-8">
                            {{ $produk->deskripsi }}
                        </div>


                        <!-- Add to Cart Action -->
                        <button
                            class="bg-primary hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-full transition duration-300 w-full sm:w-auto shadow-md">
                            <i class="fa-solid fa-cart-shopping mr-2"></i>
                            {{ __('web.hubungi_pemilik') }}
                        </button>

                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
