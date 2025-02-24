<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('forgotpassword.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
</head>

<body>

    <div class="container">
        <!-- Bagian Kiri -->
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello, Welcome!</h1>
                <p>Remember your password?</p>
                <a href="{{ route('login') }}"><button class="btn">Login</button></a>
            </div>
        </div>

        <!-- Form Lupa Password -->
        <div class="form-box">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <h1>Forgot Password</h1>
                <p>Enter your email and we will send you a reset link</p>

                <!-- Email Input -->
                <div class="input-box">
                    <input type="email" name="email" :value="old('email')" required autofocus
                        placeholder="Enter your email">
                    <i class="bi bi-envelope-fill"></i>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <button type="submit" class="btn">Send Reset Link</button>
            </form>
        </div>
    </div>

</body>
</html>
