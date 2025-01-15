@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Categories</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('categories.create') }}" class="btn btn-md btn-success mb-3">ADD CATEGORY</a>
            <div class="row">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col" style="width: 20%">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->nama }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin?');" 
                                    action="{{ route('categories.destroy', $category->id) }}" 
                                    method="POST">
                                    <a href="{{ route('categories.edit', $category->id) }}" 
                                       class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data Categories belum tersedia.
                        </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('alertload')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    //message with sweetalert
    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif
</script>
@endsection