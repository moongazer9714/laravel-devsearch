@extends('layouts.base')
@section('content')
    <main class="profile my-md">
        <div class="container">
            <div class="layout">
                <div class="column column--1of3">
                    <div class="card text-center">
                        <div class="card__body dev">
                            <img class="avatar avatar--xl" src="{{ asset('storage/' . $profile->profile_image) }}" />
                            <h2 class="dev__name">{{ $profile->username }}</h2>
                            <p class="dev__title">{{ $profile->short_intro }}</p>
                            <p class="dev__location">Based in {{ $profile->location }}</p>
                            <ul class="dev__social">
                                @if ($profile->social_github)
                                    <li>
                                        <a title="Github" href="{{ $profile->social_github }}" target="_blank"><i
                                                class="fa fa-github" style="font-size: 32px"></i></a>
                                    </li>
                                @else
                                @endif
                                <li>
                                    <a title="Stackoverflow" href="#" target="_blank"><i
                                            class="im im-stackoverflow"></i></a>
                                </li>
                                <li>
                                    <a title="Twitter" href="#" target="_blank"><i class="im im-twitter"></i></a>
                                </li>
                                @if ($profile->social_linkedin)
                                    <li>
                                        <a title="LinkedIn" href="{{ $profile->social_linkedin }}" target="_blank"><i
                                                class="fa fa-linkedin" style="font-size: 32px"></i></a>
                                    </li>
                                @endif
                                <li>
                                    <a title="Twitter" href="#" target="_blank"><i class="im im-twitter"></i></a>
                                </li>
                                <li>
                                    <a title="LinkedIn" href="#" target="_blank"><i class="im im-linkedin"></i></a>
                                </li>
                                <li>
                                    <a title="Personal Website" href="#" target="_blank"><i
                                            class="im im-globe"></i></a>
                                </li>
                            </ul>
                            <a href="{{ route('messages.create') }}" class="btn btn--sub btn--lg">Send Message </a>
                        </div>
                    </div>
                </div>
                <div class="column column--2of3">
                    <div class="devInfo">
                        <h3 class="devInfo__title">About Me</h3>
                        <p class="devInfo__about">
                            {{ $profile->bio }}
                        </p>
                    </div>
                    <div class="devInfo">
                        <h3 class="devInfo__title">Skills</h3>
                        <div class="devInfo__skills">
                            @foreach ($profile->skills as $skill)
                                <div class="devSkill">
                                    <h4 class="devSkill__title">{{ $skill->name }}</h4>
                                    <p class="devSkill__info">
                                        {{ $skill->description }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="devInfo">
                        <h3 class="devInfo__title">Projects</h3>
                        <div class="grid grid--two">
                            @foreach ($profile->project as $project)
                                <div class="column">
                                    <div class="card project">
                                        <a href="{{ route('project.show', $project->id) }}" class="project">
                                            <img class="project__thumbnail"
                                                src="{{ asset('storage/' . $project->featured_image) }}"
                                                alt="project thumbnail" />
                                            <div class="card__body">
                                                <h3 class="project__title">{{ $project->profile->short_intro }}</h3>
                                                <p><a class="project__author"
                                                        href="{{ route('profile.show', $project->profile->id) }}">By
                                                        {{ $project->profile->username }}</a>
                                                </p>
                                                <p class="project--rating">
                                                    <span style="font-weight: bold;"></span> Postitive
                                                    Feedback
                                                    @if (count($project->comments) < 2)
                                                        ({{ $project->comments->count() }} vote)
                                                    @else
                                                        ({{ $project->comments->count() }} votes)
                                                    @endif
                                                </p>
                                                <div class="project__tags">
                                                    @foreach ($project->tags as $tag)
                                                        <span class="tag tag--pill tag--main">
                                                            <small>{{ $tag->name }}</small>
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
