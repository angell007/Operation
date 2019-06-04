<div class="text-lg-right text-nowrap">
    
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
