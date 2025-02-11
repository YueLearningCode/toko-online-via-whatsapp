<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <h1 class="logo-text">
                <i class="bi bi-bag-fill"></i> FlashStore
            </h1>
            <ul class="navbar-menu">
                <li><a href="/"><i class="bi bi-house-fill"></i>Beranda</a></li>
                <li><a href="/"><i class="bi bi-bag-fill"></i> Produk</a></li>
                <li>
                    <a href="https://wa.me/123456789?text=Halo%2C%20saya%20ingin%20bertanya%20mengenai%20produk%20Anda" target="_blank">
                      <i class="bi bi-telephone-fill"></i> Hubungi
                    </a>
                  </li>
                <li><a href="/keranjang" class="cart-button"><i class="bi bi-cart-fill"></i> Keranjang</a></li>
            
                @auth
                    <!-- Jika pengguna sudah login -->
                    <li><a href="{{ route('dashboard') }}"><i class="bi bi-person-fill"></i> Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                @else
                    <!-- Jika pengguna belum login -->
                    <li><a href="{{ route('login') }}" class="btn btn-success">Login</a></li>
                    <li><a href="{{ route('register') }}" class="btn btn-primary">Register</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <header>
        <h1>Keranjang Anda</h1>
    </header>

    <section class="products">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($keranjang->count() > 0)
                <form action="{{ route('update-keranjang') }}" method="POST">
                    @csrf
                    <table class="table table-bordered table-striped text-center cart-table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach ($keranjang as $item)
                                @php 
                                    $subtotal = $item->price * $item->quantity; 
                                    $total += $subtotal;
                                @endphp
                                <tr class="product-item">
                                    <td>{{ optional($item->product)->name ?? 'Produk tidak ditemukan' }}</td>
                                    <td>${{ number_format($item->price, 2) }}</td>
                                    <td>
                                        <input type="number" name="quantities[{{ $item->id }}]" value="{{ $item->quantity }}" min="1">
                                    </td>
                                    <td>${{ number_format($subtotal, 2) }}</td>
                                    <td>
                                        <a href="{{ route('remove-from-keranjang', $item->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>Total: ${{ number_format($total, 2) }}</p>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn-update-cart">
                            <i class="bi bi-bag-check-fill"></i> Perbarui Keranjang
                        </button>                        
                        @php
                            $pesan = 'Halo, saya ingin memesan produk berikut:';
                            foreach ($keranjang as $item) {
                                $pesan .= "- " . optional($item->product)->name . " (" . $item->quantity . "x) ";
                            }
                            $pesan .= 'Terima kasih!';
                        @endphp
                        <a class="btn-whatsapp" href="https://wa.me/123456789?text={{ urlencode($pesan) }}" target="_blank">
                            <i class="bi bi-telephone-fill"></i> Pesan sekarang
                        </a>                        
                    </div>
                </form>
            @else
                <p>Keranjang Anda kosong!</p>
            @endif
        </div>
    </section>

    <footer id="contact" data-aos="fade-up">
        <div class="container">
            <div class="footer-content">
                <div class="footer-left">
                    <h3><img  class="footer-logo"> FlashStore</h3>
                    <p>Tempat Belanja </p>
                </div>
                <div class="footer-links">
                    <div class="footer-column">
                        <h4>Platform</h4>
                        <ul>
                            <li><a href="#home">Beranda</a></li>
                            <li><a href="#products">Produk</a></li>
                            <li><a href="https://wa.me/123456789?text=Halo%2C%20saya%20ingin%20bertanya%20mengenai%20produk%20Anda">Hubungi</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h4>Help</h4>
                        <ul>
                            <li><a href="#">How does it work?</a></li>
                            <li><a href="#">Where to ask questions?</a></li>
                            <li><a href="#">How to play?</a></li>
                            <li><a href="#">What is needed for this?</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h4>Contacts</h4>
                        <p>📞 853 6383 4829</p>
                        <p>📧 flashstore@gmail.com</p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/flashsoftindonesia/"><img src="images/facebook.png" alt="Facebook"></a>
                            <a href="https://www.instagram.com/flashsoftindonesia/"><img src="images/instagram.png" alt="Instagram"></a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="footer-bottom">@ Flashstore 2024. All rights reserved.</p>
        </div>
    </footer>

    <!-- AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
