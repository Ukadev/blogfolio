@extends('blogfolio::layouts.panel')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('panelAdmin')}}" title="Go to Admin Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Comments</a> </div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Comments</h5>
                    </div>
                    <div class="widget-content nopadding text-center" style="line-height: 5em">
                        The comments system is disabled. If you want to enable it, please follow <a href="{{route('settingsAdmin')}}" style="font-weight:bold">this link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
<script src="{{url('/vendor/blogfolio/panel/js/jquery.uniform.js')}}"></script>
<script src="{{url('/vendor/blogfolio/panel/js/select2.min.js')}}"></script>
<script src="{{url('/vendor/blogfolio/panel/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/vendor/blogfolio/panel/js/matrix.tables.js')}}"></script>
<script src="{{url('/vendor/blogfolio/panel/js/matrix.popover.js')}}"></script>
@endpush