@if(isset($breadcrumbs))
    <!--breadcrumbs-->
    <div id="breadcrumb">
        <a href="{{route('panelAdmin')}}" title="{{ucfirst(trans('blogfolio::panel.home'))}}" class="tip-bottom">
            <i class="icon-home"></i> Home
        </a>
        @foreach($breadcrumbs as $breadcrumb)
            <a href="{{route($breadcrumb['route'])}}"
               title="{{trans('blogfolio::panel.goto')}} {{$breadcrumb['title']}}"
               @if(isset($breadcrumb['class']))
               class="{{$breadcrumb['class']}}"
               @else
               class="tip-bottom"
               @endif
            >
                @if(isset($breadcrumb['icon']))
                    <i class="{{$breadcrumb['icon']}}"></i>
                @endif
                {{$breadcrumb['title']}}
            </a>
        @endforeach
    </div>
    <!--End-breadcrumbs-->
@endif