@extends('layouts.master')

@section('title', __('إدارة الصلاحيات'))
@section('head')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet"
    href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
@endsection
@section('content')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-semibold mb-4">{{ __('الصلاحيات') }}</h4>
    @include('layouts.alert')
    <!-- Role cards -->
    <div class="row g-4">
        @foreach ($roles as $key => $role)
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-normal mb-2">إجمالي {{ count($role->users) }} مستخدمين</h6>
                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            @foreach ($role->users as $user)
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                title="{{ $user->name }}" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle"
                                    src="https://itcsvc.kku.edu.sa/KKU_MyKkuWS/UserImage?nickname={{ $user->username }}"
                                    alt="Avatar" />
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-1">
                        <div class="role-heading">
                            <h4 class="mb-1">{{ $role->role_name }}</h4>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                                class="role-edit-modal"><span>{{ __('تعديل الصلاحية') }}</span></a>
                        </div>
                        <a href="javascript:void(0);" class="text-muted"><i class="ti ti-copy ti-md"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="row h-100">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                            <img src="../../assets/img/illustrations/add-new-roles.png"
                                class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <button data-bs-target="#add_role_modal" data-bs-toggle="modal"
                                class="btn btn-primary mb-2 text-nowrap add-new-role">
                                {{ __('اضافة صلاحية جديدة') }}
                            </button>
                            <p class="mb-0 mt-1">أضف صلاحية جديدة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="pt-5"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard.index') }}">{{ __('لوحة التحكم') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0);">{{ __('إدارة الصلاحيات') }}</a>
            </li>
            <li class="breadcrumb-item active">{{ __('قائمة الصلاحيات') }}</li>
        </ol>
    </nav>
    <!--/ Role cards -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table">
                <thead>
                    <tr>
                        <th width="1%">{{ __('الرقم') }}</th>
                        <th>{{ __('اسم الصلاحية بالعربي') }}</th>
                        <th>{{ __('اسم الصلاحية بالإنقليزي') }}</th>
                        <th>{{ __('الإجراء') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->role_name }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-icon item-edit"><i
                                    class="text-primary ti ti-eye"></i></a>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-icon item-edit"><i
                                    class="text-primary ti ti-pencil"></i></a>
                            <a data-toggle="modal" data-target="#delete_modal" data-id="{{ $role->id }}"
                                data-name="{{ $role->name }}" data-role_name="{{ $role->role_name }}"
                                class="btn btn-sm btn-icon item-edit"><i class="text-danger ti ti-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Add Role Modal -->
    <div class="modal fade" id="add_role_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">{{ __('اضافة صلاحية جديدة') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="role_name" class="form-label">{{ __('اسم الصلاحية بالعربي') }}</label>
                                <input value="{{ old('role_name') }}" type="text"
                                    class="form-control @error('role_name') is-invalid @enderror" name="role_name"
                                    placeholder="مدير النظام">
                                @error('role_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="name" class="form-label">{{ __('اسم الصلاحية بالإنجليزية') }}</label>
                                <input value="{{ old('name') }}" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="administrator">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            @include('superadmin.roles._permissions')
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        {{ __('اغلاق') }}
                    </button>
                    <button type="submit" class="btn btn-primary">{{ __('حفظ التغييرات') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--/ Add Role Modal -->
</div>
<!--/ Content -->

@endsection


@section('scripts')

<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script>
    $(".datatables-basic").DataTable({

            responsive: true,
            language: {
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                },

            },
            dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            buttons: [{
                    extend: 'collection',
                    className: 'btn btn-label-primary dropdown-toggle me-2',
                    text: '<i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">تصدير</span>',
                    buttons: [{
                            extend: 'print',
                            text: '<i class="ti ti-printer me-1" ></i>طباعة',
                            className: 'dropdown-item',
                            customize: function(win) {
                                //customize print view for dark
                                $(win.document.body)
                                    .css('color', config.colors.headingColor)
                                    .css('border-color', config.colors.borderColor)
                                    .css('background-color', config.colors.bodyBg);
                                $(win.document.body)
                                    .find('table')
                                    .addClass('compact')
                                    .css('color', 'inherit')
                                    .css('border-color', 'inherit')
                                    .css('background-color', 'inherit');
                            }
                        },
                        {
                            extend: 'csv',
                            text: '<i class="ti ti-file-text me-1" ></i>تصدير CSV',
                            className: 'dropdown-item',
                        },
                        {
                            extend: 'excel',
                            text: '<i class="ti ti-file-spreadsheet me-1"></i>تصدير إكسل',
                            className: 'dropdown-item',
                        },
                        {
                            extend: 'copy',
                            text: '<i class="ti ti-copy me-1" ></i>نسخ الجدول',
                            className: 'dropdown-item',
                        }
                    ]
                }

            ],
            columnDefs: [{
                className: 'dt-right',
                targets: '_all'
            }],

        });
</script>
@endsection