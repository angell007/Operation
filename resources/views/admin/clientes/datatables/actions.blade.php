
<div class="text-lg-right text-nowrap">

    <a  class="btn btn-round btn-icon btn-info" title="updte" data-modal="{{ route('admin.clientes.update', $cliente->id) }}">
           <i class=" fal fa-fw fa-pencil" aria-hidden="true"></i>
   </a>

   <a  class="btn btn-round btn-icon btn-warning" title="Detalles" href="{{ route('admin.clientes.servicios', $cliente->id) }}">
       <i class="fa fa-shopping-bag fa-lg" aria-hidden="true"></i>
   </a>

   <form method="POST" action="{{ route('admin.clientes.delete', $cliente->id) }}" class="d-inline-block" data-ajax-form>
       @csrf
       @method('DELETE')
       <button type="submit" class="btn btn-round btn-icon btn-danger" title="Delete" data-confirm>
           <i class="fal fa-fw fa-trash"></i>
       </button>
   </form>

</div>
