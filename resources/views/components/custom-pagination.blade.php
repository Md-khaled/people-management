@props(['paginator', 'total_records'])


    <nav>
        <ul class="pagination justify-content-end custom-pagination">
            {{-- Total Number of People --}}
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">{{ $total_records }} people in the list</span>
            </li>

            @if ($paginator->hasPages())
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link bg-light">&lsaquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link bg-light" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif

                {{-- Number of pages --}}
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} of {{ $paginator->total() }}</span>
                </li>

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link bg-light" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link bg-light" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            @endif
        </ul>
    </nav>
