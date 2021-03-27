@extends('blogfolio::layouts.panel')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('panelAdmin')}}" title="Go to Admin Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Posts</a> </div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Posts</h5>
                        <span class="label label-success"><a class="white" href="{{route('postsAddAdmin')}}" title="Add new Post"><i class="icon-plus"></i> Add new Post</a></span>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $id => $post)
                                <tr class="{{ ($id % 2 == 0) ? "gradeX" : "gradeC" }}">
                                    <td><a href="{{url('/blog/'.$post->slug)}}" target="_blank">{{$post->title}}</a></td>
                                    <td> <span class="user-info">{{date('d/m/Y, h:i A', strtotime($post->created_at))}}</span></td>
                                    <td>
                                        <div class="text-right">
                                            <a class="btn btn-primary btn-mini" href="{{route('postsEditAdmin', $post->id)}}"><i class="icon icon-edit"></i> Edit</a> | <a class="btn btn-danger btn-mini delPost" href="javascript:void(0)" data-post="{{$post->id}}" data-toggle="modal" data-target="#modalDel"><i class="icon icon-remove"></i> Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalDel" tabindex="-1" role="dialog" aria-labelledby="modalDelLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalDelLabel">Delete Post</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the selected post?
                </div>
                <div class="modal-footer">
                    <form action="{{route('postsDeleteAdmin', '')}}" class="form-horizontal" method="post" id="deletePost">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="delButtonModal">Delete it!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
<script src="/vendor/blogfolio/panel/js/jquery.uniform.js"></script>
<script src="/vendor/blogfolio/panel/js/select2.min.js"></script>
<script src="/vendor/blogfolio/panel/js/jquery.dataTables.min.js"></script>
<script src="/vendor/blogfolio/panel/js/matrix.tables.js"></script>
<script src="/vendor/blogfolio/panel/js/matrix.popover.js"></script>
<script>
    $(document).ready(function(){
        $('.delPost').click(function(){
            var _url = "{{route('postsDeleteAdmin' , '')}}/"+$(this).data('post');
            $('#deletePost').attr('action', _url);
        });
        $('#modalDel').on('hidden.bs.modal', function () {
            $('#deletePost').attr('action', '');
        })
    });
</script>
@endpush

@push('css')
<link rel="stylesheet" href="/vendor/blogfolio/panel/css/uniform.css" />
<link rel="stylesheet" href="/vendor/blogfolio/panel/css/select2.css" />
@endpush