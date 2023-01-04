
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gallary</li>
                </ol>
            </nav>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Testing</div>

                    <div class="card-body">
                        <div class="gallary">
                            @forelse(\Illuminate\Support\Facades\Auth::user()->photos as $photo)
                                <img src="{{ asset('storage/'.$photo->name) }}" class="w-100 rounded mb-3" alt="">
                            @empty
                                <p>There is no Photo Yet</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
