@extends('layouts.base')

@section('content')
    <!-- Main Section -->
    <main class="formPage my-xl">
        <div class="content-box">
            <div class="formWrapper">
                <a class="backButton" href="#"><i class="im im-angle-left"></i></a>
                <br>

                <form action="{{ route('skill.store') }}" class="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="formInput#text">Name: </label>
                        <input class="input input--text" id="formInput#text" {{--                               value="{{ \Illuminate\Support\Facades\Auth::user()->name }}" --}} type="text"
                            name="name" placeholder="Enter name" />
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Description: </label>
                        <textarea class="input input--text" id="formInput#text" type="text" rows="6" name="description"
                            {{--                               value="{{ \Illuminate\Support\Facades\Auth::user()->email }}" --}} placeholder="Enter description">
                        </textarea>
                        @error('description')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <input class="btn btn--sub btn--lg  my-md" type="submit" value="Submit" />
                </form>
            </div>
        </div>
    </main>
@endsection
