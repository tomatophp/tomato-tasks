<x-tomato-admin-layout>
    <x-slot:header>
        {{ __('Issue') }}
    </x-slot:header>
    <x-slot:buttons>
        <x-tomato-admin-button :modal="true" :href="route('admin.issues.create')" type="link">
            {{trans('tomato-admin::global.crud.create-new')}} {{__('Issue')}}
        </x-tomato-admin-button>
    </x-slot:buttons>

    <div class="pb-12">
        <div class="mx-auto">
            <x-splade-table :for="$table" striped>
                <x-splade-cell description>
    <x-tomato-admin-row table :value="$item->description" />
</x-splade-cell>
<x-splade-cell points>
    <x-tomato-admin-row table type="number" :value="$item->points" />
</x-splade-cell>
<x-splade-cell icon>
    <x-tomato-admin-row table type="icon" :value="$item->icon" />
</x-splade-cell>
<x-splade-cell color>
    <x-tomato-admin-row table type="color" :value="$item->color" />
</x-splade-cell>
<x-splade-cell order>
    <x-tomato-admin-row table type="number" :value="$item->order" />
</x-splade-cell>
<x-splade-cell is_closed>
    <x-tomato-admin-row table type="bool" :value="$item->is_closed" />
</x-splade-cell>

                <x-splade-cell actions>
                    <div class="flex justify-start">
                        <x-tomato-admin-button success type="icon" title="{{trans('tomato-admin::global.crud.view')}}" modal :href="route('admin.issues.show', $item->id)">
                            <x-heroicon-s-eye class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button warning type="icon" title="{{trans('tomato-admin::global.crud.edit')}}" modal :href="route('admin.issues.edit', $item->id)">
                            <x-heroicon-s-pencil class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button danger type="icon" title="{{trans('tomato-admin::global.crud.delete')}}" :href="route('admin.issues.destroy', $item->id)"
                           confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                           confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                           confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                           cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                           method="delete"
                        >
                            <x-heroicon-s-trash class="h-6 w-6"/>
                        </x-tomato-admin-button>
                    </div>
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>
</x-tomato-admin-layout>