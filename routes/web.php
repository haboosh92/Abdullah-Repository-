<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthorizationUsers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// use Livewire\Livewire;
// Livewire::setScriptRoute(function ($handle) {
//     $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//     $segments = explode('/', trim($urlPath, '/'));
//     // Use the null coalescing operator to simplify the conditional assignment
//     $rootFolder = count($segments) >= 2 ? $segments[0] : 'localhost';
//     return Route::get($rootFolder . '/public/livewire/livewire.js', $handle);
// });

// Livewire::setUpdateRoute(function ($handle) {
//     return Route::post('/Moc/public/livewire/update', $handle);
// });

 

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    // Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear'); // Corrected line
    return "all cleared ...";
});

Route::get('/', function () {
    return view('welcome');
});
 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 
])->group(function () {
    // Route::get('error', function () {
    //     return view('error.index');
    // });
    Route::get('error', [App\Http\Controllers\Error\ErrorController::class, 'index'])->name('error');
});
 



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::get('home', [App\Http\Controllers\Home\statisticsHomeController::class, 'index'])->name('home');
});


// Route::get('/home', function () {
//     return view('home.index');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::get('/Developer', function () {
        return view('home.ars');
    })->name('Developer');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/paper', function () {
//         return view('dashboard');
//     })->name('paper');
// });

// ************* Paper metadata ************************
Route::get('paper/{doi}', 'App\Http\Controllers\Paper\PaperController@show')->name('paper');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::get('metadata/{id}', [App\Http\Controllers\Paper\PaperController::class, 'index'])->name('metadata');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::post('cmetadata', [App\Http\Controllers\Paper\PaperController::class, 'create'])->name('cmetadata');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    // AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::get('downloadPdf', [App\Http\Controllers\Paper\PaperController::class, 'downloadPdf'])->name('downloadPdf');
});


// ************* request Paper ************************

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::get('requests', [App\Http\Controllers\Requests\RequestsController::class, 'index'])->name('requests');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::get('rmetadata', [App\Http\Controllers\Requests\RequestsController::class, 'show'])->name('rmetadata');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('acceptrequest', [App\Http\Controllers\Requests\RequestsController::class, 'acceptrequest'])->name('acceptrequest');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('rejectrequest', [App\Http\Controllers\Requests\RequestsController::class, 'rejectrequest'])->name('rejectrequest');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::post('request', [App\Http\Controllers\Requests\RequestsController::class, 'request'])->name('request');
});


// ************* Login with Google Acount ************************
Route::get('login/google', [App\Http\Controllers\AuthGoogle\AuthGoogleController::class,'redirectToGoogle'])->name('AuthGoogle');
Route::get('login/google/callback', [App\Http\Controllers\AuthGoogle\AuthGoogleController::class,'handleGoogleCallback']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::get('/app', function () {
        return view('layouts.app2');
    })->name('app');
});

// ***************** User Management *****************

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {

    Route::get('/users', [App\Http\Controllers\UserManagement\UserController::class, 'index'])->name('users');
    // Route::get('/users', function () {
    //     // return view('user-management.users');

    // })->name('users');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('cuser', [App\Http\Controllers\UserManagement\UserController::class, 'create'])->name('cuser');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('euser', [App\Http\Controllers\UserManagement\UserController::class, 'edit'])->name('euser');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('duser', [App\Http\Controllers\UserManagement\UserController::class, 'destroy'])->name('duser');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('/ESuser', [App\Http\Controllers\UserManagement\UserController::class, 'ESuser'])->name('ESuser');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('/DSuser', [App\Http\Controllers\UserManagement\UserController::class, 'DSuser'])->name('DSuser');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('/filter_users', [App\Http\Controllers\UserManagement\UserController::class, 'filter_users'])->name('filter_users');
});



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified', 
// ])->group(function () {
//     Route::post('logout', [App\Http\Controllers\UserManagement\UserController::class, 'customLogout'])->name('logout');
// });



// *****************  additional info   *****************
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    // AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::get('/additional_info', [App\Http\Controllers\Setting\AdditionalInfoController::class, 'index'])->name('additional_info');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    // AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::post('updateInfo', [App\Http\Controllers\Setting\AdditionalInfoController::class, 'edit'])->name('updateInfo');
});



// ***************** Department *****************

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {

    Route::get('/departs', [App\Http\Controllers\Department\DepartmentControllers::class, 'index'])->name('departs');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('cdepart', [App\Http\Controllers\Department\DepartmentControllers::class, 'create'])->name('cdepart');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('edepart', [App\Http\Controllers\Department\DepartmentControllers::class, 'edit'])->name('edepart');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('delete_depart', [App\Http\Controllers\Department\DepartmentControllers::class, 'destroy'])->name('delete_depart');
});





// ***************** Year of Research *****************

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {

    Route::get('/yearRs', [App\Http\Controllers\Setting\yearResearchesController::class, 'index'])->name('yearRs');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('cyearRs', [App\Http\Controllers\Setting\yearResearchesController::class, 'create'])->name('cyearRs');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('eyearRs', [App\Http\Controllers\Setting\yearResearchesController::class, 'edit'])->name('eyearRs');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('dyearRs', [App\Http\Controllers\Setting\yearResearchesController::class, 'destroy'])->name('dyearRs');
});



// ***************** File *****************

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::get('/files', [App\Http\Controllers\Research\FileControllers::class, 'index'])->name('files');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('cfile', [App\Http\Controllers\Research\FileControllers::class, 'create'])->name('cfile');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('efile', [App\Http\Controllers\Research\FileControllers::class, 'edit'])->name('efile');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('dfile', [App\Http\Controllers\Research\FileControllers::class, 'destroy'])->name('dfile');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::get('csv/{id}', [App\Http\Controllers\Research\FileControllers::class, 'showCsv'])->name('csv');
});

// ***************** Research data *****************

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::get('/research', [App\Http\Controllers\Research\ResearchControllers::class, 'index'])->name('research');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {

    Route::post('/research', [App\Http\Controllers\Research\ResearchControllers::class, 'fResearch'])->name('fResearch');

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('/cresearch', [App\Http\Controllers\Research\ResearchControllers::class, 'create'])->name('cresearch');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('/eresearch', [App\Http\Controllers\Research\ResearchControllers::class, 'edit'])->name('eresearch');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor'
])->group(function () {
    Route::post('/dresearch', [App\Http\Controllers\Research\ResearchControllers::class, 'destroy'])->name('dresearch');
});

// ***************** Author Research *****************
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::get('/myresearch', [App\Http\Controllers\Research\AuthorResearchControllers::class, 'index'])->name('myresearch');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    AuthorizationUsers::class . ':Administrator,Editor,Professor'
])->group(function () {
    Route::post('/myresearch', [App\Http\Controllers\Research\AuthorResearchControllers::class, 'fResearch'])->name('myresearch');
});