<div class="flex">
    <a href="{{ route('order.show', $id) }}" class="btn btn-sm btn-warning">
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{ route('order.edit', $id) }}" class="btn btn-sm btn-primary">
        <i class="fas fa-edit"></i>
    </a>
    <button class="btn btn-sm btn-danger" data-id="{{$id}}" id="deleteModelBtn"><i class="fas fa-trash"></i> </button>
</div>
