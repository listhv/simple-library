# Simple Library API Documentation

## Deskripsi

Simple Library adalah aplikasi Laravel yang menyediakan API untuk mengelola data buku. Aplikasi ini menggunakan MySQL sebagai database dan menyediakan endpoint CRUD lengkap.

## Setup Project

### 1. Installasi

```bash
composer install
npm install
```

### 2. Konfigurasi Database

-   Database: MySQL
-   Host: 127.0.0.1
-   Port: 3306
-   Database Name: simple_library
-   Username: root
-   Password: (kosong)

### 3. Jalankan Migration dan Seeder

```bash
php artisan migrate:fresh --seed
```

### 4. Jalankan Server

```bash
php artisan serve
```

## API Endpoints

### 1. GET /api/books

Menampilkan semua data buku

```json
[
    {
        "id": 1,
        "title": "Laut bercerita",
        "author": "Leila S. Chudori",
        "year": 2017,
        "created_at": "2025-09-30T04:46:27.000000Z",
        "updated_at": "2025-09-30T04:46:27.000000Z"
    }
]
```

### 2. GET /api/books/{id}

Menampilkan detail buku berdasarkan ID

```json
{
    "id": 1,
    "title": "Laut bercerita",
    "author": "Leila S. Chudori",
    "year": 2017,
    "created_at": "2025-09-30T04:46:27.000000Z",
    "updated_at": "2025-09-30T04:46:27.000000Z"
}
```

### 3. POST /api/books

Menambah buku baru

```json
{
    "title": "Harry Potter",
    "author": "J.K. Rowling",
    "year": 1997
}
```

### 4. PUT /api/books/{id}

Mengupdate data buku

```json
{
    "title": "Harry Potter and the Philosopher's Stone",
    "author": "J.K. Rowling",
    "year": 1997
}
```

### 5. DELETE /api/books/{id}

Menghapus buku berdasarkan ID

```json
{
    "message": "Book deleted successfully"
}
```

## Validasi

### Rules Validasi:

-   **title**: wajib diisi, maksimal 150 karakter
-   **author**: wajib diisi, maksimal 100 karakter
-   **year**: opsional, harus berupa angka dan tidak boleh lebih besar dari tahun sekarang

### Contoh Response Error:

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "title": ["The title field is required."],
        "year": ["The year must not be greater than 2025."]
    }
}
```

## Database Schema

### Tabel: books

```sql
CREATE TABLE books (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    author VARCHAR(100) NOT NULL,
    year INT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

## Testing

### Test dengan PowerShell:

```powershell
# Get all books
Invoke-RestMethod -Uri "http://localhost:8000/api/books" -Method GET

# Get book by ID
Invoke-RestMethod -Uri "http://localhost:8000/api/books/1" -Method GET

# Create new book
$body = @{title="New Book"; author="Author Name"; year=2023} | ConvertTo-Json
Invoke-RestMethod -Uri "http://localhost:8000/api/books" -Method POST -Body $body -ContentType "application/json"

# Update book
$body = @{title="Updated Book"; author="Updated Author"; year=2024} | ConvertTo-Json
Invoke-RestMethod -Uri "http://localhost:8000/api/books/1" -Method PUT -Body $body -ContentType "application/json"

# Delete book
Invoke-RestMethod -Uri "http://localhost:8000/api/books/1" -Method DELETE
```

## Sample Data

Seeder sudah menyediakan 5 data buku contoh:

1. Laut bercerita - Leila S. Chudori (2017)
2. Negeri 5 Menara - Ahmad Fuadi (2019)
3. Filosofi Teras - Henry Manampiring (2018)
4. Cantik itu luka - Eka Kurniawan (2002)
5. Laskar Pelangi - Andrea Hirata (2005)
