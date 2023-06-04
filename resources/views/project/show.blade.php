@extends('layouts.base')
@section('content')
    <main class="singleProject my-md">
        <div class="container">
            <div class="layout">
                <div class="column column--1of3">
                    <h3 class="singleProject__subtitle">Tools & Stacks</h3>
                    <div class="singleProject__toolStack">
                        @foreach ($project->tags as $tag)
                            <span class="tag tag--pill tag--sub tag--lg">
                                <small>{{ $tag->name }}</small>
                            </span>
                        @endforeach
                    </div>
                    <a class="singleProject__liveLink" href="#" target="_blank"><i class="im im-external-link"></i>Source
                        Code
                    </a>
                </div>
                <div class="column column--2of3">
                    <img class="singleProject__preview" src="{{ asset('storage/' . $project->featured_image) }}"
                        alt="portfolio thumbnail" />
                    <a href="{{ route('profile.show', $project->profile->id) }}"
                        class="singleProject__developer">{{ $project->profile->username }}</a>
                    <h2 class="singleProject__title">{{ $project->profile->short_intro }}</h2>
                    <h3 class="singleProject__subtitle">About the Project</h3>
                    <div class="singleProject__info">
                        {{ $project->description }}
                    </div>

                    <div class="comments">
                        <h3 class="singleProject__subtitle">Feedback</h3>
                        <h5 class="project--rating">
                            {{ $percentage }}% Positive Feedback
                            @if (count($project->comments) < 2)
                                ({{ $project->comments->count() }} vote)
                            @else
                                ({{ $project->comments->count() }} votes)
                            @endif
                        </h5>

                        <form class="form" action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <!-- Textarea -->
                            <div class="form__field">
                                <label for="formInput#textarea">Comments: </label>
                                <textarea class="input input--textarea" name="body" id="formInput#textarea"
                                    placeholder="Write your comments here..."></textarea>
                                @error('body')
                                    <div class="text-danger">Body required</div>
                                @enderror
                                <select class="input" name="value" id="value">
                                    @foreach (\App\Models\Comments\Comment::VOTE_TYPE as $key => $value)
                                        <option value="{{ $value }}" {{ old('value') != $value ?: 'selected' }}>
                                            {{ \App\Models\Comments\Comment::VOTE_TYPE[$key] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('value')
                                    <div class="text-danger">Value required</div>
                                @enderror
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                            </div>
                            <input class="btn btn--sub btn--lg" type="submit" value="Comments" />
                        </form>
                        <div class="commentList">
                            @foreach ($project->comments as $comment)
                                <div class="comment">
                                    <a href="{{ route('profile.show', $comment->profile->id) }}">
                                        <img class="avatar avatar--md"
                                            src="{{ asset('storage/' . $comment->profile->profile_image) }}"
                                            alt="user" />
                                    </a>
                                    <div class="comment__details">
                                        <a href="{{ route('profile.show', $comment->profile->id) }}"
                                            class="comment__author">{{ $comment->profile->username }}</a>
                                        <p class="comment__info">
                                            {{ $comment->body }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
