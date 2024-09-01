@extends('layouts.master')

@section('title', __('لوحة التحكم'))

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y strategy-dashboard">

        @include('layouts.alert')
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light"></span> @lang('لوحة المعلومات')
            <h3>@lang('مرحبًا بعودتك'), {{ auth()->user()->name }} 👋🏻 </h3>
        </h4>
    </div>
    <!--/ Content -->

@endsection
