<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
</head>
<body class="body">
<?php  
include "koneksi.php";

$batas   = 10;
if(isset($_GET['halaman'])) { $halaman = $_GET['halaman']; } 
	else { $halaman = ""; }

if(empty($halaman)){ 
    $posisi=0; 
    $halaman=1; 
} 
else{ 
    $posisi = ($halaman-1) * $batas; 
}
echo "<pre>";
print_r($batas);
exit();
$sql = mysql_query("select * from product limit $posisi,$batas");
	while ($r=mysql_fetch_array($sql)) {
		echo "<div class='list'>
				<div width='14%' align='center'>
					<img src='$r[image]' width=100 border=0><br/>
				</div>
				<div width='14%' align='center'>
					<b>$r[name]</b><br/>
				</div>
				<div width='14%' align='center'>
					<b>Rp. $r[price]</b><br />
				</div>
				<div width='14%' align='center'>
					<a href='module.php?module=detail&id_product=$r[0]'><input type=button value='Detail Product'></a>
				</div>
			</div>";
	}
?>
<table width="100%" align="center">
	<tr>
		<td align="right">		
			<?php
				echo "<br>Halaman : "; 
				$file="produk.php"; 

				$tampil2="select * from product"; 
				$hasil2=mysql_query($tampil2); 
				$jmldata=mysql_num_rows($hasil2); 
				$jmlhalaman=ceil($jmldata/$batas); 

				for($i=1;$i<=$jmlhalaman;$i++) 
				if ($i != $halaman) 
				{ 
				    echo " <a href=$_SERVER[PHP_SELF]?halaman=$i><font color='blue'>$i</font></A> | "; 
				} 
				else 
				{ 
				    echo " <b>$i</b> | "; 
				}
			?>
		</td>
	</tr>
</table>
</body>
</html>