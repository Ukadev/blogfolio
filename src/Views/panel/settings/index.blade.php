@extends('blogfolio::layouts.panel')

@section('content')
    <!--Action boxes-->
    <div id="content-header">
        @include('blogfolio::includes.breadcrumb', $breadcrumbs)
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>{{trans('blogfolio::settings.general_settings')}}</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="POST" action="{{route('settingsSetAdmin')}}" name="settingsForm" id="settingsForm"
                              accept-charset="UTF-8" class="form-horizontal">
                            <input name="_method" type="hidden" value="PUT">
                            {{csrf_field()}}
                            <div class="control-group">
                                <label class="control-label">{{trans('blogfolio::settings.site_name')}}:</label>
                                <div class="controls">
                                    <input type="text" class="span8"
                                           placeholder="{{trans('blogfolio::settings.site_name')}}" name="siteName"
                                           id="siteName" value="{{$settings['siteName']}}"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">{{trans('blogfolio::settings.site_title')}}:</label>
                                <div class="controls">
                                    <input type="text" class="span8"
                                           placeholder="{{trans('blogfolio::settings.site_title')}}" name="siteTitle"
                                           id="siteTitle" value="{{$settings['siteTitle']}}"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">{{trans('blogfolio::settings.site_default_lang')}}:</label>
                                <div class="controls">
                                    <select name="siteLanguage" class="span8" id="siteLanguage">
                                        <option value="en"{{$settings['siteLanguage'] == 'en' ? ' selected' : ''}}>
                                            English
                                        </option>
                                        <option value="es"{{$settings['siteLanguage'] == 'es' ? ' selected' : ''}}>
                                            Español
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">{{trans('blogfolio::settings.site_description')}}:</label>
                                <div class="controls">
                                    <textarea class="span8" rows="6" name="siteDescription" id="siteDescription"
                                              placeholder="{{trans('blogfolio::settings.enter_description_here')}}">{{$settings['siteDescription']}}</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">{{trans('blogfolio::settings.site_posts_comments')}}
                                    :</label>
                                <div class="controls">
                                    <label>
                                        <div class="radio" id="commentsRadio1"><span><input type="radio"
                                                                                            name="siteComments"
                                                                                            style="opacity: 0;"
                                                                                            value="-1"{{$settings['siteComments'] == -1 ? ' checked' : ''}}></span>
                                        </div>
                                        {{ucfirst(trans('blogfolio::panel.disable'))}}
                                    </label>
                                    <label>
                                        <div class="radio" id="commentsRadio2"><span><input type="radio"
                                                                                            name="siteComments"
                                                                                            style="opacity: 0;"
                                                                                            value="1"{{$settings['siteComments'] == 1 ? ' checked' : ''}}></span>
                                        </div>
                                        {{ucfirst(trans('blogfolio::panel.enable'))}}
                                        ( {{ucwords(trans('blogfolio::panel.internal_system'))}} )
                                    </label>
                                    <label>
                                        <div class="radio" id="commentsRadio3"><span><input type="radio"
                                                                                            name="siteComments"
                                                                                            style="opacity: 0;"
                                                                                            value="2"{{$settings['siteComments'] == 2 ? ' checked' : ''}}></span>
                                        </div>
                                        {{ucfirst(trans('blogfolio::panel.enable'))}} ( Disqus )
                                    </label>
                                </div>
                            </div>
                            <div class="control-group{{$settings['siteComments'] != 2 ? ' hide' : ''}}"
                                 id="disqusConfig">
                                <label class="control-label">{{ucwords(trans('blogfolio::panel.disqus_config'))}}
                                    :</label>
                                <div class="controls">
                                    <input type="text" class="span8"
                                           placeholder="{{ucfirst(trans('blogfolio::panel.disqus_config_explain'))}}"
                                           name="disqusURL"
                                           id="disqusURL" value="{{$settings['disqusURL']}}" required/>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit"
                                        class="btn btn-success">{{ucfirst(trans('blogfolio::panel.save'))}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
<script src="/vendor/blogfolio/panel/js/select2.min.js"></script>
<script src="/vendor/blogfolio/panel/js/jquery.uniform.js"></script>
<script src="/vendor/blogfolio/panel/js/jquery.validate.js"></script>
<script src="/vendor/blogfolio/panel/js/settings.form_validation.js"></script>
<script>
    $("input[name=siteComments]").on("change", function (e) {
        var div = $('#disqusConfig');
        if ($(this).val() == 2) {
            div.slideDown();
            $('#disqusURL').prop("required", true);
        } else {
            if (div.is(':visible')) {
                div.slideUp(function () {
                    $('#disqusURL').val('').prop("required", false);
                });
            }
        }
    });
</script>
@endpush

@push('css')
<link rel="stylesheet" href="/vendor/blogfolio/panel/css/uniform.css"/>
<link rel="stylesheet" href="/vendor/blogfolio/panel/css/select2.css"/>
@endpush