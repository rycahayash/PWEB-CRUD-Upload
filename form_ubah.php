<html>
<head>
  <title>Aplikasi CRUD dengan PHP</title>

  
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

    a {
    color: #F1CC75;
    text-decoration: none;
    }

    a:hover {
    opacity: 0.5;
    color: white;
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

    .select:not(.is-multiple):not(.is-loading):after {
    border: 3px solid transparent;
    border-radius: 2px;
    border-right: 0;
    border-top: 0;
    content: " ";
    display: block;
    height: .625em;
    margin-top: -.4375em;
    pointer-events: none;
    position: absolute;
    top: 50%;
    transform: rotate(-45deg);
    transform-origin: center;
    width: .625em
}

    body,
    dl,
    h1,
    h2,
    html,
    ol,
    p {
        margin: 0;
        padding: 0
    }

    html {
        box-sizing: border-box
    }

    *,
    :after,
    :before {
        box-sizing: inherit
    }

    body {
        color: black;
        font-size: 1em;
        font-weight: 400;
        line-height: 1.5
    }

    .container {
        flex-grow: 1;
        margin: 0 auto;
        position: relative;
        width: auto
    }

    @media screen and (min-width:1024px) {
        .container {
            max-width: 960px
        }
    }

    @media screen and (min-width:1216px) {
        .container:not(.is-max-desktop) {
            max-width: 1152px
        }
    }

    @media screen and (min-width:1408px) {
        .container:not(.is-max-desktop):not(.is-max-widescreen) {
            max-width: 1344px
        }
    }

    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        border: none;
        border-bottom: 2px solid #AC8220;
        background-color: #f8f8f8;
        resize: none;
    }

    textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid #AC8220;
    background-color: #f8f8f8;
    resize: none;
    }

    select {
    width: 100%;
    padding: 12px 20px;
    border: none;
    border-bottom: 2px solid #AC8220;
    background-color: #f8f8f8;
    }

    input[type=button], input[type=submit], input[type=reset] {
    background-color: #AC8220;
    border: none;
    border-radius: 100px;
    color: white;
    padding: 10px 25px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    }

    input::file-selector-button {
        background-color: grey;
        border: none;
        border-radius: 100px;
        color: white;
        padding: 10px 25px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer; 
    }

    .option {
    width: 100%;
    padding: 12px 20px;
    border: none;
    background-color: #f8f8f8;
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

    @media print,
    screen and (min-width:769px) {
        .columns:not(.is-desktop) {
            display: flex
        }
    }

    .mt-4 {
        margin-top: 1rem !important
    }

    .section {
        padding: 3rem 1.5rem
    }

    footer {
    padding: 1em 1.5em;
    position: fixed;
    bottom: 0;
    width: 100%;
    color: white;
    text-align: center;
    }

</style>
</head>
<body>
    <header>
        <h1>Ubah Data Siswa</h1>
    </header>

  <?php
  // Load file koneksi.php
  include "koneksi.php";
  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $id = $_GET['id'];
  // Query untuk menampilkan data siswa berdasarkan ID yang dikirim
  $sql = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
  $sql->bindParam(':id', $id);
  $sql->execute(); // Eksekusi query insert
  $data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql
  ?>

<section class="section" id="section-pencarian">
        <div class="container">
          <div class="card">
            <div class="card-content">
              <div class="content">

  <form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
    <table cellpadding="8">
    <fieldset>

        <p>
            <div class="field mt-4">
                <label for="nama">NIS: </label>
                <div class="control">
                    <input type="text" name="nis" value="<?php echo $data['nis']; ?>">
                </div>
            </div>
        </p>  
    
        <p>
            <div class="field mt-4">
                <label for="nama">Nama: </label>
                <div class="control">
                    <input type="text" name="nama" value="<?php echo $data['nama']; ?>">
                </div>
            </div>
        </p>

        <p>
            <div class="field mt-4">
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <div class="control">
                <?php?>
                            <div class="option">
                                <div class="control">
                                    <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($data == "laki-laki") ? "checked": "" ?>> Laki-laki</label>
                                </div>
                                <div class="control">
                                    <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($data == "perempuan") ? "checked": "" ?>> Perempuan</label>
                                </div>
                            </div>
                </div>
            </div>
        </p>

      <tr>
        <td>Jenis Kelamin</td>
        <td>
        
        </td>
      </tr>
      <tr>
        <td>Telepon</td>
        <td><input type="text" name="telp" value="<?php echo $data['telp']; ?>"></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><textarea name="alamat"><?php echo $data['alamat']; ?></textarea></td>
      </tr>
      <tr>
        <td>Foto</td>
        <td>
          <input type="file" name="foto">
        </td>
      </tr>
    </table>
    <hr>
    <input type="submit" value="Ubah">
    <a href="index.php"><input type="button" value="Batal"></a>
  </form>
</body>
</html>