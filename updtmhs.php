<?php
    include_once("clsDATABASE.php");
    $db = new clsDATABASE();
    //?nim=11223347&act=edit
    $hasil["STT"] = false;
    if(isset($_GET["act"])){
        $nimhs = $_GET["nim"];
        $hasil = $db->NIM2MHS($nimhs);
    }

    if(isset($_POST["txNIMUBAH"])){
        $nimhs = $_POST["txNIMUBAH"];
        $nm = $_POST["txNAMA"];
        $alamatmhs = $_POST["txALAMAT"];
        $tel = $_POST["txTELP"];
        $hasil = $db->UpdtMHS($nimhs,$nm,$alamatmhs,$tel);
    }
?>
<div class="notify">
<?php
    if(isset($_POST["txNIMUBAH"])){
        if($hasil["STT"]){
            echo "Edit Data Sukses!!";
        }
    }
?>
</div>
<?php
if(isset($_GET["act"])){
    if($hasil["JML"] > 0){
?>
<h3>Edit Data Mahasiswa</h3>
<form method="POST" action="updtmhs.php">
  
  <div>
    <label>NIM</label>
    <input type="text" name="txNIM" value="<?=$hasil[0]["NIM"];?>" disabled>
  </div>
  <div>
    <label>NAMA</label>
    <input type="text" name="txNAMA" value="<?=$hasil[0]["NAMA"];?>">
  </div>
  <div>
    <label>ALAMAT</label>
    <input type="text" name="txALAMAT" value="<?=$hasil[0]["ALAMAT"];?>">
  </div>
  <div>
    <label>TELP</label>
    <input type="text" name="txTELP" value="<?=$hasil[0]["TELP"];?>">
  </div>  
  <div>
    <button type="submit">Update Data</button>
    <input type="hidden" name="txNIMUBAH" value="<?=$hasil[0]["NIM"];?>">
  </div>
</form>
<?php
    }
}
?>