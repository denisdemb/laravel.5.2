@extends('layouts.app')

{{--@section('title', $title)--}}

{{--@section('description', $description)--}}

{{--@section('keywords', $keywords)--}}

@section('content')
<div class="main">
    <div class="shop_top">
        <div class="container">
            {{--<div class="row shop_box-top">--}}
            @foreach($items as $item)
                @if($item->published)
                    <div class="col-md-3 shop_box">
                        <a href="/shop/{{ $item->url }}/{{ $item->id }}">
                            <div class="shop_desc">
                            @if(!empty($item->path))
                                <img src="../{{ preg_replace('/\,.*/','',$item->path) }}" class="img-responsive" alt=""/>
                            @else
                                <img src="../images/nophoto.jpg" class="img-responsive" alt=""/>
                            @endif
                            @if($item->new)
                                <span class="new-box">
                                    <span class="new-label">New</span>
                                </span>
                            @endif
                            @if($item->sale)
                                <span class="sale-box">
                                    <span class="sale-label">Sale!</span>
                                </span>
                            @endif
                                <h3><a href="#">{{ $item->title }}</a></h3>
                                <p>{!! \Illuminate\Support\Str::words($item->description, 8,'....') !!}</p>
                                <span class="actual">{{ $item->price }}</span>
                            @if($item->sale)
                                <span class="reducedfrom">{{ $item->pricesale }}</span><br>
                            @endif
                                <ul class="buttons">
                                    <li class="cart"><a href="#">В корзину</a></li>
                                    <li class="shop_btn"><a href="#">Подробнее..</a></li>
                                    <div class="clear"></div>
                                </ul>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
            {{--</div>--}}
        </div>
    </div>
</div>
@endsection