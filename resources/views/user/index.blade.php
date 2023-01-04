@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage User</li>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Control</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->role }}
                            </td>
                            <td class="text-nowrap">
                                <a href="{{route('post.show',$user->id)}}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-info"></i>
                                </a>
                                    <a href="{{route('post.edit',$user->id)}}" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('post.destroy',$user->id) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                            </td>
                            <td>
                                <p class="small text-black-50 mb-0 text-nowrap">
                                    <i class="bi bi-calendar"></i>
                                    {{ $user->created_at->format('d M Y') }}
                                </p>
                                <p class="small text-black-50 mb-0 text-nowrap">
                                    <i class="bi bi-clock"></i>
                                    {{ $user->created_at->format('H : i A') }}
                                </p>
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
                    {{ $users->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
