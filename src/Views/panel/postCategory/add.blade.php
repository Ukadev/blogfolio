@extends('blogfolio::layouts.panel')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('panelAdmin')}}" title="Go to Admin Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('postsCategoriesAdmin')}}" title="Go to Posts Categories Page" class="tip-bottom">Posts Categories</a> <a href="#" class="current">Add Post Category</a> </div>
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
                    <div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
                        <h5>Add Post Category</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{route('postsCategoriesStoreAdmin')}}" class="form-horizontal" method="post">
                            <input name="_method" type="hidden" value="POST">
                            {{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Name:</label>
                                <div class="controls">
                                    <input type="text" class="span11" name="name" value="" id="name"  placeholder="Category name" />
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" class="btn btn-success" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')

<script src="/vendor/blogfolio/panel/js/matrix.popover.js"></script>
@endpush

