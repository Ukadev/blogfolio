<?php

namespace Ukadev\Blogfolio\Controllers\panel;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Session;
use Ukadev\Blogfolio\Controllers\panel\PanelController as Controller;
use anlutro\LaravelSettings\Facade as Settings;
use Ukadev\Blogfolio\Model\PostsComment;


class CommentsController extends Controller
{


    private $mode = 'disqus';

    public function __construct()
    {
        parent::__construct();
        switch (Settings::get('siteComments')) {
            case -1:
                $this->mode = 'disabled';
                break;
            case 1:
                $this->mode = 'internal';
                break;
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (in_array($this->mode, array('disabled', 'disqus'))) {
            return view('blogfolio::panel.comments.' . $this->mode);
        }

        $comments = PostsComment::all();
        return view('blogfolio::panel.comments.index', ['comments' => $comments]);
    }


    public function toggleStatus($id, $status)
    {
        PostsComment::toggleStatus($id, $status);
        echo json_encode(array('success' => true));
        die;
    }


    public function delete($id)
    {
        $success = false;

        if (PostsComment::deleteComment($id)) {
            $success = true;
        }
        return new JsonResponse(array('success' => $success));
    }
}