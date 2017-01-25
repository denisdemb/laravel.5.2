<?php

use App\Role;
use App\User;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(User::class, function (ModelConfiguration $model) {
//    $model->setTitle('Users')->enableAccessCheck();
    $model->setTitle('Пользователи');

    // Display
    $model->onDisplay(function () {
        return AdminDisplay::table()
            ->with('roles')
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns([
                AdminColumn::link('name')->setLabel('Пользователи'),
                AdminColumn::email('email')->setLabel('Email')->setWidth('150px'),
                AdminColumn::lists('roles.label')->setLabel('Роли')->setWidth('200px'),
//                AdminColumn::lists('permissions.label')->setLabel('Права')->setWidth('200px'),
            ])->paginate(20);
    });

    // Create And Edit
    $model->onCreateAndEdit(function() {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Username')->required(),
            AdminFormElement::password('password', 'Password')->required()->addValidationRule('min:6'),
            AdminFormElement::text('email', 'E-mail')->required()->addValidationRule('email'),
            AdminFormElement::multiselect('roles', 'Roles')->setModelForOptions(new Role())->setDisplay('name'),
//            AdminFormElement::multiselect('permissions', 'Permissions')->setModelForOptions(new \App\Permission())->setDisplay('name'),
//            AdminFormElement::upload('avatar', 'Avatar')->addValidationRule('image'),
//            AdminColumn::image('avatar')->setWidth('150px'),
        ]);
    });
});
