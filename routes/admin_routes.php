<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');
Auth::routes();

Route::any('crud/test', 'Admin\CrudController@test')->name('crud.test');
Route::any('crud/get', 'Admin\CrudController@get')->name('crud.get');
Route::any('crud/page', 'Admin\CrudController@getPage')->name('crud.page');

Route::any('send-otp', 'Auth\LoginController@sendOtp')->name('send-otp');
Route::any('post-login', 'Auth\LoginController@postLogin')->name('post-login');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::redirect('/', '/admin/dashboard');
    Route::any('crud/edit', 'DashboardController@edit')->name('crud.edit');
    Route::any('crud/save', 'CrudController@save')->name('crud.save');
    Route::any('crud/update', 'CrudController@update')->name('crud.update');
    Route::any('crud/load', 'CrudController@load')->name('crud.load');
    Route::any('crud/delete', 'CrudController@delete')->name('crud.delete');
    Route::any('crud/remove', 'CrudController@remove')->name('crud.remove');
    Route::any('crud/exist', 'CrudController@exist')->name('crud.exist');
    Route::any('crud/generate-code', 'CrudController@generateCode')->name('crud.generate-code');
    Route::any('crud/load-data', 'CrudController@loadData')->name('crud.load-data');
    Route::any('dashboard', 'DashboardController@index')->name('dashboard');
    Route::any('/profile', 'DashboardController@profile')->name('profile');

    Route::get('/clear-cache', function () {
        Artisan::call('route:cache');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize');
        return "Cache cleared successfully";
    });

    // Menu
    Route::delete('menu/destroy', 'MenuController@massDestroy')->name('menu.massDestroy');
    Route::resource('menu', 'MenuController');

    // Language
    Route::delete('language/destroy', 'LanguageController@massDestroy')->name('language.massDestroy');
    Route::post('language/updateLang', 'LanguageController@updateLang')->name('language.updateLang');
    Route::resource('language', 'LanguageController');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('user_management/roles/destroy', 'RolesController@massDestroy')->name('user_management.roles.massDestroy');
    Route::resource('user_management/roles', 'RolesController');

    // Users
    Route::delete('user_management/users/destroy', 'UsersController@massDestroy')->name('user_management.users.massDestroy');
    Route::post('user_management/users/get_acl_office', 'UsersController@get_acl_office')->name('user_management.users.get_acl_office');
    Route::resource('user_management/users', 'UsersController');

    // Company
    Route::delete('general_settings/company/destroy', 'CompanyController@massDestroy')->name('general_settings.company.massDestroy');
    Route::resource('general_settings/company', 'CompanyController');

    // Branch
    Route::delete('general_settings/branch/destroy', 'BranchController@massDestroy')->name('general_settings.branch.massDestroy');
    Route::resource('general_settings/branch', 'BranchController');

    // Warehouse
    Route::delete('general_settings/warehouse/destroy', 'WarehouseController@massDestroy')->name('general_settings.warehouse.massDestroy');
    Route::resource('general_settings/warehouse', 'WarehouseController');

    // Section
    Route::delete('general_settings/section/destroy', 'SectionController@massDestroy')->name('general_settings.section.massDestroy');
    Route::resource('general_settings/section', 'SectionController');
    // Card
    Route::delete('general_settings/card/destroy', 'CardController@massDestroy')->name('general_settings.card.massDestroy');
    Route::resource('general_settings/card', 'CardController');
    // Designation
    Route::delete('general_settings/designation/destroy', 'DesignationController@massDestroy')->name('general_settings.designation.massDestroy');
    Route::resource('general_settings/designation', 'DesignationController');

    // Menufacturer
    Route::delete('inventory_management/manufacturer/destroy', 'ManufacturerController@massDestroy')->name('inventory_management.manufacturer.massDestroy');
    Route::resource('inventory_management/manufacturer', 'ManufacturerController');

    // Brand
    Route::delete('inventory_management/brand/destroy', 'BrandController@massDestroy')->name('inventory_management.brand.massDestroy');
    Route::resource('inventory_management/brand', 'BrandController');

    // Model
    Route::delete('inventory_management/model/destroy', 'ModelController@massDestroy')->name('inventory_management.model.massDestroy');
    Route::resource('inventory_management/model', 'ModelController');

    // Unit
    Route::delete('inventory_management/unit/destroy', 'UnitController@massDestroy')->name('inventory_management.unit.massDestroy');
    Route::resource('inventory_management/unit', 'UnitController');

    // Room
    Route::delete('inventory_management/room/destroy', 'RoomController@massDestroy')->name('inventory_management.room.massDestroy');
    Route::resource('inventory_management/room', 'RoomController');

    // Rack
    Route::delete('inventory_management/rack/destroy', 'RackController@massDestroy')->name('inventory_management.rack.massDestroy');
    Route::resource('inventory_management/rack', 'RackController');
    // Shelf
    Route::delete('inventory_management/shelf/destroy', 'ShelfController@massDestroy')->name('inventory_management.shelf.massDestroy');
    Route::resource('inventory_management/shelf', 'ShelfController');

    // Group
    Route::delete('inventory_management/group/destroy', 'GroupController@massDestroy')->name('inventory_management.group.massDestroy');
    Route::resource('inventory_management/group', 'GroupController');
    // GroupVolume
    Route::delete('inventory_management/groupvolume/destroy', 'GroupVolumeController@massDestroy')->name('inventory_management.groupvolume.massDestroy');
    Route::resource('inventory_management/groupvolume', 'GroupVolumeController');

    // SubGroup
    Route::delete('inventory_management/subgroup/destroy', 'SubGroupController@massDestroy')->name('inventory_management.subgroup.massDestroy');
    Route::resource('inventory_management/subgroup', 'SubGroupController');

    // SubGroupVolume
    Route::delete('inventory_management/subgroupvolume/destroy', 'SubGroupVolumeController@massDestroy')->name('inventory_management.subgroupvolume.massDestroy');
    Route::resource('inventory_management/subgroupvolume', 'SubGroupVolumeController');
    // Item
    Route::delete('inventory_management/item/destroy', 'ItemController@massDestroy')->name('inventory_management.item.massDestroy');
    Route::post('inventory_management/item/present-stock', 'ItemController@presentSock')->name('inventory_management.item.present-stock');
    Route::post('inventory_management/item/present-tools-stock', 'ItemController@presentToolsSock')->name('inventory_management.item.present-tools-stock');

    Route::resource('inventory_management/item', 'ItemController');
    // Opening
    Route::delete('inventory_management/opening/destroy', 'OpeningController@massDestroy')->name('inventory_management.opening.massDestroy');
    Route::post('inventory_management/opening/get-item', 'OpeningController@getItem')->name('inventory_management.opening.get-item');
    Route::post('inventory_management/opening/item-store', 'OpeningController@singleStore')->name('inventory_management.opening.item-store');
    Route::resource('inventory_management/opening', 'OpeningController');
    // Party
    Route::delete('section_requisition_management/party/destroy', 'PartyController@massDestroy')->name('section_requisition_management.party.massDestroy');
    Route::resource('section_requisition_management/party', 'PartyController');
    // Job
    Route::delete('section_requisition_management/job/destroy', 'JobController@massDestroy')->name('section_requisition_management.job.massDestroy');
    Route::resource('section_requisition_management/job', 'JobController');
    // RequisitionFor
    Route::delete('section_requisition_management/requisitionfor/destroy', 'RequisitionForController@massDestroy')->name('section_requisition_management.requisitionfor.massDestroy');
    Route::resource('section_requisition_management/requisitionfor', 'RequisitionForController');
    // Requisition
    Route::delete('section_requisition_management/requisition/destroy', 'RequisitionController@massDestroy')->name('section_requisition_management.requisition.massDestroy');
    Route::get('section_requisition_management/requisition/approved/{id}', 'RequisitionController@approved')->name('section_requisition_management.requisition.approved');
    Route::resource('section_requisition_management/requisition', 'RequisitionController');

    // Vendor
    Route::delete('main_warehouse_management/vendor/destroy', 'VendorController@massDestroy')->name('section_requisition_management.vendor.massDestroy');
    Route::resource('main_warehouse_management/vendor', 'VendorController');

    // PS
    Route::delete('main_warehouse_management/ps/destroy', 'PSController@massDestroy')->name('main_warehouse_management.ps.massDestroy');
    Route::post('main_warehouse_management/ps/initialize', 'PSController@initialize')->name('main_warehouse_management.ps.initialize');
    Route::get('main_warehouse_management/ps/approved/{id}', 'PSController@approved')->name('main_warehouse_management.ps.approved');
    Route::resource('main_warehouse_management/ps', 'PSController');

    // Inspector
    Route::delete('main_warehouse_management/inspector/destroy', 'InspectorController@massDestroy')->name('section_requisition_management.inspector.massDestroy');
    Route::resource('main_warehouse_management/inspector', 'InspectorController');

    // Delivery
    Route::post('main_warehouse_management/delivery/initialize', 'RequisitionDeliveryController@initialize')->name('section_requisition_management.delivery.initialize');
    Route::resource('main_warehouse_management/delivery', 'RequisitionDeliveryController');

    // MaterialReceive
    Route::delete('main_warehouse_management/material_receive/destroy', 'MaterialReceiveController@massDestroy')->name('main_warehouse_management.material_receive.massDestroy');
    Route::post('main_warehouse_management/material_receive/initialize', 'MaterialReceiveController@initialize')->name('main_warehouse_management.material_receive.initialize');
    Route::get('main_warehouse_management/material_receive/approved/{id}', 'MaterialReceiveController@approved')->name('main_warehouse_management.material_receive.approved');
    Route::resource('main_warehouse_management/material_receive', 'MaterialReceiveController');

    // TSRequisition
    Route::delete('tools_store_management/tsrequisition/destroy', 'TSRequisitionController@massDestroy')->name('tools_store_management.tsrequisition.massDestroy');
    Route::get('tools_store_management/tsrequisition/approved/{id}', 'TSRequisitionController@approved')->name('tools_store_management.tsrequisition.approved');
    Route::resource('tools_store_management/tsrequisition', 'TSRequisitionController');
    // TSItemIssue
    Route::delete('tools_store_management/tsitemissue/destroy', 'TSItemIssueController@massDestroy')->name('tools_store_management.tsitemissue.massDestroy');
    Route::get('tools_store_management/tsitemissue/approved/{id}', 'TSItemIssueController@approved')->name('tools_store_management.tsitemissue.approved');
    Route::get('tools_store_management/tsitemissue/show-store-details/{item_id}', 'TSItemIssueController@showStoreDetails')->name('tools_store_management.tsitemissue.show-store-details');
    Route::resource('tools_store_management/tsitemissue', 'TSItemIssueController');
    // TSItemReturn
    Route::delete('tools_store_management/tsitemreturn/destroy', 'TSItemReturnController@massDestroy')->name('tools_store_management.tsitemreturn.massDestroy');
    Route::post('tools_store_management/tsitemreturn/initialize', 'TSItemReturnController@initialize')->name('tools_store_management.tsitemreturn.initialize');
    Route::get('tools_store_management/tsitemreturn/approved/{id}', 'TSItemReturnController@approved')->name('tools_store_management.tsitemreturn.approved');
    Route::resource('tools_store_management/tsitemreturn', 'TSItemReturnController');

    // DemageItem
    Route::delete('tools_store_management/demageitem/destroy', 'DemageItemController@massDestroy')->name('tools_store_management.demageitem.massDestroy');
    Route::get('tools_store_management/demageitem/approved/{id}', 'DemageItemController@approved')->name('tools_store_management.demageitem.approved');
    Route::resource('tools_store_management/demageitem', 'DemageItemController');

    // Delivery
    Route::post('tools_store_management/tsrdelivery/initialize', 'TSRequisitionDeliveryController@initialize')->name('tools_store_management.delivery.initialize');
    Route::resource('tools_store_management/tsrdelivery', 'TSRequisitionDeliveryController');

    //Stock Report
    Route::get('report_management/product-stock-report', 'ProductStockReportController@product_stock_report_index')->name('report_management.product-stock-report');
    Route::get('report_management/product-stock-report/show-card-details/{item_id}', 'ProductStockReportController@show_card_details')->name('report_management.product-stock-report.show-card-details');
    Route::any('report_management/generate-product-stock-report', 'ProductStockReportController@generate_stock_report')->name('report_management.generate-product-stock-report');

    //Stock History Report
    Route::get('report_management/product-stock-history-report', 'ProductStockReportController@product_stock_history_report_index')->name('report_management.product-stock-history-report');
    Route::any('report_management/generate-product-stock-history-report', 'ProductStockReportController@generate_stock_history_report')->name('report_management.generate-product-stock-history-report');

    //Job Report
    Route::get('report_management/report/job-report', 'ReportController@job_report')->name('report_management.report.job-report');
    Route::any('report_management/report/generate-job-report', 'ReportController@generate_job_report')->name('report_management.report.generate-job-report');

    //Requisition Report
    Route::get('report_management/report/requisition-report', 'ReportController@requisition_report')->name('report_management.report.requisition-report');
    Route::any('report_management/report/generate-requisition-report', 'ReportController@generate_requisition_report')->name('report_management.report.generate-requisition-report');
    //Card Status Report
    Route::get('report_management/report/card-status-report', 'ReportController@card_status_report')->name('report_management.report.card-status-report');
    Route::any('report_management/report/generate-card-status-report', 'ReportController@generate_card_status_report')->name('report_management.report.generate-card-status-report');

});