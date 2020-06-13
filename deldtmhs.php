<?php
    include_once("clsDATABASE.php");
    $db = new clsDATABASE();
    //?nim=11223347&act=del
    $hasil["STT"] = false;
    if(isset($_GET["act"])){
        $nimhs = $_GET["nim"];
        $hasil = $db->NIM2MHS($nimhs);
    }
    if(isset($_POST["txNIMUBAH"])){
        $nimhs = $_POST["txNIMUBAH"];
        $hasil = $db->DeldtMHS($nimhs);
    }
?>
<div class="notify">
<?php
    if(isset($_POST["txNIMUBAH"])){
        if($hasil["STT"]){
            echo "Pengapusan Data Sukses!!";
        }
    }
?>
</div>
<?php
if(isset($_GET["act"])){
    if($hasil["JML"] > 0){
?>
<h3>Hapus Data Mahasiswa</h3>
<form method="POST" action="deldtmhs.php">
  
  <div>
    <label>NIM</label>
    <input type="text" name="txNIM" value="<?=$hasil[0]["NIM"];?>" disabled>
  </div>
  <div>
    <label>NAMA</label>
    <input type="text" name="txNAMA" value="<?=$hasil[0]["NAMA"];?>" disabled>
  </div>
  <div>
    <label>ALAMAT</label>
    <input type="text" name="txALAMAT" value="<?=$hasil[0]["ALAMAT"];?>" disabled>
  </div>
  <div>
    <label>TELP</label>
    <input type="text" name="txTELP" value="<?=$hasil[0]["TELP"];?>" disabled>
  </div>  
  <div>
    <button type="submit">Delete Data</button>
    <input type="hidden" name="txNIMUBAH" value="<?=$hasil[0]["NIM"];?>">
  </div>
</form>
<?php
    }
}
?>