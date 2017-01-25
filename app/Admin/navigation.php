<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });

// AdminNavigation::addPage(\App\User::class)->setTitle('Новый раздел')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class);

return [
//    [
//        'title' => 'АДМИНКА',
//        'icon'  => 'fa fa-dashboard',
//        'url'   => route('admin.dashboard'),
//        'Priority' =>2,
//    ],


//    [
//        'title' => 'Пользователи',
//        'icon'  => 'fa fa-address-book-o',
//        'url'   => route('admin.users'),
//        'priority' => 1,
//    ],

    [
        'title' => 'Доступ',
        'icon' => 'fa fa-group',
        'pages' => [
            (new Page(\App\User::class))
                ->setIcon('fa fa-user')
                ->setPriority(0),
            (new Page(\App\Role::class))
                ->setIcon('fa fa-group')
                ->setPriority(1),
            (new Page(\App\Permission::class))
                ->setIcon('fa fa-group')
                ->setPriority(2)

        ]
    ],
    [
        'title' => "Контент",
        'icon' => 'fa fa-newspaper-o',
        'pages' => [
            (new Page(\App\Model\TopMenu::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(3),

            (new Page(\App\Model\TopSlider::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(4),

            (new Page(\App\Model\News::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(5),
            (new Page(\App\Model\News2::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(6),
//            (new Page(\App\Model\News3::class))
//                ->setIcon('fa fa-newspaper-o')
//                ->setPriority(20),
//            (new Page(\App\Model\News4::class))
//                ->setIcon('fa fa-newspaper-o')
//                ->setPriority(30),
//            (new Page(\App\Model\News5::class))
//                ->setIcon('fa fa-newspaper-o')
//                ->setPriority(40)

            (new Page(\App\Model\Pages::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(7)

        ]
    ],
    [
        'title' => 'Магазин',
        'icon' => 'fa fa-shopping-bag',
        'pages' => [
            (new Page(\App\Model\ShopCategories::class))
                ->setIcon('fa fa-shop')
                ->setPriority(8),
            (new Page(\App\Model\ShopGoods::class))
                ->setIcon('fa fa-bicycle ')
                ->setPriority(9),
            (new Page(\App\Model\Orders::class))
                ->setIcon('fa fa-shopping-basket')
                ->setPriority(10)

        ]
    ]

//    [
//        'title' => 'Information',
//        'icon'  => 'fa fa-exclamation-circle',
//        'url'   => route('admin.information'),
//    ],

    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fa fa-user')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
//            [
//                'title'       => 'News',
//                'priority'    => 300,
//                'accessLogic' => function ($page) {
//                    return $page->isActive();
//    		      },
//                'pages'       => [
//
//                    // ...
//
//                ]
//            ]
    //    ]
    // ]
];