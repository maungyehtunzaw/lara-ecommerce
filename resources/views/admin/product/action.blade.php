<div class="flex space-x-1">
<a class="btn btn-sm btn-primary" href="{{route('product.edit',$id)}}">Edit</a>
<a class="btn btn-sm btn-info" href="{{route('product.show',$id)}}">Show</a>
{{-- <form action="{{route('product.destroy',$id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
</form> --}}
<button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-product-delete')"
        class="btn btn-sm btn-danger"
    >{{ __('Delete') }}</button>
</div>
