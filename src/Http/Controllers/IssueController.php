<?php

namespace TomatoPHP\TomatoTasks\Http\Controllers;

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
        $this->model = \TomatoPHP\TomatoTasks\Models\Issue::class;
    }

    /**
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        $query = $this->model::query();
        if($request->has('parent_id')){
            $query->where('parent_id', $request->parent_id);
        }
        else {
            $query->whereNull('parent_id');
        }
        if($request->has('sprint_id')){
            $query->where('sprint_id', $request->sprint_id);
        }
        return Tomato::index(
            request: $request,
            model: $this->model,
            view: 'tomato-tasks::issues.index',
            table: \TomatoPHP\TomatoTasks\Tables\IssueTable::class,
            query: $query
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
            model: \TomatoPHP\TomatoTasks\Models\Issue::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-tasks::issues.create',
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $request->merge([
           "reporter_id" => auth('web')->user()->id,
        ]);

        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoTasks\Models\Issue::class,
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

        return back();
    }

    /**
     * @param \TomatoPHP\TomatoTasks\Models\Issue $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoTasks\Models\Issue $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-tasks::issues.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoTasks\Models\Issue $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoTasks\Models\Issue $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-tasks::issues.edit',
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoTasks\Models\Issue $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoTasks\Models\Issue $model): RedirectResponse|JsonResponse
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
     * @param \TomatoPHP\TomatoTasks\Models\Issue $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoTasks\Models\Issue $model): RedirectResponse|JsonResponse
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
