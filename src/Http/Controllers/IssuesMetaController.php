<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;

class IssuesMetaController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \App\Models\IssuesMeta::class;
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
            view: 'admin.issues-metas.index',
            table: \App\Tables\IssuesMetaTable::class
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
            model: \App\Models\IssuesMeta::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'admin.issues-metas.create',
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
            model: \App\Models\IssuesMeta::class,
            validation: [
                            'issue_id' => 'required|exists:issues,id',
            'user_id' => 'nullable|exists:users,id',
            'linked_id' => 'nullable|exists:issues,id',
            'model' => 'nullable|max:255|string',
            'model_id' => 'nullable',
            'key' => 'required|max:255|string',
            'value' => 'nullable',
            'type' => 'nullable|max:255|string',
            'group' => 'nullable|max:255|string'
            ],
            message: __('IssuesMeta updated successfully'),
            redirect: 'admin.issues-metas.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * @param \App\Models\IssuesMeta $model
     * @return View|JsonResponse
     */
    public function show(\App\Models\IssuesMeta $model): View|JsonResponse
    {
        return Tomato::get(
            model: $model,
            view: 'admin.issues-metas.show',
        );
    }

    /**
     * @param \App\Models\IssuesMeta $model
     * @return View
     */
    public function edit(\App\Models\IssuesMeta $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'admin.issues-metas.edit',
        );
    }

    /**
     * @param Request $request
     * @param \App\Models\IssuesMeta $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \App\Models\IssuesMeta $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                            'issue_id' => 'sometimes|exists:issues,id',
            'user_id' => 'nullable|exists:users,id',
            'linked_id' => 'nullable|exists:issues,id',
            'model' => 'nullable|max:255|string',
            'model_id' => 'nullable',
            'key' => 'sometimes|max:255|string',
            'value' => 'nullable',
            'type' => 'nullable|max:255|string',
            'group' => 'nullable|max:255|string'
            ],
            message: __('IssuesMeta updated successfully'),
            redirect: 'admin.issues-metas.index',
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \App\Models\IssuesMeta $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\App\Models\IssuesMeta $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('IssuesMeta deleted successfully'),
            redirect: 'admin.issues-metas.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }
}
