<?php
    class clsDATABASE{
        private $cnn, $dbs;

        function __construct(){
            $this->cnn = mysqli_connect("localhost","stiki","web1","db_kampus") 
            or die("Koneksi ke DBMS Mysql Gagal<br>");
        }
        function __destruct(){
            if($this->cnn){
                mysqli_close($this->cnn);
            }
        }
        //membuat proses CRUD
        public function CreaMHS($nimhs, $nm, $alamatmhs, $tel){
            $hsl = array();
            $hsl["STT"] = false;
            $sql = "INSERT INTO mahasiswa(NIM,NAMA,ALAMAT,TELP) VALUES('$nimhs','$nm','$alamatmhs','$tel');";
            $this->dbs = mysqli_query($this->cnn,$sql);
            if($this->dbs){
                //echo "Menambahkan data baru sukses<br>";
                $hsl["STT"]=true;
            }
            return $hsl;
        }
        public function ReadMHS(){
            $sql = "SELECT NIM, NAMA, ALAMAT, TELP FROM mahasiswa;";
            $hsl = array();
            $this->dbs = mysqli_query($this->cnn, $sql);
            if($this->dbs){
                $jml = 0;
                while( $h = mysqli_fetch_array($this->dbs) ){
                    $hsl[$jml]["NIM"] = $h["NIM"];
                    $hsl[$jml]["NAMA"] = $h["NAMA"];
                    $hsl[$jml]["ALAMAT"] = $h["ALAMAT"];
                    $hsl[$jml]["TELP"] = $h["TELP"];
                    $jml++;
                }
                $hsl["JML"] = $jml;
            }
            return $hsl;
        }
        public function NIM2MHS($nimhs){
            $sql ="SELECT NIM, NAMA, ALAMAT, TELP FROM mahasiswa WHERE NIM='$nimhs';";
            $hsl = array();
            $this->dbs = mysqli_query($this->cnn, $sql);
            if($this->dbs){
                $jml=0;
                while( $h = mysqli_fetch_array($this->dbs)){
                    $hsl[$jml]["NIM"] = $h["NIM"];
                    $hsl[$jml]["NAMA"] = $h["NAMA"];
                    $hsl[$jml]["ALAMAT"] = $h["ALAMAT"];
                    $hsl[$jml]["TELP"] = $h["TELP"];
                    $jml++;
                }
                $hsl["JML"] = $jml;
            }
            return $hsl;
        }
        public function UpdtMHS($nimhs,$nm,$alamatmhs,$tel){
            $hsl =array();
            $hsl["STT"] = false;
            $sql = "UPDATE mahasiswa SET NAMA='$nm', ALAMAT='$alamatmhs', TELP='$tel' WHERE NIM='$nimhs';";
            $this->dbs = mysqli_query($this->cnn, $sql);
            if($this->dbs){
                //echo "Update Data mahasiswa Sukses";
                $hsl["STT"]=true;
            }
            return $hsl;
        }
        public function DeldtMHS($nimhs){
            $hsl =array();
            $hsl["STT"] = false;
            $sql = "DELETE FROM mahasiswa WHERE NIM='$nimhs';";
            $this->dbs = mysqli_query($this->cnn, $sql);
            if($this->dbs){
                //echo "Delete Data Sukses";
                $hsl["STT"]=true;
            }
            return $hsl;
        }
    }

/*
//uji class
$db = new clsDATABASE();
$db->DeldtMHS('11223344');
$dta = $db->UpdtMHS('11223344','Budi Sentosa Sjah','Jl. Waru No 34','08110011001');
print_r($dta);
$db->CreaMHS('11223344', 'Budi', 'Jl. Pemuda No 17', '08110011001');
$dta = $db->ReadMHS();
echo "Jumlah Data: ".$dta["JML"] . " Data";
for($i=0; $i<=$dta["JML"]-1;$i++){
    $nox = $i+1;
    echo "No:" . $nox . "<br>";
    echo "NIM: " . $dta[$i]["NIM"] . "<br>";
    echo "NAMA: " . $dta[$i]["NAMA"] . "<br>";
    echo "ALAMAT: ". $dta[$i]["ALAMAT"] . "<br>";
    echo "TELP: " . $dta[$i]["TELP"] . "<br>";
    echo "<br>";
}

opsi menambah berdasarkan thn-bulan-tgl

tabel: biaya
field: 
    tglpengeluaran
    option
    
    Select tglpengeluaran, option FROM biaya;
    INSERT INTO biaya(tglpenegeluaran,option) VALUES('0000-00-00','opsi');
    UPDATE biaya SET option='opsibaru' WHERE tglpengeluaran='0000-00-00'; 
    DELETE FROM biaya WHERE tglpengeluaran='0000-00-00'; 

    $tgl = date('Y-m-d');


*/