<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\Admin\NewsService;

class NewsController extends Controller
{

    protected $newsService;

    public function __construct(NewsService $newsService) {
        $this->NewsService=$newsService;
    }

    public function allNews(Request $request){
        try {
            $getNews = $this->NewsService->newsAll($request);
            return view('admin.allFile.news.all-news')->with(compact('getNews'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function addNews(Request $request){
        try {
            return view('admin.allFile.news.create-news');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function storeNews(Request $request){
        try {
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function editNews(Request $request){
        try {
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function updateNews(Request $request){
        try {
            
        } catch (\Throwable $th) {

        }
    }

    public function deleteNews(Request $request){
        try {
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function statusNews(Request $request){
        try {
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
