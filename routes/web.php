<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermitController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TechnicalReviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Services\AIService;

Route::get('/', fn () => view('welcome'));

// ====================== AUTH ======================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// ====================== CITOYEN ======================
Route::middleware(['auth', 'role:citoyen'])->group(function () {
    Route::get('/citizen/dashboard', [DashboardController::class, 'citizen'])->name('citizen.dashboard');
    Route::get('/citizen/permits', [PermitController::class, 'citizenIndex'])->name('citizen.permits');
    Route::get('/citizen/permits/create', [PermitController::class, 'create'])->name('citizen.permits.create');
    Route::post('/citizen/permits', [PermitController::class, 'store'])->name('citizen.permits.store');
    Route::get('/citizen/permits/{id}', [PermitController::class, 'show'])->name('citizen.permits.show');
});

// ====================== ARCHITECTE ======================
Route::middleware(['auth', 'role:architecte'])->group(function () {
    Route::get('/architect/dashboard', [DashboardController::class, 'architect'])->name('architect.dashboard');
    Route::get('/architect/permits', [PermitController::class, 'architectIndex'])->name('architect.permits');
});

// ====================== AGENT URBANISME ======================
Route::middleware(['auth', 'role:agent_urbanisme'])->group(function () {
    Route::get('/agent/dashboard', [DashboardController::class, 'agent'])->name('agent.dashboard');
    Route::get('/agent/permits', [PermitController::class, 'agentIndex'])->name('agent.permits');
    Route::post('/agent/permits/{id}/validate', [PermitController::class, 'validatePermit']);
    Route::post('/agent/permits/{id}/reject', [PermitController::class, 'rejectPermit']);
    Route::post('/agent/permits/{id}/request-docs', [PermitController::class, 'requestDocs']);
});

// ====================== SERVICE TECHNIQUE ======================
Route::middleware(['auth', 'role:service_technique'])->group(function () {
    Route::get('/technical/dashboard', [DashboardController::class, 'technical'])->name('technical.dashboard');
    Route::get('/technical/permits', [PermitController::class, 'technicalIndex'])->name('technical.permits');
    Route::post('/technical/permits/{id}/review', [TechnicalReviewController::class, 'store']);
});

// ====================== ADMIN ======================
Route::middleware(['auth', 'role:administrateur'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::post('/admin/users/{id}/role', [AdminController::class, 'updateRole']);
    Route::get('/admin/statistics', [AdminController::class, 'statistics'])->name('admin.statistics');
    Route::get('/admin/archives', [ArchiveController::class, 'index'])->name('admin.archives');

    Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('/admin/roles', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::get('/admin/roles/{role}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
    Route::put('/admin/roles/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
    Route::patch('/admin/roles/{role}', [RoleController::class, 'update']);
    Route::delete('/admin/roles/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');
    Route::post('/admin/roles/{role}/permissions', [RoleController::class, 'syncPermissions'])->name('admin.roles.permissions.sync');

    Route::get('/admin/permissions', [PermissionController::class, 'index'])->name('admin.permissions.index');
    Route::get('/admin/permissions/create', [PermissionController::class, 'create'])->name('admin.permissions.create');
    Route::post('/admin/permissions', [PermissionController::class, 'store'])->name('admin.permissions.store');
    Route::get('/admin/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('admin.permissions.edit');
    Route::put('/admin/permissions/{permission}', [PermissionController::class, 'update'])->name('admin.permissions.update');
    Route::patch('/admin/permissions/{permission}', [PermissionController::class, 'update']);
    Route::delete('/admin/permissions/{permission}', [PermissionController::class, 'destroy'])->name('admin.permissions.destroy');
});

// ====================== SHARED ======================
Route::middleware('auth')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markRead']);
    Route::post('/permits/{id}/documents', [DocumentController::class, 'upload']);
});

// ====================== HANANE STATIC PREVIEW ROUTES ======================
// Core Dashboard routing logic dynamically resolves authenticated persona dashboards
Route::get('/dashboard', function () {
    if (! Auth::check()) {
        return view('statistics.dashboard');
    }

    /** @var \App\Models\User $user */
    $user = Auth::user();
    $userRole = $user->role?->nom;
    $mappedRole = match($userRole) {
        'مواطن', 'ممثل الشخص المعنوي' => 'citoyen',
        'مهندس معماري', 'مهندس مساح طوبوغرافي', 'مهندس مختص' => 'architecte',
        'ممثل منعش عقاري', 'ممثل جماعة ترابية', 'عضو اللجنة', 'ممثل متعهد شركة الاتصالات', 'ممثل متعهد شركة شبكات الماء والكهرباء' => 'agent_urbanisme',
        'administrateur' => 'administrateur',
        default => 'citoyen',
    };

    return match($mappedRole) {
        'citoyen' => app(DashboardController::class)->citizen(),
        'architecte' => app(DashboardController::class)->architect(),
        'agent_urbanisme' => app(DashboardController::class)->agent(),
        'service_technique' => app(DashboardController::class)->technical(),
        'administrateur' => app(DashboardController::class)->admin(),
        default => view('statistics.dashboard'),
    };
})->name('dashboard');

// Role-specific Dashboards dynamic integrations
Route::get('/dashboard/admin', [DashboardController::class, 'admin']);
Route::get('/dashboard/agent', [DashboardController::class, 'agent']);
Route::get('/dashboard/architect', [DashboardController::class, 'architect']);
Route::get('/dashboard/citizen', [DashboardController::class, 'citizen']);
Route::get('/dashboard/technical', [DashboardController::class, 'technical']);

// Permits previews
Route::get('/permits', function () { return view('permits.index'); })->name('permits.index');
Route::get('/permits/create', function () { return view('permits.create'); })->name('permits.create');
Route::get('/permits/edit', function () { return view('permits.edit'); })->name('permits.edit');
Route::get('/permits/show', function () { return view('permits.show'); })->name('permits.show');
Route::get('/permits/history', function () { return view('permits.history'); })->name('permits.history');

// Documents previews
Route::get('/documents', function () { return view('documents.index'); })->name('documents.index');
Route::get('/documents/upload', function () { return view('documents.upload'); })->name('documents.upload');
Route::get('/documents/preview', function () { return view('documents.preview'); })->name('documents.preview');

// Archives preview
Route::get('/archives', function () { return view('archives.index'); })->name('archives.index');

// Users Management preview
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

// AI Test Endpoint
Route::post('/permits', [PermitController::class, 'store']);

