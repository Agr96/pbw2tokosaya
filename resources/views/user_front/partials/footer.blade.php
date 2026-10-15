<!-- Footer -->
<footer class="border-t border-gray-line">
    <!-- Top part -->
    <div class="container mx-auto px-4 py-10">
        <div class="flex flex-wrap -mx-4">
            <!-- Menu 1 -->
            <div class="w-full sm:w-1/6 px-4 mb-8">
                <h3 class="text-lg font-semibold mb-4">{{ __('web.belanja') }}</h3>
                <ul>
                    <li><a href="{{ route('produk.index') }}" class="hover:text-primary">{{ __('web.belanja') }}</a></li>
                    <li><a href="{{ route('produk.show', 1) }}" class="hover:text-primary">{{ __('web.wanita') }}</a></li>
                    <li><a href="{{ route('produk.index') }}" class="hover:text-primary">{{ __('web.pria') }}</a></li>
                    <li><a href="{{ route('produk.show', 1) }}" class="hover:text-primary">{{ __('web.sepatu') }}</a></li>
                    <li><a href="{{ route('produk.show', 1) }}" class="hover:text-primary">{{ __('web.aksesoris') }}</a></li>
                </ul>
            </div>
            <!-- Menu 2 -->
            <div class="w-full sm:w-1/6 px-4 mb-8">
                <h3 class="text-lg font-semibold mb-4">{{ __('web.halaman') }}</h3>
                <ul>
                    <li><a href="{{ route('produk.index') }}" class="hover:text-primary">{{ __('web.belanja') }}</a></li>
                    <li><a href="{{ route('produk.show', 1) }}" class="hover:text-primary">{{ __('web.produk') }}</a></li>
                    <li><a href="/checkout.html" class="hover:text-primary">{{ __('web.checkout') }}</a></li>
                    <li><a href="/404.html" class="hover:text-primary">404</a></li>
                </ul>
            </div>
            <!-- Menu 3 -->
            <div class="w-full sm:w-1/6 px-4 mb-8">
                <h3 class="text-lg font-semibold mb-4">{{ __('web.akun') }}</h3>
                <ul>
                    <li><a href="/cart.html" class="hover:text-primary">{{ __('web.keranjang') }}</a></li>
                    <li><a href="/register.html" class="hover:text-primary">{{ __('web.daftar') }}</a></li>
                    <li><a href="/register.html" class="hover:text-primary">{{ __('web.masuk') }}</a></li>
                </ul>
            </div>
            <!-- Social Media -->
            <div class="w-full sm:w-1/6 px-4 mb-8">
                <h3 class="text-lg font-semibold mb-4">{{ __('web.ikuti_kami') }}</h3>
                <ul>
                    <!-- Nama merek media sosial tidak perlu diterjemahkan -->
                    <li class="flex items-center mb-2">
                        <img src="{{ asset('user_front/assets/images/social_icons/facebook.svg') }}" alt="Facebook" class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                        <a href="#" class="hover:text-primary">Facebook</a>
                    </li>
                    <li class="flex items-center mb-2">
                        <img src="{{ asset('user_front/assets/images/social_icons/twitter.svg') }}" alt="Twitter" class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                        <a href="#" class="hover:text-primary">Twitter</a>
                    </li>
                    <li class="flex items-center mb-2">
                        <img src="{{ asset('user_front/assets/images/social_icons/instagram.svg') }}" alt="Instagram" class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                        <a href="#" class="hover:text-primary">Instagram</a>
                    </li>
                    <li class="flex items-center mb-2">
                        <img src="{{ asset('user_front/assets/images/social_icons/pinterest.svg') }}" alt="Pinterest" class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                        <a href="#" class="hover:text-primary">Pinterest</a>
                    </li>
                    <li class="flex items-center mb-2">
                        <img src="{{ asset('user_front/assets/images/social_icons/youtube.svg') }}" alt="YouTube" class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                        <a href="#" class="hover:text-primary">YouTube</a>
                    </li>
                </ul>
            </div>
            <!-- Contact Information -->
            <div class="w-full sm:w-2/6 px-4 mb-8">
                <h3 class="text-lg font-semibold mb-4">{{ __('web.kontak_judul') }}</h3>
                <p><img src="{{ asset('user_front/assets/images/template-logo.png') }}" alt="Logo" class="h-[60px] mb-4"></p>
                <p>123 Street Name, Paris, France</p>
                <p class="text-xl font-bold my-4">{{ __('web.telepon') }}: (123) 456-7890</p>
                <a href="mailto:info@company.com" class="underline">{{ __('web.email') }}: info@company.com</a>
            </div>
        </div>
    </div>

    <!-- Bottom part -->
    <div class="py-6 border-t border-gray-line">
        <div class="container mx-auto px-4 flex flex-wrap justify-between items-center">
            <!-- Copyright and Links -->
            <div class="w-full lg:w-3/4 text-center lg:text-left mb-4 lg:mb-0">
                <p class="mb-2 font-bold">&copy; 2024 Your Company. {{ __('web.hak_cipta') }} <a
                        href="https://github.com/spacemadev" target="_blank" style="color: green;">Maksim M</a> {{ __('web.didistribusikan_oleh') }}
                    <a href="https://themewagon.com/" target="_blank" style="color: green;font-weight: bold;">ThemeWagon</a></p>
                <ul class="flex justify-center lg:justify-start space-x-4 mb-4 lg:mb-0 mt-2">
                    <li><a href="#" class="hover:text-primary">{{ __('web.kebijakan_privasi') }}</a></li>
                    <li><a href="#" class="hover:text-primary">{{ __('web.syarat_layanan') }}</a></li>
                    <li><a href="#" class="hover:text-primary">{{ __('web.faq') }}</a></li>
                </ul>
                <p class="text-sm mt-4">{{ __('web.deskripsi_singkat_toko') }}</p>
            </div>
            <!-- Payment Icons -->
            <div class="w-full lg:w-1/4 text-center lg:text-right">
                <img src="{{ asset('user_front/assets/images/social_icons/paypal.svg') }}" alt="PayPal" class="inline-block h-8 mr-2">
                <img src="{{ asset('user_front/assets/images/social_icons/stripe.svg') }}" alt="Stripe" class="inline-block h-8 mr-2">
                <img src="{{ asset('user_front/assets/images/social_icons/visa.svg') }}" alt="Visa" class="inline-block h-8">
            </div>
        </div>
    </div>
</footer>
