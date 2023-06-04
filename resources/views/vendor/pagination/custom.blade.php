<main class="home">
    <div class="pagination">
        <ul class="container">
            @if ($paginator->onFirstPage())
                <li>
                    <a href="#" class="btn btn--disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">&#10094;
                        Prev</a>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="btn" aria-disabled="true"
                        aria-label="@lang('pagination.previous')">&#10094; Prev</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <a href="#" class="btn btn--sub" aria-disabled="true">{{ $element }}</a>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="btn btn--sub" aria-current="page">{{ $page }}</a>
                        @else
                            <li><a class="btn" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="btn" rel="next"
                        aria-label="@lang('pagination.next')">Next &#10095;</a>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="btn btn--disabled" rel="next"
                        aria-label="@lang('pagination.next')">Next &#10095;</a>
                </li>
            @endif
        </ul>
    </div>
    
</main>
