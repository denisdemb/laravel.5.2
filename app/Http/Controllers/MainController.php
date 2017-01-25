<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\TopSlider;
use App\Model\Pages;
use App\Post;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Parser\Tokenizer\TokenizerPatterns;

class MainController extends Controller
{
    public function index()
    {
        $pages = Pages::where('url', 'main')->first();

        //слайдер
        $sliders = TopSlider::all();

        return view('main', [
            'published' => $pages->published,
            'title' => $pages->title,
            'description' => $pages->description,
            'keywords' => $pages->keywords,
            'h1' => $pages->h1,
            'text' => $pages->text,
            'sliders'  => $sliders,
        ]);
    }
}
