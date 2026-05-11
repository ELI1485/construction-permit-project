<?php

use Illuminate\Support\Facades\Route;

// Welcome Page
Route::get('/', function () { return view('welcome'); });

// Core Dashboard
Route::get('/dashboard', function () { return view('statistics.dashboard'); })->name('dashboard');

// Role-specific Dashboards
Route::get('/dashboard/admin', function () { return view('dashboard.admin'); });
Route::get('/dashboard/agent', function () { return view('dashboard.agent'); });
Route::get('/dashboard/architect', function () { return view('dashboard.architect'); });
Route::get('/dashboard/citizen', function () { return view('dashboard.citizen'); });
Route::get('/dashboard/technical', function () { return view('dashboard.technical'); });

// Permits
Route::get('/permits', function () { return view('permits.index'); })->name('permits.index');
Route::get('/permits/create', function () { return view('permits.create'); })->name('permits.create');
Route::get('/permits/edit', function () { return view('permits.edit'); })->name('permits.edit');
Route::get('/permits/show', function () { return view('permits.show'); })->name('permits.show');
Route::get('/permits/history', function () { return view('permits.history'); })->name('permits.history');

// Notifications
Route::get('/notifications', function () { return view('notifications.index'); })->name('notifications.index');

// Documents
Route::get('/documents', function () { return view('documents.index'); })->name('documents.index');
Route::get('/documents/upload', function () { return view('documents.upload'); })->name('documents.upload');
Route::get('/documents/preview', function () { return view('documents.preview'); })->name('documents.preview');

// Archives
Route::get('/archives', function () { return view('archives.index'); })->name('archives.index');

// Users Management
Route::get('/users', function () { return view('users.index'); })->name('users.index');

// Commissions (اللجان)
Route::get('/commissions', function () { return view('commissions.index'); })->name('commissions.index');

// Inspections (المعاينات)
Route::get('/inspections', function () { return view('inspections.index'); })->name('inspections.index');

// Payments (الرسوم)
Route::get('/payments', function () { return view('payments.index'); })->name('payments.index');

// Reports (التقارير)
Route::get('/reports', function () { return view('reports.index'); })->name('reports.index');

// Settings (الإعدادات)
Route::get('/settings', function () { return view('settings.index'); })->name('settings.index');

// Statistics (الإحصائيات)
Route::get('/statistics', function () { return view('statistics.dashboard'); })->name('statistics.index');
