
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$settings['siteName']}} - Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('blogfolio::includes.head')
</head>
<body>

<!--Header-part-->
<div id="header">
    <a href="/panel"><h1>Blogfolio Admin Panel</h1></a>
</div>
<!--close-Header-part-->
@include('blogfolio::includes.menu')
<!--main-container-part-->
<div id="content">
    @yield('content')
</div>
<!--end-main-container-part-->
@include('blogfolio::includes.footer')
</body>
</html>