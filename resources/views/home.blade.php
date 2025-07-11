<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ladiarti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/js/app.js')
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Navbar -->
    
    @include('layout.navbar')
    

    <!-- Menu -->
    <div class="bg-primary text-white text-center py-2">
        <a href="#" class="text-white mx-3">HOME</a>
        <a href="#" class="text-white mx-3">ABOUT</a>
        <a href="#" class="text-white mx-3">REVIEW</a>
        <a href="#" class="text-white mx-3">CONTACT</a>
    </div>

    <!-- Hero Section -->
    <section class="text-center py-5">
        <div class="container">
            <h2>Siap <span class="text-primary fw-bold">TAMPIL BEDA</span>? Yuk Koleksi barang - barang dengan desain ekslusif ini hanya di <span class="text-primary fw-bold">LADIARTI</span>.</h2>
            <img src="/images/shopping-bags.png" alt="" class="img-fluid mt-4">
        </div>
    </section>

    <!-- Products -->
    <section class="container py-4">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 col-sm-6 mb-4"> <!-- 3 kolom di desktop, 2 di tablet -->
                <div class="card h-100">
                    @php
                        $images = json_decode($product->image, true); // Ubah dari JSON ke array
                        $mainImage = $images[0] ?? 'default.png'; // Ambil gambar pertama atau fallback
                    @endphp
                    <img src="{{ asset('images/' . $mainImage) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column"> {{-- Tambahkan d-flex dan flex-column di sini --}}
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <p class="mb-0">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <a href="{{ route('product.show', ['id' => $product->id]) }}" class="btn btn-dark">Buy</a>
                        </div>

                        {{-- Tambah ke Keranjang --}}
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-success w-100">Tambah ke Keranjang</button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

    <!-- Reviews -->
    <section class="container py-5">
        <h2 class="text-center mb-4">CUSTOMER’S REVIEW</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="p-4 bg-dark text-white rounded">
                    <p>⭐⭐⭐⭐⭐<br>Bintang 5 buat Ladiarti!!...</p>
                    <p><strong>valerie</strong></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 bg-dark text-white rounded">
                    <p>⭐⭐⭐⭐⭐<br>Pengalaman yang sangat menyenangkan...</p>
                    <p><strong>Arga</strong></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="bg-dark text-white py-5">
        <div class="container">
            <h2 class="text-center mb-4">CONTACT</h2>
            <p>Layanan Pengaduan Konsumen</p>
            <p>LADIARTI<br>E-mail: customer@id.ladiarti.com<br>Instagram: @ladiarti.id<br>WhatsApp: +62 000 000 000</p>
            <div class="d-flex gap-3 mb-3">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-instagram"></i>
                <i class="fa fa-envelope"></i>
                <i class="fa fa-phone"></i>
            </div>
            <form>
                <h5>BERIKAN REVIEW UNTUK KAMI :</h5>
                <p>⭐ ⭐ ⭐ ⭐ ⭐</p>
                <input class="form-control mb-2" type="text" placeholder="nama pengguna">
                <textarea class="form-control mb-2" placeholder="masukan review anda!"></textarea>
                <button class="btn btn-light">send now!</button>
            </form>
        </div>
    </section>

    <footer class="text-center py-3 bg-light">
        <p>Create By Ladiarti</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>