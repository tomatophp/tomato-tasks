<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class IssueController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \App\Models\Issue::class;
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
            view: 'admin.issues.index',
            table: \App\Tables\IssueTable::class
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
            model: \App\Models\Issue::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'admin.issues.create',
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
            model: \App\Models\Issue::class,
            validation: [
                            'reporter_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'account_id' => 'nullable|exists:accounts,id',
            'closed_by_id' => 'nullable|exists:users,id',
            'last_update_by' => 'nullable',
            'sprint_id' => 'nullable|exists:sprints,id',
            'parent_id' => 'nullable',
            'type' => 'nullable|max:255|string',
            'status' => 'nullable|max:255|string',
            'priority' => 'nullable|max:255|string',
            'summary' => 'required|max:255|string',
            'description' => 'nullable',
            'points' => 'nullable',
            'icon' => 'nullable|max:255',
            'color' => 'nullable|max:255',
            'order' => 'nullable',
            'is_closed' => 'nullable'
            ],
            message: __('Issue updated successfully'),
            redirect: 'admin.issues.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \App\Models\Issue $model
     * @return View|JsonResponse
     */
    public function show(\App\Models\Issue $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'admin.issues.show',
        );
    }

    /**
     * @param \App\Models\Issue $model
     * @return View
     */
    public function edit(\App\Models\Issue $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'admin.issues.edit',
        );
    }

    /**
     * @param Request $request
     * @param \App\Models\Issue $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \App\Models\Issue $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                            'reporter_id' => 'sometimes|exists:users,id',
            'project_id' => 'sometimes|exists:projects,id',
            'account_id' => 'nullable|exists:accounts,id',
            'closed_by_id' => 'nullable|exists:users,id',
            'last_update_by' => 'nullable',
            'sprint_id' => 'nullable|exists:sprints,id',
            'parent_id' => 'nullable',
            'type' => 'nullable|max:255|string',
            'status' => 'nullable|max:255|string',
            'priority' => 'nullable|max:255|string',
            'summary' => 'sometimes|max:255|string',
            'description' => 'nullable',
            'points' => 'nullable',
            'icon' => 'nullable|max:255',
            'color' => 'nullable|max:255',
            'order' => 'nullable',
            'is_closed' => 'nullable'
            ],
            message: __('Issue updated successfully'),
            redirect: 'admin.issues.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \App\Models\Issue $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\App\Models\Issue $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Issue deleted successfully'),
            redirect: 'admin.issues.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
