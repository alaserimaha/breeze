@extends('layouts.master')

@section('title', __('تعديل صلاحية ') . ucfirst($role->name))
@section('head')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet"
    href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-semibold mb-4">{{ __('تعديل صلاحية ') . ucfirst($role->name) }}</h4>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard.index') }}">{{ __('لوحة التحكم') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('roles.index') }}">{{ __('إدارة المستخدمين') }}</a>
            </li>
            <li class="breadcrumb-item active">{{ ucfirst($role->name) }}</li>
        </ol>
    </nav>
    @include('layouts.alert')
    <div class="card mb-4">
        <h5 class="card-header">تعديل الصلاحية</h5>
        <div class="card-body">

            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                @method('patch')
                @csrf

                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="role_name" class="form-label">{{ __('اسم الصلاحية بالعربي') }}</label>
                        <input value="{{ old('role_name') == null ? $role->role_name : old('role_name') }}" type="text"
                            class="form-control @error('role_name') is-invalid @enderror" name="role_name">
                        @error('role_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="name" class="form-label">{{ __('اسم الصلاحية بالإنجليزية') }}</label>
                        <input value="{{ old('name') == null ? $role->name : old('name') }}" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <livewire:superadmin.permissions.edit-permissions :arr="$arr" :rolePermissions="$rolePermissions" />
                </div>

                <button type="submit" class="btn btn-primary me-2">{{ __('حفظ التعديلات') }}</button>
                <button type="reset" class="btn btn-label-secondary">{{ __('إلغاء') }}</button>
                {{-- <a href="{{ route('roles.index') }}" class="btn btn-label-secondary">{{ __('العودة') }}</a> --}}


            </form>
        </div>
    </div>
</div>
{{-- <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('تعديل صلاحية ') . ucfirst($role->name)
                            }}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('لوحة
                                        التحكم') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('ادارة
                                        الصلاحيات') }}</a>
                                </li>
                                <li class="breadcrumb-item">{{ __('تعديل صلاحية ') . ucfirst($role->name) }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            @include('layouts.alert')
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header card-header-success colored"
                                style="margin-left: 0px;margin-right: 0px;">
                                <h3 class="card-title-colored">{{ __('تعديل صلاحية ') . ucfirst($role->name) }}</h3>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="{{ route('roles.update', $role->id) }}">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="role_name" class="form-label">{{ __('اسم الصلاحية بالعربي')
                                                }}</label>
                                            <input
                                                value="{{ old('role_name') == null ? $role->role_name : old('role_name') }}"
                                                type="text"
                                                class="form-control @error('role_name') is-invalid @enderror"
                                                name="role_name">
                                            @error('role_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="name" class="form-label">{{ __('اسم الصلاحية بالإنقليزي')
                                                }}</label>
                                            <input value="{{ old('name') == null ? $role->name : old('name') }}"
                                                type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <label for="permissions" class="form-label">{{ __('اسناد الأذونات') }}</label>

                                    <table class="table table-hover" id="example1">
                                        <thead>
                                            <th scope="col" width="1%"><input type="checkbox" name="all_permission">
                                            </th>
                                            <th scope="col" width="20%">{{ __('الاسم') }}</th>
                                            <th scope="col" width="1%">{{ __('وضع الحماية') }}</th>
                                        </thead>

                                        @foreach ($permissions as $permission)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="permission[{{ $permission->name }}]"
                                                    value="{{ $permission->name }}" class='permission' {{
                                                    in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                                            </td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->guard_name }}</td>
                                        </tr>
                                        @endforeach
                                    </table>

                                    <button type="submit" class="btn btn-primary">{{ __('حفظ التعديلات') }}</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-warning">{{ __('العودة') }}</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div> --}}
@endsection


@section('scripts')
<script>
    var oTable = $(".datatables-basic").DataTable({

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
                    // For Checkboxes
                    targets: 0,
                    orderable: false,
                    searchable: false,
                    responsivePriority: 1,
                    checkboxes: true,
                    render: function() {
                        return '<input type="checkbox" class="dt-checkboxes form-check-input">';
                    },
                    checkboxes: {
                        selectAllRender: '<input type="checkbox" class="form-check-input">'
                    }
                },
                {
                    className: 'dt-right',
                    targets: '_all'
                }
            ],

        });
</script>
{{-- <script type="text/javascript">
    $(document).ready(function() {
            var oTable = $(".table").dataTable({
                // "stateSave": true,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "aaSorting": [
                    [1, "asc"]
                ],
                "pageLength": 50,
                "lengthMenu": [
                    [50, 100, -1],
                    [50, 100, "All"]
                ],

                "language": {
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": " لم يعثر على أية سجلات | يرجى كتابة الامر التالي php artisan permission:create-permission-routes ",
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
                    "buttons": {
                        "excel": "تصدير إكسل",
                        "print": "طباعة",
                    },
                },

                "columnDefs": [{
                    "bSortable": false,
                    "aTargets": [0]
                }],

                dom: 'Blfrtip',
                buttons: [
                    'excelHtml5',
                    'print',
                ],
            });

            var allPages = oTable.fnGetNodes();

            $('[name="all_permission"]').on('click', function() {
                if ($(this).hasClass('allChecked')) {
                    $('input[type="checkbox"]', allPages).prop('checked', false);
                } else {
                    $('input[type="checkbox"]', allPages).prop('checked', true);
                }
                $(this).toggleClass('allChecked');
            })

            // $('[name="all_permission"]').on('click', function() {
            //     if ($(this).is( ":checked" )) {
            //         DT1.rows(  ).select();        
            //     } else {
            //         DT1.rows(  ).deselect(); 
            //     }
            //     if($(this).is(':checked')) {
            //         $.each($('.permission'), function() {
            //             $(this).prop('checked',true);
            //         });
            //     } else {
            //         $.each($('.permission'), function() {
            //             $(this).prop('checked',false);
            //         });
            //     }

            // });
        });
</script> --}}
@endsection