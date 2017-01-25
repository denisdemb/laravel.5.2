<?php

use App\Model\News2;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(News2::class, function (ModelConfiguration $model) {
    $model->setTitle('Новости v2')->setAlias('news/v2');

    // Display
    $model->onDisplay(function () {
        $display = AdminDisplay::datatables()->setHtmlAttribute('class', 'table-danger');
        $display->setOrder([[1, 'desc']]);

        $display->setColumns([
            AdminColumn::link('title')->setLabel('Title'),
            AdminColumn::datetime('date')->setLabel('Date')->setFormat('d.m.Y')->setWidth('150px'),
            AdminColumn::custom()->setLabel('Published')->setCallback(function (News2 $model) {
                return $model->published ? '<i class="fa fa-check"></i>' : '<i class="fa fa-minus"></i>';
            })->setWidth('50px')->setHtmlAttribute('class', 'text-center')->setOrderable(false),
            AdminColumn::image('image')->setLabel('Image')->setWidth('150px'),
        ]);

        return $display;
    });

    // Create And Edit
    $model->onCreateAndEdit(function() {
        $form = AdminForm::panel()
            ->addBody([
                AdminFormElement::checkbox('published', 'Published'),
                AdminFormElement::text('title', 'Title')->required(),
                AdminFormElement::date('date', 'Date')->required()->setFormat('Y.m.d'),                
                AdminFormElement::image('image', 'Image (875x345)'),
            ])->addBody([
                AdminFormElement::wysiwyg('text', 'Text'),
            ]);

        $form->getButtons()
            ->setSaveButtonText('Save news')
            ->hideSaveAndCloseButton();

        return $form;
    });
});
