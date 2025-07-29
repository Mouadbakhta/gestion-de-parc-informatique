<?php
use App\Http\Controllers\Admin\DemandeController;
use App\Http\Controllers\Admin\EmplacementController;
use App\Http\Controllers\Admin\EquipementController;
use App\Http\Controllers\Admin\HistoriqueController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Employe\DemandeController as EmployeDemandeController;
use App\Http\Controllers\Employe\StockController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        /** @var \Illuminate\Contracts\Auth\Guard $auth */
        $auth = auth();
        return $auth->user()->isAdmin()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('employe.dashboard');
    })->name('dashboard');

    Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('equipements', EquipementController::class);
        Route::resource('emplacements', EmplacementController::class);
        Route::resource('demandes', DemandeController::class);
        Route::get('/historique', [HistoriqueController::class, 'index'])->name('historique.index');
    });

    Route::prefix('employe')->middleware('employe')->name('employe.')->group(function () {
        Route::get('/dashboard', function () {
            return view('employe.dashboard');
        })->name('dashboard');
        Route::resource('demandes', EmployeDemandeController::class)->only(['index', 'create', 'store']);
        Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
?>