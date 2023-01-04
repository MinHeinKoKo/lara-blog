@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post Lists</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Posts</li>
                </ol>
            </nav>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Update Post</div>

                    <div class="card-body">
                        <form action="{{ route('post.update',$post->id) }}" method="post" id="postForm" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                        </form>
                            <div class="mb-3">
                                <label for="title" class="form-label">Post Title</label>
                                <input type="text" id="title" form="postForm" value="{{ old('title' , $post->title) }}" class="form-control @error('title') is-invalid @enderror " name="title">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Select Category</label>
                                <select type="text" id="category" form="postForm" class="form-select @error('category') is-invalid @enderror " name="category">
                                    @foreach( \App\Models\Category::all() as $category )
                                        <option value="{{ $category->id }}" {{ $category->id == old('category' , $post->category)? "selected" : "" }}>{{ $category->title }}</option>
                                    @endforeach

                                </select>
                                @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="mb-3 d-flex">
                                    @foreach($post->photos as $photo)
                                        <div class="position-relative me-2">
                                            <img src="{{ asset("storage/".$photo->name) }}" class="rounded" height="80" alt="">
                                            <form action="{{ route('photo.destroy', $photo->id) }}" class="d-inline-block" method="post">
                                                @csrf
                                                @method("delete")
                                                <button class="btn btn-sm btn-danger position-absolute bottom-0 end-0">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                               <div class="">
                                   <label for="photos" class="form-label">Photos</label>
                                   <input type="file" form="postForm" name="photos[]" id="photos"  multiple class="form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror ">
                                   @error('photos')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                   @error('photos.*')
                                   <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                               </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Post Description</label>
                                <textarea type="text" rows="10" form="postForm" id="description"  class="form-control @error('description') is-invalid @enderror " name="description">{{ old('description',$post->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                        @isset($post->feature_image)
                                            <img src="{{ asset("storage/".$post->feature_image) }}" class="me-3 rounded" height="70" alt="">
                                        @endisset
                                   <div class="">
                                       <label class="form-label">Feature Image</label>
                                       <input type="file" id="feature_image" form="postForm"  class="form-control @error('feature_image') is-invalid @enderror " name="feature_image">
                                       @error('feature_image')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                                   </div>

                                </div>
                                <button class="btn btn-lg btn-primary" form="postForm">Update Post</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
