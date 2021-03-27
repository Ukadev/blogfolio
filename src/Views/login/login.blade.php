<!DOCTYPE html>
<html lang="en">

<head>
    <title>Matrix Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel='stylesheet' type='text/css' href="{{url('/vendor/blogfolio/panel/css/bootstrap.min.css')}}" />
    <link rel='stylesheet' type='text/css' href="{{url('/vendor/blogfolio/panel/css/bootstrap-responsive.min.css')}}" />
    <link rel='stylesheet' type='text/css' href="{{url('/vendor/blogfolio/panel/css/matrix-login.css')}}" />
    <link rel='stylesheet' type='text/css' href="{{url('/vendor/blogfolio/panel/font-awesome/css/font-awesome.css')}}" />
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>
<div id="loginbox">
    <form id="loginform" method="post" class="form-vertical" action="{{url('/login')}}">
        {{ csrf_field() }}
        <div class="control-group normal_text"><h3>{{ucwords(trans('blogfolio::panel.admin_panel'))}}</h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="email" placeholder="{{ucfirst(trans('blogfolio::panel.email'))}}" required autofocus />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="{{ucfirst(trans('blogfolio::panel.password'))}}" required />
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">{{ucfirst(trans('blogfolio::panel.lost_password_question'))}}</a></span>
            <span class="pull-right"><input type="submit" value="{{ucfirst(trans('blogfolio::panel.login'))}}" class="btn btn-success" /></span>
        </div>
    </form>
    <form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">{{ucfirst(trans('blogfolio::panel.recovery_form_explain'))}}</p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="{{ucfirst(trans('blogfolio::panel.email'))}}" />
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; {{ucfirst(trans('blogfolio::panel.back_to_login'))}}</a></span>
            <span class="pull-right"><input type="button" class="btn btn-info" value="{{ucfirst(trans('blogfolio::panel.recovery'))}}" /></span>
        </div>
    </form>
</div>

<script src="{{url('/vendor/blogfolio/panel/js/jquery.min.js')}}"></script>
<script src="{{url('/vendor/blogfolio/panel/js/matrix.login.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>

</html>
