@extends('auth.masterAuth')
@section('auth-main-body')
    <!-- Email Address -->
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" class="au-input au-input--full" type="email" name="email" placeholder="Email"
                value="{{ old('email') ?? '' }}" required>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Email Password Reset Link</button>
    </form>
@endsection
