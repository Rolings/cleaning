<?php

namespace App\Helpers;

class AdminMenu
{
    private static $routes = [
       /* 'departments' => [
            'admin.departments.index',
            'admin.departments.create',
            'admin.departments.store',
            'admin.departments.edit',
            'admin.departments.update',
            'admin.departments.delete',
        ],
        'clients'     => [
            'admin.clients.index',
            'admin.clients.index.new.clients',
            'admin.clients.create',
            'admin.clients.store',
            'admin.clients.edit',
            'admin.clients.update',
            'admin.clients.delete',
        ],
        'employees'   => [
            'admin.employees.index',
            'admin.employees.create',
            'admin.employees.store',
            'admin.employees.edit',
            'admin.employees.update',
            'admin.employees.delete',
        ],

        'admins'     => [
            'admin.admins.index',
            'admin.admins.create',
            'admin.admins.store',
            'admin.admins.edit',
            'admin.admins.update',
            'admin.admins.delete',
        ],
        'news'        => [
            'admin.news.index',
            'admin.news.create',
            'admin.news.store',
            'admin.news.edit',
            'admin.news.update',
            'admin.news.delete',
        ],

        'news-categories' => [
            'admin.news.categories.index',
            'admin.news.categories.create',
            'admin.news.categories.store',
            'admin.news.categories.edit',
            'admin.news.categories.update',
            'admin.news.categories.delete',
        ],
        'discount'        => [
            'admin.discount.index',
            'admin.discount.create',
            'admin.discount.store',
            'admin.discount.edit',
            'admin.discount.update',
            'admin.discount.delete',
        ],
        'orders'          => [
            'admin.orders.index',
            'admin.orders.create',
            'admin.orders.store',
            'admin.orders.edit',
            'admin.orders.update',
            'admin.orders.delete',
        ],
        'orders-statuses' => [
            'admin.orders.statuses.index',
            'admin.orders.statuses.create',
            'admin.orders.statuses.store',
            'admin.orders.statuses.edit',
            'admin.orders.statuses.update',
            'admin.orders.statuses.delete',
        ],

        'payments-types' => [
            'admin.payments.types.index',
            'admin.payments.types.create',
            'admin.payments.types.store',
            'admin.payments.types.edit',
            'admin.payments.types.update',
            'admin.payments.types.delete',
        ],

        'products'            => [
            'admin.products.index',
            'admin.products.create',
            'admin.products.store',
            'admin.products.edit',
            'admin.products.update',
            'admin.products.delete',
        ],
        'products-categories' => [
            'admin.products.categories.index',
            'admin.products.categories.create',
            'admin.products.categories.store',
            'admin.products.categories.edit',
            'admin.products.categories.update',
            'admin.products.categories.delete',
        ],

        'services' => [
            'admin.services.index',
            'admin.services.create',
            'admin.services.store',
            'admin.services.edit',
            'admin.services.update',
            'admin.services.delete',
        ],

        'permissions' => [
            'admin.permissions.index',
            'admin.permissions.create',
            'admin.permissions.store',
            'admin.permissions.edit',
            'admin.permissions.update',
            'admin.permissions.delete',
        ],

        'roles' => [
            'admin.roles.index',
            'admin.roles.create',
            'admin.roles.store',
            'admin.roles.edit',
            'admin.roles.update',
            'admin.roles.delete',
        ],*/

        'dashboard' => [
            'admin.dashboard',
        ],
/*        'calendars' => [
            'admin.calendars.index',
        ],
        'review'    => [
            'admin.review.index',
        ],
        'about'     => [
            'admin.about.edit',
            'admin.about.update',
        ],
        'contact'   => [
            'admin.contact.edit',
            'admin.contact.update',
        ],
        'settings'  => [
            'admin.settings.index',
        ],*/
    ];

    public static function isGroup(...$patterns): bool
    {
        if (is_string($patterns)) {
            if (isset(self::$routes[$patterns]) && request()->route()->named(self::$routes[$patterns])) {
                return true;
            }
        }

        if (is_array($patterns)) {
            foreach ($patterns as $pattern) {
                if (!is_iterable($pattern)) {
                    $pattern = [$pattern];
                }

                foreach ($pattern as $item) {
                    if (isset(self::$routes[$item]) && request()->route()->named(self::$routes[$item])) {
                        return true;
                    }
                }

            }
        }

        return false;
    }

}
