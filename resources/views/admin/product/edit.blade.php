@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <h1>EDIT PRODUCT</h1>
@stop

@section('content')

    <div class="bg-white dark:bg-gray-800  p-2">

        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

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
                        <label>Product Name</label>
                        <input type="text" name="name" placeholder="Product Name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $product->name) }}" />
                            @error('name')
                            <div className="invalid-feedback">
                                {{$message}}
                              </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <select class="form-control  @error('categories_id') is-invalid @enderror" name="categories_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('categories_id')
                            <div className="invalid-feedback">
                                <span className="text-danger">{{ $message }}</span>
                            </div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <input type="text" name="unit_rate" placeholder="Product Price"
                            value="{{ old('unit_rate', $product->unit_rate) }}"
                            class="form-control @error('unit_rate') is-invalid @enderror" />
                            @error('unit_rate')
                            <div className="invalid-feedback">
                                <span className="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <textarea name="description" placeholder="Product Description" class="form-control  @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div className="invalid-feedback">
                                <span className="text-danger">{{ $message }}</span>
                            </div>
                        @enderror

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Image</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="validatedInputGroupCustomFile" >
                            <label class="custom-file-label" for="validatedInputGroupCustomFile">Choose file...</label>

                        </div>
                        @error('image')
                            <div className="invalid-feedback">
                                <span className="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="flex justify-end p-3 space-x-2">
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
                <a href="{{ route('product.index') }}" class="btn btn-danger ">
                    Cancel </a>
            </div>

        </form>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
