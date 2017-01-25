<?php

namespace App\Http\Controllers;

use App\Model\ShopCategories;
use App\Model\ShopGoods;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Items;
use App\Parameters_values;

class ItemsController extends Controller
{

//  вывод товаров магазина
    public function index()
    {
        $items = new ShopGoods;
        $catsItems = $items->catsItems();

        return view('/shop', [
            'items' => $catsItems,
        ]);
    }

// вывод товаров по категории
    public function getCategory($category)
    {
        $categories = new ShopCategories;
        $categoriy = $categories->where('url', $category)->first();

        $items = new ShopGoods;
        $catItems = $items->catId($categoriy->id);

        return view('/shop', [
            'items' => $catItems,
        ]);

    }

// вывод товара по его id
    public function getId($category, $id)
    {
        $categories = new ShopCategories;
        $categoriy = $categories->where('url', $category)->first();

        $itemsCat = new ShopGoods;
        $catItems = $itemsCat->catId($categoriy->id);
        $items = $itemsCat->itemId($id);

//        dd($items,$catItems);


        return view('/shopitem', [
            'items'     => $items,
            'catitems'  => $catItems,
            'categoriy' => $categoriy->title

        ]);

    }
    
    
    
    
    
    
    
    
    
    
    
    public function add()
    {
        return view('add');
    }

    public function save(Request $request)
    {
        $root = $_SERVER['DOCUMENT_ROOT']."/images/"; //определяем папку для сохранения картинок

        //Сохраняем картинки
        $url_img = []; // массив, который будет содержать ссылки на все картинки

//       dd($request->parameter, $request->value);

//        foreach($request->file('preview') as $file) //обрабатываем массив с файлами
//        {
//            if(empty($file)) continue; // если <input type="file"... есть, но туда ничего не загруженно, то пропускаем
//            $f_name = $file->getClientOriginalName(); //получаем имя файла
//            $url_img[] = '/images/'.$f_name; //добавляем url картинки в массив
//            $file->move($root,$f_name); //перемещаем файл в папку
//        }
//
//        $preview = implode(';',$url_img); //массив с ссылками переводим в строку, что бы сохранить в базу.

        //Сохраняем каждый параметр
        $item = new Items;
        $item->title = $request->title; //название
        $item->description = $request->description;//описание
        $item->price = $request->price; // цена
//        $item->preview = $preview; //ссылки на картинки
        $item->save(); // Сохраняем все в базу.

        //Обратабываем массивы с параметрами и их значениями.
        if(!empty($request->parameter) && !empty($request->value) ) {
            $out = array_combine($request->parameter, $request->value); // массив будет такой ['5'=>'300'], 5 - это id параметра, 300 - значение параметра
        }

        //Сохраняем все параметры и значения в базу
        if(empty($out)) {
            return back()->with('message','Товар сохранен'); //если нет ни одного параметра то просто редиректим обратно.
        }

        foreach($out as $param => $value)
        {
            $parameters = new Parameters_values;
            $parameters->parameters_id = $param;
            $parameters->items_id = $item->id;
            $parameters->value = $value;
            $parameters->save();
        }

        return back()->with('message','Товар сохранен');
    }


    public function show($id)
    {

        $item = new Items;

        $items = $item::find($id); // получаем все, что касается товара (название, цена....)

        $parameters = $item::parameters($id);//получаем все параметры

//    dd($parameters);

//    $images = explode(';',$parameters[0]->preview); //ссылки на картинки передаем отдельным массивом

        $images = '';

        return view('/ddd', [
            'items' => $items,
            'parameters' => $parameters,
            'images' => $images
        ]);
    }







}
