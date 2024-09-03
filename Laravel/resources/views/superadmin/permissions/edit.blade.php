@extends('layouts.master')


@section('title', __('تعديل اذن ') . ucfirst($permission->name))

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('تعديل اذن ') . ucfirst($permission->name) }}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">{{ __('ادارة الأذونات') }}</a>
                                </li>
                                <li class="breadcrumb-item">{{ __('تعديل اذن ') . ucfirst($permission->name) }}
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
                                <h3 class="card-title-colored">{{ __('تعديل اذن ') . ucfirst($permission->name) }}</h3>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                                    @method('patch')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('اسم الصلاحية بالإنقليزي') }}</label>
                                        <input value="{{ old('name') == null ? $permission->name : old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" >
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