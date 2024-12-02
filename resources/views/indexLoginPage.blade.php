<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LoginPage</title>
    <link rel="stylesheet" href="styleLoginPage.css" />
    <script type="text/javascript" src="indexLogin.js"></script>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="../assets/silet_logo.png" alt="Logo" />
        </div>
        <h2 class="header">SI - LET</h2>
        <p style="font-size: large">
            Sistem Informasi dan Laporan Edukasi Terintegrasi
        </p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        <!-- Tampilkan form login jika tidak ada userRoles -->
        @if (!isset($userRoles) || $userRoles === null)
            <form id="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="email"></label>
                    <input class="username" type="email" name="email" id="username" placeholder="username"
                        value="{{ old('email') }}" />
                </div>
                <div>
                    <label for="password"></label>
                    <input class="password" type="password" name="password" id="password" placeholder="password" />
                </div>
                <button type="submit" class="login-button" id="login-button">
                    L O G I N
                </button>
            </form>
        @else
            <!-- Tampilkan form pemilihan role jika ada userRoles -->
            <form action="{{ route('select-role') }}" method="POST">
                @csrf
                <select name="role_id" required class="form-select">
                    @foreach ($userRoles as $userRole)
                        <option value="{{ $userRole->role_id }}">
                            {{ $userRole->role->nama_role }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="login-button">Pilih Role</button>
            </form>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="daftar-reset">
            <a href="" class="daftar-sekarang">Daftar Sekarang!</a>
            <a href="" class="reset-password">Reset Password</a>
        </div>
    </div>
</body>

</html>
