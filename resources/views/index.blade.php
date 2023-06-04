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
                <form class="form" method="get">
                    <div class="form__field">
                        <label for="formInput#search">Search Developers </label>
                        <input class="input input--text" id="formInput#search" type="text" name="search"
                               placeholder="Search by developer name" value="{{ $search }}"/>
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
                            @foreach($profile->skills as $skill)
                                  <span class="tag tag--pill tag--main">
                                    <small>{{ $skill->name }}</small>
                                  </span>
                            @endforeach
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
        </div>
    </section>

    {{ $profiles->links('vendor.pagination.custom')}}
</main>
@endsection
