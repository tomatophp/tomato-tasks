<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Issue')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.issues.update', $model->id)}}" method="post" :default="$model">
        
          <x-splade-select :label="__('Reporter id')" :placeholder="__('Reporter id')" name="reporter_id" remote-url="/admin/users/api" remote-root="data" option-label="name" option-value="id" choices/>
          <x-splade-select :label="__('Project id')" :placeholder="__('Project id')" name="project_id" remote-url="/admin/projects/api" remote-root="data" option-label="name" option-value="id" choices/>
          <x-splade-select :label="__('Account id')" :placeholder="__('Account id')" name="account_id" remote-url="/admin/accounts/api" remote-root="data" option-label="name" option-value="id" choices/>
          <x-splade-select :label="__('Closed by id')" :placeholder="__('Closed by id')" name="closed_by_id" remote-url="/admin/users/api" remote-root="data" option-label="name" option-value="id" choices/>
          
          <x-splade-select :label="__('Sprint id')" :placeholder="__('Sprint id')" name="sprint_id" remote-url="/admin/sprints/api" remote-root="data" option-label="name" option-value="id" choices/>
          
          <x-splade-input :label="__('Type')" name="type" type="text"  :placeholder="__('Type')" />
          <x-splade-input :label="__('Status')" name="status" type="text"  :placeholder="__('Status')" />
          <x-splade-input :label="__('Priority')" name="priority" type="text"  :placeholder="__('Priority')" />
          <x-splade-input :label="__('Summary')" name="summary" type="text"  :placeholder="__('Summary')" />
          <x-tomato-admin-rich :label="__('Description')" name="description" :placeholder="__('Description')" autosize />
          <x-splade-input :label="__('Points')" :placeholder="__('Points')" type='number' name="points" />
          <x-splade-input :label="__('Icon')" name="icon" type="icon"  :placeholder="__('Icon')" />
          <x-tomato-admin-color :label="__('Color')" :placeholder="__('Color')" type='number' name="color" />
          <x-splade-input :label="__('Order')" :placeholder="__('Order')" type='number' name="order" />
          <x-splade-checkbox :label="__('Is closed')" name="is_closed" label="Is closed" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button danger :href="route('admin.issues.destroy', $model->id)"
                                   confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                   confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                   confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                   cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                   method="delete"  label="{{__('Delete')}}" />
            <x-tomato-admin-button secondary :href="route('admin.issues.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
