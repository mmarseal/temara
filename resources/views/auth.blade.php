<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk / Daftar - TEMARA</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-page font-sans text-ink antialiased">
<div class="mx-auto grid min-h-screen max-w-6xl items-center gap-8 px-4 py-8 sm:px-8 lg:grid-cols-2">
    {{-- Panel brand --}}
    <div>
        <x-logo />
        <h1 class="mt-8 text-4xl font-bold leading-tight sm:text-5xl">Merawat orang tua jadi lebih tertata</h1>
        <p class="mt-4 text-muted">Menemani dengan Peduli, Merawat dengan Hati</p>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
               {{-- Masuk --}}
        <div class="card">
            <h2 class="card-title">Masuk</h2>
            <form method="POST" action="{{ Route::has('login.store') ? route('login.store') : '#' }}" class="mt-4 space-y-4">
                @csrf
                <div>
                    <label for="login_email" class="label">Email</label>
                    <input id="login_email" name="email" type="email" placeholder="budi@email.com" value="{{ old('email') }}" class="input @error('email', 'login') border-bad @enderror">
                    @error('email', 'login')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="login_password" class="label">Kata sandi</label>
                    <input id="login_password" name="password" type="password" class="input">
                    @error('password', 'login')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="btn-primary w-full py-3">Masuk</button>
                <p class="text-xs text-muted">Belum punya akun? Daftar di samping.</p>
            </form>
        </div>
        
        {{-- Daftar --}}
        <div class="card">
            <h2 class="card-title">Daftar</h2>
            <form method="POST" action="{{ Route::has('register.store') ? route('register.store') : '#' }}" class="mt-4 space-y-4">
                @csrf
                <div>
                    <label for="reg_name" class="label">Nama</label>
                    <input id="reg_name" name="name" type="text" value="{{ old('name') }}" class="input">
                    @error('name')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="reg_email" class="label">Email</label>
                    <input id="reg_email" name="email" type="email" value="{{ old('email') }}" class="input @error('email') border-bad @enderror">
                    @error('email')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="reg_password" class="label">Kata sandi</label>
                    <input id="reg_password" name="password" type="password" class="input">
                    @error('password')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="btn-primary w-full py-3">Buat Akun</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>