<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/users/change/{id}', [AuthController::class, 'changePassword'])->name('users.change')->middleware('auth');
Route::post('/users/change-password', [AuthController::class, 'updateChangePassword'])->name('users.password.change')->middleware('auth');

Route::group(['prefix' => 'password'], function () {
    Route::get('/forget', [AuthController::class, 'forgetPassword'])->name('forget_password');
    Route::post('/reset', [AuthController::class, 'resetPassword'])->name('check_password_reset');
    Route::get('/reset/{token}', [AuthController::class, 'getChangePassword'])->name('reset_password_link');
    Route::post('/reset/new/{token}', [AuthController::class, 'postChangePassword'])->name('change_password');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/products/add', [AdminController::class, 'addProduct'])->name('admin.products.add');
    Route::post('/products/save', [AdminController::class, 'saveProduct'])->name('admin.products.add.save');
    Route::get('/products/edit/{id}', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::post('/products/update', [AdminController::class, 'updateProduct'])->name('admin.products.update.save');
    Route::get('/products/delete/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');
    Route::get('/sub-products', [AdminController::class, 'subProducts'])->name('admin.subproducts');
    Route::get('/sub-products/add', [AdminController::class, 'addSubProduct'])->name('admin.subproducts.add');
    Route::post('/sub-products/save', [AdminController::class, 'saveSubProduct'])->name('admin.subproducts.add.save');
    Route::get('/sub-products/edit/{id}', [AdminController::class, 'editSubProduct'])->name('admin.subproducts.edit');
    Route::post('/sub-products/update', [AdminController::class, 'updateSubProduct'])->name('admin.subproducts.update.save');
    Route::get('/sub-products/delete/{id}', [AdminController::class, 'deleteSubProduct'])->name('admin.subproducts.delete');
    Route::get('/users', [AdminController::class, 'getUsers'])->name('admin.users');
    Route::post('/fetch-users', [AdminController::class, 'fetchUsers'])->name('admin.users.result');
    Route::get('/users/add', [AdminController::class, 'addUser'])->name('admin.users.add');
    Route::post('/users/save', [AdminController::class, 'saveUser'])->name('admin.users.add.save');
    Route::get('/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/users/update', [AdminController::class, 'updateUser'])->name('admin.users.update.save');
    Route::get('/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/customers', [AdminController::class, 'getCustomers'])->name('admin.customers');
    Route::get('/customers/export/csv', [AdminController::class, 'exportCustomersCsv'])->name('admin.customers.export.csv');
    Route::get('/customers/add', [AdminController::class, 'addCustomer'])->name('admin.customers.add');
    Route::post('/customers/save', [AdminController::class, 'saveCustomer'])->name('admin.customers.add.save');
    Route::get('/customers/edit/{id}', [AdminController::class, 'editCustomer'])->name('admin.customers.edit');
    Route::post('/customers/update', [AdminController::class, 'updateCustomer'])->name('admin.customers.update.save');
});
