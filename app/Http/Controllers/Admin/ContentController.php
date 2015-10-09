<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Category;

class ContentController extends Controller {

    private $contentModel;
    private $categoryModel;

    public function __construct(Content $contentMode, Category $categoryModel) {
        parent::__construct();

        $this->contentModel = $contentMode;
        $this->categoryModel = $categoryModel;
    }

    public function index() {
        $contents = $this->contentModel ->take(20)
                                        ->orderBy('updated_at', 'desc')
                                        ->get();

        return view('admin/content/index', [
            'contents' => $contents
        ]);
    }

    public function getCreate() {
        $categoriesSelect = $this->categoryModel->orderBy('updated_at', 'desc')
                                                ->lists('name', 'id');
        
        return view('admin/content/add', [
            'categoriesSelect' => $categoriesSelect
        ]);
    }

    public function postCreate(Request $request) {
        $content = $request->except(['_token']);

        $this->validate($request, [
            'title' => 'required|max:100',
            'content' => 'required|max:255',
            'category_id' => 'required|max:255',
        ]);

        $this->contentModel->create($content);

        return redirect(url('admin/contents'))->with([
            'alertType' => 'success',
            'alertMessage' => trans('admins.content.create.add_new_content_success'),
        ]);
    }

    public function getEdit($categoryId) {
        $content = $this->contentModel->where('id', $categoryId)->firstOrFail();
        $categoriesSelect = $this->categoryModel->orderBy('updated_at', 'desc')
                                                ->lists('name', 'id');
        
        return view('admin/content/edit', [
            'content' => $content,
            'categoriesSelect' => $categoriesSelect,
        ]);
    }

    public function postEdit($contentId, Request $request) {
        if ($request->has('delete')) {
            $this->contentModel->destroy($contentId);
        } else {
            $content = $request->only(['title', 'content', 'category_id', 'descreption']);

            $this->validate($request, [
                'title' => 'required|max:100',
                'content' => 'required|max:255',
                'category_id' => 'required',
            ]);

            $this->contentModel->where('id', $contentId)->update($content);
        }

        return redirect(url('admin/contents'))->with([
            'alertType' => 'success',
            'alertMessage' => $request->has('delete') ? trans('admins.content.edit.delete_success') : 
                                                        trans('admins.content.create.edit_content_success'),
        ]);
    }

}
