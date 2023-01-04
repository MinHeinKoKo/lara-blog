
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Test</li>
                </ol>
            </nav>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Testing</div>

                    <div class="card-body">
                       Hello , This is testing
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
