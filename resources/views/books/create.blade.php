@extends('layouts.app')

@section('title', 'Tambah Buku - Simple Library')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="glass-effect rounded-3 p-4">
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('books.index') }}" class="btn btn-outline-light me-3">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h2 class="text-white mb-0">
                    <i class="fas fa-plus-circle me-2"></i>
                    Tambah Buku Baru
                </h2>
            </div>

            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                
                <div class="card book-card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label for="title" class="form-label fw-bold">
                                    <i class="fas fa-book me-2"></i>
                                    Judul Buku *
                                </label>
                                <input type="text" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       id="title" 
                                       name="title" 
                                       value="{{ old('title') }}" 
                                       placeholder="Masukkan judul buku"
                                       required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="author" class="form-label fw-bold">
                                    <i class="fas fa-user me-2"></i>
                                    Penulis *
                                </label>
                                <input type="text" 
                                       class="form-control @error('author') is-invalid @enderror" 
                                       id="author" 
                                       name="author" 
                                       value="{{ old('author') }}" 
                                       placeholder="Masukkan nama penulis"
                                       required>
                                @error('author')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="year" class="form-label fw-bold">
                                    <i class="fas fa-calendar me-2"></i>
                                    Tahun Terbit
                                </label>
                                <input type="number" 
                                       class="form-control @error('year') is-invalid @enderror" 
                                       id="year" 
                                       name="year" 
                                       value="{{ old('year') }}" 
                                       placeholder="Tahun terbit"
                                       min="1000" 
                                       max="{{ date('Y') }}">
                                @error('year')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Tahun terbit bersifat opsional
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-3 mt-4">
                            <a href="{{ route('books.index') }}" class="btn btn-secondary flex-fill">
                                <i class="fas fa-times me-2"></i>
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary flex-fill">
                                <i class="fas fa-save me-2"></i>
                                Simpan Buku
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
