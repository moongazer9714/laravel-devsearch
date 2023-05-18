@extends('layouts.base')
@section('content')
    <div class="auth">
        <div class="card">
            <div class="auth__header text-center">
                <a href="/">
                    <img src="images/icon.svg" alt="icon"/>
                </a>
                <h3>Account SignUp</h3>
                <p>Create a new developer account</p>
            </div>

            <form action="{{ route('register.store') }}" class="form auth__form" method="post">
                @csrf
                <!-- Input:Text -->
                <div class="form__field">
                    <label for="formInput#text">Name: </label>
                    <input class="input input--text @error('name') is-invalid @enderror" id="formInput#text" type="text"
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                           placeholder="Enter your name"/>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Input:Email -->
                <div class="form__field">
                    <label for="formInput#email">Email Address: </label>
                    <input class="input input--email @error('email') is-invalid @enderror" id="formInput#email"
                           type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                           placeholder="e.g. user@domain.com"/>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Input:Password -->
                <div class="form__field">
                    <label for="formInput#password">Password: </label>
                    <input class="input input--password @error('password') is-invalid @enderror" id="formInput#passowrd"
                           type="password" name="password" required autocomplete="new-password"
                           placeholder="••••••••"/>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- Input:Password -->
                <div class="form__field">
                    <label for="formInput#confirm-password">Confirm Password: </label>
                    <input class="input input--password"
                           id="formInput#confirm-password" type="password"
                           name="password_confirmation" required autocomplete="new-password" placeholder="••••••••"/>

                </div>
                <div class="auth__actions">
                    <input class="btn btn--sub btn--lg" type="submit" value="Sign  In"/>
                </div>
            </form>
            <div class="auth__alternative">
                <p>Already have an Account?</p>
                <a href="{{ route('login') }}">Log In</a>
            </div>
        </div>
    </div>
@endsection
