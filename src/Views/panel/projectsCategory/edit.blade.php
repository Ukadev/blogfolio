@extends('blogfolio::layouts.panel')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('panelAdmin')}}" title="Go to Admin Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('postsCategoriesAdmin')}}" title="Go to Categories Page" class="tip-bottom">Posts</a> <a href="#" class="current">Edit Category</a> </div>
    </div>
    <!--End-breadcrumbs-->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Edit Catgory</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{route('postsCategoriesUpdateAdmin', $postCategory->id)}}" class="form-horizontal" method="post">
                            <input name="_method" type="hidden" value="PUT">
                            {{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Name:</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="name" value="{{$postCategory->name}}" id="name" />
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" class="btn btn-success" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
<script src="/vendor/blogfolio/panel/js/jquery.uniform.js"></script>
<script src="/vendor/blogfolio/panel/js/matrix.popover.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-te/1.4.0/jquery-te.js"></script>
<script>
    $(document).ready(function() {
        $(".editor").jqte();
        $('.jqte').addClass('span11');
    });
</script>
@endpush

@push('css')
<link rel="stylesheet" href="/vendor/blogfolio/panel/css/uniform.css" />
<link rel="stylesheet" href="/vendor/blogfolio/panel/css/jquery-te.css" />
@endpush