@if ($paginator->hasPages())


        {{-- prev page --}}
        @if ($paginator->onFirstPage())
                <a href="#" class="disabled arrow__pagination left__arrow" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true"><span><</span> Prev</span>
                </a>
                @else
                <a href="{{ $paginator->previousPageUrl() }}" class="arrow__pagination left__arrow" rel="prev" aria-label="@lang('pagination.previous')"><span><</span> Prev</a>
        @endif


        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <a href="#" class="disabled number__pagination" aria-disabled="true"><span>{{ $element }}</span></a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <a href="#" class="active number__pagination" aria-current="page"><span>{{ $page }}</span></a>
                        @else
                        <a href="{{ $url }}" class="number__pagination">{{ $page }}</a>
                        @endif
                @endforeach
                @endif
        @endforeach


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="arrow__pagination right__arrow" rel="next" aria-label="@lang('pagination.next')">Next <span>></span></a>
                @else
                <a href="#" class="disabled arrow__pagination right__arrow" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">Next <span>></span></span>
                </a>
        @endif
@endif