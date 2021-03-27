<?php

namespace Ukadev\Blogfolio\Controllers\panel;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Ukadev\Blogfolio\Controllers\panel\PanelController as Controller;
use Ukadev\Blogfolio\Model\PostCategory;
use anlutro\LaravelSettings\Facade as Settings;

class CategoriesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = PostCategory::all();
        return view('blogfolio::panel.category.index', ['cats' => $cats]);
    }

    public function add()
    {
        return view('blogfolio::panel.category.add');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);
        } Catch (ValidationException $e) {
            return back();
        }
        $timestaps = date("Y-m-d H:i:s");
        $name = $request->get('name');
        try {
            DB::table('categories')->insert([
                'name' => $name,
                'created_at' => $timestaps

            ]);
        } Catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return redirect()->route('categoriesAdmin');
    }

    public function edit($id)
    {
        $post = DB::table('posts')->where('id', '=', $id)->first();
        return view('blogfolio::panel.post.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        if (empty($id) || is_null($id)) {
            throw new Exception('Invalid Id');
        }
        try {
            $this->validate($request, [
                'title' => 'required|max:100',
                'content' => 'required|max:255',
                'user_id' => 'required|max:255',
            ]);
        } Catch (ValidationException $e) {
            return back();
        }
        $title = $request->get('title');
        $slug = $this->slugify($title);
        $user = $request->get('user_id');
        $content = $request->get('content');

        try {
            DB::table('posts')->where('id', '=', $id)->update([
                'user_id' => $user,
                'title' => $title,
                'slug' => $slug,
                'content' => $content
            ]);
        } Catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return redirect()->route('categoriesAdmin');
    }

    public function delete($id)
    {
        if (empty($id) || is_null($id)) {
            throw new Exception('Invalid Id');
        }
        try {
            Post::find($id)->delete();
        } Catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return back();
    }
}