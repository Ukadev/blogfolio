@extends('blogfolio::layouts.panel')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="{{route('panelAdmin')}}" title="Go to Admin Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="{{route('blogAdmin')}}" title="Go to Posts Page" class="tip-bottom">Posts</a> <a href="#" class="current">Comments</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>Comments</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>Content</th>
                                <th>Author</th>
                                <th>Post</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $id => $comment)
                                <tr class="{{ ($id % 2 == 0) ? "gradeX" : "gradeC" }}">
                                    <td><a href="javascript:void(0)" class='showCompleteComment' data-toggle="modal"
                                           data-target="#modalDet"
                                           data-content="{{$comment->content}}">{{str_limit($comment->content, 30)}}</a>
                                    </td>
                                    <td><a href="{{url('/blog/'.$comment->user_id)}}"
                                           target="_blank">{{$comment->user->name}}</a></td>
                                    <td><a href="{{url('/blog/'.$comment->post->slug)}}"
                                           target="_blank">{{$comment->post->title}}</a></td>
                                    <td style="text-align:center!important">
                                        @if($comment->status == 1)
                                            <span class="statusIconStack icon-stack">
                                            <i class="statusIconParent green icon-circle icon-stack-base"></i>
                                            <i class="statusIcon icon-ok icon-light" data-id="{{$comment->id}}"
                                               data-status="0"></i>
                                            </span>
                                        @else
                                            <span class="statusIconStack icon-stack">
                                            <i class="statusIconParent grey icon-circle icon-stack-base"></i>
                                            <i class="statusIcon icon-eye-close icon-light" data-id="{{$comment->id}}"
                                               data-status="1"></i>
                                            </span>
                                        @endif
                                        <i class="loadingIcon icon-refresh icon-spin size19 hide"
                                           aria-hidden="true"></i>
                                    </td>
                                    <td>
                                        <span class="user-info">{{date('d/m/Y, h:i A', strtotime($comment->created_at))}}</span>
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <a class="btn btn-danger btn-mini delComment" href=""
                                               data-comment="{{$comment->id}}" data-toggle="modal"
                                               data-target="#modalDel"><i class="icon icon-remove"></i> Delete</a>
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
    <!-- Modal delete -->
    <div class="modal fade" id="modalDel" tabindex="-1" role="dialog" aria-labelledby="modalDelLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalDelLabel">Delete Comment</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the selected comment?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="delButtonModal" data-token="{{ csrf_token() }}"
                            data-comment="">Delete it!
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal detail -->
    <div class="modal fade" id="modalDet" tabindex="-1" role="dialog" aria-labelledby="modalDetLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalDelLabel">Comment</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    $(document).ready(function () {
        $('.delComment').click(function () {
            $('#delButtonModal').data('comment', $(this).data('comment'));
        });
        $('#delButtonModal').click(function (e) {
            e.preventDefault();
            $('#modalDel').modal('hide');
            var token = $(this).data('token');

            $.ajax({
                url: "{{route('commentDeleteAdmin' , '')}}/" + $(this).data('comment'),
                type: 'post',
                data: {_method: 'delete', _token: token}
            }).done(function( data ) {
                var data = parse.JSON(data);
                if(data.success == true){

                }
            });
        });

        $('.showCompleteComment').click(function () {
            $('#modalDet.modal-body').html($(this).data('content'));
        });

        $('.statusIcon').click(function () {
            var element = $(this);

            element.parent('.statusIconStack').toggleClass('hide');
            element.parent().parent().find('.loadingIcon').each(function () {
                $(this).toggleClass('hide');
            });

            var url = '{{route('commentToggleStatusAdmin', array(':id', ':status'))}}';
            var urlId = url.replace(':id', element.data('id'));
            var urlStatus = urlId.replace(':status', element.data('status'));
            $.getJSON(urlStatus, function (data) {
                if (data.success == true) {
                    var newStatus = (element.data('status') == 1) ? 0 : 1;
                    element.parent().find('.statusIconParent').each(function () {
                        $(this).toggleClass('grey').toggleClass('green');
                    });
                    element.toggleClass('icon-eye-close').toggleClass('icon-ok').data('status', newStatus);
                }
                element.parent('.statusIconStack').toggleClass('hide');
                element.parent().parent().find('.loadingIcon').each(function () {
                    $(this).toggleClass('hide');
                });
            });
        });
    });
</script>
@endpush

@push('css')
<link rel="stylesheet" href="/vendor/blogfolio/panel/css/uniform.css"/>
<link rel="stylesheet" href="/vendor/blogfolio/panel/css/select2.css"/>
<link rel="stylesheet" href="/vendor/blogfolio/panel/css/extra.css"/>
@endpush