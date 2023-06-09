@extends('layouts.base')

@section('content')
    <!-- Main Section -->
    <main class="formPage my-xl">
        <div class="content-box">
            <div class="formWrapper">
                <a class="backButton" href="#"><i class="im im-angle-left"></i></a>
                <br>

                <form action="{{ route('profile.update', $profile->id) }}" class="form" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="formInput#text">Name: </label>
                        <input class="input input--text" id="formInput#text"
                            value="{{ \Illuminate\Support\Facades\Auth::user()->name }}" type="text" name="name"
                            placeholder="Enter text" />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Email: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="email"
                            value="{{ \Illuminate\Support\Facades\Auth::user()->email }}" placeholder="Enter text" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Username: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="username"
                            value="{{ old('username', $profile->username) }}" placeholder="Enter text" />
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="formInput#text">Location: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="location"
                            value="{{ old('location', $profile->location) }}" placeholder="Enter text" />
                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="formInput#text">Short intro: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="short_intro"
                            value="{{ old('short_intro', $profile->short_intro) }}" placeholder="Enter text" />
                        @error('short_intro')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Bio: </label>
                        <textarea class="input input--text" rows="6" id="formInput#text" type="text" name="bio"
                            placeholder="Enter text">{{ old('short_intro', $profile->short_intro) }}
                        </textarea>
                        @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Profile image: </label>
                        <input class="input input--text" id="formInput#text" type="file" name="profile_image"
                            value="{{ old('profile_image', $profile->profile_image) }}" placeholder="Enter text" />
                        @error('profile_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Social github: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="social_github"
                            value="{{ old('social_github', $profile->social_github) }}" placeholder="Enter text" />
                        @error('social_github')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Social linkedin: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="social_linkedin"
                            value="{{ old('social_linkedin', $profile->social_linkedin) }}" placeholder="Enter text" />
                        @error('social_linkedin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Social twitter: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="social_twitter"
                            value="{{ old('social_twitter', $profile->social_twitter) }}" placeholder="Enter text" />
                        @error('social_twitter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Social youtube: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="social_youtube"
                            value="{{ old('social_youtube', $profile->social_youtube) }}" placeholder="Enter text" />
                        @error('social_youtube')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input class="btn btn--sub btn--lg  my-md" type="submit" value="Submit" />
                </form>
            </div>
        </div>
    </main>
@endsection
