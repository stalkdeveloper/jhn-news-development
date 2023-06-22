<?php

namespace App\Services\Admin;

use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\News;
use Carbon\Carbon;
use Auth;

class NewsService extends Service
{
   public function newsAll($request){
    try {
        $data = News::latest('id')->get();
        return $data;
    } catch (\Throwable $th) {
        //throw $th;
    }
   }

   public function newsStore($request){
    try {
        
    } catch (\Throwable $th) {
        //throw $th;
    }
   }

   public function newsEdit($id){
    try {
        
    } catch (\Throwable $th) {
        //throw $th;
    }
   }

   public function newsUpdate($request){
    try {
        
    } catch (\Throwable $th) {
        //throw $th;
    }
   }
}
