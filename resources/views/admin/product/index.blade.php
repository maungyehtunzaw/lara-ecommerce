@extends('adminlte::page')

@section('title', 'Product List')
@section('content_header')
    <h4>PRODUCTS</h4>
@stop

@section('plugins.Sweetalert2', true)
@section('content')

        <div class="bg-white dark:bg-gray-800  p-2">
            {{ $dataTable->table() }}
        </div>
{{-- Example button to open modal --}}

        <x-adminlte-modal id="deleteModel" title="Are your sure?" theme="red" icon="fas fa-exclamation-triangle"
        size='md' v-centered>
        if your are sure to delete, press ok else cancel..
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="danger" label="YES, DELETE" icon="fas fa-check-circle"
                id="confirmDelete" />
            <x-adminlte-button theme="success" label="NO, DISMISS" data-dismiss="modal" icon="fas fa-times-circle" />
        </x-slot>

    </x-adminlte-modal>
@stop

@push('scripts')
{!! $dataTable->scripts() !!}
@endpush
@push('js')
<script>
    $(document).ready(function() {

        $('body').on('click', '#deleteModelBtn', function() {
            var deleteId = $(this).data('id');
            console.log(deleteId);
            $('#deleteModel').modal('show');
            $('#confirmDelete').val(deleteId);
        });

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });


        $('body').on('click', '#confirmDelete', function() {
            // alert("confirm delete");
            var delId = $(this).val();
            console.log(delId);
            var url = '{{ route('product.destroy', ':id') }}';
            url = url.replace(':id', delId);
            // alert(url);
            // $('#deleteModel').modal('hide');
            $.ajax({
                type: "DELETE",
                url: url,
                dataType: 'JSON',
                data: {
                    'id': delId,
                    '_token': '{{ csrf_token() }}',
                },
                success: function(data) {
                    if (data.success) {
                        $(".row_" + delId).hide("slow", function() {
                            $(this).remove();
                        });
                    }
                    Toast.fire(
                        data.status,
                        data.message,
                        data.status
                    );
                },
                error: function(error) {
                    console.log('Error:', error);
                    Toast.fire(
                        'Sorry!',
                        'Something went wrong',
                        'error'
                    );
                }
            });
        });

    });
</script>
@endpush
