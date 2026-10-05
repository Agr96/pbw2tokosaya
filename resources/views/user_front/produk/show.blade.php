@extends('user_front.layouts.app')
@section('judul', $produk->nama_produk)

@section('konten')
    <!-- Breadcrumbs -->
    <div class="container mx-auto px-4 mt-6">
        <a href="{{ route('home') }}"
           class="text-gray-500 hover:text-primary transition">
            Home
        </a>

        <span class="mx-2 text-gray-400">&gt;</span>

        <a href="{{ route('produk.index') }}"
           class="text-gray-500 hover:text-primary transition">
            Produk
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


                    <!-- Product Details Section -->
                    <div class="w-full lg:w-1/2">

                        <h1 class="text-3xl md:text-4xl font-bold mb-4 text-black">
                            {{ $produk->nama_produk }}
                        </h1>


                        <p class="mb-4 text-gray-500">
                            Kategori:
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
                            Spesifikasi
                        </h3>

                        <div class="text-gray-500 leading-relaxed mb-8">
                            {{ $produk->deskripsi }}
                        </div>


                        <!-- Add to Cart Action -->
                        <button
                            class="bg-primary hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-full transition duration-300 w-full sm:w-auto shadow-md">
                            <i class="fa-solid fa-cart-shopping mr-2"></i>
                            Hubungi Pemilik Properti
                        </button>

                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection
