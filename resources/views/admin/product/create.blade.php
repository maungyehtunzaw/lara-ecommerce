@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <h4>CREATE PRODUCT</h4>
@stop

@section('content')
    <div class="bg-white dark:bg-gray-800  p-2">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
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
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" name="name" placeholder="Product Name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                        @error('name')
                            <div className="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="productName">Product Category</label>
                        <select name="categories_id" class="form-control @error('categories_id') is-invalid @enderror">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('categories_id')
                            <div className="invalid-feedback">
                                <span className="label-text-alt text-red-600">{{ $message }}</span>
                            </div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="productName">Product Price(1XUnit)</label>
                        <input type="text" name="unit_rate" placeholder="Product Price" value="{{ old('unit_rate') }}"
                            class="form-control @error('unit_rate') is-invalid @enderror" />
                        @error('unit_rate')
                            <div className="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="productName">Product Initial Quantity</label>
                        <input type="number" name="qty" placeholder="Product Quantity" value="{{ old('qty') }}"
                            class="form-control @error('qty') is-invalid @enderror" />
                        @error('qty')
                            <div className="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="productName">Product Description</label>
                        <textarea name="description" placeholder="Product Description"
                            class="form-control  @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div className="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Main Image</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="@error('image') is-invalid @enderror">
                        </div>
                        @error('image')
                            <div className="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gallery Image</label>
                        <div class="custom-file">
                            <input type="file" name="gallery[]" class="@error('gallery') is-invalid @enderror" id="validatedInputGroupCustomFile" multiple>
                        </div>
                        @error('gallery')
                            <div className="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="flex justify-end p-3 space-x-2">
                <button type="submit" class="btn btn-primary">
                    Create
                </button>
                <a href="{{ route('product.index') }}" class="btn btn-danger ">
                    Cancel </a>
            </div>

        </form>
    </div>

@stop

