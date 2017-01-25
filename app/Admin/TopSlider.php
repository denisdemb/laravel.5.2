<?php

use App\Model\TopSlider;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(TopSlider::class, function (ModelConfiguration $model) {
    $model->setTitle('Топ Слайдер');

    // Display
    $model->onDisplay(function () {
        return AdminDisplay::table()->setApply(function($query) {
            $query->orderBy('id', 'desc');    // сортировка по id
        })->setColumns([
            AdminColumn::link('title')->setLabel('Title'),
            AdminColumn::link('link')->setLabel('Link'),
            AdminColumnEditable::checkbox('published')->setLabel('Published'),
            AdminColumn::image('image')->setLabel('Image (1000x480) ')->setWidth('150px'),
        ])->paginate(10);   // пагинация
    });

    // Create And Edit
    $model->onCreateAndEdit(function() {
        $form = AdminForm::form()->setItems([
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::text('link', 'Link'),
            AdminFormElement::checkbox('published', 'Published'),
//            AdminFormElement::upload('avatar', 'Avatar')->addValidationRule('image'),
            AdminFormElement::image('image', 'Image'),
        ]);

        $form->getButtons()
            ->setSaveButtonText('Сохранить слайдер')
            ->hideSaveAndCloseButton();

        return $form;
    });
});