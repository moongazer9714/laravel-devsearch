@extends('layouts.base')
@section('content')
    <main class="formPage my-xl">
        <div class="content-box">
            <div class="formWrapper">
                <a class="backButton" href="#"><i class="im im-angle-left"></i></a>
                <br>
                <form class="form" action="{{ route('project.destroy', $project->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <p>Are your sure you want to delete this "{{ $project->title }}"?</p>
                    <a class="btn btn--sub btn--lg  my-md" href="{{ route('profile.show', $project->profile->id) }}">&#x2190 Go Back</a>
                    <input class="btn btn--sub btn--lg  my-md" type="submit" value="Delete"/>
                </form>
            </div>
        </div>
    </main>
@endsection

