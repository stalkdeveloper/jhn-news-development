<?php

namespace App\Services\Admin;

use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;
use Carbon\Carbon;
use Auth;

class CategoryService extends Service
{
   public function categoryAll($request){
    try {
        $data = Category::with('user')->where('is_delete', '0')->latest('id')->get();
        return $data;
    } catch (\Throwable $th) {
        //throw $th;
    }
   }

   public function addCategorDate(){
    try {
        $todayDate = Carbon::today();
        $date = date('d M Y', strtotime($todayDate));
        return $date;
    } catch (\Exception $e) {
        //\Log::error($e->getMessage()." ".$e->getFile()." ".$e->getLine());      
    }
   }

   public function categoryStore($request){
    try {
        $data = new Category;
        $data->user_id = Auth::user()->id;
        $data->title = $request['category_name'];
        $data->description = $request['description'];
        $data->is_active = '0';
        $data->save();
        
        if($data){
            return true;
        }
        return false;
    } catch (\Exception $e) {
        \Log::error($e->getMessage()." ".$e->getFile()." ".$e->getLine());      
    }
   }

   public function categoryView($id){
    try {
        $data = Category::where('id', $id)->first();
        return $data;
    } catch (\Throwable $th) {
        //throw $th;
    }
   }

   public function categoryUpdate($request){
    try {
        $data = [
            'user_id'        => Auth::user()->id,
            'title'             => $request['category_name'],
            'description' => $request['description'],
        ];     

        $update = Category::where('id', $request['category_id'])->update($data);

        if($update){
            return true;
        }
        return false;
    } catch (\Throwable $th) {
        //throw $th;
    }
   }

   public function categoryDelete($request){
    try {
        $data = [
            'is_active'  => '0',
            'is_delete'  => '1',
        ];
        $delete = Category::where('id', $request['id'])->update($data);
        if($delete){
            return true;
        }
        return false;
    } catch (\Throwable $th) {
        //throw $th;
    }
   }

   public function categoryStatus($request){
    try {
        $update = Category::where('id', $request['id'])->update(['is_active' => $request['status']]);
        if($update){
            return true;
        }
        return false;
    } catch (\Throwable $th) {
        //throw $th;
    }
   }
}
