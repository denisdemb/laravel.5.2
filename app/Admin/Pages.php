<?php

use App\Model\Pages;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Pages::class, function (ModelConfiguration $model) {
    $model->setTitle('Страницы')->setAlias('pages');

    // Display
    $model->onDisplay(function () {
        return AdminDisplay::table()->setApply(function($query) {
            $query->orderBy('date', 'desc');
        })->setColumns([
            AdminColumn::link('title')->setLabel('Title'),
            AdminColumn::link('url')->setLabel('Url'),
            AdminColumn::datetime('date')->setLabel('Date')->setFormat('d.m.Y')->setWidth('150px'),
            AdminColumnEditable::checkbox('published')->setLabel('Published'),
        ])->paginate(5);
    });

    // Create And Edit
    $model->onCreateAndEdit(function() {

        $form = AdminForm::form()->setItems([
            AdminFormElement::checkbox('published', 'Published'),
            AdminFormElement::text('url', 'Url')->required(),
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::text('description', 'Description')->required(),
            AdminFormElement::text('keywords', 'Keywords')->required(),
            AdminFormElement::text('h1', 'H1')->required(),
            AdminFormElement::date('date', 'Date')->required()->setFormat('Y.m.d'),
            AdminFormElement::wysiwyg('text', 'Text'),
            AdminFormElement::file('uploadfile', 'Выбрать файл'),
        ]);

        $form->getButtons()
            ->setSaveButtonText('Save page')
            ->hideSaveAndCloseButton();

        return $form;
    });
});