<?php

namespace TomatoPHP\TomatoTasks\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class SprintController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoTasks\Models\Sprint::class;
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
            view: 'tomato-tasks::sprints.index',
            table: \TomatoPHP\TomatoTasks\Tables\SprintTable::class
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
            model: \TomatoPHP\TomatoTasks\Models\Sprint::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-tasks::sprints.create',
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
            model: \TomatoPHP\TomatoTasks\Models\Sprint::class,
            validation: [
                'project_id' => 'required|exists:projects,id',
                'created_by' => 'required',
                'name' => 'required|max:255|string',
                'description' => 'nullable|max:65535',
                'status' => 'nullable|max:255|string',
                'icon' => 'nullable|max:255',
                'color' => 'nullable|max:255',
                'start_date' => 'nullable',
                'end_date' => 'nullable'
            ],
            message: __('Sprint updated successfully'),
            redirect: 'admin.sprints.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoTasks\Models\Sprint $model
     * @return View|JsonResponse
     */
    public function show(\TomatoPHP\TomatoTasks\Models\Sprint $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-tasks::sprints.show',
        );
    }

    /**
     * @param \TomatoPHP\TomatoTasks\Models\Sprint $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoTasks\Models\Sprint $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-tasks::sprints.edit',
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoTasks\Models\Sprint $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoTasks\Models\Sprint $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'project_id' => 'sometimes|exists:projects,id',
                'created_by' => 'sometimes',
                'name' => 'sometimes|max:255|string',
                'description' => 'nullable|max:65535',
                'status' => 'nullable|max:255|string',
                'icon' => 'nullable|max:255',
                'color' => 'nullable|max:255',
                'start_date' => 'nullable',
                'end_date' => 'nullable'
            ],
            message: __('Sprint updated successfully'),
            redirect: 'admin.sprints.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoTasks\Models\Sprint $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoTasks\Models\Sprint $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Sprint deleted successfully'),
            redirect: 'admin.sprints.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
