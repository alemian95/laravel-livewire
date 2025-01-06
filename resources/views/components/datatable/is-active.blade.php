<div class="cursor-pointer" x-data="{rowId: {{ $row->id }}}">
    @if($row->is_active)
        <span class="badge bg-green-600 text-white" wire:click="toggle(rowId)">Active</span>
    @else
        <span class="badge bg-red-600 text-white" wire:click="toggle(rowId)">Inactive</span>
    @endif
</div>
