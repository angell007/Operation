@extends('laracrud::layouts.auth')

@section('title', 'Proveedores')
@section('child-content')
    <div class="row align-items-center mb-3">
        <div class="col-lg">
            <h2 class="mb-2 mb-lg-0">@yield('title')</h2>
        </div>
        <div class="col-lg-auto">
            <button type="button" class="btn btn-round btn-danger" data-modal="{{ route('admin.proveedors.create') }}">
                <i class="fal fa-plus"></i> Registrar proveedor
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

