<?php

/**
 * Лист маршрутов
 */

$this->router->add('login', '/admin/login/', 'LoginController:form');
$this->router->add('auth-admin', '/admin/auth/', 'LoginController:authAdmin', 'POST');
$this->router->add('dashboard', '/admin/', 'DashboardController:index');
$this->router->add('logout', '/admin/logout/', 'AdminController:logout');
// Страницы маршрутов (GET)
$this->router->add('pages', '/admin/pages/', 'PageController:listing');
$this->router->add('pages-create', '/admin/pages/create/', 'PageController:create');
$this->router->add('pages-edit', '/admin/pages/edit/(id:int)', 'PageController:edit');
// Страницы маршрутов (POST)
$this->router->add('page-add', '/admin/page/add/', 'PageController:add', 'POST');
$this->router->add('page-update', '/admin/page/update/', 'PageController:update', 'POST');
$this->router->add('plagin-add', '/admin/plagins/', 'PlaginController:add', 'POST');
$this->router->add('plagin-del',    '/admin/plagins/del/', 'PlaginController:del');
$this->router->add('setting-update',  '/admin/settings/update/', 'SettingController:updateSetting', 'POST');


//Настройки путей (GET)
$this->router->add('setting-general', '/admin/settings/general/', 'SettingController:general');
$this->router->add('plagins', '/admin/plagins/', 'PlaginController:plagins');


