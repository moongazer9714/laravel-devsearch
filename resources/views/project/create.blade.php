@extends('layouts.base')
@section('content')
    <main class="formPage my-xl">
        <div class="content-box">
            <div class="formWrapper">
                <a class="backButton" href="#"><i class="im im-angle-left"></i></a>
                <br>
                <form class="form" action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="formInput#text">Title: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="title"
                            placeholder="Enter title" />
                        @error('title')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="formInput#text">Description: </label>
                        <textarea class="input input--text" rows="6" id="formInput#text" type="text" name="description"
                            placeholder="Enter text">
                        </textarea>
                        @error('description')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="formInput#text">Featured image: </label>
                        <input class="input input--text" id="formInput#text" type="file" name="featured_image"
                            placeholder="Choose image" />
                        @error('featured_image')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Tag: </label>
                        <select class="input input--text" id="formInput#text" type="text" name="tags[]" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Source link: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="source_link"
                            placeholder="Enter source link" />
                        @error('source_link')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Demo link: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="demo_link"
                            placeholder="Enter demo link" />
                        @error('demo_link')
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <input class="btn btn--sub btn--lg  my-md" type="submit" value="Submit" />
                </form>
            </div>
        </div>
    </main>
@endsection
