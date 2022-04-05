@extends('layouts.header')

@section('content')
<main class="sm:container  sm:mx-auto sm:max-w-xl sm:mt-10">
    <div class="flex">
        <div class="w-full">

            @if (session('fail'))
            <div class="text-xl text-red-700 bg-red-100 px-5 py-6 sm:rounded sm:border sm:border-red-400 sm:mb-6"
                role="alert">
                {{ session('fail') }}
            </div>
            @endif
            @if (session('info'))
            <div class="text-xl text-green-700 bg-green-100 px-5 py-6 sm:rounded sm:border sm:border-green-400 sm:mb-6"
                role="alert">
                {{ session('info') }}
            </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="text-4xl font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Login') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="email" class="text-2xl block text-gray-700 font-bold mb-2 sm:mb-4">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="email" type="email"
                            class="text-2xl form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ session()->get('verifiedEmail') ? session()->get('verifiedEmail'): old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xl italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password" class="text-2xl block text-gray-700  font-bold mb-2 sm:mb-4">
                            {{ __('Password') }}:
                        </label>

                        <input id="password" type="password"
                            class="text-2xl form-input w-full @error('password') border-red-500 @enderror" name="password"
                            required>

                        @error('password')
                        <p class="text-red-500 text-xl italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <label class="inline-flex items-center text-2xl text-gray-700" for="remember">
                            <input type="checkbox" name="remember" id="remember" class="form-checkbox"
                                {{ old('remember') ? 'checked' : '' }}>
                            <span class="ml-2">{{ __('Remember Me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                        <a class="text-xl text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline ml-auto"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>

                    <div class="">
                        <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-2xl leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Login') }}
                        </button>
                        <div class="mb-1 text-center"><span>or</span></div>
                        <div class="form-group">
                            <div id="googleSignInWrapper">
                                <div class="sign-with-google">
                                    <a id="googleSignInButton" class=" btn-google border hover:bg-gray-300 " tabindex="0">
                                        <em style="display:none;" class="fa fa-spinner fa-spin"></em>
                                        <span class="google-icon"></span>
                                        <span class="text-gray-700 ">Log in with Google</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                         @if (Route::has('register'))
                        <p class="w-full text-xl text-center text-gray-700 my-6 sm:text-xl sm:my-8">
                            {{ __("Don't have an account?") }}
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </p>
                        @endif
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection

