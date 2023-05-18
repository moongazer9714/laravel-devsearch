@extends('layouts.base')

@section('content')

    <!-- Main Section -->
    <main class="formPage my-xl">
        <div class="content-box">
            <div class="formWrapper">
                <a class="backButton" href="#"><i class="im im-angle-left"></i></a>
                <br>

                <form action="{{ route('profile.store') }}" class="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="formInput#text">Name: </label>
                        <input class="input input--text" id="formInput#text"
                               value="{{ \Illuminate\Support\Facades\Auth::user()->name }}" type="text" name="name"
                               placeholder="Enter text"/>
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Email: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="email"
                               value="{{ \Illuminate\Support\Facades\Auth::user()->email }}"
                               placeholder="Enter text"/>
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Username: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="username"
                               placeholder="Enter text"/>
                    </div>

                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="formInput#text">Location: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="location"
                               placeholder="Enter text"/>
                    </div>

                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="formInput#text">Short intro: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="short_intro"
                               placeholder="Enter text"/>
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Bio: </label>
                        <textarea class="input input--text" rows="6" id="formInput#text" type="text" name="bio"
                                  placeholder="Enter text">
                        </textarea>
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Profile image: </label>
                        <input class="input input--text" id="formInput#text" type="file" name="profile_image"
                               placeholder="Enter text"/>
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Social github: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="social_github"
                               placeholder="Enter text"/>
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Social linkedin: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="social_linkedin"
                               placeholder="Enter text"/>
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Social twitter: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="social_twitter"
                               placeholder="Enter text"/>
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Social youtube: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="social_youtube"
                               placeholder="Enter text"/>
                    </div>
                    <input class="btn btn--sub btn--lg  my-md" type="submit" value="Submit"/>
                </form>
            </div>
        </div>
    </main>
@endsection
