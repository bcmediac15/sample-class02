<?php
    include_once("clsDATABASE.php");
    $db = new clsDATABASE();

    $hasil = false;
    if(isset($_POST["txNIM"])){
        $nimhs = $_POST["txNIM"];
        $nm = $_POST["txNAMA"];
        $alamatmhs = $_POST["txALAMAT"];
        $tel = $_POST["txTELP"];
        //validasi data
        $hasil = $db->CreaMHS($nimhs, $nm, $alamatmhs, $tel);
    }

?>

<div class="notify">
<?php
  if(isset($_POST["txNIM"])){
    if($hasil["STT"]){
        echo "Insert Data Sukses!!";
    }
  }
?>
</div>

<h3>Data Mahasiswa Baru</h3>
<form method="POST" action="">
  
  <div>
    <label>NIM</label>
    <input type="text" name="txNIM" value="">
  </div>
  <div>
    <label>NAMA</label>
    <input type="text" name="txNAMA" value="">
  </div>
  <div>
    <label>ALAMAT</label>
    <input type="text" name="txALAMAT" value="">
  </div>
  <div>
    <label>TELP</label>
    <input type="text" name="txTELP" value="">
  </div>  
  <div>
    <button type="submit">Insert Data</button>
  </div>
</form>
