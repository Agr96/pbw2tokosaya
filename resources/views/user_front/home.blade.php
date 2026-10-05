@extends('user_front.layouts.app')
@section('judul', 'Beranda')

@section('konten')
    <!-- Slider -->



    <!-- Product banner section -->


    <!-- Popular product section -->
    <section id="popular-products">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-4 text-2xl font-bold">

                <!-- Menu 1: Mengarah ke semua produk -->
                <a href="{{ route('produk.index') }}" class="hover:text-blue-600 transition-colors">
                    All Product
                </a>

                <!-- Pemisah / -->
                <span class="text-gray-400 select-none">/</span>

                <!-- Menu 2: Mengarah ke produk populer -->
                <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">
                    Popular Product
                </a>

            </div>

            <div class="flex flex-wrap -mx-4">

                @foreach ($produkPopuler as $produk)
                    <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-8">
                        <div class="bg-white p-3 rounded-lg shadow-lg">

                            @if ($produk->gambar)
                                <img src="{{ asset('storage/' . $produk->gambar) }}"
                                     alt="{{ $produk->nama_produk }}"
                                     class="w-full object-cover mb-4 rounded-lg">
                            @endif

                            <a href="{{ route('produk.show', $produk) }}"
                               class="text-lg font-semibold mb-2">
                                {{ $produk->nama_produk }}
                            </a>

                            <p class="my-2">
                                {{ $produk->kategori->nama_kategori }}
                            </p>

                            <div class="flex items-center mb-4">
                                <span class="text-lg font-bold text-primary">
                                    {{ $produk->hargaRupiah() }}
                                </span>

                                @if ($produk->hargaCoretRupiah())
                                    <span class="text-sm line-through ml-2">
                                        {{ $produk->hargaCoretRupiah() }}
                                    </span>
                                @endif
                            </div>

                            <button class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">
                                Add to Cart
                            </button>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <!-- Latest product section -->


    <!-- Brand section -->



    <!-- Banner section -->



    <!-- Blog section -->



    <!-- Subscribe section -->
    <
@endsection
