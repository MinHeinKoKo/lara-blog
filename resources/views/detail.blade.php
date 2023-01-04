@extends("master")
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h3 class="text-center">{{ $post->title }}</h3>
                <div class="text-center">
                                <span class="badge bg-secondary">
                                    {{ $post->category->title }}
                                </span>
                </div>
                <div class="text-center my-3">

                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach($post->photos as $key=>$photo)
                                <div class="carousel-item {{ $key===0? "active": "" }}">
                                    <a class="venobox" data-gall="myGallery" href="{{ asset("storage/".$photo->name) }}">
                                        <img src="{{ asset("storage/".$photo->name) }}" class="d-block post-detail-img w-100">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <p class="my-2" style="white-space: pre-wrap">
                    {{ $post->description }}
                </p>
                <div class="">

                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <p class="badge bg-primary mb-0">{{ $post->user->name }}</p>
                        <p class="badge bg-info mb-0">{{ $post->created_at->diffforHumans() }} <i class="bi bi-clock"></i></p>
                    </div>
                    <div class="">
                        @can('update',$post)
                        <a href="{{route('post.edit',$post->id)}}" class="btn btn-outline-secondary">
                                <i class="bi bi-pencil"></i>
                            </a>
                        @endcan
                        <a href="{{ route("page.index") }}" class="btn btn-outline-primary">All Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
