   <header class="w3-container" style="padding-top:22px">
   <h5><b></b></h5>
  </header>
  <?php
  if ($cek==0){

echo "<div class='w3-container'>
<p class='alert alert-info'>Silahkan Masukkan Data kehadiran terlebih dahulu untuk menggunakan Batal Simpan</p>
</div>";
  }else{ ?>

  <div class="w3-container">
<a href="conten/aksi_batal.php?id=<?php echo $id?>"><button class="fa fa-remove btn btn-danger"> Batal Simpan</button></a>
</div>
  <?php }
  ?>

