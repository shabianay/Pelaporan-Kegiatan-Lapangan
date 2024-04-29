<?php
include 'templates/header.php';

?>      
  <h1 class="display-5">Pelaporan Kegiatan Lapangan</h1>
  <p class="lead">Jangan ambil pusing! Sampaikan kepada kami.</p>
  <div class="jumbotron-search">
    <form action="search.php" method="POST">
      <p class="lead" style="margin-bottom: -1px;">Cek data pelaporan anda</p>
    <input type="text" name="keyword" id="keyword" placeholder="Masukkan nomor pelaporan Anda disini">
    <button type="submit" class="btn btn-primary search-button" value="cari"><span class="fas fa-search mr-2"></span>Cek</button>
    </form>
    <p class="lead mt-2">atau ajukan pelaporan anda</p>
    <a href="form-pelaporan.php" class="btn btn-primary sub-button"><span class="fas fa-chevron-right mr-2"></span>Disini</a>
  </div>
<?php
include 'templates/footer.php';
?>
