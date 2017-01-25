<?php

use App\Role;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(Role::class, function (ModelConfiguration $model) {
    $model->setTitle('Роли');

    // Display
    $model->onDisplay(function () {
        return AdminDisplay::table()->with('permissions')
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::text('id')->setLabel('#')->setWidth('30px'),
                AdminColumn::link('label')->setLabel('Label')->setWidth('100px'),
                AdminColumn::text('name')->setLabel('Name'),
                AdminColumn::lists('permissions.label')->setLabel('Права')->setWidth('200px'),
            ])->paginate(20);
    });

    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Key')->required(),
            AdminFormElement::text('label', 'Label')->required(),
            AdminFormElement::multiselect('permissions', 'Permissions')->setModelForOptions(new \App\Permission())->setDisplay('name'),
        ]);
    });
});
