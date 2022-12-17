<html>
<head>
    <title>Aplikasi CRUD Plus Upload Gambar dengan PHP</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway');

        body {
        margin: 0;
        font-family: 'Raleway';
        font-size: 16px;
        line-height: 1.8em;
        background-image: url('Background-image.png');
        }

        a, p {
        color: #AC8220;
        font-weight: bold;
        text-decoration: none;
        }

        a:hover {
        opacity: 0.5;
        color: black;
        }

        header, main, footer {
        margin: 0 auto;
        }

        header {
        padding: 2em;
        text-align: center;
        background-size: cover;
        background-position: fixed;
        color: white;
        font-weight: bold;
        }

        header section {
        margin: 0 auto;
        max-width: 640px;
        }

        header img {
        border-radius: 50%;
        max-width: 150px;
        }

        h3 {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 30px;
        color: #F1CC75;
        }

        .container {
            flex-grow: 1;
            margin: 0 auto;
            position: relative;
            width: auto
        }

        .card {
            background-color: #fff;
            border-radius: .50rem;
            box-shadow: 0 .5em 1em -.125em rgba(10, 10, 10, .1), 0 0 0 1px rgba(10, 10, 10, .02);
            color: #4a4a4a;
            max-width: 100%;
            overflow: hidden;
            position: relative;
            
        }

        .content {
            margin: 0;
            font-weight: 400;
            font-size: 18px;
            color: black;
            text-align: justify;
            padding: em;
        }

        .card-content {
            padding: 3rem;
        }

        #siswa {
        border-collapse: collapse;
        width: 100%;
        }

        #siswa td, #siswa th {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        }

        #siswa tr:nth-child(even){background-color: #f2f2f2;}

        #siswa tr:hover {background-color: #ddd;}

        #siswa th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #AC8220;
        color: white;
        }
        
    </style>
</head>
<body>
    <header>
        <h1>Data Siswa</h1>
    </header>

  <div class="container">
        <div class="card">
            <div class="card-content">
              <div class="content">

  <a href="form_simpan.php">Tambah Data</a><br><br>
  <table border="1" width="100%" id="siswa">
  <tr>
    <th>Foto</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Telepon</th>
    <th>Alamat</th>
    <th colspan="2">Aksi</th>
  </tr>
  <?php
  // Load file koneksi.php
  include "koneksi.php";
  // Buat query untuk menampilkan semua data siswa
  $sql = $pdo->prepare("SELECT * FROM siswa");
  $sql->execute(); // Eksekusi querynya
  while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
    echo "<td>".$data['nis']."</td>";
    echo "<td>".$data['nama']."</td>";
    echo "<td>".$data['jenis_kelamin']."</td>";
    echo "<td>".$data['telp']."</td>";
    echo "<td>".$data['alamat']."</td>";
    echo "<td><a href='form_ubah.php?id=".$data['id']."'>Ubah</a></td>";
    echo "<td><a href='proses_hapus.php?id=".$data['id']."'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table>

  </div>
    </div>
    </div>
    </div>
</body>
</html>