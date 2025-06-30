<!DOCTYPE html>
<html>

<head>
    <title>Form Pendaftaran Siswa Baru</title>
</head>

<body>
    <h2>Pendaftaran Siswa Baru</h2>

    @if (session('success'))
        <div class="text-center text-green-500 mx-auto">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <label>Nama Lengkap:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Nomor HP:</label><br>
        <input type="text" name="phone" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="address" required></textarea><br><br>

        <label>Jenis Kelamin:</label><br>
        <select name="gender" required>
            <option value="">-- Pilih --</option>
            <option value="male">Laki-laki</option>
            <option value="female">Perempuan</option>
        </select><br><br>

        <label>Tanggal Lahir:</label><br>
        <input type="date" name="birth_date" required><br><br>

        <label>Jurusan yang Diminati:</label><br>
        <input type="text" name="major" required><br><br>

        <button type="submit">Daftar</button>
    </form>
</body>

</html>
