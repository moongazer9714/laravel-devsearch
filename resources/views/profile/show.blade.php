@extends('layouts.base')

@section('content')
    <main class="settingsPage profile my-md">
        <div class="container">
            <div class="layout">
                <div class="column column--1of3">
                    <div class="card text-center">
                        <div class="card__body dev">
                            <a class="tag tag--pill tag--main settings__btn"
                                href="{{ route('profile.edit', $profile->id) }}"><i class="im im-edit"></i>
                                Edit</a>
                            <img class="avatar avatar--xl dev__avatar"
                                src="{{ asset('storage/' . $profile->profile_image) }}" />
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
                    <div class="settings">
                        <h3 class="settings__title">Skills</h3>
                        <a class="tag tag--pill tag--sub settings__btn tag--lg" href="{{ route('skill.create') }}">
                            <i class="im im-plus"></i> Add
                            Skill</a>
                    </div>

                    <table class="settings__table">
                        @foreach ($profile->skills as $skill)
                            <tr>
                                <td class="settings__tableInfo">
                                    <h4>{{ $skill->name }}</h4>
                                    <p>
                                        {{ $skill->description }}
                                    </p>
                                </td>
                                <td class="settings__tableActions">
                                    <a class="tag tag--pill tag--main settings__btn"
                                        href="{{ route('skill.edit', $skill->id) }}"><i class="im im-edit"></i>
                                        Edit</a>
                                    <a class="tag tag--pill tag--main settings__btn"
                                        href="{{ route('skill.delete', $skill->id) }}"><i
                                            class="im im-x-mark-circle-o"></i>
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    <div class="settings">
                        <h3 class="settings__title">Projects</h3>
                        <a class="tag tag--pill tag--sub settings__btn tag--lg" href="{{ route('project.create') }}"><i
                                class="im im-plus"></i> Add
                            Project</a>
                    </div>

                    <table class="settings__table">
                        @foreach ($profile->project as $project)
                            <tr>
                                <td class="settings__thumbnail">
                                    <a href="{{ route('project.show', $project->id) }}"><img
                                            src="{{ asset('storage/' . $project->featured_image) }}"
                                            alt="Project Thumbnail" /></a>
                                </td>
                                <td class="settings__tableInfo">
                                    <a href="{{ route('project.show', $project->id) }}">{{ $project->title }}</a>
                                    <p>
                                        {{ $project->description }}
                                    </p>
                                </td>
                                <td class="settings__tableActions">
                                    <a class="tag tag--pill tag--main settings__btn"
                                        href="{{ route('project.edit', $project->id) }}"><i class="im im-edit"></i>
                                        Edit</a>

                                    <a class="tag tag--pill tag--main settings__btn"
                                        href="{{ route('project.delete', $project->id) }}" value="Delete">
                                        <i class="im im-x-mark-circle-o"></i>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
