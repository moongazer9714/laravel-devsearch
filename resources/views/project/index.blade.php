@extends('layouts.base')
@section('content')
    <main class="projects">
        <section class="hero-section text-center">
            <div class="container container--narrow">
                <div class="hero-section__box">
                    <h2>Search for <span>Projects</span></h2>
                </div>

                <div class="hero-section__search">
                    <form class="form" action="#" method="get">
                        <div class="form__field">
                            <label for="formInput#search">Search By Projects </label>
                            <input class="input input--text" id="formInput#search" type="text" name="text"
                                   placeholder="Search by Project Title"/>
                        </div>

                        <input class="btn btn--sub btn--lg" type="submit" value="Search"/>
                    </form>
                </div>
            </div>
        </section>
        <!-- Search Result: DevList -->
        <section class="projectsList">
            <div class="container">
                <div class="grid grid--three">
                    @foreach($projects as $project)
                        <div class="column">
                            <div class="card project">
                                <a href="{{ route('project.show', $project->id) }}" class="project">
                                    <img class="project__thumbnail"
                                         src="{{ asset('storage/'.$project->featured_image) }}"
                                         alt="project thumbnail"/>
                                    <div class="card__body">
                                        <h3 class="project__title">{{ $project->title }}</h3>
                                        <p><a class="project__author"
                                              href="{{ route('profile.account', $project->profile->id) }}">By {{ $project->profile->username ?? '' }}</a></p>
                                        <p class="project--rating">
                                            <span style="font-weight: bold;">98%</span> Postitive
                                            Feedback (72 Votes)
                                        </p>
                                        <div class="project__tags">
                    <span class="tag tag--pill tag--main">
                      <small>NextJS</small>
                    </span><span class="tag tag--pill tag--main">
                      <small>GraphQL</small>
                    </span><span class="tag tag--pill tag--main">
                      <small>TypeScript</small>
                    </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="pagination">
            <ul class="container">
                <li><a href="#" class="btn btn--disabled">&#10094; Prev</a></li>
                <li><a href="#" class="btn btn--sub">01</a></li>
                <li><a href="#" class="btn">02</a></li>
                <li><a href="#" class="btn">03</a></li>
                <li><a href="#" class="btn">04</a></li>
                <li><a href="#" class="btn">05</a></li>
                <li><a href="#" class="btn">06</a></li>
                <li><a href="#" class="btn">07</a></li>
                <li><a href="#" class="btn">08</a></li>
                <li><a href="#" class="btn">09</a></li>
                <li><a href="#" class="btn">10</a></li>
                <li><a href="#" class="btn">Next &#10095;</a></li>
            </ul>
        </div>
    </main>
@endsection
