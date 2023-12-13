<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Products') }}
            </h2>
            <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">
                Create Product
            </a>
        </div>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
    <x-modal name="confirm-product-delete" focusable>
        {{-- <form method="post" action="{{ route('product.destroy') }}" class="p-6"> --}}
            <div class="p-6">

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your product?') }}
            </h2>
{{--
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p> --}}



            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Product') }}
                </x-danger-button>
            </div>
        {{-- </form> --}}
        </div>
    </x-modal>
    @push('scripts')
        <script>
            console.log('hello from index')
        </script>
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
        {{-- {{ $dataTable->scripts() }} --}}
    @endpush
</x-app-layout>
