<?php 
include "../aplikasi/koneksi.php";
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";
$query = mysql_query("select * from login where id='$_GET[id]'");
$data = mysql_fetch_array($query);
?>
<form action="editing_process_password.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $data[0]; ?>" />
	<table width="70%" align="center" bgcolor="#E6E6E6">
		<tr>
			<td colspan="3" align="center"><h2>EDIT PASSWORD</h2></td>
		</tr>
		<tr>
			<td width="23%"></td>
			<td width="12%">Change Password &nbsp;</td>
			<td width="35%"><input autofocus type="password" name="newpass" placeholder="Change Password"></td>
		</tr>
		<tr>
			<td></td>
			<td>Confirm Password &nbsp;</td>
			<td><input type="password" name="newpass2" placeholder="Confirm Password"></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td></td>
			<td>Insert Password &nbsp;</td>
			<td><input type="password" name="oldpass" placeholder="Insert Password"></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" name="submit" value="Submit">
				<a href="view_edit.php"><input type="button" name="button" value="Back"></a>
			</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">
				<?php include "../footer/footer.php"; ?>
			</td>
		</tr>
	</table>
</form>
<?php } ?>