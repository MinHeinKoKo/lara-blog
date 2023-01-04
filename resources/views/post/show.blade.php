@extends('layouts.app')

@section('content')
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
                        <h4>{{ $post->title }}</h4>
                        <div class="my-2">
                            <span class="badge bg-info"><i class="bi bi-person"></i> {{ $post->user->name }}</span>
                            <span class="badge bg-secondary"><i class="bi bi-grid px-1"></i>{{ $post->category->title }}</span>
                            <span class="badge bg-warning">
                                <i class="bi bi-calendar"></i>
                                {{ $post->created_at->format('d M Y') }}
                            </span>
                            <span class="badge bg-warning">
                                <i class="bi bi-clock"></i>
                                {{ $post->created_at->format('H : i A') }}
                            </span>
                        </div>
                        @isset($post->feature_image)
                            <img src="{{ asset("storage/".$post->feature_image) }}" class="w-100 py-2" alt="">
                        @endisset
                        <p>
                            {{ $post->description }}
                        </p>
                        @foreach($post->photos as $photo)
                            <img src="{{ asset('storage/'.$photo->name) }}" height="100" class="mb-2 rounded" alt="">
                        @endforeach
                        <hr>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('post.index') }}" class="btn btn-outline-primary">Posts</a>
                            <a href="{{ route('post.create') }}" class="btn btn-primary">Create Post</a>
                        </div>
                    </div>
                </div>
            </div>

@endsection
