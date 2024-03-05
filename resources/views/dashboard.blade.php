@extends('layouts.app')

@section('content')

<div class="container my-5">
<div class="d-flex justify-content-between align-items-center mb-3"> <!-- Flex container -->

    <h1 class="display-5 fw-bold text-body-emphasis">Dashboard</h1>
    

    <!-- Add New Client Link -->
    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">+ Create Client</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Clients Section -->
    <p class="lead">Welcome to your dashboard. Here you can manage your account, your clients, and much more.</p>
    <div class="container my-5 text-center"> <!-- This centers text horizontally -->

    
    <div class="row">
        @foreach ($clients as $client)
            <div class="col-md-4 d-flex align-items-stretch"> <!-- This ensures that columns are full height -->
                <div class="card mb-4 w-100"> 
            
                    <img src="{{ asset('storage/' . $client->company_logo) }}" alt="{{ $client->name }} Logo" class="card-img-top mx-auto" style="max-width: 90%; height: auto;">
                    <div class="card-body d-flex flex-column justify-content-center"> <!-- This centers content vertically -->
                        <h5 class="card-title text-primary">{{ $client->name }}</h5>
                        <p class="card-text">{{ $client->email }}</p>
                        <p class="card-text">{{ $client->telephone }}</p>
                        <p class="card-text">{{ $client->address }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
