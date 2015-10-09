<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Category;

class HomepageController extends Controller {

    private $contentModel;
    private $categoryModel;

    public function __construct(Content $contentMode, Category $categoryModel) {
        parent::__construct();

        $this->contentModel = $contentMode;
        $this->categoryModel = $categoryModel;
    }

    public function index() {
        $contents = $this->contentModel->take(20)
                                       ->orderBy('updated_at', 'desc')
                                       ->get();
        $categories = $this->categoryModel->take(20)
                                          ->orderBy('updated_at', 'desc')
                                          ->get();

        return view('user/homepage/index', [
            'contents' => $contents,
            'categories' => $categories
        ]);
    }
    
    public function getContent($categoryId) {
        $contents = $this->contentModel->where(['category_id'=>$categoryId])
                                       ->take(20)
                                       ->orderBy('updated_at', 'desc')
                                       ->get();
        $categories = $this->categoryModel->take(20)
                                          ->orderBy('updated_at', 'desc')
                                          ->get();

        return view('user/homepage/index', [
            'contents' => $contents,
            'categories' => $categories
        ]);
    }
    
    public function getDetail($contentId) {
        $content = $this->contentModel->where('id', $contentId)->firstOrFail();
        $categories = $this->categoryModel->take(20)
                                          ->orderBy('updated_at', 'desc')
                                          ->get();

        return view('user/detail/detail', [
            'content' => $content,
            'categories' => $categories
        ]);
    }
    
}
