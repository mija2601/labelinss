<?php
$page = isset($_GET['page']) ? $_GET['page'] : "home";

/* -------------------------
   DATA DOSEN / MAHASISWA / MATKUL
------------------------- */
$dosen_list = [
  ['nama' => 'Prof. Dr. Ir. Bidayatul Armynah, M.T', 'jab' => 'Pembimbing'],
  ['nama' => 'Prof. Dr. Arifin, M.T', 'jab' => 'Pengampu'],
  ['nama' => 'Prof. Dr. Bualkar Abdullah, M.Eng.Sc.', 'jab' => 'Instrumen'],
  ['nama' => 'Ida Laila, S.Si., M.Si', 'jab' => 'Praktikum']
];

$mahasiswa_2023 = [
  ['nim'=>'H021231043','nama'=>'ANSAR MUBAROQ'],
  ['nim'=>'H021231007','nama'=>'DANDI HARTONO'],
  ['nim'=>'H021231063','nama'=>'FEBRINESYA ALFHA TANDI LION'],
  ['nim'=>'H021231052','nama'=>'JULIYATI PUSPITA SARI'],
  ['nim'=>'H021231004','nama'=>'MISWANJA BATU PADANG'],
  ['nim'=>'H021231041','nama'=>'NUR ALIK KATU'],
  ['nim'=>'H021231067','nama'=>'NUR AMALIA'],
  ['nim'=>'H021231005','nama'=>'RUTH LEBANG'],
  ['nim'=>'H021231022','nama'=>'SHEIRA ABIDEVA. H'],
  ['nim'=>'H021231053','nama'=>'SRI WAHYUNI. SM'],
  ['nim'=>'H021231055','nama'=>'TASKIYATUNNAPS'],
  ['nim'=>'H021231037','nama'=>'ULVA ASRIANI NUR'],
  ['nim'=>'H021231042','nama'=>'YEMIMA MELANIE SURYA']
];

$matakuliah = [
  'INSTRUMENTASI MEDIK',
  'MIKROKONTROLER',
  'MIKROPROSESSOR',
  'SISTEM SENSOR',
  'PRAKTIKUM MIKROKONTROLER',
  'PRAKTIKUM MIKROPROSESSOR',
  'PRAKTIKUM SISTEM SENSOR'
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Prodi Fisika - Lab Elektronika</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body { font-family: Arial, sans-serif; margin:0; background:#f5faff; color:#073e5b; }
    header { background:linear-gradient(135deg,#bfe4ff,#7dc4ff); padding:20px; box-shadow:0 4px 15px rgba(0,0,0,0.1);}
    header h1 { margin:0; }
    nav { margin-top:10px; }
    nav a { margin-right:20px; text-decoration:none; color:#073e5b; font-weight:bold; padding:6px 12px; border-radius:5px; }
    nav a:hover { background:white; }

    .container { width:90%; margin:30px auto; }
    .card { background:white; padding:20px; border-radius:10px; box-shadow:0 8px 20px rgba(0,0,0,0.06); margin-bottom:20px; }
    table { width:100%; border-collapse:collapse; margin-top:15px;}
    th, td { padding:12px; border:1px solid #d8edff;}
    th { background:#cfeaff; }

    input[type=text] { padding:10px; width:70%; border-radius:8px; border:1px solid #a8d8ff; }
    button { padding:10px 14px; background:#49a9ff; color:white; border:none; border-radius:8px; cursor:pointer; }
    button:hover { background:#1f8be6; }

    footer { background:#bfe4ff; padding:15px; text-align:center; margin-top:40px; }
</style>
</head>

<body>

<header>
    <h1>Program Studi Fisika</h1>
    <p>Laboratorium Elektronika & Instrumentasi - Semester 5</p>

    <nav>
        <a href="index.php?page=home">Home</a>
        <a href="index.php?page=lab">Laboratorium</a>
        <a href="index.php?page=dosen">Dosen</a>
        <a href="index.php?page=mahasiswa">Mahasiswa</a>
        <a href="index.php?page=matkul">Mata Kuliah</a>
        <a href="index.php?page=kontak">Kontak</a>
    </nav>
</header>

<div class="container">

<?php
/* -------------------------
   HOME
------------------------- */
if ($page == "home") {
    echo "
    <div class='card'>
        <h2>Selamat Datang di Website Prodi Fisika</h2>
        <p>Website ini dibuat untuk membantu mahasiswa semester 5 yang mengambil peminatan Elektronika & Instrumentasi.</p>
    </div>
    ";
}

/* -------------------------
   LABORATORIUM
------------------------- */
elseif ($page == "lab") {
    echo "
    <div class='card'>
        <h2>Laboratorium Elektronika & Instrumentasi</h2>
        <p>Laboratorium ini digunakan untuk menunjang pembelajaran praktik seperti sistem sensor, mikrokontroler, dan instrumentasi.</p>
    </div>";
}

/* -------------------------
   DOSEN
------------------------- */
elseif ($page == "dosen") {
    echo "<div class='card'><h2>Daftar Dosen</h2>";
    echo "<table><tr><th>Nama</th><th>Keterangan</th></tr>";
    foreach ($dosen_list as $d) {
        echo "<tr><td>{$d['nama']}</td><td>{$d['jab']}</td></tr>";
    }
    echo "</table></div>";
}

/* -------------------------
   MAHASISWA + FORM SEARCH
------------------------- */
elseif ($page == "mahasiswa") {

    // Ambil kata kunci pencarian
    $keyword = isset($_POST['keyword']) ? strtolower($_POST['keyword']) : "";

    echo "<div class='card'>";
    echo "<h2>Mahasiswa Semester 5 - Angkatan 2023</h2>";

    echo "
    <form method='POST'>
        <input type='text' name='keyword' placeholder='Cari NIM atau Nama...' value='$keyword'>
        <button type='submit'>Cari</button>
    </form>
    ";

    echo "<table><tr><th>NIM</th><th>Nama</th></tr>";

    foreach ($mahasiswa_2023 as $m) {
        $nim = strtolower($m['nim']);
        $nama = strtolower($m['nama']);

        // Jika ada pencarian, filter hasil
        if ($keyword == "" || strpos($nim, $keyword) !== false || strpos($nama, $keyword) !== false) {
            echo "<tr><td>{$m['nim']}</td><td>{$m['nama']}</td></tr>";
        }
    }

    echo "</table></div>";
}

/* -------------------------
   MATA KULIAH
------------------------- */
elseif ($page == "matkul") {
    echo "<div class='card'><h2>Mata Kuliah Semester 5</h2>";
    echo "<ul>";
    foreach ($matakuliah as $mk) {
        echo "<li>$mk</li>";
    }
    echo "</ul></div>";
}

/* -------------------------
   KONTAK
------------------------- */
elseif ($page == "kontak") {
    echo "
    <div class='card'>
        <h2>Kontak</h2>
        <p>Email Prodi: <b>fisika@fmipa.unhas.ac.id</b></p>
        <p>Instagram: <b>@fisika_unhas</b></p>
    </div>
    ";
}
?>

</div>

<footer>
    © <?= date('Y') ?> Program Studi Fisika – Lab Elektronika & Instrumentasi
</footer>

</body>
</html>
