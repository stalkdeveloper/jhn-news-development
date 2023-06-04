<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers;
use App\Validators\Admin\CategoryValidator;
use Illuminate\Http\Request;
use App\Services\Admin\CategoryService;


class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->CategoryService=$categoryService;
    }

    public function allCategory(Request $request){
        try {
            $getCategory = $this->CategoryService->categoryAll($request);
            $date = $this->CategoryService->addCategorDate();
            return view('admin.allFile.category.all-category')->with(compact('getCategory', 'date'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function addCategory(){
        try {
            $date = $this->CategoryService->addCategorDate();
            return view('admin.AllFile.Category.category-add')->with(compact('date'));
        } catch (\Exception $e) {
            // \Log::error($e->getMessage()." ".$e->getFile()." ".$e->getLine());      
        }
    }

    public function storeCategory(Request $request, CategoryValidator $category){
        try {
            $input = $request->all();

            if (!$category->with($input)->passes()) {
                return response()->json(['status'=>false, 'error'=>$category->getErrors()[0]]);
            }
            $store = $this->CategoryService->categoryStore($input);

            if($store){
                return response()->json(['status'=>true, 'message'=>'Successfully, Added Category..!!']);
            }
                return response()->json(['status'=>false, 'error'=>'Sorry, Unable to add category..!!']);
        } catch (\Exception $e) {
            \Log::error($e->getMessage()." ".$e->getFile()." ".$e->getLine());      
        }
    }

    public function viewCategory($id){
        try {
            $data = $this->CategoryService->categoryView($id);
            $date = $this->CategoryService->addCategorDate();

            return view('admin.AllFile.Category.edit-category')->with(compact('data', 'date'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function updateCategory(Request $request, CategoryValidator $category){
        try {
            $input = $request->all();

            if (!$category->with($input)->passes()) {
                return response()->json(['status'=>false, 'error'=>$category->getErrors()[0]]);
            }

            $update = $this->CategoryService->categoryUpdate($input);

            if($update){
                return response()->json(['status'=>true, 'message'=>'Successfully, Updated Category..!!']);
            }
                return response()->json(['status'=>false, 'error'=>'Sorry, Unable to Update category..!!']);
        } catch (\Exception $e) {
            \Log::error($e->getMessage()." ".$e->getFile()." ".$e->getLine());
        }
    }

    public function deleteCategory(Request $request){
        try {
            $input = $request->all();
            $delete = $this->CategoryService->categoryDelete($input);

            if($delete){
                return response()->json(['status'=>true, 'message'=>'Successfully, Deleted Category..!!']);
            }
                return response()->json(['status'=>false, 'error'=>'Sorry, Unable to Delete category..!!']);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function statusCategory(Request $request){
        try {
            $input = $request->all();
            $update = $this->CategoryService->categoryStatus($input);

            if($update){
                return response()->json(['status'=>true, 'message'=>'Successfully, Category Status Updated..!!']);
            }
                return response()->json(['status'=>false, 'error'=>'Sorry, Unable to update category status..!!']);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
