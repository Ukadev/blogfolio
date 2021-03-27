<?php

namespace Ukadev\Blogfolio\Controllers\panel;


use anlutro\LaravelSettings\Facade as Settings;
use App;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Session;
use View;


class PanelController extends Controller
{

    var $breadcrumbs = ['route' => '','title' => ''];
    private $newsUrl = 'https://api.github.com/repos/ukadev/blogfolio/commits';

    function __construct()
    {
        $this->middleware('auth');
        // Sharing is caring
        view()->share('settings', Settings::all());
    }

    /**
     * Show the application dashboard.
     *
     * @return view
     */
    public function indexPanel()
    {
        $news = $this->getNewsContent();
        $posts = DB::table('posts')->latest('id')->take(5)->get();
        return view('blogfolio::panel.index', ['posts' => $posts, 'news' => $news]);
    }

    public function slugify($text)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    private function enabledComments()
    {
        return (Settings::get('siteComments') != -1) ? true : false;
    }

    private function disqusComments()
    {
        return (Settings::get('siteComments') == 2) ? true : false;
    }

    private function checkLang()
    {
        if (App::isLocale(Settings::get('siteLanguage'))) {
            App::setLocale(Settings::get('siteLanguage'));
        }
        return;
    }

    public function getNewsContent()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->newsUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        $data = curl_exec($curl);
        curl_close($curl);
        return $this->parseNews(json_decode($data));
    }

    public function parseNews($news)
    {
        $finalNews = [];

        foreach ($news as $key => $singleNews) {
            if (gettype($singleNews) !== 'string'){
                $date = $singleNews->commit->committer->date;
                $tmpNews[$key]['icon'] = '';
                $tmpNews[$key]['content'] = $singleNews->commit->message;
                $tmpNews[$key]['month'] = date('m', strtotime($date));
                $tmpNews[$key]['day'] = date('d', strtotime($date));
                $finalNews[$key] = (object)$tmpNews[$key];
            }
        }
        return $finalNews;
    }
}
