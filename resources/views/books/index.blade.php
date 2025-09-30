@extends('layouts.app')

@section('title', 'Daftar Buku - Simple Library')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-white mb-0">
                <i class="fas fa-books me-2"></i>
                Daftar Buku
            </h1>
            <a href="{{ route('books.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus me-2"></i>
                Tambah Buku Baru
            </a>
        </div>

        @if($books->count() > 0)
            <div class="row">
                @foreach($books as $book)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card book-card card-hover h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title text-dark fw-bold">{{ $book->title }}</h5>
                                    <span class="badge bg-primary">{{ $book->year ?? 'Tidak ada tahun' }}</span>
                                </div>
                                
                                <p class="card-text text-muted mb-3">
                                    <i class="fas fa-user me-2"></i>
                                    <strong>Penulis:</strong> {{ $book->author }}
                                </p>
                                
                                <div class="d-flex gap-2">
                                    <a href="{{ route('books.edit', $book->id) }}" 
                                       class="btn btn-outline-primary btn-sm flex-fill">
                                        <i class="fas fa-edit me-1"></i>
                                        Edit
                                    </a>
                                    <button type="button" 
                                            class="btn btn-outline-danger btn-sm flex-fill" 
                                            onclick="confirmDelete({{ $book->id }}, '{{ $book->title }}')">
                                        <i class="fas fa-trash me-1"></i>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <div class="glass-effect rounded-3 p-5">
                    <i class="fas fa-book-open text-white mb-3" style="font-size: 4rem;"></i>
                    <h3 class="text-white mb-3">Belum Ada Buku</h3>
                    <p class="text-white-50 mb-4">Mulai tambahkan koleksi buku pertama Anda!</p>
                    <a href="{{ route('books.create') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-plus me-2"></i>
                        Tambah Buku Pertama
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                    Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus buku <strong id="bookTitle"></strong>?</p>
                <p class="text-muted small">Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i>
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(bookId, bookTitle) {
    document.getElementById('bookTitle').textContent = bookTitle;
    document.getElementById('deleteForm').action = `/books/${bookId}`;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
@endpush
