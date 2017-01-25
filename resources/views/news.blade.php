@extends('layouts.app')

{{--@section('title', $title)--}}

{{--@section('description', $description)--}}

{{--@section('keywords', $keywords)--}}

@section('content')
    {{--<div class="main">--}}
        <div class="shop_top">
            {{--<div class="container">--}}
                <section class="news">
                    <h1 class="news__title">Новости</h1>
                    <div class="news__list clearfix">
                        @if(!empty($news))
                            @foreach($news as $new)
                                @if($new->published)
                                    <article class="news__item-wrapper">
                                        <a class="news__item" href="/news/{{ $new->id }}">
                                            <div class="news__image" style="background-image:url({{$new->image}})">
                                                <img class="news__size" alt="" src="img/news-fix.png">
                                            </div>
                                            <div class="news__content-wrapper">
                                                <div class="news__content">
                                                    <div class="news__fix-1">
                                                        <div class="news__fix-2">
                                                            <div class="news__top clearfix">
                                                                <h2 class="news__name">{{$new->title}}</h2>
                                                                <div class="news__logo">
                                                                    <img alt="" src="{{$new->logo}}">
                                                                </div>
                                                            </div>
                                                            <div class="news__bottom">
                                                                <p class="news__text">{!! \Illuminate\Support\Str::words($new->text, 10,'....') !!}</p>
                                                                <p class="news__date">{{ Carbon\Carbon::parse($new->date)->format('d.m.Y') }} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </article>
                                @endif
                            @endforeach
                        @endif
                    </div>

                    @include('_partials.paginate', ['paginate' => $news])
                </section>


            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection