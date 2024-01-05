<!DOCTYPE html>
<html>

<head>
    <title>Akun User Anda Telah Dibuat</title>
</head>

<body>
    <h1>Selamat Datang, {{ $user->username }}</h1>
    <p>Akun Anda telah berhasil dibuat di sistem kami.</p>
    <p>Berikut adalah detail akun Anda:</p>
    <ul>
        <li>Email: {{ $user->email }}</li>
        <li>Password: 12345678</li>
    </ul>
    <p>Silakan login ke sistem kami dan ubah password Anda segera.</p>
</body>

</html>
