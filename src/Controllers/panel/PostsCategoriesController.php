<?php

namespace Ukadev\Blogfolio\Controllers\panel;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Ukadev\Blogfolio\Controllers\panel\PanelController as Controller;
use Ukadev\Blogfolio\Model\PostsCategory;

class PostsCategoriesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blogfolio::panel.postCategory.index', ['categories' => PostsCategory::all()]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('blogfolio::panel.postCategory.add');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
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
            DB::table('posts_categories')->insert([
                'name' => $name,
                'created_at' => $timestaps

            ]);
        } Catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return redirect()->route('postsCategoriesAdmin');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $postCategory = PostsCategory::where('id', '=', $id)->first();
        return view('blogfolio::panel.postCategory.edit', ['postCategory' => $postCategory]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function update(Request $request, $id)
    {
        if (empty($id) || is_null($id)) {
            throw new Exception('Invalid Id');
        }
        try {
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);
        } Catch (ValidationException $e) {
            return back();
        }
        $name = $request->get('name');

        try {
            DB::table('posts_categories')->where('id', '=', $id)->update([
                'name' => $name
            ]);
        } Catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return redirect()->route('postsCategoriesAdmin');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function delete($id)
    {
        if (empty($id) || is_null($id)) {
            throw new Exception('Invalid Id');
        }
        try {
            PostsCategory::find($id)->delete();
        } Catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return back();
    }
}