<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('IssuesMeta')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.issues-metas.update', $model->id)}}" method="post" :default="$model">
        
          <x-splade-select :label="__('Issue id')" :placeholder="__('Issue id')" name="issue_id" remote-url="/admin/issues/api" remote-root="data" option-label="name" option-value="id" choices/>
          <x-splade-select :label="__('User id')" :placeholder="__('User id')" name="user_id" remote-url="/admin/users/api" remote-root="data" option-label="name" option-value="id" choices/>
          <x-splade-select :label="__('Linked id')" :placeholder="__('Linked id')" name="linked_id" remote-url="/admin/issues/api" remote-root="data" option-label="name" option-value="id" choices/>
          <x-splade-input :label="__('Model')" name="model" type="text"  :placeholder="__('Model')" />
          
          <x-splade-input :label="__('Key')" name="key" type="text"  :placeholder="__('Key')" />
          
          <x-splade-input :label="__('Type')" name="type" type="text"  :placeholder="__('Type')" />
          <x-splade-input :label="__('Group')" name="group" type="text"  :placeholder="__('Group')" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button danger :href="route('admin.issues-metas.destroy', $model->id)"
                                   confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                   confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                   confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                   cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                   method="delete"  label="{{__('Delete')}}" />
            <x-tomato-admin-button secondary :href="route('admin.issues-metas.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
