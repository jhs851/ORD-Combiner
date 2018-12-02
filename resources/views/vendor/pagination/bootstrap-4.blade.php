@if ($paginator->hasPages())
    <ul class="pagination pagination-circle m-0" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="First">
                <span class="page-link" aria-hidden="true">First</span>
            </li>
            <li class="page-item disabled" aria-disabled="true" aria-label="이전">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url(1) }}" rel="first" aria-label="First">First</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="이전">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="다음">&rsaquo;</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="last" aria-label="Last">Last</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="다음">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </li>
            <li class="page-item disabled" aria-disabled="true" aria-label="Last">
                <span class="page-link" aria-hidden="true">Last</span>
            </li>
        @endif
    </ul>
@endif