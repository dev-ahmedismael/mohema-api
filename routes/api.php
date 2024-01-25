<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyGoalController;
use App\Http\Controllers\PendingUserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectDocumentController;
use App\Http\Controllers\ProjectGoalController;
use App\Http\Controllers\ProjectUserController;
use App\Http\Controllers\ReqController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskDocumentController;
use App\Http\Controllers\TaskGoalController;
use App\Http\Controllers\UserController;
use App\Models\PendingUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {
});
// Users Register & Login
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('login', [AuthController::class, 'login']);
// Users
Route::get('users', [UserController::class, 'index']);
Route::get('company-users/{id}', [UserController::class, 'company_users']);
Route::get('user-tasks/{id}', [UserController::class, 'get_user_tasks']);
Route::post('users', [UserController::class, 'store']);
Route::get('usersss', [UserController::class, 'create']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

// Company
Route::post('company', [CompanyController::class, 'store']);
Route::get('company/{id}', [CompanyController::class, 'show']);

// Pending user
Route::get('pending-user', [PendingUserController::class, 'index']);
Route::post('pending-user', [PendingUserController::class, 'store']);
Route::get('pending-user/{email}', [PendingUserController::class, 'show']);
Route::delete('pending-user/{id}', [PendingUserController::class, 'destroy']);

// Company goals
Route::get('company-goals', [CompanyGoalController::class, 'index']);
Route::post('company-goals', [CompanyGoalController::class, 'store']);
Route::get('company-goals/{id}', [CompanyGoalController::class, 'show']);
Route::delete('company-goals/{id}', [CompanyGoalController::class, 'destroy']);

// Projects
Route::get('project', [ProjectController::class, 'index']);
Route::post('project', [ProjectController::class, 'store']);
Route::post('project/{id}', [ProjectController::class, 'update']);
Route::get('project/{id}', [ProjectController::class, 'show']);
Route::get('company-projects/{id}', [ProjectController::class, 'show_company_projects']);
Route::delete('project/{id}', [ProjectController::class, 'destroy']);
Route::get('project-user/{id}', [ProjectController::class, 'get_project_user']);
Route::post('project-user/{id}', [ProjectController::class, 'store_project']);

// Project Documents
Route::get('project-document', [ProjectDocumentController::class, 'index']);
Route::post('project-document', [ProjectDocumentController::class, 'store']);
Route::post('project-document/{id}', [ProjectDocumentController::class, 'update']);
Route::get('project-document/{id}', [ProjectDocumentController::class, 'show']);
Route::get('project-documents/{id}', [ProjectDocumentController::class, 'show_project_documents']);
Route::delete('project-document/{id}', [ProjectDocumentController::class, 'destroy']);

// Project Goal
Route::get('project-goal', [ProjectGoalController::class, 'index']);
Route::post('project-goal', [ProjectGoalController::class, 'store']);
Route::post('project-goal/{id}', [ProjectGoalController::class, 'update']);
Route::get('project-goal/{id}', [ProjectGoalController::class, 'show']);
Route::delete('project-goal/{id}', [ProjectGoalController::class, 'destroy']);

// Tasks
Route::get('task', [TaskController::class, 'index']);
Route::post('task', [TaskController::class, 'store']);
Route::post('task/{id}', [TaskController::class, 'update']);
Route::get('task/{id}', [TaskController::class, 'show']);
Route::get('project-tasks/{id}', [TaskController::class, 'show_project_tasks']);
Route::delete('task/{id}', [TaskController::class, 'destroy']);
Route::get('tasks-chart-data/{id}', [TaskController::class, 'tasks_chart_data']);
Route::get('task-user/{id}', [TaskController::class, 'get_task_user']);
Route::post('task-user/{id}', [TaskController::class, 'store_task_user']);

// Task Documents
Route::get('task-document', [TaskDocumentController::class, 'index']);
Route::post('task-document', [TaskDocumentController::class, 'store']);
Route::post('task-document/{id}', [TaskDocumentController::class, 'update']);
Route::get('task-document/{id}', [TaskDocumentController::class, 'show']);
Route::get('task-documents/{id}', [TaskDocumentController::class, 'show_task_documents']);
Route::delete('task-document/{id}', [TaskDocumentController::class, 'destroy']);

// Task Goal
Route::get('task-goal', [TaskGoalController::class, 'index']);
Route::post('task-goal', [TaskGoalController::class, 'store']);
Route::post('task-goal/{id}', [TaskGoalController::class, 'update']);
Route::get('task-goal/{id}', [TaskGoalController::class, 'show']);
Route::get('task-goals/{id}', [TaskGoalController::class, 'show_task_goals']);
Route::delete('task-goal/{id}', [TaskGoalController::class, 'destroy']);

// Request
Route::get('request/{id}', [ReqController::class, 'index']);
Route::post('request', [ReqController::class, 'store']);
Route::post('request/{id}', [ReqController::class, 'update']);
Route::post('out-request/{id}', [ReqController::class, 'out_request']);
Route::post('in-request/{id}', [ReqController::class, 'in_request']);
Route::delete('request/{id}', [ReqController::class, 'destroy']);

// Resources
Route::get('resources/{id}', [ResourceController::class, 'index']);
Route::post('resources', [ResourceController::class, 'store']);
Route::put('resources/{id}', [ResourceController::class, 'update']);
Route::delete('resources/{id}', [ResourceController::class, 'destroy']);
Route::get('resources-chart-data/{id}', [ResourceController::class, 'resources_chart_data']);
