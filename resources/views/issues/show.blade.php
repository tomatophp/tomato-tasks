<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{__('Issue')}} #{{$model->id}}">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

          <x-tomato-admin-row :label="__('Reporter')" :value="$model->reporter?->name" type="text" />

          <x-tomato-admin-row :label="__('Project')" :value="$model->project?->name" type="text" />

          <x-tomato-admin-row :label="__('Account')" :value="$model->account?->name" type="text" />

          <x-tomato-admin-row :label="__('Closed by')" :value="$model->closedBy?->name" type="text" />


          <x-tomato-admin-row :label="__('Sprint')" :value="$model->Sprint->name" type="text" />


          <x-tomato-admin-row :label="__('Type')" :value="$model->type" type="string" />

          <x-tomato-admin-row :label="__('Status')" :value="$model->status" type="string" />

          <x-tomato-admin-row :label="__('Priority')" :value="$model->priority" type="string" />

          <x-tomato-admin-row :label="__('Summary')" :value="$model->summary" type="string" />

          <x-tomato-admin-row :label="__('Description')" :value="$model->description" type="rich" />

          <x-tomato-admin-row :label="__('Points')" :value="$model->points" type="number" />

          <x-tomato-admin-row :label="__('Icon')" :value="$model->icon" type="icon" />

          <x-tomato-admin-row :label="__('Color')" :value="$model->color" type="color" />

          <x-tomato-admin-row :label="__('Order')" :value="$model->order" type="number" />

          <x-tomato-admin-row :label="__('Is closed')" :value="$model->is_closed" type="bool" />

    </div>
    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('Edit')}}" :href="route('admin.issues.edit', $model->id)"/>
        <x-tomato-admin-button danger :href="route('admin.issues.destroy', $model->id)"
                               confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                               confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                               confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                               cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                               method="delete"  label="{{__('Delete')}}" />
        <x-tomato-admin-button secondary :href="route('admin.issues.index')" label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
