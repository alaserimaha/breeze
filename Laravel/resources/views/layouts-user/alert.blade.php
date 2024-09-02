@if (Session::has('success') ||
        (Session::has('done-task') && Session::get('done-task') != '') ||
        (Session::has('todo-task') && Session::get('todo-task') != '') ||
        (Session::has('wip-task') && Session::get('wip-task') != ''))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('success') }}
        {{ Session::get('done-task') }}
        {{ Session::get('todo-task') }}
        {{ Session::get('wip-task') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (Session::has('departmentManagerSuccess'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('departmentManagerSuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (Session::has('danger'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ Session::get('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-warning alert-dismissible" role="alert">
        @foreach ($errors->all() as $error)
            <div style="margin-bottom: 10px;">
                {{ $error }}
            </div>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (Session::has('error') || Session::has('AccessDenied'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        @if (Session::has('error'))
            {{ Session::get('error') }}
        @else
            {{ Session::get('AccessDenied') }}
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
