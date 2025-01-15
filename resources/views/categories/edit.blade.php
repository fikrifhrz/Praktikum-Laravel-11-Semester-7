@extends('theme.default')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Data Categories</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
        <li class="breadcrumb-item active">Edit Data Categories</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">NAME</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $category->nama) }}" placeholder="Masukkan Nama Kategori">
                                    <!-- error message untuk nama -->
                                    @error('nama')
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
</div>
@endsection
@section('alertload')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Optional: Add specific JavaScript if needed
</script>
@endsection