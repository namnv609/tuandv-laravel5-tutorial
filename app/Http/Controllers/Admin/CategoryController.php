<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    private $categoryModel;

    public function __construct(Category $categoryModel) {
        parent::__construct();
        
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {   
        $categories = $this->categoryModel->take(20)
            ->orderBy('updated_at', 'desc')
            ->get();
        
        return view('admin/category/index', [
            'categories' => $categories
        ]);
    }
    
    public function getCreate()
    {
        return view('admin/category/add');
    }

    public function postCreate(Request $request)
    {
        $categoryName = $request->except(['_token']);
        
        $this->categoryModel->create($categoryName);
        
        return redirect(url('admin/categories'))->with([
            'alertType' => 'success',
            'alertMessage' => trans('admins.create.add_new_category_success'),
        ]);
    }
    
    public function getEdit($categoryId)
    {
        $category = $this->categoryModel->where('id',$categoryId)->firstOrFail();
        
        return view('admin/category/edit', [
            'category' => $category,
        ]);
    }

    public function postEdit($categoryId, Request $request)
    {   
        if ($request->has('delete')) {
            $this->categoryModel->destroy($categoryId);
        } else {
            $categoryName = $request->only(['name']);
            
            $this->categoryModel->where('id', $categoryId)->update($categoryName);
        }
        
        return redirect(url('admin/categories'))->with([
            'alertType' => 'success',
            'alertMessage' => trans('admins.create.add_new_category_success'),
        ]);
    }

}
