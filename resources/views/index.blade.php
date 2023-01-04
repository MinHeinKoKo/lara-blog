@extends("master")
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h1 class="text-center">Blog Posts</h1>
                <div class="my-3">
                    <form class="" method="get">
                        <div class="input-group">
                            <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control">
                            <button class="btn btn-outline-primary">
                                <i class="bi bi-search"></i>
                                Search
                            </button>
                        </div>
                    </form>
                </div>
                @forelse($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3>{{ $post->title }}</h3>
                            <div class="">
                                <a href="{{ route("page.category", $post->category->slug) }}">
                                    <span class="badge bg-secondary">
                                    {{ $post->category->title }}
                                </span>
                                </a>
                            </div>
                            <p>
                                {{ $post->excerpt }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <p class="badge bg-primary mb-0">{{ $post->user->name }}</p>
                                    <p class="badge bg-info mb-0">{{ $post->created_at->diffforHumans() }} <i class="bi bi-clock"></i></p>
                                </div>
                                <a href="{{ route("page.detail",$post->slug) }}" class="btn btn-outline-primary">See More</a>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="card">
                        <div class="card-body">
                            <h1>There is no Posts yet !</h1>
                        </div>
                    </div>
                @endforelse
                <div class="">
                    {{ $posts->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
