@extends('layouts.master')

@section('title', __('اضافة صلاحية جديدة'))

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('اضافة صلاحية جديدة') }}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('لوحة التحكم') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('ادارة الصلاحيات') }}</a>
                                </li>
                                <li class="breadcrumb-item">{{ __('اضافة صلاحية جديدة') }}
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
                        <div class="card" >
                            <div class="card-header card-header-success colored" style="margin-left: 0px;margin-right: 0px;">
                                <h3 class="card-title-colored">{{ __('اضافة صلاحية جديدة') }}</h3>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="{{ route('roles.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="role_name" class="form-label">{{ __('اسم الصلاحية بالعربي') }}</label>
                                            <input value="{{ old('role_name') }}" type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name" placeholder="مدير النظام" >
                                            @error('role_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="name" class="form-label">{{ __('اسم الصلاحية بالإنقليزي') }}</label>
                                            <input value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="administrator" >
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
                                            <tr>
                                                <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                                                <th scope="col" width="20%">{{ __('الاسم') }}</th>
                                                <th scope="col" width="1%">{{ __('وضع الحماية') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($permissions as $permission)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='permission'>
                                                </td>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->guard_name }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <hr>
                                    <button type="submit" class="btn btn-primary">{{ __('حفظ الصلاحية') }}</button>
                                    <a href="{{ route('roles.index') }}" class="btn btn-warning">{{ __('العودة') }}</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var oTable = $(".table").dataTable({
            // "stateSave": true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "aaSorting": [[ 1, "asc" ]],
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
                    
            "columnDefs": [
                { "bSortable": false, "aTargets": [ 0 ] }
            ], 
            
            dom: 'Blfrtip',
            buttons: [
                'excelHtml5',
                'print',
            ],
        });

        var allPages = oTable.fnGetNodes();

        $('[name="all_permission"]').on('click', function () {
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
</script>


@endsection