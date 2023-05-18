@extends('layouts.base')
@section('content')
<!-- Header Section -->
<!-- Main Section -->
<main class="home">
    <section class="hero-section text-center">
        <div class="container container--narrow">
            <div class="hero-section__box">
                <h2>CONNECT WITH <span>DEVELOPERS</span></h2>
                <h2>FROM AROUND THE WORLD</h2>
            </div>

            <div class="hero-section__search">
                <form class="form" action="#" method="get">
                    <div class="form__field">
                        <label for="formInput#search">Search Developers </label>
                        <input class="input input--text" id="formInput#search" type="text" name="text"
                               placeholder="Search by developer name"/>
                    </div>

                    <input class="btn btn--sub btn--lg" type="submit" value="Search"/>
                </form>
            </div>
        </div>
    </section>
    <!-- Search Result: DevList -->
    <section class="devlist">
        <div class="container">
            <div class="grid grid--three">
                @foreach($profiles as $profile)
                <div class="column card">
                    <div class="dev">
                        <a href="{{ route('profile.account', $profile->id) }}" class="card__body">
                            <div class="dev__profile">
                                <img class="avatar avatar--md" src="{{ asset('storage/' . $profile->profile_image) }}"
                                     alt="image"/>
                                <div class="dev__meta">
                                    <h3>{{ $profile->username }}</h3>
                                    <h5>{{ $profile->short_intro }}</h5>
                                </div>
                            </div>
                            <p class="dev__info">
                                {{ $profile->bio }}
                            </p>
                            <div class="dev__skills">
                  <span class="tag tag--pill tag--main">
                    <small>JavaScript</small>
                  </span>
                                <span class="tag tag--pill tag--main">
                    <small>React</small>
                  </span>
                                <span class="tag tag--pill tag--main">
                    <small>SCSS</small>
                  </span>
                                <span class="tag tag--pill tag--main">
                    <small>Nodejs</small>
                  </span>
                                <span class="tag tag--pill tag--main">
                    <small>Express</small>
                  </span>
                                <span class="tag tag--pill tag--main">
                    <small>GraphQL</small>
                  </span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
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
