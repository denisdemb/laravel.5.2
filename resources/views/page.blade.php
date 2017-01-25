@extends('layouts.app')

@section('title', $title)

@section('description', $description)

@section('keywords', $keywords)


@section('content')
    <div class="main">
        <div class="shop_top">
            <div class="container">
            {!! $text !!}
            </div>
        </div>
    </div>
@endsection
