<!-- Header -->
<header class="bg-gray-dark sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center py-4">
        <!-- Left section: Logo -->
        <a href="{{ route('home') }}" class="flex items-center">
            <div>
                <img src="{{ asset('user_front/assets/images/template-white-logo.png') }}" alt="Logo" class="h-14 w-auto mr-4">
            </div>
        </a>

        <!-- Hamburger menu (for mobile) -->
        <div class="flex lg:hidden">
            <button id="hamburger" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Center section: Menu -->
        <nav class="hidden lg:flex md:flex-grow justify-center">
            <ul class="flex justify-center space-x-4 text-white">
                <li><a href="{{ route('home') }}" class="hover:text-secondary font-semibold">{{ __('web.beranda') }}</a></li>

                <!-- Primary Dropdown -->
                <li class="relative group" x-data="{ open: false }">
                    <a href="{{ route('produk.index') }}" @mouseover="open = true" @mouseleave="open = false" href="#" class="hover:text-secondary font-semibold flex items-center">
                        {{ __('web.kategori_utama') }}
                        <i :class="open ? 'fas fa-chevron-up ml-1 text-xs' : 'fas fa-chevron-down ml-1 text-xs'"></i>
                    </a>
                    <ul
                        x-show="open"
                        @mouseover="open = true"
                        @mouseleave="open = false"
                        class="absolute left-0 bg-white text-black space-y-2 mt-1 p-2 rounded shadow-lg"
                    >
                        <li><a href="{{ route('produk.index') }}" class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">{{ __('web.item_1') }}</a></li>
                        <li><a href="{{ route('produk.index') }}" class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">{{ __('web.item_2') }}</a></li>
                    </ul>
                </li>

                <!-- Secondary Dropdown -->
                <li class="relative group" x-data="{ open: false }">
                    <a href="{{ route('produk.index') }}" @mouseover="open = true" @mouseleave="open = false" href="#" class="hover:text-secondary font-semibold flex items-center">
                        {{ __('web.kategori_sekunder') }}
                        <i :class="open ? 'fas fa-chevron-up ml-1 text-xs' : 'fas fa-chevron-down ml-1 text-xs'"></i>
                    </a>
                    <ul
                        x-show="open"
                        @mouseover="open = true"
                        @mouseleave="open = false"
                        class="absolute left-0 bg-white text-black space-y-2 mt-1 p-2 rounded shadow-lg"
                    >
                        <li><a href="{{ route('produk.index') }}" class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">{{ __('web.item_1') }}</a></li>
                        <li><a href="{{ route('produk.index') }}" class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">{{ __('web.item_2') }}</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('produk.index') }}" class="hover:text-secondary font-semibold">{{ __('web.produk') }}</a></li>
                <li><a href="checkout.html" class="hover:text-secondary font-semibold">{{ __('web.checkout') }}</a></li>
            </ul>
        </nav>

        <!-- Right section: Buttons (for desktop) -->
        <div class="hidden lg:flex items-center space-x-4 relative">

            {{-- Panggil partial pengalih bahasa di sini, jangan di-hardcode --}}
            @include('user_front.partials.pengalih-bahasa')

            <a href="register.html" class="bg-primary border border-primary hover:bg-transparent text-white hover:text-primary font-semibold px-4 py-2 rounded-full inline-block">{{ __('web.daftar') }}</a>
            <a href="login.html" class="bg-primary border border-primary hover:bg-transparent text-white hover:text-primary font-semibold px-4 py-2 rounded-full inline-block">{{ __('web.masuk') }}</a>

            <div class="relative group cart-wrapper">
                <a href="/cart.html" >
                    <img src="{{ asset('user_front/assets/images/cart-shopping.svg') }}" alt="Cart" class="h-6 w-6 group-hover:scale-120">
                </a>
                <!-- Cart dropdown -->
                <div class="absolute right-0 mt-1 w-80 bg-white shadow-lg p-4 rounded hidden group-hover:block">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between pb-4 border-b border-gray-line">
                            <div class="flex items-center">
                                <img src="{{ asset('user_front/assets/images/single-product/1.jpg') }}" alt="Product" class="h-12 w-12 object-cover rounded mr-2">
                                <div>
                                    <p class="font-semibold">{{ $produk->nama ?? 'Nama Produk dari DB' }}</p>
                                    <p class="text-sm">{{ __('web.kuantitas') }}: 1</p>
                                </div>
                            </div>
                            <p class="font-semibold">$25.00</p>
                        </div>
                    </div>
                    <a href="/cart.html" class="block text-center mt-4 border border-primary bg-primary hover:bg-transparent text-white hover:text-primary py-2 rounded-full font-semibold">{{ __('web.ke_keranjang') }}</a>
                </div>
            </div>

            <!-- Search field -->
            <div id="search-field" class="hidden absolute top-full right-0 mt-2 w-full bg-white shadow-lg p-2 rounded">
                <input type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="{{ __('web.cari_produk') }}">
            </div>
        </div>
    </div>
</header>

<!-- Mobile menu -->
<nav id="mobile-menu-placeholder" class="mobile-menu hidden flex-col items-center space-y-8 lg:hidden">
    <ul class="w-full">
        <li><a href="{{ route('home') }}" class="hover:text-secondary font-bold block py-2">{{ __('web.beranda') }}</a></li>

        <li><a href="{{ route('produk.index') }}" class="hover:text-secondary font-bold block py-2">{{ __('web.produk') }}</a></li>
        <li><a href="checkout.html" class="hover:text-secondary font-bold block py-2">{{ __('web.checkout') }}</a></li>
    </ul>

    <div class="flex flex-col mt-6 space-y-2 items-center">

        {{-- Panggil partial pengalih bahasa untuk versi mobile --}}
        <div class="mb-4">
            @include('user_front.partials.pengalih-bahasa')
        </div>

        <a href="kontak.html" class="bg-primary hover:bg-transparent text-white hover:text-primary border border-primary font-semibold px-4 py-2 rounded-full flex items-center justify-center min-w-[110px]">{{ __('web.kontak') }}</a>
        <a href="lokasi.html" class="bg-primary hover:bg-transparent text-white hover:text-primary border border-primary font-semibold px-4 py-2 rounded-full flex items-center justify-center min-w-[110px]">{{ __('web.cek_lokasi') }}</a>
    </div>

    <!-- Search field -->
    <div class="top-full right-0 mt-2 w-full bg-white shadow-lg p-2 rounded">
        <input type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="{{ __('web.cari_produk') }}">
    </div>
</nav>
