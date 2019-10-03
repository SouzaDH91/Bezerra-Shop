@if ($paginator->hasPages())

    <ul class="page-numbers">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <a href="#" class="page-numbers prev">
                    <span class="lnr lnr-arrow-left"></span>
                </a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="page-numbers prev">
                    <span class="lnr lnr-arrow-left"></span>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span class="page-numbers current">{{ $page }}</span></li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="page-numbers inactive">
                            {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="page-numbers next">
                    <span class="lnr lnr-arrow-right"></span>
                </a>
            </li>
        @else
            <li class="disabled">
                <a class="page-numbers next">
                    <span class="lnr lnr-arrow-right"></span>
                </a>
            </li>
        @endif
    </ul>
@endif