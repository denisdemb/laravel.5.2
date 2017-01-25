@extends('layouts.app')

{{--@section('title', $title)--}}

{{--@section('description', $description)--}}

{{--@section('keywords', $keywords)--}}

@section('content')
    <div class="main">
        <div class="shop_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 single_left">
                        <div class="single_image">
                            <ul id="etalage">
                                @foreach($catitems as $catitem)
                                <li>
                                    <img class="etalage_thumb_image" src="/{{ $catitem->image }}" />
                                    <img class="etalage_source_image" src="/{{ $catitem->image }}" />
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- end product_slider -->
                        <div class="single_right">
                            <h3>{{ $item->title }}</h3>
                            <p class="m_10">{!! $item->description !!}</p>
                            <ul class="options">
                                <h4 class="m_12">Select a Size(cm)</h4>
                                <li><a href="#">151</a></li>
                                <li><a href="#">148</a></li>
                                <li><a href="#">156</a></li>
                                <li><a href="#">145</a></li>
                                <li><a href="#">162(w)</a></li>
                                <li><a href="#">163</a></li>
                            </ul>
                            <ul class="product-colors">
                                <h3>available Colors</h3>
                                <li><a class="color1" href="#"><span> </span></a></li>
                                <li><a class="color2" href="#"><span> </span></a></li>
                                <li><a class="color3" href="#"><span> </span></a></li>
                                <li><a class="color4" href="#"><span> </span></a></li>
                                <li><a class="color5" href="#"><span> </span></a></li>
                                <li><a class="color6" href="#"><span> </span></a></li>
                                <div class="clear"> </div>
                            </ul>
                            <div class="btn_form">
                                <form>
                                    <input type="submit" value="КУПИТЬ" title="">
                                </form>
                            </div>
                            <ul class="add-to-links">
                                <li><img src="/images/wish.png" alt=""><a href="#">Добавить в избранное</a></li>
                            </ul>
                            <div class="social_buttons">
                                <h4>95 Items</h4>
                                <button type="button" class="btn1 btn1-default1 btn1-twitter" onclick="">
                                    <i class="icon-twitter"></i> Tweet
                                </button>
                                <button type="button" class="btn1 btn1-default1 btn1-facebook" onclick="">
                                    <i class="icon-facebook"></i> Share
                                </button>
                                <button type="button" class="btn1 btn1-default1 btn1-google" onclick="">
                                    <i class="icon-google"></i> Google+
                                </button>
                                <button type="button" class="btn1 btn1-default1 btn1-pinterest" onclick="">
                                    <i class="icon-pinterest"></i> Pinterest
                                </button>
                            </div>
                        </div>
                        <div class="clear"> </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-info-product">
                            <p class="price2">{{ $item->price }}</p>
                            <ul class="prosuct-qty">
                                <span>Количество:</span>
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                </select>
                            </ul>
                            <button type="submit" name="Submit" class="exclusive">
                                <span>В корзину</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="desc">
                    <h4>Описание</h4>
                    <p>{!! $item->description !!}</p>
                </div>
                <div class="row">
                    <h4 class="m_11">Похожие товары в категории: {{ $categoriy }}</h4>
                    @foreach($catitems as $catitem)
                        <div class="col-md-4 product1">
                            <img src="/{{ $catitem->image }}" class="img-responsive" alt=""/>
                            <div class="shop_desc">
                                {{--<a href="/shop/{{ $catitem->url }}/{{$catitem->id}}">--}}
                                    <h3><a href="/shop/{{ $catitem->url }}/{{$catitem->id}}">{{ $catitem->title }}</a></h3>
                                    <p>{{ $catitem->description }} </p>
                                    <span class="reducedfrom">{{ $catitem->pricesale}}</span>
                                    <span class="actual">{{ $catitem->price}}</span><br>
                                    <ul class="buttons">
                                        <li class="cart"><a href="/shop/basket">В корзину</a></li>
                                        <li class="shop_btn"><a href="/shop/{{ $catitem->url }}/{{$catitem->id}}">Подробнее..</a></li>
                                        <div class="clear"> </div>
                                    </ul>
                                {{--</a>--}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection