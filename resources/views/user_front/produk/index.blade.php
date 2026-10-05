@extends('user_front.layouts.app')
@section('judul', 'Daftar Produk')

@section('konten')
    <!-- Shop -->
    <section id="shop">
        <div class="container mx-auto">

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

            <!-- Top Filter -->
            <div class="flex flex-col md:flex-row justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <button
                        class="bg-primary text-white hover:bg-transparent hover:text-primary border hover:border-primary py-2 px-4 rounded-full focus:outline-none">
                        Show On Sale
                    </button>

                    <button
                        class="bg-primary text-white hover:bg-transparent hover:text-primary border hover:border-primary py-2 px-4 rounded-full focus:outline-none">
                        List View
                    </button>

                    <button
                        class="bg-primary text-white hover:bg-transparent hover:text-primary border hover:border-primary py-2 px-4 rounded-full focus:outline-none">
                        Grid View
                    </button>
                </div>

                <div class="flex mt-5 md:mt-0 space-x-4">
                    <div class="relative">
                        <select
                            class="block appearance-none w-full bg-white border hover:border-primary px-4 py-2 pr-8 rounded-full shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option>Sort by Latest</option>
                            <option>Sort by Popularity</option>
                            <option>Sort by A-Z</option>
                        </select>

                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center justify-center px-2">
                            <img id="arrow-down"
                                 class="h-4 w-4"
                                 src="{{ asset('user_front/assets/images/filter-down-arrow.svg') }}"
                                 alt="filter arrow">

                            <img id="arrow-up"
                                 class="h-4 w-4 hidden"
                                 src="{{ asset('user_front/assets/images/filter-up-arrow.svg') }}"
                                 alt="filter arrow">
                        </div>
                    </div>
                </div>
            </div>


            <!-- Filter Toggle Button for Mobile -->
            <div class="block md:hidden text-center mb-4">
                <button id="products-toggle-filters"
                        class="bg-primary text-white py-2 px-4 rounded-full focus:outline-none">
                    Show Filters
                </button>
            </div>


            <div class="flex flex-col md:flex-row">

                <!-- Filters -->
                <div id="filters" class="w-full md:w-1/4 p-4 hidden md:block">

                    <!-- Category Filter -->
                    <div class="mb-6 pb-8 border-b border-gray-line">
                        <h3 class="text-lg font-semibold mb-6">Category</h3>

                        <div class="space-y-2">
                            @foreach ($daftarKategori as $kategori)
                                <label class="flex items-center">
                                    <input type="checkbox" name="kategori_id[]" value="{{ $kategori->id }}" class="form-checkbox custom-checkbox">
                                    <span class="ml-2">{{ $kategori->nama_kategori }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>










                </div>


                <!-- Products List -->
                <div class="w-full md:w-3/4 p-4">

                    <!-- Products grid -->
                    <div class="flex flex-wrap -mx-4">

                        @foreach ($daftarProduk as $produk)
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

                                    <button
                                        class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">
                                        Add to Cart
                                    </button>

                                </div>
                            </div>
                        @endforeach

                    </div>


                    <!-- Pagination -->
                    <div class="flex justify-center mt-8">
                        <nav aria-label="Page navigation">
                            <ul class="inline-flex space-x-2">

                                <li>
                                    <a href="#"
                                       class="bg-primary text-white w-10 h-10 flex items-center justify-center rounded-full">
                                        1
                                    </a>
                                </li>

                                <li>
                                    <a href="#"
                                       class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-primary hover:text-white">
                                        2
                                    </a>
                                </li>

                                <li>
                                    <a href="#"
                                       class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-primary hover:text-white">
                                        3
                                    </a>
                                </li>

                                <li>
                                    <a href="#"
                                       class="w-10 h-10 flex items-center justify-center rounded-full">
                                        Next
                                    </a>
                                </li>

                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Shop category description -->
    <section id="shop-category-description" class="py-8">
        <div class="container mx-auto">

            <div class="bg-white p-6 rounded-lg shadow-lg">

                <h2 class="text-2xl font-bold mb-4">
                    Shirts Category
                </h2>

                <p class="mb-4">
                    Discover our wide range of shirts, perfect for any occasion. Whether you're looking for something
                    casual or formal, we have the perfect shirt for you. Our collection includes a variety of styles,
                    colors, and sizes to suit everyone's taste.
                </p>

                <p>
                    Browse through our selection and find your new favorite shirt today. All our shirts are made from
                    high-quality materials and are designed to provide both comfort and style. Shop now and elevate your
                    wardrobe with our premium shirts.
                </p>

            </div>
        </div>
    </section>
@endsection
