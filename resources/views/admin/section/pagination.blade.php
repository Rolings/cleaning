@if($paginator->hasPages())
    <nav class="app-pagination mt-5">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if($paginator->currentPage() > 5)
                <li class="page-item">
                    <a class="page-link" href="<?php echo $paginator->url( $paginator->currentPage() - 5 ); ?>" rel="prev" aria-label="&lsaquo; Skip 5"> &lsaquo; Skip 5 </a>
                </li>
            @endif
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
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
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
            @if($paginator->lastPage() >= $paginator->currentPage()+5)
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url( $paginator->currentPage() + 5 ) }}" rel="prev" aria-label="Skip 5  &rsaquo;">Skip 5 &rsaquo;</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
