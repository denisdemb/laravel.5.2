<?php


use App\Model\ShopCategories;
use App\Model\ShopGoods;
use App\Model\ShopImages;

use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(ShopGoods::class, function (ModelConfiguration $model) {
//    $model->setTitle('Товары');


    // Display
    $model->onDisplay(function () {
    //    $display = AdminDisplay::table()->with('categories');
//        $display->setOrder([[1, 'desc']]);

//        $dis = AdminDisplay::table()->with('shopimages');





        $display = AdminDisplay::table()->setHtmlAttribute('class', 'table-primary');

//        $dd = new ShopGoods;
//
//        $dd = $dd->shopimages1();



//        dd(count($dd));




//        foreach ($dd as $d):
//
//           // $dddd[] = $d->path.',';
//
//            $dddd[] =  "AdminColumn::image('".$d->path."')->setLabel('Картинки')->setWidth('150px'),";
//
//        endforeach;

       // $dddd1[] = explode(',', $dddd);

       // echo $dddd;


        $display->setColumns([

            AdminColumn::text('categories.title')->setLabel('Категория'),

            AdminColumn::link('title')->setLabel('Название'),

            AdminColumn::text('price')->setLabel('Цена текущая'),
            AdminColumn::text('pricesale')->setLabel('Цена старая (распродажа)'),

//            AdminColumn::datetime('date')->setLabel('Date')->setFormat('d.m.Y')->setWidth('150px'),
            AdminColumnEditable::checkbox('new')->setLabel('Новый товар'),

            AdminColumnEditable::checkbox('sale')->setLabel('Распродажа'),

            AdminColumnEditable::checkbox('published')->setLabel('Опубликован'),

//            AdminColumn::custom()->setLabel('Published')->setCallback(function (ShopGoods $model) {
//                return $model->published ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
//            })->setWidth('50px')->setHtmlAttribute('class', 'text-center')->setOrderable(false),
            AdminColumn::image('shopimages.path')->setLabel('Картинки')->setWidth('150px'),

        ]);


        return $display;
    });

    // Create And Edit
    $model->onCreateAndEdit(function() {
        $form = AdminForm::panel()
            ->addBody([
                AdminFormElement::checkbox('published', 'Публиковать'),
                AdminFormElement::checkbox('new', 'Новый товар'),
                AdminFormElement::checkbox('sale', 'Распродажа'),

//              сохраняем в поле таблицы items.categoriy_id то что выбрали, выводим список categories.title
                AdminFormElement::select('categoriy_id', 'Категория')->setModelForOptions(new ShopCategories())->setDisplay('title')->required(),

                AdminFormElement::text('title', 'Название')->required(),
//                AdminFormElement::date('date', 'Date')->required()->setFormat('Y.m.d'),

//                AdminFormElement::image('image', 'Картинка (875x345)'),
                AdminFormElement::images('shopimages.path', 'Картинки товара (875x345)'),

                AdminFormElement::text('price', 'Текущая цена'),
                AdminFormElement::text('pricesale', 'Старая цена (распродажа)'),

            ])->addBody([
                AdminFormElement::wysiwyg('description', 'Описание'),
            ]);






        $form->getButtons()
            ->setSaveButtonText('Сохранить товар')
            ->hideSaveAndCloseButton();

        return $form;
    });
});
