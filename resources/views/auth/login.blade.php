@extends('layouts.base')
@section('content')
    <div class="auth">
        <div class="card">
            <div class="auth__header text-center">
                <a href="/">
                    <img src="{{ asset('images/icon.svg') }}" alt="icon"/>
                </a>
                <h3>Account Login</h3>
                <p>Hello Developer, Welcome Back!</p>
            </div>

            <form action="{{ route('authenticate') }}" method="post" class="form auth__form">
                @csrf
                <!-- Input:Email -->

                <div class="form__field">
                    <label for="formInput#text">Name: </label>
                    <input class="input input--text" id="formInput#text" type="text" name="name"
                           placeholder="Enter your name..."/>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="form__field">
                    <label for="formInput#text">Email: </label>
                    <input class="input input--text" id="formInput#text" type="email" name="email"
                           placeholder="Enter your email..."/>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <!-- Input:Password -->
                <div class="form__field">
                    <label for="formInput#password">Password: </label>
                    <input class="input input--password" id="formInput#password" type="password" name="password"
                           placeholder="Enter password..."/>
                </div>
                <div class="auth__actions">
                    <input class="btn btn--sub btn--lg" type="submit" value="Log In">
                    <a href="forgetpassword.html">Forget Password?</a>
                </div>
            </form>
            <div class="auth__alternative">
                <p>Don’t have an Account?</p>
                <a href="{{ route('register') }}">Sign Up</a>
            </div>
        </div>
    </div>
@endsection
