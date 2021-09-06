
@if ($paginator->hasPages())
<div class="row">
   <div class="col-sm-12 col-md-5">
      <div class="dataTables_info" id="products-datatable_info" role="status" aria-live="polite">Showing products 1 to 10 of 12</div>
   </div>
   <div class="col-sm-12 col-md-7">
      <div class="dataTables_paginate paging_simple_numbers" id="products-datatable_paginate">
          
         <ul class="pagination pagination-rounded">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled paginate_button page-item previous"><span class="page-link"><i class="mdi mdi-chevron-left"></i></span></li>
            @else
                <li class="paginate_button page-item previous"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="mdi mdi-chevron-left"></i></a></li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled page-item"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <li class="active page-item paginate_button "><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item paginate_button "><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="paginate_button page-item next"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="mdi mdi-chevron-right"></i></a></li>
            @else
                <li class="disabled paginate_button page-item next"><span class="page-link"><i class="mdi mdi-chevron-right"></i></span></li>
            @endif
         </ul>
      </div>
   </div>
</div>
@endif