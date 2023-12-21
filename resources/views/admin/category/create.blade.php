@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <h4>CREATE PRODUCT</h4>
@stop

@section('content')
    <div class="bg-white dark:bg-gray-800  p-2">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="productName">Category Name</label>
                        <input type="text" name="name" placeholder="Product Name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                        @error('name')
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
                    <div class="form-check">
                        <input name="is_feature" class="form-check-input" type="checkbox" value="" id="isFeatureCategory">
                        <label class="form-check-label" for="isFeatureCategory">
                           Feature Category
                        </label>
                        @error('is_feature')
                            <div className="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Category Image</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="@error('image') is-invalid @enderror">
                        </div>
                        @error('image')
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
                <a href="{{ route('category.index') }}" class="btn btn-danger ">
                    Cancel </a>
            </div>

        </form>
    </div>

@stop
