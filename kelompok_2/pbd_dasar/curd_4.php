<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akreditasi</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<div class="wrap">
		<aside class="sidebar">
			<div class="widget">
				<h2>Anggota Kelompok 2:</h2>
                <p>
                1. Ni Nyoman Ita Triyani (18753041)</p>
                <p>2. Revana Yola Varinda (18753042) </p>
                <p>3. Putri Dewi Pradasari (18753048)</p>
                <p>4. Rizky Agusetiawan (18753059)</p>
                <p>5. Sri Ayu Lestari (18753064)</p>
                <p>6. Patria Deny Saputra (18753068)</p>
                <a href="login.php?a=logout" ><button class="tombol">LOGOUT</button></a> 
			</div>
		</aside>

 
		<div class="blog">
			<div class="conteudo">
				<?php
                    require("../sistem/koneksi.php");

                    $hub = open_connection();
                    $a = @$_GET["a"];
                    $id = @$_GET["id"];
                    $sql = @$_POST["sql"];
        
                    switch ($sql) {
                        case "create":
                            create_prodi();
                            break;
                        case "update":
                            update_prodi();
                            break; 
                        case "delete":
                            delete_prodi();
                            break;   
                    }
                    switch ($a) {
                        case "list":
                            read_data();
                            break;
                        case "input":
                            input_data();
                            break;
                        case "edit":
                            edit_data($id);
                            break;
                        case "delete":
                            delete_data($id);
                            break;
                        default:
                            read_data();
                            break;
                    }

                    mysqli_close($hub);
                    ?>

                    <?php
                    function read_data()
                    {
                        global $hub;
                        $query = "select * from dt_prodi";
                        $result = mysqli_query($hub, $query);?>
                        <div class="container">
                            <h2>Read Data Program Studi</h2>
                            <a href="curd_4.php?a=input" class="input"><button class="tombol">INPUT</button></a> 
                            <table>
                                <thead> 
                                    <tr>
                                        <td style="text-align : center;"><b>KODE</b></td>
                                        <td style="text-align : center;"><b>NAMA PRODI</b></td>
                                        <td style="text-align : center;"><b>AKREDITASI</b></td>
                                        <td style="text-align : center;"><b>AKSI</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row=mysqli_fetch_array($result)) {?>
                                    <tr>
                                        <td style="text-align : center;"><?php echo $row['kdprodi'];?></td>
                                        <td><?php echo $row['nmprodi'];?></td>
                                        <td style="text-align : center;"><?php echo $row['akreditasi'];?></td>
                                        <td style="text-align : center;">
                                            <a href="curd_4.php?a=edit&id=<?php echo $row['idprodi'];?>"><button class="tombol">EDIT</button></a> 
                                            <span> | </span>
                                            <a href="curd_4.php?a=delete&id=<?php echo $row['idprodi'];?>"><button class="tombol">HAPUS</button></a> 


                                        </td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>
                    <?php } ?>
                    
                    <?php
                    function input_data() {
                        $row = array(
                            "kdprodi"=> "",
                            "nmprodi"=> "",
                            "akreditasi"=> "-"
                            ); ?>
                        <h2>Input Data Program Studi</h2>
                        <div class="container1">
                        <form action="curd_4.php?a=list" method="post">
                            <input type="hidden" name="sql" value="create">
                            Kode Prodi
                            <input type="text" name="kdprodi" maxlength="6" size="6" value="<?php echo trim($row["kdprodi"]); ?>"/>
                            <br>
                            <br>
                            Nama Prodi
                            <input type="text" name="nmprodi" maxlength="70" size="70" value="<?php echo trim($row["nmprodi"]); ?>"/>
                            <br>
                            <br>
                            Akreditasi
                            <input type="radio" name="akreditasi" value="-"
                            <?php if ($row["akreditasi"]=='-' || $row["akreditasi"]=='') {
                                echo "checked=\"checked\"";}else {echo "";} ?> > -
                            <input type="radio" name="akreditasi" value="A"
                            <?php if ($row["akreditasi"]=='A'){
                                echo "checked=\"checked\"";}else {echo "";} ?> > A
                            <input type="radio" name="akreditasi" value="B"
                            <?php if ($row["akreditasi"]=='B') {
                                echo "checked=\"checked\"";}else {echo "";} ?> > B
                            <input type="radio" name="akreditasi" value="C"
                            <?php if ($row["akreditasi"]=='C') {
                                echo "checked=\"checked\"";}else {echo "";} ?> >C
                            <br>
                            <br>
                            <input type="submit" name="action" value="Simpan">
                            <br>
                            <br>
                            <a href="curd_4.php?a=list">Batal</a>
                        </form>
                        </div>
                    <?php } ?>

                    <?php 
                    function edit_data($id) {
                        global $hub;
                        $query = "select * from dt_prodi where idprodi = $id";
                        $result = mysqli_query($hub, $query);
                        $row = mysqli_fetch_array($result);

                    ?>

                    <h2>Edit Data Program Studi</h2>
                    <form action="curd_4.php?a=list" method="post">
                        <input type="hidden" name="sql" value="update">
                        <input type="hidden" name="idprodi" value="<?php echo trim($id) ?>">
                        Kode Prodi
                        <input type="text" name="kdprodi" maxlength="6" size="6" value="<?php echo trim($row["kdprodi"]) ?>"/>
                        <br>
                        <br>
                        Nama Prodi
                        <input type="text" name="nmprodi" maxlength="6" size="6" value="<?php echo trim($row["nmprodi"]) ?>"/>
                        <br>
                        <br>
                        Akreditasi
                        <input type="radio" name="akreditasi" value="-" <?php if ($row["akreditasi"]=='-' || $row["akreditasi"]=='') {echo "checked=\"checked\"";} else {echo "";} ?>> -
                        <input type="radio" name="akreditasi" value="A" <?php if ($row["akreditasi"]=='A' || $row["akreditasi"]=='') {echo "checked=\"checked\"";} else {echo "";} ?>> A
                        <input type="radio" name="akreditasi" value="B" <?php if ($row["akreditasi"]=='B' || $row["akreditasi"]=='') {echo "checked=\"checked\"";} else {echo "";} ?>> B
                        <input type="radio" name="akreditasi" value="C" <?php if ($row["akreditasi"]=='C' || $row["akreditasi"]=='') {echo "checked=\"checked\"";} else {echo "";} ?>> C
                        <br>
                        <br>
                        <input type="submit" name="action" value="Simpan">
                        <br>
                        <br>
                        <a href="curd_4.php?a=list">Batal</a>
                    </form>
                    <?php } ?>

                    <?php 
                    function delete_data($id) {
                        global $hub;
                        $query = "select * from dt_prodi where idprodi = $id";
                        $result = mysqli_query($hub, $query);
                        $row = mysqli_fetch_array($result);

                    ?>

                    <h2>Delete Data Program Studi</h2>
                    <form action="curd_4.php?a=list" method="post">
                        <input type="hidden" name="sql" value="delete">
                        <input type="hidden" name="idprodi" value="<?php echo trim($id) ?>">
                        <table>
                            <tr>
                                <td width="100">Kode</td>
                                <td><?php echo trim($row["kdprodi"]) ?></td>
                            </tr>
                            <tr>
                                <td>Nama Prodi</td>
                                <td><?php echo trim($row["nmprodi"])?></td>
                            </tr>
                            <tr>
                                <td>Akreditasi</td>
                                <td><?php echo trim($row["akreditasi"])?></td>
                            </tr>
                        </table>
                        <br>
                        <br>
                        <input type="submit" name="action" value="Hapus">
                        <br>
                        <br>
                        <a href="curd_4.php?a=list">Batal</a>
                    </form>

                    <?php } ?>

                    <?php 
                        function create_prodi() {
                            global $hub;
                            global $_POST;
                            $query = "insert into dt_prodi (kdprodi, nmprodi, akreditasi) values ";
                            $query .= "('".$_POST["kdprodi"]."', '".$_POST["nmprodi"]."', '".$_POST["akreditasi"]."')";
                            mysqli_query($hub, $query) or die(mysql_error());
                        }
                        function update_prodi(){
                            global $hub;
                            global $_POST;
                            $query = "update dt_prodi";
                            $query .= " SET kdprodi='".$_POST["kdprodi"]."', nmprodi='".$_POST["nmprodi"]."', akreditasi='".$_POST["akreditasi"]."'";
                            $query .= " where idprodi = ".$_POST["idprodi"];
                            mysqli_query($hub, $query) or die(mysql_error());
                        }
                        function delete_prodi() {
                            global $hub;
                            global $_POST;
                            $query = "delete from dt_prodi";
                            $query .= " where idprodi = ".$_POST["idprodi"];
                            mysqli_query($hub, $query) or die(mysql_error());
                        }
                    ?>
            </div>
        </div>
</body>
</html>