@extends('auth.masterAuth')
@section('auth-main-body')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" class="au-input au-input--full" type="email" name="email" placeholder="Email"
                value="{{ old('email') ?? '' }}" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label>Password</label>
            <input id="password" class="au-input au-input--full" type="password" name="password" placeholder="Password"
                required>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="login-checkbox">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">Remember
                Me
            </label>
        </div>
        <div class="login-checkbox">
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <button class="au-btn au-btn--block au-btn--green m-t-20 m-b-20" type="submit">sign in</button>
    </form>
@endsection
