@extends('layouts.app')

{{--@section('title', 'НОВОСТЬ - '.$newsid->title)--}}

@section('content')
    <div class="main">
        <div class="shop_top">
            <div class="container">
                <div class="inner center">
                    <section class="news">
                        <a class="back" href="{{ url()->previous() }}">НАЗАД</a><h1 class="news__title">{{$newsid->title}}</h1>
                        <div class="news__image" style="background-image:url({{ url($newsid->image) }})">
                            <img class="news__size" alt="" src="../img/news-fix.png">
                        </div>
                        <p>ДАТА: {{ Carbon\Carbon::parse($newsid->date)->format('d.m.Y') }} </p>
                        <p>{!! $newsid->text !!}</p>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection



