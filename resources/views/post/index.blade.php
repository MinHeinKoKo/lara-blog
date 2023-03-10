@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Post Lists</li>
        </ol>
    </nav>
    <div class="">
        <div class="card">
            <div class="card-header">Post Lists</div>

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="">
                        @if(request('keyword'))

                        <span>Search by : " {{ request('keyword') }} "</span>
                            <a href="{{ route('post.index') }}">
                                <i class="bi bi-trash3"></i>
                            </a>
                            @endif
                    </div>
                        <form action="{{ route('post.index') }}" method="get">

                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword">
                                <button class="btn btn-secondary">
                                    <i class="bi bi-search"></i> Search
                                </button>
                            </div>
                        </form>

                </div>
                <hr>
                <table class="table w-100">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->role != "author")
                        <th>Owner</th>
                        @endif
                        <th>Control</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->title }}</td>
                            @if(\Illuminate\Support\Facades\Auth::user()->role != "author")
                            <td class="">{{ $post->user->name }}</td>
                            @endif
                            <td class="text-nowrap">
                                @notrash
                                <a href="{{route('post.show',$post->id)}}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-info"></i>
                                </a>
                                @can('update',$post)
                                <a href="{{route('post.edit',$post->id)}}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @endcan
                                @endnotrash
                                @can('delete',$post)
                                    @trash
                                <form action="{{ route('post.destroy',[$post->id, "delete"=>"force"]) }}" class="d-inline-block" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash2-fill"></i>
                                    </button>
                                </form>

                                    <form action="{{ route('post.destroy',[$post->id, "delete"=>"restore"]) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-dark btn-sm">
                                            <i class="bi bi-recycle"></i>
                                        </button>
                                    </form>
                                @else

                                    <form action="{{ route('post.destroy',[$post->id, "delete"=>"soft"]) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-dark btn-sm">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                    @endtrash
                                @endcan

                            </td>
                            <td>
                                {!! $post->time !!}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">There is no Posts</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="">
                    {{ $posts->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
