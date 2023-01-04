@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Posts</li>
        </ol>
    </nav>
    <div class="col-12">
        <div class="card">
            <div class="card-header">Create New Post</div>

            <div class="card-body">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Post Title</label>
                        <input type="text" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror " name="title">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Select Category</label>
                        <select type="text" id="category" class="form-select @error('category') is-invalid @enderror " name="category">
                            @foreach( \App\Models\Category::all() as $category )
                                <option value="{{ $category->id }}" {{ $category->id == old('category')? "selected" : "" }}>{{ $category->title }}</option>
                            @endforeach

                        </select>
                        @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="photos" class="form-label">Photos</label>
                        <input type="file" id="photos" multiple class="form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror " name="photos[]">
                        @error('photos')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error('photos.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Post Description</label>
                        <textarea type="text" rows="10" id="description"  class="form-control @error('description') is-invalid @enderror " name="description">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <label for="feature_image" class="form-label">Post Photo</label>
                            <input type="file" id="feature_image" class="form-control @error('feature_image') is-invalid @enderror " name="feature_image">
                            @error('feature_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-lg btn-primary">Create Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
