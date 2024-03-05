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
                <label for="telephone" class="form-label">Phone</label>
                <small class="text-danger">*</small>
                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="xxx-xxx-xxxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                <small class="form-text text-muted">Format: xxx-xxx-xxxx</small>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <small class="text-danger">*</small>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="mb-3">
                <label for="company_logo" class="form-label">Company Logo </label>
                <small class="text-danger">*</small>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="company_logo" name="company_logo" required>
                    <label class="custom-file-label" for="company_logo"></label>
                </div>
                <small class="form-text text-muted">Only image files (e.g. jpg, png) are allowed and files must be less than 2MB.</small>
            </div>



            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    <style>
.custom-file-input {
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    height: 32px; /* Match the height of form inputs in Bootstrap */
    width: 1092px;
}

.custom-file-label {
    height: 35px; /* Match the height of form inputs in Bootstrap */
    overflow: hidden;
    white-space: nowrap; /* Prevent text from wrapping */
    text-overflow: ellipsis; /* Add an ellipsis if the text is too long */
}

.input-group .custom-file {
    flex: 1; /* Ensure the custom file input expands to fill the space */
}
.custom-file{
    height: 35px;
}
</style>

@endsection