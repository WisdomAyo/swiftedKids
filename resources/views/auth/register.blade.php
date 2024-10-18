{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">



        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}






@extends('home.main')
@section('content')




<section>
    <div class="container">
        <div class="row">
            <div class="col-xl-auto col-xxl-6 d-none d-md-block">
                <div class="img-box6">
                    <div class="img-1 mega-hover">
                        <img src="assets/img/about/con-1-1.jpg" alt="image">
                    </div>
                    <div class="img-2 mega-hover">
                        <img src="assets/img/about/con-1-2.jpg" alt="image">
                    </div>
                    <div class="img-1 mega-hover">
                        <img src="assets/img/about/con-1-1.jpg" alt="image">
                    </div>
                </div>
            </div>

            <div class="col-xl col-xxl-6 align-self-center">

                <div class="row">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                                <li>Continue with your Course</li>
                            </ul>
                        </div>
                    </div>
                </div>


                <form action="{{ route('register.student.submit') }}" class="form-style3" method="POST">
                    @csrf
                    <div class="row justify-content-between">

                        <!-- Role Selection -->
                        <div class="form-group">
                            {{-- <label> Register As <span class="required">(Required)</span></label> --}}
                            <input type="hidden" name="role" value="student">
                            {{-- <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                                <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Tutor</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>



                        <!-- Name -->
                        <div class="form-group">
                            <label>Name <span class="required">(Required)</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label>Email <span class="required">(Required)</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group">
                            <label>Mobile No: <span class="required">(Required)</span></label>
                            <input type="tel" id="phone" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone" class="form-control @error('phone-number') is-invalid @enderror">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label>Password <span class="required">(Required)</span></label>
                            <input type="password" id="password" name="password" required autocomplete="new-password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password Confirmation -->
                        <div class="form-group mt-4">
                            <label>Confirm Password <span class="required">(Required)</span></label>
                            <input type="password" id="password-confirm" name="password_confirmation" required autocomplete="new-password" class="form-control">
                        </div>

                        <!-- Weekly Notification Checkbox -->
                        <div class="col-auto align-self-center form-group">
                            <input type="checkbox" name="notice" id="remember_me">
                            <label for="notice">Notify your child weekly progress</label>
                        </div>

                        <!-- Register Button -->
                        <div class="col-auto form-group">
                            <button class="vs-btn" type="submit">Register and Enroll</button>
                        </div>
                    </div>
                </form>

                <label for="notice">Already Have an Account? <a href="{{ route('login') }}">Sign in</a></label>
            </div>
        </div>
    </div>
</section>


@endsection
