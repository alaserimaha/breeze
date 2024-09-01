@extends('layouts.master')

@section('title', __('إدارة الأذونات'))
@section('head')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-semibold mb-4">{{ __('قائمة الأذونات') }}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}">{{ __('لوحة التحكم') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">{{ __('إدارة الأذونات') }}</a>
                </li>
                <li class="breadcrumb-item active">{{ __('قائمة الأذونات') }}</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th>{{ __('الاسم') }}</th>
                            <th>{{ __('وضع الحماية') }}</th>
                            <th>{{ __('الإجراء') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>
                                    <a href="{{ route('permissions.edit', $permission->id) }}"
                                        class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>
                                    <a class="btn btn-sm btn-icon item-edit" data-toggle="modal" data-target="#delete_modal"
                                        data-id="{{ $permission->id }}" data-name="{{ $permission->name }}">
                                        <i class="text-danger ti ti-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Dashboard Content ends -->
    </div>


    <!-- Modal -->
    <div class="modal fade text-left" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="delete_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="delete_modal">{{ __('حذف التوقيع والمرفق') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form form-vertical" action="{{ route('permissions.destroy', 'delete') }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>
                            {{ __('هل انت متأكد من حذف هذا الاذن ؟') }}
                        </p>
                        <p id="name" name="name" style="color: red">

                        </p>
                        <input type="hidden" name="id" id="id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">{{ __('نعم') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $('#delete_modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id');
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').text(name);
        })
    </script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script>
        $(function() {
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
                }],

            });

        });

        $(document).ready(function() {
            var table = $('.datatables-basic').DataTable();

        });
    </script>


@endsection
