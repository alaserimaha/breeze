<td>
    <a href="{{ route('users.edit', $id) }}" class="btn btn-sm btn-icon item-edit"><i
            class="text-primary ti ti-pencil"></i></a>
    <a class="btn btn-sm btn-icon item-edit" data-bs-target="#delete_modal" data-bs-toggle="modal"
        data-id="{{ $id }}" data-name="{{ $name }}">
        <i class="text-danger ti ti-trash"></i> </a>
</td>
