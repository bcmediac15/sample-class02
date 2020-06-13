<?php
    include_once("clsDATABASE.php");
    $db = new clsDATABASE();
    $hasil = $db->ReadMHS();
?>
<h3>Data mahasiswa</h3>
<table border="1">
<thead>
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>NAMA mahasiswa</th>
        <th>ALAMAT</th>
        <th>Telpon</th>
        <th></th>
    </tr>
</thead>
<tbody>
<?php
$jdt = $hasil["JML"];
$nox = 0;
for($i=0;$i<=$hasil["JML"]-1;$i++){
    $nox++;
?>
    <tr>
        <td><?=$nox;?></td>
        <td><?=$hasil[$i]["NIM"];?></td>
        <td><?=$hasil[$i]["NAMA"];?></td>
        <td><?=$hasil[$i]["ALAMAT"];?></td>
        <td><?=$hasil[$i]["TELP"];?></td>
        <td><a href="?nim=<?=$hasil[$i]["NIM"];?>&act=edit">edit</a> | <a href="?nim=<?=$hasil[$i]["NIM"];?>&act=del">hapus</a> </td>
    </tr>
<?php
}
echo "Jumlah Data: " . $hasil["JML"] . " data";
?>
</tbody>

</table>