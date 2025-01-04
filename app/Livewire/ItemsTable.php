<?php

namespace App\Livewire;

use App\Http\Controllers\ItemController;
use App\Models\Item;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Blade;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class ItemsTable extends PowerGridComponent
{

    use WithExport;

    public string $tableName = 'items-table-kuzfgo-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),

            PowerGrid::exportable('items-export')
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV)
        ];
    }

    public function datasource(): Builder
    {
        return Item::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('code')
            ->add('name')
            ->add('html_is_active', function ($row) {
                return Blade::render(<<<blade
                    <div class="cursor-pointer" x-data="{rowId: $row->id}">
                        @if($row->is_active)
                            <span class="badge bg-green-600 text-white" wire:click="toggle(rowId)">Active</span>
                        @else
                            <span class="badge bg-red-600 text-white" wire:click="toggle(rowId)">Inactive</span>
                        @endif
                    </div>
                blade);
            })
            ->add('raw_is_active', function ($row) {
                return Blade::render(<<<blade
                    @if($row->is_active)
                        Active
                    @else
                        Inactive
                    @endif
                blade);
            })
            ->add('html_value', function ($row) {
                return Blade::render(<<<blade
                    <span class="font-semibold">$row->value</span>
                blade);
            })
            ->add('raw_value', function ($row) {
                return Blade::render(<<<blade
                    $row->value
                blade);
            })
            ->add('html_created_at', function ($row) {
                return Blade::render(<<<blade
                    $row->human_created_at
                blade);
            })
            ->add('raw_created_at', function ($row) {
                return Blade::render(<<<blade
                    $row->created_at
                blade);
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->visibleInExport(true),

            Column::make('Code', 'code')
                ->visibleInExport(true)
                ->sortable()
                ->searchable(),

            Column::make('Name', 'name')
                ->visibleInExport(true)
                ->sortable()
                ->searchable(),

            Column::make('Is active', 'html_is_active', 'is_active')
                ->visibleInExport(false)
                ->sortable(),
                // ->toggleable(trueLabel: 'Yes', falseLabel: 'No'),
            Column::make('Is active', 'raw_is_active', 'is_active')
                ->visibleInExport(true)
                ->hidden(),

            Column::make('Value', 'html_value', 'value')
                ->visibleInExport(false)
                ->sortable()
                ->searchable()
                ->editOnClick(),
            Column::make('Value', 'raw_value', 'value')
                ->visibleInExport(true)
                ->hidden(),

            Column::make('Created at', 'html_created_at', 'created_at')
                ->visibleInExport(false)
                ->sortable(),
            Column::make('Created at', 'raw_created_at', 'created_at')
                ->visibleInExport(true)
                ->hidden(),

            Column::action('Action')
                ->visibleInExport(false)
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('code'),
            Filter::boolean('is_active')->label("Active", "Inactive"),
            Filter::number('value'),
            Filter::datetimepicker('created_at')
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        // $this->js('alert('.$rowId.')');
        redirect(route('items.edit', $rowId));
    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($rowId): void
    {
        try {
            app(ItemController::class)->destroy(Item::findOrFail($rowId));
        } catch (\Exception $e) {
            $this->js('alert(`'.str_replace('`', '\`', $e->getMessage()).'`)');
        }
    }

    public function toggle($rowId): void
    {
        try {
            $item = Item::findOrFail($rowId);
            $item->update(['is_active' => !$item->is_active]);
        } catch (\Exception $e) {
            $this->js('alert(`'.str_replace('`', '\`', $e->getMessage()).'`)');
        }
    }

    public function onUpdatedEditable(string|int $id, string $field, string $value): void
    {
        try {
            Item::findOrFail($id)->update([$field => e($value)]);
        } catch (\Exception $e) {
            $this->js('alert(`'.str_replace('`', '\`', $e->getMessage()).'`)');
        }
    }

    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        try {
            Item::findOrFail($id)->update([$field => e($value)]);
        } catch (\Exception $e) {
            $this->js('alert(`'.str_replace('`', '\`', $e->getMessage()).'`)');
        }
    }

    public function actions(Item $row): array
    {
        return [
            Button::add('edit')
                ->slot(Blade::render(<<<blade
                   <i class="fa-solid fa-pencil text-lg"></i>
                blade))
                ->id()
                ->class('text-yellow-500')
                ->tooltip("Edit")
                ->dispatch('edit', ['rowId' => $row->id]),
            Button::add('delete')
                ->slot(Blade::render(<<<blade
                    <i class="fa-solid fa-trash-can text-lg"></i>
                blade))
                ->id()
                ->class('text-red-600')
                ->confirm("Are you sure?")
                ->tooltip("Delete")
                ->dispatch('delete', ['rowId' => $row->id]),
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
