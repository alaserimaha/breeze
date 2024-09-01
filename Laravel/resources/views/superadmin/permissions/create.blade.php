@extends('layouts.master')

@section('title', __('اضافة اذن جديد'))

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('اضافة اذن جديد') }}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('لوحة التحكم') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">{{ __('ادارة الأذونات') }}</a>
                                </li>
                                <li class="breadcrumb-item">{{ __('اضافة اذن جديد') }}
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
                                <h3 class="card-title-colored">{{  __('اضافة اذن جديد') }}</h3>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="{{ route('permissions.store') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('اسم الاذن') }}</label>
                                        <input value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" >
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                    
                                    <button type="submit" class="btn btn-primary">{{ __('حفظ') }}</button>
                                    <a href="{{ route('permissions.index') }}" class="btn btn-warning">{{ __('العودة') }}</a>
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

@endsection