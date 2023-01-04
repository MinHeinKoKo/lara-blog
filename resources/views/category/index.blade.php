@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category lists</li>
                </ol>
            </nav>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Category Lists</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                @notAuthor
                                <th>Owner</th>
                                @endnotAuthor
                                <th>Count</th>
                                <th>Control</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }} <br> <span class="badge bg-secondary">{{ $category->slug }}</span> </td>
                                    @notAuthor
                                    <td>
                                        {{ $category->user->name ?? "unknown"}}
                                    </td>
                                    @endnotAuthor
                                    <td>
                                        {{ $category->posts()->count() }}
                                    </td>
                                    <td class="align-items-center">
                                        @can('update',$category)
                                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        @endcan
                                        @can('delete', $category)
                                        <form action="{{ route('category.destroy',$category->id) }}" class="d-inline-block" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                            @endcan
                                    </td>
                                    <td>
                                        <p class="small text-black-50 mb-0">
                                            <i class="bi bi-calendar"></i>
                                            {{ $category->created_at->format('d M Y') }}
                                        </p>
                                        <p class="small text-black-50 mb-0">
                                            <i class="bi bi-clock"></i>
                                            {{ $category->created_at->format('H : i A') }}
                                        </p>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
