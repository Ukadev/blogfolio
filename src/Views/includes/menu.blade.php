<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">{{ucfirst(trans('blogfolio::panel.welcome_name', ['Name' => Auth::user()->name]))}}</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{route('profileAdmin')}}"><i class="icon-user"></i> {{ucfirst(trans('blogfolio::panel.my_profile'))}}</a></li>
            </ul>
        </li>
        <li class=""><a title="" href="{{route('settingsAdmin')}}"><i class="icon icon-cog"></i> <span class="text">{{ucfirst(trans('blogfolio::panel.settings'))}}</span></a></li>
        <li class=""><a title="" href="/logout"><i class="icon icon-share-alt"></i> <span class="text">{{ucfirst(trans('blogfolio::panel.logout'))}}</span></a></li>
    </ul>
</div>
<!--close-top-Header-menu-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> {{ucfirst(trans('blogfolio::panel.dashboard'))}}</a>
    <ul>
        <li class="{{active('panelAdmin')}}"><a href="{{route('panelAdmin')}}"><i class="icon icon-home"></i> <span>{{ucfirst(trans('blogfolio::panel.dashboard'))}}</span></a> </li>
        <li class="{{active('settingsAdmin')}}"><a href="{{route('settingsAdmin')}}"><i class="icon icon-cog"></i> <span>{{ucfirst(trans('blogfolio::panel.settings'))}}</span></a> </li>
        <li class="submenu {{active(['blogAdmin', 'postsAddAdmin', 'postsEditAdmin', 'postsCategoriesAdmin', 'postsCategoriesAddAdmin', 'postsCategoriesEditAdmin', 'commentsAdmin', 'commentShowAdmin'], 'active open')}}"> <a href="{{route('blogAdmin')}}"><i class="icon icon-list-alt"></i> <span>{{ucfirst(trans('blogfolio::panel.blog'))}}</span></a>
            <ul>
                <li class="{{active(['blogAdmin', 'postsAddAdmin', 'postsEditAdmin'])}}"><a href="{{route('blogAdmin')}}">{{ucfirst(trans_choice('blogfolio::panel.post', 2))}}</a></li>
                <li class="{{active(['postsCategoriesAdmin', 'postsCategoriesAddAdmin', 'postsCategoriesEditAdmin'])}}"><a href="{{route('postsCategoriesAdmin')}}">{{ucfirst(trans_choice('blogfolio::panel.category', 2))}}</a></li>
                <li class="{{active(['commentsAdmin', 'commentsShowAdmin'])}}"><a href="{{route('commentsAdmin')}}">{{ucfirst(trans_choice('blogfolio::panel.comment', 2))}}</a></li>
            </ul>
        </li>
        <li class="submenu {{active(['projectsAdmin', 'projectsAddAdmin', 'projectsEditAdmin', 'projectsCategoriesAdmin', 'projectsCategoriesAddAdmin', 'projectsCategoriesEditAdmin'], 'active open')}}"> <a href="{{route('projectsAdmin')}}"><i class="icon icon-list-alt"></i> <span>{{ucfirst(trans('blogfolio::panel.projects'))}}</span></a>
            <ul>
                <li class="{{active(['projectsAdmin', 'projectsAddAdmin', 'projectsEditAdmin'])}}"><a href="{{route('projectsAdmin')}}">{{ucfirst(trans_choice('blogfolio::panel.projects', 2))}}</a></li>
                <li class="{{active(['projectsCategoriesAdmin', 'projectsCategoryAddAdmin', 'projectsCategoryEditAdmin'])}}"><a href="{{route('projectsCategoriesAdmin')}}">{{ucfirst(trans_choice('blogfolio::panel.category', 2))}}</a></li></ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->