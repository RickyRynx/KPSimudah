@extends('layout.masterDataEmailAdminSimudah')
@section('content')

    <div class="container col-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card shadow m-4">
            <div class="card-header py-3">
                <h1>Edit Data Email</h1>
            </div>

            <div class="card-body py-3">
                <form action="{{ route('email.update', $email->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Nama Pengguna</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $email->nama }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $email->email }}"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('email.index') }}" class="btn btn-auto  btn-primary shadow-sm">
                        <span class="text">Batal</span>
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
