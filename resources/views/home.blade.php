@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        Welcome To Brikol Platform This Platform Still In Development Mode ! That Is Why You Are Special That You Can See The Progress (:
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
