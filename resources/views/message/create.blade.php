@extends('layouts.base')

@section('content')
    <!-- Main Section -->
    <main class="formPage my-xl">
        <div class="content-box">
            <div class="formWrapper">
                <a class="backButton" href="#"><i class="im im-angle-left"></i></a>
                <br>

                <form action="{{ route('messages.store') }}" class="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Input:Text -->
                    <div class="form__field">
                        <label for="formInput#text">Name: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="name"
                            {{-- value="{{ \Illuminate\Support\Facades\Auth::user()->username }}" --}} placeholder="Enter name" />

                    </div>
                    <div class="form__field">
                        <input class="input input--text" type="hidden" name="sender_id" id="sender_id">
                    </div>
                    <div class="form__field">
                        <input class="input input--text" type="hidden" name="receiver_id" id="recipient_id">
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Email: </label>
                        <input class="input input--text" id="formInput#text" type="email" name="email"
                            placeholder="Enter email" />
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Subject: </label>
                        <input class="input input--text" id="formInput#text" type="text" name="subject"
                            placeholder="Enter subject" />
                    </div>
                    <div class="form__field">
                        <label for="formInput#text">Body: </label>
                        <textarea class="input input--text" id="formInput#text" type="text" rows="6" name="body"
                            placeholder="Enter body">
                        </textarea>
                    </div>
                    <input class="btn btn--sub btn--lg  my-md" type="submit" value="Submit" />
                </form>
            </div>
        </div>
    </main>
@endsection
