<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests;
use App\Model\Pages;
use App\Model\News;


class PageController extends Controller
{
    public function index($url){

        $pages = Pages::where('url', $url)->first();

        if(empty($pages)){
            return response('такой страницы нет', 401);
        }

        if($pages->url == 'contacts')
            $pagesView = 'contacts';
        elseif($pages->url == 'gallery')
            $pagesView = 'gallery';
        elseif($pages->url == 'team')
            $pagesView = 'team';
        else
            $pagesView = 'page';

        return view($pagesView,[
                            'title'      => $pages->title,
                            'text'       => $pages->text,
                            'h1'         => $pages->h1,
                            'description'=> $pages->description,
                            'keywords'   => $pages->keywords,
                            'published'  => $pages->published,
        ]);
        
    }

    public function newsAll(News $news){

    // вызов к модели с пагинацией
        $this->data['records'] = $news->getActive();

    //  $news = App\Model\News::all()->sortByDesc('date');
        return view('news',['news'=>$this->data['records']]);
    }

    public function getNews($id){

        $newsId = News::find($id);

        return view('newsid',['newsid'=>$newsId]);
    }
    


}
