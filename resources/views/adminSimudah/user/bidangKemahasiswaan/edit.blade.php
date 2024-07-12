@extends('layout.masterAddBidangKemahasiswaan')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Data') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('addBidangKemahasiswaan.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $user->name) }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Username -->
                            <div class="form-group">
                                <label for="username">{{ __('Username') }}</label>
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username', $user->username) }}" required>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                                <small>{{ __('Leave blank to keep current password') }}</small>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Data</button>
                                <a href="{{ route('addBidangKemahasiswaan.index') }}"
                                    class="btn btn-secondary">{{ __('Batal') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
