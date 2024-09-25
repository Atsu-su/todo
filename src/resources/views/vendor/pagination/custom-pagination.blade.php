@php
$PAGES = 4;
@endphp

@if ($paginator->hasPages())
  <nav class="c-pagination" role="navigation" aria-label="{{ __('Pagination Navigation') }}">
		{{-- Previous Page Link --}}
		@if ($paginator->onFirstPage())
			<div class="c-pagination__prev" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
				<span aria-hidden="true">
					<svg fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
					</svg>
				</span>
			</div>
		@else
			<div class="c-pagination__prev">
				<a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}">
					<svg fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
					</svg>
				</a>
			</div>
		@endif

		{{-- Pagination Elements --}}
		@foreach ($elements as $element)
			{{-- "Three Dots" Separator --}}
			{{-- @if (is_string($element))
				<span aria-disabled="true">
					<span class="">{{ $element }}</span>
				</span>
			@endif --}}

			{{-- Array Of Links --}}
			@if (is_array($element))
				@foreach ($element as $page => $url)
					@if (($paginator->currentPage() + $PAGES >= $paginator->lastPage() && $paginator->lastPage() - $PAGES <= $loop->iteration) || ($paginator->currentPage() <= $loop->iteration && $paginator->currentPage() + $PAGES >= $loop->iteration))
						@if ($page == $paginator->currentPage())
							<div class="c-pagination__number c-pagination__selected">
                                <span aria-current="page">
                                    {{ $page }}
                                </span>
                            </div>
						@else
							<div class="c-pagination__number">
                                <a href="{{ $url }}" class="" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            </div>
						@endif
					@endif
				@endforeach
			@endif
		@endforeach

		{{-- Next Page Link --}}
		@if ($paginator->hasMorePages() && $paginator->currentPage() < $paginator->lastPage())
			<div class="c-pagination__next">
				<a href="{{ $paginator->nextPageUrl() }}" rel="next" class="" aria-label="{{ __('pagination.next') }}">
					<svg fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
					</svg>
				</a>
			</div>
		@else
			<div class="c-pagination__next" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
				<span class="" aria-hidden="true">
					<svg fill="currentColor" viewBox="0 0 20 20">
						<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
					</svg>
				</span>
			</div>
		@endif
	</nav>
@endif