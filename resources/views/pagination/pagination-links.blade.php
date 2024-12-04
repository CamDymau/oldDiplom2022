<div class="flex jcsb aic">

    @if ($paginator->hasPages())
        @if($paginator->onFirstPage())
            <span class="link-disable pagLink">
            @lang('pagination.previous')
        </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="orangeLink pagLink">@lang('pagination.previous')</a>
        @endif
        <div class="btnPage flex jcsb aic">
            @if(is_array($elements[0]))
                @foreach($elements[0] as $page =>$url)
                    @if($page == $paginator->currentPage())
                        <a class="activePaginateLink" href="{{$url}}">{{$page}}</a>
                    @else
                        <a class="noActiveLink" href="{{$url}}">{{$page}}</a>
                    @endif
                @endforeach
            @endif
        </div>
        @if($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="orangeLink pagLink">@lang('pagination.next')</a>
        @else
            <span class="link-disable pagLink">
                @lang('pagination.next')
            </span>
        @endif
    @endif
</div>
