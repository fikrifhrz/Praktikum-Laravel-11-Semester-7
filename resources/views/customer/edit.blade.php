@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Data Customer</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/customers">Customers</a></li>
        <li class="breadcrumb-item active">Edit Data Customer</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">NIK</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik', $customer->nik) }}" placeholder="Masukkan NIK Customer">
                                    <!-- error message untuk NIK -->
                                    @error('nik')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">NAMA</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $customer->name) }}" placeholder="Masukkan Nama Customer">
                                    <!-- error message untuk NAMA -->
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">TELP</label>
                                    <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp', $customer->telp) }}" placeholder="Masukkan Nomor Telepon Customer">
                                    <!-- error message untuk TELP -->
                                    @error('telp')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">EMAIL</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $customer->email) }}" placeholder="Masukkan Email Customer">
                                    <!-- error message untuk EMAIL -->
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">ALAMAT</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="5" placeholder="Masukkan Alamat Customer">{{ old('alamat', $customer->alamat) }}</textarea>
                                    <!-- error message untuk ALAMAT -->
                                    @error('alamat')
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