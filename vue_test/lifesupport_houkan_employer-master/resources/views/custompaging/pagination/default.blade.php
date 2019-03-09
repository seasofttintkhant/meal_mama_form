@if ($paginator->hasPages())
    <ul class="med-main__page-btn">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="color-pink">Prev</a></li>
        @endif

        @if($paginator->currentPage() > 3)
            <li><a href="{{ $paginator->url(1) }}" class="color-pink">1</a></li>
        @endif
        @if($paginator->currentPage() > 4)
            <li class="disabled hidden-xs"><span>...</span></li>
        @endif
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
                    <li><a href="javascript:void(0)" class="color-pink med-active">{{ $i }}</a></li>
                @else
                    <li><a href="{{ $paginator->url($i) }}" class="color-pink">{{ $i }}</a></li>
                @endif
            @endif
        @endforeach
        @if($paginator->currentPage() < $paginator->lastPage() - 3) 
            <li><span>...</span></li>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 2)
            <li><a href="{{ $paginator->url($paginator->lastPage()) }}" class="color-pink">{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="color-pink">Next</a></li>
        @endif
    </ul>
@endif