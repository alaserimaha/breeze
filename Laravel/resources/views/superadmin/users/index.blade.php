@extends('layouts.master')

@section('title', __('ادارة المستخدمين'))

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-semibold mb-4">{{ __('قائمة المستخدمين') }}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}">{{ __('لوحة التحكم') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">{{ __('إدارة المستخدمين') }}</a>
                </li>
                <li class="breadcrumb-item active">{{ __('قائمة المستخدمين') }}</li>
            </ol>
        </nav>
        @include('layouts.alert')
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                {{ $dataTable->table(['class' => 'datatables-basic table']) }}
            </div>
        </div>
        <!-- Dashboard Content ends -->
    </div>

    <div class="modal fade text-left" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">{{ __('جديد إضافة مستخدم') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="form form-vertical" action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label for="nickname-empno" class="form-label">{{ __('الرقم الوظيفي او اسم المستخدم') }}</label>
                            <input type="text" class="form-control @error('nickname_empno') is-invalid @enderror"
                                id="nickname-empno" name="nickname_empno" value="{{ old('nickname_empno') }}"
                                placeholder="{{ __('ادخل رقم الوظيفي/اسم المستخدم لإضافته الى النظام') }}">
                            @error('nickname_empno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('إضافة المستخدم') }}</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            {{ __('إلغاء') }}
                        </button>

                    </div>

                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade text-left" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="delete_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">{{ __('حذف مستخدم') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="form form-vertical" action="{{ route('users.destroy', 'delete') }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>
                            {{ __('هل انت متأكد من حذف هذا المستخدم ؟') }}
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
    {{ $dataTable->scripts() }}
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
@endsection
