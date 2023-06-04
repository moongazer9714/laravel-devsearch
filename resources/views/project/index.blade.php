@extends('layouts.base')
@section('content')
    <main class="projects">
        <section class="hero-section text-center">
            <div class="container container--narrow">
                <div class="hero-section__box">
                    <h2>Search for <span>Projects</span></h2>
                </div>

                <div class="hero-section__search">
                    <form class="form"  method="get">
                        <div class="form__field">
                            <label for="formInput#search">Search By Projects </label>
                            <input class="input input--text" id="formInput#search" type="text" name="search"
                                placeholder="Search by Project Title" value="{{ $search }}"/>
                        </div>

                        <input class="btn btn--sub btn--lg" type="submit" value="Search" />
                    </form>
                </div>
            </div>
        </section>
        <!-- Search Result: DevList -->
        <section class="projectsList">
            <div class="container">
                <div class="grid grid--three">
                    @foreach ($projects as $project)
                        <div class="column">
                            <div class="card project">
                                <a href="{{ route('project.show', $project->id) }}" class="project">
                                    <img class="project__thumbnail" src="{{ asset('storage/' . $project->featured_image) }}"
                                        alt="project thumbnail" />
                                    <div class="card__body">
                                        <h3 class="project__title">{{ $project->title }}</h3>
                                        <p><a class="project__author"
                                                href="{{ route('profile.account', $project->profile->id) }}">By
                                                {{ $project->profile->username ?? '' }}</a></p>
                                        <p class="project--rating">
                                            <span style="font-weight: bold;"></span> Positive
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
        </section>
        {{ $projects->links('vendor.pagination.custom')}}
    </main>
@endsection
