<div class="text-lg-right text-nowrap text-white">
     <a class="btn btn-round btn-icon btn-primary" title="nueva nota" data-modal="{{ route('admin.notas.create', $servicio->id) }}">
        <i class="fa fa-file fa-lg"></i>
    </a>

    {{-- <button type="button" class="btn btn-round btn-icon btn-warning" title="nueva nota" data-modal="{{ route('admin.notas.create', $servicio->id) }}">
        <i class="fal fa-fw fa-pencil"></i>Nueva Nota
   </button> --}}

     <a  class="btn btn-round btn-icon btn-warning" title="Detalles" href="{{ route('admin.servicios.update', $servicio->id) }}">
            <i class=" fal fa-fw fa-pencil" aria-hidden="true"></i>
    </a>

    <form method="POST" action="{{ route('admin.servicios.delete', $servicio->id) }}" class="d-inline-block" data-ajax-form>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-round btn-icon btn-danger" title="Delete" data-confirm>
            <i class="fal fa-fw fa-trash"></i>
        </button>
    </form>
</div>
