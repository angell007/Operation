<div class="text-lg-right text-nowrap">
    <button type="button" class="btn btn-round btn-icon btn-primary" title="Update" data-modal="{{ route('admin.pedidos.update', $pedido->id) }}">
        <i class="fal fa-fw fa-pencil"></i>
    </button>
    <form method="POST" action="{{ route('admin.pedidos.delete', $pedido->id) }}" class="d-inline-block" data-ajax-form>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-round btn-icon btn-danger" title="Delete" data-confirm>
            <i class="fal fa-fw fa-trash"></i>
        </button>
    </form>
</div>