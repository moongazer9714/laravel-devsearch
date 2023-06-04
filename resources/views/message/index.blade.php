@extends('layouts.base')

@section('content')
    <main class="inbox my-xl">
        <div class="content-box">
            <h3 class="inbox__title">New Messages(<span>2</span>)</h3>
            <ul class="messages">
                @foreach ($messages as $message)
                    <li class="message message--unread">
                        <a href="message.html">
                            <span class="message__author">{{ $message->name }}</span>
                            <span class="message__subject">{{ $message->subject }}</span>
                            <span class="message__date">{{ $message->created_at }}</span>
                    </li>
                    </a>
                @endforeach
            </ul>
        </div>
    @endsection
