@extends('layouts.master')

@section('title', __(' تعديل المستخدم ') . $user->name)

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-semibold mb-4">{{ __('تعديل المستخدم') }}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('users.index') }}">{{ __('إدارة المستخدمين') }}</a>
                </li>
                <li class="breadcrumb-item active">{{ ucfirst($user->name) }}</li>
            </ol>
        </nav>
        @include('layouts.alert')
        <div class="card mb-4">
            <h5 class="card-header">{{ __('تعديل المستخدم : ') . $user->name }}</h5>
            <div class="card-body">

                <form method="post" action="{{ route('users.update', $user->id) }}">
                    @method('patch')
                    @csrf
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label for="name" class="form-label">{{ __('الاسم') }}</label>
                            <input value="{{ $user->name }}" type="text" class="form-control" readonly disabled>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="email" class="form-label">{{ __('البريد الالكتروني') }}</label>
                            <input value="{{ $user->email }}" type="email" class="form-control" readonly disabled>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="username" class="form-label">{{ __('اسم المستخدم') }}</label>
                            <input value="{{ $user->username }}" type="text" class="form-control" readonly disabled>
                        </div>

                        <div class="col-4 mb-3">
                            <label class="d-block"{{ __('الصلاحيات') }}></label>
                            <div class="demo-inline-spacing">
                                @foreach ($roles as $key => $role)
                                    <div class="custom-control custom-control-success custom-checkbox">
                                        <input type="checkbox" name="role[]" class="custom-control-input"
                                            value="{{ $role->id }}" id="role_{{ $role->id }}"
                                            {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : '' }}>
                                        <label class="custom-control-label"
                                            for="role_{{ $role->id }}">{{ $role->role_name }}</label>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">{{ __('حفظ التعديلات') }}</button>
                    <a href="{{ route('users.index') }}" class="btn btn-label-secondary">{{ __('إلغاء') }}</a>
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
                        <h2 class="content-header-title float-left mb-0">{{ __('تعديل مستخدم') }}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('ادارة المستخدمين') }}</a>
                                </li>
                                <li class="breadcrumb-item">{{ __('تعديل المستخدم '). $user->name  }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card" >
                            <div class="card-header card-header-success colored" style="margin-left: 0px;margin-right: 0px;">
                                <h3 class="card-title-colored">{{  __(' تعديل المستخدم '). $user->name  }}</h3>
                            </div>
                            <div class="card-body">

                                <form method="post" action="{{ route('users.update', $user->id) }}">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="col-4 mb-3">
                                            <label for="name" class="form-label">{{ __('الاسم') }}</label>
                                            <input value="{{ $user->name }}" type="text" class="form-control" readonly disabled>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="email" class="form-label">{{ __('البريد الالكتروني') }}</label>
                                            <input value="{{ $user->email }}" type="email" class="form-control" readonly disabled>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="username" class="form-label">{{ __('اسم المستخدم') }}</label>
                                            <input value="{{ $user->username }}" type="text" class="form-control" readonly disabled>
                                        </div>
                                 
                                        <div class="col-4 mb-3">
                                            <label class="d-block"{{ __('الصلاحيات') }}></label>
                                            <div class="demo-inline-spacing">
                                                @foreach ($roles as $key => $role)
                                                
                                                <div class="custom-control custom-control-success custom-checkbox">
                                                    <input type="checkbox" name="role[]" class="custom-control-input" value="{{ $role->id }}" id="role_{{ $role->id }}" {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : '' }} >
                                                    <label class="custom-control-label" for="role_{{ $role->id }}">{{ $role->role_name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                            
                                        </div>
                                    </div>
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

@endsection
