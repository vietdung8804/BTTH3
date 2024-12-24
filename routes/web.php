<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// Routes cho khách
Route::get('/', [NewsController::class, 'index'])->name('news.index'); // Xem danh sách tin tức
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show'); // Xem chi tiết tin tức
Route::get('/search', [NewsController::class, 'searchForm'])->name('news.search');
Route::get('/search-results', [NewsController::class, 'search'])->name('news.searchResults');

// Routes cho quản trị viên
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('news', [AdminController::class, 'index'])->name('admin.news.index'); // Danh sách tin tức
    Route::get('news/create', [AdminController::class, 'create'])->name('admin.news.create'); // Thêm tin tức
    Route::post('news', [AdminController::class, 'store'])->name('admin.news.store'); // Lưu tin tức
    Route::get('news/{id}/edit', [AdminController::class, 'edit'])->name('admin.news.edit'); // Sửa tin tức
    Route::put('news/{id}', [AdminController::class, 'update'])->name('admin.news.update'); // Cập nhật tin tức
    Route::delete('news/{id}', [AdminController::class, 'destroy'])->name('admin.news.destroy'); // Xóa tin tức
});

// Routes cho đăng nhập/đăng xuất
Route::get('/login', [AdminController::class, 'login'])->name('admin.news.login'); // Form đăng nhập
Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.authenticate'); // Xử lý đăng nhập
Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout'); // Đăng xuất
