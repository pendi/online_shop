<?php 
	include "../header/header.php";
?>
<style type="text/css">
	.padding-left {
    padding-left: 135px;
	}
	.padding-right {
    padding-right: 135px;
	}

	img.scale:hover {
		-webkit-transform: scale(1.2,1.2);
		-moz-transform: scale(1.2,1.2);
		-ms-transform: scale(1.2,1.2);
		-o-transform: scale(1.2,1.2);
	}
</style>
<?php

$search = $_POST['search'];

if ($_POST['search'] <> "") {

	$sql = mysql_query("SELECT * FROM product WHERE status=2 AND name LIKE '%$search%' OR status=2 AND type LIKE '%$search%'");
	$jumlah = mysql_num_rows($sql);
	?>
	<div class="row-isi">
		<table class="width">
			<?php if ($jumlah > 0): ?>
				<tr>
					<td colspan="3"><center><?php echo "Menampilkan " .$search. " sebanyak " .$jumlah. " unit"; ?></center></td>
				</tr>
				<?php while ($r=mysql_fetch_array($sql)) : ?>
					<tr>
						<td class="padding-left" colspan="3">			
							<p><a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>" class="href ref"><?php echo $r["name"]; ?>&nbsp;<?php echo $r['type']; ?></a></p>
						</td>
					</tr>
					<tr>
						<td class="padding-left" width="128px">
							<?php if (!empty($r['image'])): ?>				
								<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="scale" src="<?php echo $r['image']; ?>" width="120px" height="120px"></a>
							<?php else : ?>
								<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/product/no-image.jpg' ?>" width="120px" height="120px"></a>
							<?php endif ?>
						</td>
						<td style="vertical-align: top; font-size: 14px;" colspan="2" class="padding-right">
							<?php echo $r["description"]; ?><br/>
						</td>
					</tr>
					<tr>
						<td align="right" style="font-size: x-large; color: #00008B;" colspan="2">
							<?php if ($r['stock'] == 0): ?>
								<a class="stock">STOK HABIS</a>			
							<?php endif ?>
							Rp. <?php echo price($r['price']); ?> &nbsp;
						</td>
						<td class="padding-right" width="80px">
							<?php if ($r['stock'] == 0): ?>
								<a>&nbsp;</a>
							<?php else: ?>
								<a href="../aplikasi/aksi.php?act=add&amp;id=<?php echo $r[0]; ?>" id="buy" class="button round">BELI</a>
							<?php endif ?>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<hr>				
						</td>
					</tr>
				<?php endwhile ?>
			<?php else : ?>
				<tr>
					<td><center><h2><font color="#FF1919"><?php echo "Maaf, ".$search." tidak ditemukan"; ?></font></h2></center></td>
				</tr>
			<?php endif ?>
			<tr>
				<td colspan="3">
					<?php include "../footer/footer.php" ?>	
				</td>
			</tr>
		</table>		
	</div>
<?php 
}
?>