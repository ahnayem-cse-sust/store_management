<?php

use Illuminate\Support\Facades\Route;

Route::any('crud/load', 'Admin\CrudController@load')->name('crud.load');

include('admin_routes.php');