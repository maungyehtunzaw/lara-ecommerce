<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Product') }}
            </h2>
            <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">
                Product List
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    CREATE PRODUCT
                </div>
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
                    <div class="grid grid-cols-2 gap-3 p-3">
                        <div class="cols-span-1">
                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="name" placeholder="Product Name" class="input input-bordered w-full @error('name') input-error @enderror"  value="{{old('name')}}"/>
                                @error('name')
                                <div className="label">
                                    <span className="label-text-alt text-red-600">{{$message}}</span>
                                  </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <select class="select select-bordered w-full" name="categories_id">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}
                                    </option>
                                @endforeach
                                  </select>
                                  @error('categories_id')
                                  <div className="label">
                                      <span className="label-text-alt text-red-600">{{$message}}</span>
                                    </div>
                                  @enderror

                            </div>
                            <div class="mb-3">
                                <input type="text" name="unit_rate" placeholder="Product Price" value="{{old('unit_rate')}}"
                                    class="input input-bordered w-full @error('unit_rate') input-error @enderror" />
                            </div>
                            <div class="mb-3">
                                <input type="number" name="qty" placeholder="Product Quantity"
                                value="{{old('qty')}}"
                                class="input input-bordered w-full"  />
                            </div>
                            <div class="mb-3">
                                <textarea name="description" placeholder="Product Description"  class="textarea textarea-bordered w-full">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="cols-span-1">
                            <input type="file" class="file-input file-input-bordered" />

                        </div>

                    </div>
                    <div class="flex justify-end p-3 space-x-2">
                        <button type="submit"
                            class="btn btn-primary">
                            Create
                        </button>
                        <a href="{{ route('product.index') }}"
                            class="btn btn-error ">
                            Cancel  </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
