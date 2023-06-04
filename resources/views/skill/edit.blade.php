@extends('layouts.base')

@section('content')
    <!-- Main Section -->
    <main class="formPage my-xl">
        <div class="content-box">
            <div class="formWrapper">
                <a class="backButton" href="#"><i class="im im-angle-left"></i></a>
                <br>

                <form action="{{ route('skill.update', $skill->id) }}" class="form" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="formInput#text">Name: </label>
                        <input class="input input--text" id="formInput#text" value="{{ old('name', $skill->name) }}"
                            type="text" name="name" placeholder="Enter name" />
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Description: </label>
                        <textarea class="input input--text" id="formInput#text" type="text" rows="6" name="description"
                            placeholder="Enter description">
                                value="{{ old('description', $skill->description) }}"
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
