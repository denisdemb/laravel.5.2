<?php

use App\Model\ShopCategories;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(ShopCategories::class, function (ModelConfiguration $model) {
    $model->setTitle('Категории');

    // Display
    $model->onDisplay(function () {
          // подключаем пакет Baum 1.1  node
          return AdminDisplay::tree()->setValue('title');
        
//        return AdminDisplay::table()->setApply(function($query) {
//            $query->orderBy('id', 'desc');    // сортировка по id
//        })->setColumns([
//            AdminColumn::link('title')->setLabel('Title'),
//            AdminColumn::link('link')->setLabel('Link'),
//            AdminColumnEditable::checkbox('published')->setLabel('Published'),
//        ])->paginate(10);   // пагинация
    });

    // Create And Edit
    $model->onCreateAndEdit(function() {
        $form = AdminForm::form()->setItems([
            AdminFormElement::text('title', 'Название')->required(),
            AdminFormElement::text('url', 'URL'),
            AdminFormElement::checkbox('published', 'Published'),
//            AdminFormElement::wysiwyg('text', 'Text'),
        ]);

        $form->getButtons()
            ->setSaveButtonText('Сохранить категорию')
            ->hideSaveAndCloseButton();

        return $form;
    });
});