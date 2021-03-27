@extends('blogfolio::layouts.panel')

@section('content')
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="{{route('panelAdmin')}}" title="Go to Admin Home"><i class="icon-home"></i>
                {{ucfirst(trans('blogfolio::panel.home'))}}</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title bg_ly rotate_right_div" data-toggle="collapse" href="#collapseG2"><span class="icon"><i
                                    class="icon-chevron-down rotate_right"></i></span>
                        <h5>{{ucfirst(trans_choice('blogfolio::panel.last', 2))}} {{ucfirst(trans_choice('blogfolio::panel.post', 2))}}</h5>
                    </div>
                    <div class="widget-content nopadding collapse in" id="collapseG2">
                        <ul class="recent-posts">
                            @foreach($posts as $post)
                                <li>
                                    <div class="user-thumb"><img width="40" height="40" alt="User"
                                                                 src="{{\Creativeorange\Gravatar\Facades\Gravatar::get(Auth::user()->email)}}">
                                    </div>
                                    <div class="article-post"><span class="user-info"> {{ucfirst(trans('blogfolio::panel.date'))}}
                                            : {{date('d/m/Y', strtotime($post->created_at))}}
                                            / {{ucfirst(trans('blogfolio::panel.time'))}}
                                            : {{date('h:i A', strtotime($post->created_at))}} </span>
                                        <p><a href="{{url('/blog/'.$post->slug)}}" target="_blank">{{$post->title}}</a>
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title bg_lo" data-toggle="collapse" href="#collapseG3"><span class="icon"> <i
                                    class="icon-chevron-down"></i> </span>
                        <h5>{{ucfirst(trans('blogfolio::panel.news_blogfolio'))}}</h5>
                    </div>
                    <div class="widget-content nopadding updates collapse in" id="collapseG3">
                        @foreach($news as $singleNews)
                            <div class="new-update clearfix"><i class="{{$singleNews->icon}}"></i> <span
                                        class="update-notice"> <span>{{strip_tags($singleNews->content)}}</span> </span>
                                <span class="update-date"><span
                                            class="update-day">{{$singleNews->day}}</span>{{strip_tags($singleNews->month)}}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop