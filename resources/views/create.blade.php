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
        <form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <small class="text-danger">*</small>
                <input type="text" class="form-control" id="name" name="name" required>
                
            </div>
              
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <small class="text-danger">*</small>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <small class="text-danger">*</small>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="xxx-xxx-xxxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                <small class="form-text text-muted">Format: xxx-xxx-xxxx</small>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <small class="text-danger">*</small>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="mb-3">
                <label for="company_logo" class="form-label">Company Logo</label>
                <small class="text-danger">*</small>
                <input type="file" class="form-control-file" id="company_logo" name="company_logo" required>
                <small class="form-text text-muted">Only image files(e.g. jpg, png) are allowed and files must be less than 2MB. </small>
            </div>


            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection