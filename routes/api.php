<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Jdata;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------


*/

//1.POST /users : Create a user.
Route::post('/users', [UserController::class, 'store'])
->name('users.store');
// POST /login : Login a user.
Route::post('/login', [UserController::class, 'login'])
->name('login');

/* 001. GET ALL DATA FROM TABLE */
Route::get('/barris', [Jdata::class, 'index'])
->name('barris.list');

/* 002. GET SPECIFIED BARRI DATA FROM TABLE */
Route::get('/barris/{id}', [Jdata::class, 'getBarri'])
->name('getBarri.list');


/* 003. ADD DATABASE RECORDS FROM JSON FILE */
Route::get('/json/{name}', [Jdata::class, 'getJson'])
->name('getJson.list');


/* 00. test */
Route::get('/', ['/testing.html']);




//PROTECTED ROUTES
Route::group(['middleware' => ['cors', 'json.response']], function() {

//Logout user
Route::post('/logout', [UserController::class, 'logout'])
->middleware('auth:api')
->middleware('can:logout')
->name('logout');

/* 5. GET /users: returns the list of all the users in the system with their 
average success rate */
Route::get('/users', [User::class, 'index'])
->middleware('can:users.list')
->name('users.list');

/*8.GET /users/ranking/loser: returns the user with the worst success rate.*/
Route::get('/users/ranking/loser', [User::class, 'loser'])
->middleware('can:users.loser')
->name('users.loser');

/*9.GET /users/ranking/winner: returns the user with the best 
percentage of success.*/
Route::get('/users/ranking/winner', [User::class, 'winner'])
->middleware('can:users.winner')
->name('users.winner');

/*7. GET /users/ranking: returns the average ranking of all users in the system.
That is, the average percentage of successes.*/
Route::get('/users/ranking', [User::class, 'rank'])
->middleware('can:users.ranks')
->name('users.ranks');


/*6.GET /users/{id}/games: returns the list of games for a user.*/
Route::get('/users/{id}', [User::class, 'show'])
->middleware('can:games.list')
->name('games.list');

/*2.PUT /users/{id} : modifies the name of the user.*/
Route::put('/users/{id}', [UserController::class, 'update'])
->middleware('can:users.update')
->name('users.update');

/*3.POST /users/{id}/games/ : A specific user rolls the dice.*/
Route::post('/users/{id}/games', [GameController::class, 'store'])
->middleware('auth:api')
->middleware('can:users.game')
->name('users.game');

/*4.DELETE /users/{id}/games: deletes the user's rolls.*/
Route::delete('/users/{id}/games', [GameController::class, 'destroy'])
->middleware('can:games.delete')
->name('games.delete');

});
