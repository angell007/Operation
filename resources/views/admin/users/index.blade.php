@extends('laracrud::layouts.auth')

@section('title', 'Usuarios')
@section('child-content')
    <div class="row align-items-center mb-3">
        <div class="col-lg">
            <h2 class="mb-2 mb-lg-0">@yield('title')</h2>
        </div>
        <div class="col-lg-auto">
            <button type="button" class="btn btn-round btn-danger" data-modal="{{ route('admin.users.create') }}">
                <i class="fal fa-plus"></i> Registrar User
            </button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            {!! $html->table() !!}
        </div>
    </div>
@endsection

@push('scripts')
    {!! $html->scripts() !!}
@endpush
