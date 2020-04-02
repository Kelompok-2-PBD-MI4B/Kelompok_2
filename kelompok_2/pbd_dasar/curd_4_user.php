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
                    read_data();
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
                            <table>
                                <thead> 
                                    <tr>
                                        <td style="text-align : center;"><b>KODE</b></td>
                                        <td style="text-align : center;"><b>NAMA PRODI</b></td>
                                        <td style="text-align : center;"><b>AKREDITASI</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row=mysqli_fetch_array($result)) {?>
                                    <tr>
                                        <td style="text-align : center;"><?php echo $row['kdprodi'];?></td>
                                        <td><?php echo $row['nmprodi'];?></td>
                                        <td style="text-align : center;"><?php echo $row['akreditasi'];?></td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>
                    <?php } ?>
                    </div>
            </div>
        </div>
</body>
</html>