<!-- resources/views/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Selamat Datang Admin, {{ auth()->user()->name }}!</h1>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>