<?php

namespace Ukadev\Blogfolio\Controllers\panel;

use Illuminate\Http\Request;
use Session;
use Ukadev\Blogfolio\Controllers\panel\PanelController as Controller;
use anlutro\LaravelSettings\Facade as Settings;


class SettingsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->breadcrumbs = [
            'route' => 'settingsAdmin',
            'title' => ucfirst(trans('blogfolio::panel.settings')),
            'class' => 'current'
        ];
        return view('blogfolio::panel.settings.index', ['settings' => Settings::all(), 'breadcrumbs' => [$this->breadcrumbs]]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $settings = $request->all();
        unset($settings['_method'], $settings['_token']);
        if (!isset($settings['disqusURL'])){
            $settings['disqusURL'] = '';
        }
        foreach ($settings as $key => $value){
            Settings::set($key, $value);
        }
        Settings::save();

        Session::put('locale', $settings['siteLanguage']);
        return redirect(route('settingsAdmin'));
    }
}