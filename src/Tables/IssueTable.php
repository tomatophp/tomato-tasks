<?php

namespace App\Tables;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;
use Illuminate\Database\Eloquent\Builder;

class IssueTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(public mixed $query=null)
    {
        if(!$query){
            $this->query = \App\Models\Issue::query();
        }
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return $this->query;
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(
                label: trans('tomato-admin::global.search'),
                columns: ['id',]
            )
            ->bulkAction(
                label: trans('tomato-admin::global.crud.delete'),
                each: fn (\App\Models\Issue $model) => $model->delete(),
                after: fn () => Toast::danger(__('Issue Has Been Deleted'))->autoDismiss(2),
                confirm: true
            )
            ->defaultSort('id', 'desc')
            ->column(
                key: 'id',
                label: __('Id'),
                sortable: true
            )
            ->column(
                key: 'reporter_id',
                label: __('Reporter id'),
                sortable: true
            )
            ->column(
                key: 'project_id',
                label: __('Project id'),
                sortable: true
            )
            ->column(
                key: 'account_id',
                label: __('Account id'),
                sortable: true
            )
            ->column(
                key: 'closed_by_id',
                label: __('Closed by id'),
                sortable: true
            )
            ->column(
                key: 'last_update_by',
                label: __('Last update by'),
                sortable: true
            )
            ->column(
                key: 'sprint_id',
                label: __('Sprint id'),
                sortable: true
            )
            ->column(
                key: 'parent_id',
                label: __('Parent id'),
                sortable: true
            )
            ->column(
                key: 'type',
                label: __('Type'),
                sortable: true
            )
            ->column(
                key: 'status',
                label: __('Status'),
                sortable: true
            )
            ->column(
                key: 'priority',
                label: __('Priority'),
                sortable: true
            )
            ->column(
                key: 'summary',
                label: __('Summary'),
                sortable: true
            )
            ->column(
                key: 'description',
                label: __('Description'),
                sortable: true
            )
            ->column(
                key: 'points',
                label: __('Points'),
                sortable: true
            )
            ->column(
                key: 'icon',
                label: __('Icon'),
                sortable: true
            )
            ->column(
                key: 'color',
                label: __('Color'),
                sortable: true
            )
            ->column(
                key: 'order',
                label: __('Order'),
                sortable: true
            )
            ->column(
                key: 'is_closed',
                label: __('Is closed'),
                sortable: true
            )
            ->column(key: 'actions',label: trans('tomato-admin::global.crud.actions'))
            ->export()
            ->paginate(10);
    }
}
