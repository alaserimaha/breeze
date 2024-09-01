<div>
    <div class="table-responsive">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td class="text-nowrap fw-semibold">
                        صلاحية المسؤول
                        <i class="ti ti-info-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="يسمح بالوصول الكامل إلى النظام"></i>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="selectAll"  wire:change="selectAll($event.target.checked)">
                            <label class="form-check-label" for="selectAll"> تحديد الكل </label>
                        </div>
                    </td>
                </tr>

                @foreach ($arr as $key => $item)
                    <tr>
                        <td class="text-nowrap fw-semibold">{{ $key }}</td>
                        @if (count($item) >= 1)
                            @foreach ($item as $value)
                            {{-- @php echo '<pre>'; print_r($value); echo '</pre>'; @endphp --}}
                
                                <td>
                                    <div class="d-flex">

                                        <div class="form-check me-3 me-lg-5">
                                            <input class="form-check-input checkbox"
                                                name="permission[{{ $value['name'] }}]"
                                                value="{{ $value['name'] }}" type="checkbox"
                                                id="{{ $value['name'] }}" @if(!empty($selectedRolePermissions) && in_array($value['id'], $selectedRolePermissions)) checked @elseif(in_array($value['id'], $rolePermissions)) checked @endif wire:change="selectItem({{ $value['id'] }}, $event.target.checked)">
                                            <label class="form-check-label"
                                                for="{{ $value['name'] }}">
                                                {{ $value['na'] }}
                                            </label>
                                        </div>

                                    </div>
                                </td>
                            @endforeach
                        @else
                            <td>
                                <div class="form-check me-3 me-lg-5">
                                    <input name="permission[{{ $item[0]['name'] }}]"
                                        value="{{ $item[0]['name'] }}"
                                        class="form-check-input checkbox" type="checkbox" />
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
