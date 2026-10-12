<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Bagian header -->
    <header>
        <h1>Tambah Mahasiswa</h1>
        <p>Web Programming 1</p>
    </header>

    <!-- Navigasi utama -->
    <nav>
        <a href="index.html">Biodata</a>
        <a href="layout.html">Layout Lab</a>
        <a href="data_mahasiswa.php">Data Mahasiswa</a>
        <a href="form_mahasiswa.php">Tambah Mahasiswa</a>
    </nav>

    <!-- Konten utama -->
    <main>
        <section>
            <h2>Form Data Mahasiswa</h2>

            <?php if (isset($_GET["status"]) && $_GET["status"] === "duplikat"): ?>
                <p class="alert-error">NIM sudah terdaftar.</p>
            <?php elseif (isset($_GET["status"]) && $_GET["status"] === "email_tidak_valid"): ?>
                <p class="alert-error">Format email tidak valid.</p>
            <?php endif; ?>

            <form action="proses_tambah.php" method="POST" class="student-form form-compact">
                <label for="nim">NIM</label>
                <input id="nim" name="nim" type="text" required>

                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" required>

                <label for="program_studi">Program Studi</label>
                <select id="program_studi" name="program_studi" required>
                    <option value="">Pilih Program Studi</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                </select>

                <label for="email">Email</label>
                <input id="email" name="email" type="email" required>

                <label for="nomor_telepon">Nomor Telepon</label>
                <input id="nomor_telepon" name="nomor_telepon" type="tel" required>

                <button type="submit">Simpan Data</button>
            </form>
        </section>
    </main>

    <!-- Footer halaman -->
    <footer>
        <p>Web Programming 1</p>
    </footer>
</body>
</html>
