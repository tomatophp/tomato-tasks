<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class IssuesUserLogController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \App\Models\IssuesUserLog::class;
    }

    /**
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        return Tomato::index(
            request: $request,
            model: $this->model,
            view: 'admin.issues-user-logs.index',
            table: \App\Tables\IssuesUserLogTable::class
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {
        return Tomato::json(
            request: $request,
            model: \App\Models\IssuesUserLog::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'admin.issues-user-logs.create',
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \App\Models\IssuesUserLog::class,
            validation: [
                            'user_id' => 'required|exists:users,id',
            'model_type' => 'nullable|max:255|string',
            'model_id' => 'nullable',
            'status' => 'nullable|max:255|string',
            'action' => 'nullable|max:255|string',
            'description' => 'nullable',
            'data' => 'nullable'
            ],
            message: __('IssuesUserLog updated successfully'),
            redirect: 'admin.issues-user-logs.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \App\Models\IssuesUserLog $model
     * @return View|JsonResponse
     */
    public function show(\App\Models\IssuesUserLog $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'admin.issues-user-logs.show',
        );
    }

    /**
     * @param \App\Models\IssuesUserLog $model
     * @return View
     */
    public function edit(\App\Models\IssuesUserLog $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'admin.issues-user-logs.edit',
        );
    }

    /**
     * @param Request $request
     * @param \App\Models\IssuesUserLog $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \App\Models\IssuesUserLog $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                            'user_id' => 'sometimes|exists:users,id',
            'model_type' => 'nullable|max:255|string',
            'model_id' => 'nullable',
            'status' => 'nullable|max:255|string',
            'action' => 'nullable|max:255|string',
            'description' => 'nullable',
            'data' => 'nullable'
            ],
            message: __('IssuesUserLog updated successfully'),
            redirect: 'admin.issues-user-logs.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \App\Models\IssuesUserLog $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\App\Models\IssuesUserLog $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('IssuesUserLog deleted successfully'),
            redirect: 'admin.issues-user-logs.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
