<?
session_start();
//koneksi database
include "../include/koneksi.php";
if (isset($_SESSION['level']) && isset($_SESSION['username']))
{
   if ($_SESSION['level'] == "admin")
   {

//Ambil nilai yang akan di edit
if (isset($_GET['nis'])) {
	$nis = $_GET['nis'];
} 

//tampilkan data sebelum di edit
$sql2="select * from tblsiswa where nis='$nis';";
$tampil=mysql_query($sql2);
$baris=mysql_fetch_array($tampil);
$nis=$baris['nis'];
$nama_siswa=$baris['nama_siswa'];
$tempat_lahir=$baris['tempat_lahir'];
$tgl_lahir=$baris['tgl_lahir'];
$alamat=$baris['alamat'];
$kelas=$baris['kelas'];
$semester=$baris['semester'];
$jenis_kelamin=$baris['jenis_kelamin'];
$agama=$baris['agama'];
$foto=$baris['foto'];


?>
<style type="text/css">
<!--
body {
	background-color: #003366;
	background-image: url(../images/foto/images14.jpg);
}
-->
</style>
<table width="622" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFF66">
  <tr>
    <td colspan="2"><? include "header.php"; ?></td>
  </tr>
  <tr>
    <td width="103" align="center" valign="top" bgcolor="#FFCC33"><p>&nbsp;
      </p>
      <p>
        <? include "menu.php"; ?></p>
    </td>
    <td width="515" valign="top"><h2 align="center"><strong>Data Siswa SMA 1 Masbagik </strong></h2>
      <hr />
      <table width="510" border="0" align="center">
      <tr>
        <td valign="top"><table width="496" border="0" cellspacing="0" cellpadding="1">
          <tr>
            <td width="152">Nomor Induk Siswa </td>
            <td width="178">: <?=$nis?></td>
            <td width="160" rowspan="9"><div align="center"><? 
				echo "<img src='../images/foto/$foto' width=150 height=180> <br />";
				?></div></td>
          </tr>
          <tr>
            <td>Nama Siswa </td>
            <td>: <?=$nama_siswa?></td>
            </tr>
          <tr>
            <td>Tempat Lahir </td>
            <td>: <?=$tempat_lahir?></td>
            </tr>
          <tr>
            <td>Tanggal Lahir </td>
            <td>: <?=$tgl_lahir?></td>
            </tr>
          <tr>
            <td>Alamat</td>
            <td>: <?=$alamat?></td>
            </tr>
          <tr>
            <td>Kelas</td>
            <td>: <?=$kelas?></td>
            </tr>
          <tr>
            <td>Semester</td>
            <td>: <?=$semester?></td>
            </tr>
          <tr>
            <td>Jenis Kelamin </td>
            <td>: <?=$jenis_kelamin?></td>
            </tr>
          <tr>
            <td>Agama</td>
            <td>: <?=$agama?></td>
            </tr>
           </table>        
          <hr />
          <p align="center"><a href="siswa.php?nis=<? echo $nis;?>"><img src="../images/icon/Action-edit-icon.png" width="70" height="70" border="0" /></a><a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus_siswa.php?nis=<? echo $nis;?>';}"><img src="../images/icon/Action-cancel-icon.png" width="70" height="70" border="0" /></a></p>
          <p align="center"> </p></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33"><p>&nbsp;</p>
      <p>
        <? include "footer.php"; ?>
      </p>
    <p>&nbsp; </p></td>
  </tr>
</table>
<?
}
   else
   {
       // jika levelnya bukan admin, tampilkan pesan
       echo "<script type='text/javascript'>
{
if(alert('Sorry gank!! Anda tidak berhak mengakses halaman ini karena bukan admin.')){document.location='login.php';}
}

</script>";
   }
}
else
{
   echo "<script type='text/javascript'>
{
if(alert('Login Dulu dong Frend!!')){document.location='login.php';}
}

</script>";
}
?>