<?php

use App\Model\News;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(News::class, function (ModelConfiguration $model) {
	$model->setTitle('Новости')->setAlias('news');

	// Display
	$model->onDisplay(function () {
		return AdminDisplay::table()->setApply(function($query) {
			$query->orderBy('date', 'desc');
		})->setColumns([
			AdminColumn::link('title')->setLabel('Title'),
			AdminColumn::datetime('date')->setLabel('Date')->setFormat('d.m.Y')->setWidth('150px'),
			AdminColumnEditable::checkbox('published')->setLabel('Published'),
			AdminColumn::image('image')->setLabel('Image')->setWidth('150px'),
		])->paginate(5);
	});

	// Create And Edit
	$model->onCreateAndEdit(function() {
		$form = AdminForm::form()->setItems([
			AdminFormElement::checkbox('published', 'Published'),
			AdminFormElement::text('title', 'Title')->required(),
			AdminFormElement::date('date', 'Date')->required()->setFormat('Y.m.d'),
			AdminFormElement::image('image', 'Image (875x345)'),
			AdminFormElement::wysiwyg('text', 'Text'),
		]);

		$form->getButtons()
			->setSaveButtonText('Save news')
			->hideSaveAndCloseButton();

		return $form;
	});
});