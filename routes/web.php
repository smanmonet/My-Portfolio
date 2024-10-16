<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\DetailsBorrowController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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

//Route::get('/', function () {return view('welcome');});

Route::get('/index', [BookController::class, 'index'])->name(
    'books.index');


//หน้า Login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//หน้า Room
Route::get('/room', [RoomController::class, 'index'])->name('index');
Route::get('/details/{ID}', [DetailsController::class, 'details'])->name('details');
Route::get('/bookings/create/{ID}', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/submit-booking', [BookingController::class, 'store'])->name('bookings.store');

//หน้า Borrow
Route::get('/borrow', [BookController::class, 'book'])->name('book');
//Route::get('/',[BookController::class,'book'])->name('book');
Route::get('/detailsborrow/{id}', [DetailsBorrowController::class, 'detailsborrow'])->name('detailsborrow');
//Route::get('/',[BorrowController::class,'borrow'])->name('borrow.action');
Route::get('/booK/confirm/{ID}', [BorrowController::class, 'confirm'])->name('borrow.confirm');
Route::post('/submit-borrow', [BorrowController::class, 'stores'])->name('borrow.stores');

//หน้า Employee
Route::get('/employee', [EmployeeController::class, 'employee'])->name('employee');


//Frame
Route::get('/books/{ID}', [BookController::class, 'show'])->name('books.show');

Route::get('/return-books', [BorrowController::class, 'returnBooks'])->name('books.return');


Route::post('/borrows', [BorrowController::class, 'store'])->name('borrows.store');
Route::post('/borrows/check', [BorrowController::class, 'check'])->name('borrows.check');
Route::get('/borrows/member/{member_id}/returns', [BorrowController::class, 'getMemberReturns']);
Route::post('/confirm-return', [BorrowController::class, 'confirmReturn'])->name('confirmReturn');
Route::get('/search', [BookController::class, 'search'])->name('books.search');

Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members', [MemberController::class, 'store'])->name('members.store');
Route::get('/members/success', [MemberController::class, 'success'])->name('members.success');
