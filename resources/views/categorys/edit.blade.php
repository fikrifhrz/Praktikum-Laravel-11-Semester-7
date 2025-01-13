@extends('theme.default')
@section('content')
<div class="container-fluid px-4">
<h1 class="mt-4">Edit Data Category</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item"><a href="/categories">Category</a></li>
<li class="breadcrumb-item active">Edit Data Category</li>
</ol>
<div class="card mb-4">
<div class="card-body">
<div class="col-md-12">
<div class="card border-0 shadow-sm rounded">
<div class="card-body">
<form action="{{ route('categories.update', $category->id) }}" method="POST">
@csrf
@method('PUT')
<div class="form-group mb-3">
<label class="font-weight-bold">NAME</label>
<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $category->name) }}" placeholder="Masukkan Nama Category">
<!-- error message untuk name -->
@error('name')
<div class="alert alert-danger mt-2">
{{ $message }}
</div>
@enderror
</div>
<button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
<button type="reset" class="btn btn-md btn-warning">RESET</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
@section('alertload')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/4.24.0/standard/ckeditor.js"></script>
@endsection
