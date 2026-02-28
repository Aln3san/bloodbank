@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

        @php
            $isArabic = app()->getLocale() == 'ar';
        @endphp

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled mx-1">
                <span class="page-link">
                    <i class="fa-solid {{ $isArabic ? 'fa-angle-right' : 'fa-angle-left' }}"></i>
                </span>
            </li>
        @else
            <li class="page-item mx-1">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <i class="fa-solid {{ $isArabic ? 'fa-angle-right' : 'fa-angle-left' }}"></i>
                </a>
            </li>
        @endif


        {{-- Page Numbers --}}
        @foreach ($elements as $element)

            {{-- Three Dots --}}
            @if (is_string($element))
                <li class="page-item disabled mx-1">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="page-item mx-1 {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">
                            {{ $page }}
                        </a>
                    </li>
                @endforeach
            @endif

        @endforeach


        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <li class="page-item mx-1">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <i class="fa-solid {{ $isArabic ? 'fa-angle-left' : 'fa-angle-right' }}"></i>
                </a>
            </li>
        @else
            <li class="page-item disabled mx-1">
                <span class="page-link">
                    <i class="fa-solid {{ $isArabic ? 'fa-angle-left' : 'fa-angle-right' }}"></i>
                </span>
            </li>
        @endif

    </ul>
</nav>
@endif