<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use DOMDocument;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function blogsPage()
    {
        $data = $this->articleService->getDataPaginate(8);
        return view('blogs', compact('data'));
    }
    
    public function detailBlogPage($slug)
    {
        $data = $this->articleService->getDataSlug($slug);
        $popularData = $this->articleService->getPopularData();
        
        return view('detail-blogs', compact('data', 'popularData'));
    }

    public function blogsPageByTag($tag)
    {
        $data = $this->articleService->getDataTags($tag, 8);
        return view('blogs', compact('data'));
    }

    public function blogsPageByKeyword(Request $request)
    {
        $data = $this->articleService->getDataTitle($request->keyword, 8);
        return view('blogs', compact('data'));
    }
}
