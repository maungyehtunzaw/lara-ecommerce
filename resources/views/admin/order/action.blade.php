<div class="flex space-x-2">
    <a href="{{ route('order.show', $id) }}" class="btn btn-sm btn-warning">
        Show
    </a>
    <a href="{{ route('order.edit', $id) }}" class="btn btn-sm btn-primary">
        Edit
    </a>
    <form action="{{ route('order.destroy', $id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-primary">
            Delete
        </button>
    </form>
</div>
