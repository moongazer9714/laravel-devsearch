@extends('layouts.base')
@section('content')
    <main class="singleProject my-md">
        <div class="container">
            <div class="layout">
                <div class="column column--1of3">
                    <h3 class="singleProject__subtitle">Tools & Stacks</h3>
                    <div class="singleProject__toolStack">
                        @foreach($project->tags as $tag)
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
                    <img class="singleProject__preview" src="{{ asset('storage/'.$project->featured_image) }}"
                         alt="portfolio thumbnail"/>
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
                            36% Postitive Feedback (18 Votes)
                        </h5>

                        <form class="form" action="#" method="POST">
                            <!-- Textarea -->
                            <div class="form__field">
                                <label for="formInput#textarea">Comments: </label>
                                <textarea class="input input--textarea" name="message" id="formInput#textarea"
                                          placeholder="Write your comments here..."></textarea>
                            </div>
                            <input class="btn btn--sub btn--lg" type="submit" value="Comments"/>
                        </form>
                        <div class="commentList">
                            <div class="comment">
                                <a href="profile.html">
                                    <img class="avatar avatar--md"
                                         src="https://pbs.twimg.com/profile_images/1335382240931368961/b3wSZKj4_400x400.jpg"
                                         alt="user"/>
                                </a>
                                <div class="comment__details">
                                    <a href="profile.html" class="comment__author">Sulamita Ivanov</a>
                                    <p class="comment__info">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit alias
                                        numquam perferendis
                                        mollitia minus minima exercitationem possimus ab deserunt qui, soluta iusto
                                        doloribus eveniet
                                        similique consequuntur ratione, dignissimos ut magni laborum quo.
                                    </p>
                                </div>
                            </div>
                            <div class="comment">
                                <a href="profile.html">
                                    <img class="avatar avatar--md"
                                         src="https://avatars.githubusercontent.com/u/33843378" alt="user"/>
                                </a>
                                <div class="comment__details">
                                    <a href="profile.html" class="comment__author">Dennis Ivanov</a>
                                    <p class="comment__info">
                                        Consectetur adipisicing elit. Reprehenderit alias numquam perferendis mollitia
                                        minus minima
                                        exercitationem possimus ab deserunt qui, ratione, dignissimos ut magni laborum
                                        quo.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
