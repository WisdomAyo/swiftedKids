{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('home.main')
@section('content')




<section >
    <div class="container">
        <div class="row">
            <div class="col-xl-auto col-xxl-6 d-none d-md-block">
                <div class="img-box6">
                    <div class="img-1 mega-hover"><img src="assets/img/about/con-1-1.jpg" alt="image"></div>
                    <div class="img-2 mega-hover"><img src="assets/img/about/con-1-2.jpg" alt="image"></div>
                </div>
            </div>
            <div class="col-xl col-xxl-6 align-self-center">
                <h2 class="sec-title mb-3">Welcome Back </h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="list-style1">
                            <ul class="list-unstyled mb-0">
                                <li>Assign practice exercises</li>
                                <li>Track student progress</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="list-style1">
                            <ul class="list-unstyled">
                                <li>Videos and articles</li>
                                <li>Continue with you Course </li>
                            </ul>
                        </div>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>
                <form action="{{ route('login') }}" class="form-style3" method="POST">
                    @csrf
                    <div class="row justify-content-between">


                        <div class=" form-group">
                            <label>Email <span class="required" value="__('Email')">(Required)</span></label>
                            <input type="email" id="email"   name="email" :value="old('email')" required autofocus autocomplete="email"  class=" @error('email') is-invalid @enderror">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        </div>
                        <div class=" form-group">
                            <label>Password</label>
                            <input type="password" id="password" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @if (Route::has('password.request'))
                                   <label for="" class=""> <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a></label>
                                @endif

                        </div>

                        <div class="col-auto align-self-center form-group">
                            <input type="checkbox"  name="notice" id="remember_me" type="checkbox">
                            <label for="notice">Notify Your child weekly progress</label>
                        </div>

                        <div class="col-auto form-group">
                            <button class="vs-btn" type="submit">Login</button>
                        </div>
                    </div>
                </form>

                    <label for="notice">Don't Have  Acount yet   <a href="{{route('register.student')}}"> Register Now</a></label>

            </div>
        </div>
    </div>
</section>

@endsection



