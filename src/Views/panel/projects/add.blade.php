@extends('blogfolio::layouts.panel')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('panelAdmin')}}" title="Go to Admin Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('blogAdmin')}}" title="Go to Posts Page" class="tip-bottom">Posts</a> <a href="#" class="current">Add Project</a> </div>
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
                        <h5>Add Post</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{route('projectsStoreAdmin')}}" class="form-horizontal" method="post">
                            {{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Title:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Title" value="" name="title" id="title" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Category:</label>
                                <div class="controls">
                                    <select name="category" class="select">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Content:</label>
                                <div class="controls">
                                    <textarea class="editor span11" name="content" id="content" title="content" required></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Image:</label>
                                <div class="controls">
                                    <input class="span11" name="image" id="image" title="Image" type="file" required></input>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" />
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
<script src="/vendor/blogfolio/panel/js/select2.min.js"></script>
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