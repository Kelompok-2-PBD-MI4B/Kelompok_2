<?php 
require("../sistem/koneksi.php");

$hub = open_connection();
$a = @$_GET["a"];
$sql = @$_POST["sql"];

switch ($sql) {
	case "create":
		create_prodi();
		break;
}
switch ($a) {
	case "list":
		read_data();
		break;
	case "input":
		input_data();
		break;
	default:
		read_data();
		break;
}

mysqli_close($hub);
 ?>

<?php
 function read_data() {
	global $hub;
	$query = "select * from dt_prodi";
	$result = mysqli_query($hub, $query);
?>

	<h2>READ DATA PROGRAM STUDI</h2>
	<table border="1" cellpadding="2">
	<tr>
		<td colspan="4">
			<a href="curd_2.php?a=input">INPUT</a>
		</td>
	</tr>
		<tr>
			<td>ID</td>
			<td>KODE</td>
			<td>NAMA PRODI</td>
			<td>AKREDITASI</td>
		</tr>
		<?php while($row = mysqli_fetch_array($result)) { ?>
		<tr>
			<td><?php echo $row['idprodi']; ?></td>
			<td><?php echo $row['kdprodi']; ?></td>
			<td><?php echo $row['nmprodi']; ?></td>
			<td><?php echo $row['akreditasi']; ?></td>
		</tr>
		<?php } ?>
	</table>
<?php } ?>

<?php 
function input_data() {
	$row = array(
		"kdprodi" => "", 
		"nmprodi" => "", 
		"akreditasi" => "");
 ?>

	<h2>INPUT DATA PROGRAM STUDI</h2>
	<form action="curd_2.php?a=list" method="post">
		<input type="hidden" name="sql" value="create">
		<table>
			<tr>
				<td>KODE PRODI</td>
				<td>
					<input type="text" name="kdprodi" maxlength="6" size="30" value="<?php echo trim($row["kdprodi"])?>" />
				</td>
			<tr>
				<td>NAMA PRODI</td>
				<td>
					<input type="text" name="nmprodi" maxlength="70" size="30" value="<?php echo trim($row["nmprodi"])?>" />
				</td>
			</tr>
			<tr>
				<td>AKREDITASI</td>
				<td>
					<input type="radio" name="akreditasi" value="-" 
					<?php if ($row["akreditasi"]=='-' || $row["akreditasi"]=='') {echo "checked=\"checked\"";} else {echo "";} ?>> -
					
					<input type="radio" name="akreditasi" value="A" 
					<?php if ($row["akreditasi"]=='A' || $row["akreditasi"]=='') {echo "checked=\"checked\"";} else {echo "";} ?>> A
					
					<input type="radio" name="akreditasi" value="B" 
					<?php if ($row["akreditasi"]=='B' || $row["akreditasi"]=='') {echo "checked=\"checked\"";} else {echo "";} ?>> B
					
					<input type="radio" name="akreditasi" value="C" 
					<?php if ($row["akreditasi"]=='C' || $row["akreditasi"]=='') {echo "checked=\"checked\"";} else {echo "";} ?>> C				
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="action" value="SIMPAN">
				</td>
			</tr>
			<tr>
				<td>
					<a href="curd_2.php?a=list">BATAL</a>
				</td>
			</tr>
		</table>
	</form>
 <?php } ?>

 <?php 
function create_prodi() {
	global $hub;
	global $_POST;
	$query = "insert into dt_prodi (kdprodi,nmprodi,akreditasi) values ";
	$query .= "('".$_POST["kdprodi"]."', '".$_POST["nmprodi"]."', '".$_POST["akreditasi"]."')";
	mysqli_query($hub, $query) or die(mysql_error());
}
?>