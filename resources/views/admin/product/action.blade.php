<div class="flex">
<a class="btn btn-sm btn-primary" href="{{route('product.edit',$id)}}"><i class="fa fa-edit"></i></a>
<a class="btn btn-sm btn-info" href="{{route('product.show',$id)}}"><i class="fa fa-info-circle"></i></a>
<button class="btn btn-sm btn-danger" data-id="{{$id}}" id="deleteModelBtn"><i class="fas fa-trash"></i> </button>
</div>
