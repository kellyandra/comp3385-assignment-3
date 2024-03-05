@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h2>Create Client</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('clients') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <small class="text-danger">*</small>
                <input type="text" class="form-control" id="name" name="name" required>
                
            </div>

            <div class="mb-3">
            <label for="closing sentence" class="form-label">Let us know what you think of our website.</label>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection