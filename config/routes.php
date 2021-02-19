<?php

return array(
    // Товар:
    'product/([0-9]+)'                          => 'product/view/$1', // actionView в ProductController
    // Каталог:
    'catalog'                                   => 'catalog/index', // actionIndex в CatalogController
    // Категория товаров:
    'category/([0-9]+)/page-([0-9]+)'           => 'catalog/category/$1/$2', // actionCategory в CatalogController
    'category/([0-9]+)'                         => 'catalog/category/$1', // actionCategory в CatalogController
    // Корзина:
    'cart/checkout'                             => 'cart/checkout', // actionAdd в CartController
    'cart/delete/([0-9]+)'                      => 'cart/delete/$1', // actionDelete в CartController
    'cart/add/([0-9]+)'                         => 'cart/add/$1', // actionAdd в CartController
    'cart/addAjax/([0-9]+)'                     => 'cart/addAjax/$1', // actionAddAjax в CartController
    'cart/delAjax/([0-9]+)'                     => 'cart/delAjax/$1', // actionAddAjax в CartController
    'cart'                                      => 'cart/index', // actionIndex в CartController
    'user/login'                                => 'user/login',
    'user/logout'                               => 'user/logout',
    'user/register'                             => 'user/register',
    'user/email'                                => 'user/email',
    'cabinet/edit'                              => 'cabinet/edit',
    'cabinet'                                   => 'cabinet/index',
    'admin/product/create'                      => 'adminProduct/create',
    'admin/product/update/([0-9]+)'             => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)'             => 'adminProduct/delete/$1',
    'admin/product'                             => 'adminProduct/index',

    // Управление категориями:
    'admin/category/create'                     => 'adminCategory/create',
    'admin/category/update/([0-9]+)'            => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)'            => 'adminCategory/delete/$1',
    'admin/category'                            => 'adminCategory/index',
    // Управление заказами:
    'admin/order/update/([0-9]+)'               => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)'               => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)'                 => 'adminOrder/view/$1',
    'admin/order'                               => 'adminOrder/index',
    'admin/user/update/([0-9]+)'                => 'admin/update/$1',
    'admin/user/delete/([0-9]+)'                => 'admin/delete/$1',
    'admin/user'                                => 'admin/user',
    // Админпанель:
    'admin'                                     => 'admin/index',
    // О магазине
    'contact'                                   => 'site/contact', // actionIndex в SiteController
    'about'                                     => 'site/about', // actionIndex в SiteController
    'index.php'                                 => 'site/index', // actionIndex в SiteController
    ''                                          => 'site/index', // actionIndex в SiteController


);
