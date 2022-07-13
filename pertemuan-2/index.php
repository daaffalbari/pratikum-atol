<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            text-align: center;
        }

        tr:nth-child(2n+2) {
            background: white;    
        }

        tr:nth-child(2n + 3){
            background-color: silver;
        }
    </style>
</head>
<body>
    <h1>Daftar Harga BBM</h1>
    <form method="post">
        <table border="1">
            <tr>
                <th>Liter Awal</th>
                <th>Liter Akhir</th>
                <th>&nbsp;</th>
            </tr>
            <tr>
                <td><input type="text" name="awal" maxlength="3" size="2" value="<?php echo (isset($_POST["awal"]) ? $_POST["awal"]:"") ?>"></td>
                <td><input type="text" name="akhir" maxlength="3" size="2" value="<?php echo (isset($_POST["akhir"]) ? $_POST["akhir"]:"") ?>"></td>
                <td><input type="submit" value="View" name="tblsubmit"></td>
            </tr>
        </table>
    </form>

    <?php 
        if(isset($_POST["tblsubmit"])){  // Jika telah menekan tombol submit
    ?>

    <?php
        // Membuat constanta
        define("HARGA_PREMIUM", 6500);
        define("HARGA_PERTAMAX", 8900);
        define("HARGA_PERTALITE", 7600);
        define("HARGA_SOLAR", 5150);
    ?>

    <table border="1">
        <tr>
            <th>Liter</th>
            <th>Premium</th>
            <th>Pertalite</th>
            <th>Pertamax</th>
            <th>Solar</th>
        </tr>

    <?php
        $awal = $_POST["awal"];
        $akhir = $_POST["akhir"];
        
        for($i=$awal; $i <= $akhir; $i++){
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo"Rp. ".number_format($i * HARGA_PREMIUM,2,",",".");?></td>
                <td><?php echo"Rp. ".number_format($i * HARGA_PERTALITE,2,",",".");?></td>
                <td><?php echo"Rp. ".number_format($i * HARGA_PERTAMAX,2,",",".");?></td>
                <td><?php echo"Rp. ".number_format($i * HARGA_SOLAR,2,",",".");?></td>
            </tr>  
            <?php
        }
        ?>
    </table>
    <?php 
        }
    ?>
</body>
</html>