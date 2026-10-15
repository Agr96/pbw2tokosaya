@extends('user_front.layouts.app')
@section('judul', __('web.kontak_judul'))

@section('konten')
    <!-- Contact Header Section -->
    <section class="py-16 bg-gray-50">
        <div class="text-center mb-12 lg:mb-16">
            <h2 class="text-5xl font-bold mb-4">{{ __('web.hubungi') }} <span class="text-primary">{{ __('web.kami') }}</span></h2>
            <p class="my-7 text-gray-txt">
                {{ __('web.kontak_sub') }}
            </p>
        </div>

        <!-- Contact Info Cards -->
        <div class="container mx-auto px-4 max-w-7xl mb-16">
            <div class="grid w-full grid-cols-1 gap-6 mx-auto lg:grid-cols-3">

                <!-- Alamat -->
                <div class="flex flex-col items-center text-center p-8 bg-white rounded-xl shadow-lg border-b-4 border-transparent hover:border-primary transition duration-300">
                    <i class="fa-solid fa-location-dot text-5xl text-primary mb-6"></i>
                    <h1 class="mb-4 text-2xl font-semibold leading-none tracking-tighter text-gray-dark">
                        {{ __('web.alamat_toko') }}
                    </h1>
                    <p class="flex-grow text-base font-medium leading-relaxed text-gray-txt">
                        Jl. Jenderal Sudirman No. 123<br>
                        Jakarta Selatan, 12190<br>
                        Indonesia
                    </p>
                </div>

                <!-- Telepon -->
                <div class="flex flex-col items-center text-center p-8 bg-white rounded-xl shadow-lg border-b-4 border-transparent hover:border-primary transition duration-300">
                    <i class="fa-solid fa-phone text-5xl text-primary mb-6"></i>
                    <h1 class="mb-4 text-2xl font-semibold leading-none tracking-tighter text-gray-dark">
                        {{ __('web.telepon') }}
                    </h1>
                    <p class="flex-grow text-base font-medium leading-relaxed text-gray-txt">
                        +62 812 3456 7890<br>
                        {{ __('web.hari_kerja') }}<br>
                        (09:00 - 17:00 WIB)
                    </p>
                </div>

                <!-- Email -->
                <div class="flex flex-col items-center text-center p-8 bg-white rounded-xl shadow-lg border-b-4 border-transparent hover:border-primary transition duration-300">
                    <i class="fa-solid fa-envelope text-5xl text-primary mb-6"></i>
                    <h1 class="mb-4 text-2xl font-semibold leading-none tracking-tighter text-gray-dark">
                        {{ __('web.email') }}
                    </h1>
                    <p class="flex-grow text-base font-medium leading-relaxed text-gray-txt">
                        support@tokosaya.com<br>
                        info@tokosaya.com
                    </p>
                </div>

            </div>
        </div>

        <div class="h-12"></div>

        <!-- Contact Form -->
        <div class="container mx-auto px-24 md:px-48 max-w-4xl mt-12 mb-12">
            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">

                <h3 class="text-3xl font-bold mb-8 text-center text-gray-dark">
                    {{ __('web.kirim_pesan_langsung') }}
                </h3>

                <form action="#" method="POST" class="space-y-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Nama -->
                        <div class="flex flex-col">
                            <label class="mb-2 text-sm font-semibold text-gray-dark">
                                {{ __('web.nama_lengkap') }}
                            </label>
                            <input
                                type="text"
                                placeholder="{{ __('web.placeholder_nama') }}"
                                class="w-full rounded-full px-4 py-3 border border-gray-300 text-gray-700 placeholder-gray-500 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary"
                                required
                            >
                        </div>

                        <!-- Email -->
                        <div class="flex flex-col">
                            <label class="mb-2 text-sm font-semibold text-gray-dark">
                                {{ __('web.alamat_email') }}
                            </label>
                            <input
                                type="email"
                                placeholder="{{ __('web.placeholder_email') }}"
                                class="w-full rounded-full px-4 py-3 border border-gray-300 text-gray-700 placeholder-gray-500 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary"
                                required
                            >
                        </div>

                    </div>

                    <!-- Subjek -->
                    <div class="flex flex-col">
                        <label class="mb-2 text-sm font-semibold text-gray-dark">
                            {{ __('web.subjek') }}
                        </label>
                        <input
                            type="text"
                            placeholder="{{ __('web.placeholder_subjek') }}"
                            class="w-full rounded-full px-4 py-3 border border-gray-300 text-gray-700 placeholder-gray-500 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary"
                            required
                        >
                    </div>

                    <!-- Pesan -->
                    <div class="flex flex-col">
                        <label class="mb-2 text-sm font-semibold text-gray-dark">
                            {{ __('web.isi_pesan') }}
                        </label>
                        <textarea
                            rows="6"
                            placeholder="{{ __('web.placeholder_pesan') }}"
                            class="w-full rounded-2xl px-4 py-3 border border-gray-300 text-gray-700 placeholder-gray-500 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary"
                            required
                        ></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center mt-8">
                        <button
                            type="submit"
                            class="bg-primary border border-primary hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-3 px-3 mb-3 rounded-full transition duration-300"
                        >
                            {{ __('web.kirim_pesan_sekarang') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
