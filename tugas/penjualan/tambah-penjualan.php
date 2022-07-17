<?php
  include_once("../functions.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<title>Tambah Penjualan</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        background: #fafafa;
        display: grid;
        align-items: center;
        justify-items: center;
        width: 100vw;
      }

      .container {
        margin-top: 2em;
        padding-left: 2em;
        padding-right: 2em;
        padding-bottom: 2em;
        border: 2px solid rgba(0, 0, 0, 1);
        box-shadow: 15px 15px 1px #ffa580, 15px 15px 1px 2px rgba(0, 0, 0, 1);
      }

      #header {
        margin: auto;
        padding: 20px;
      }

      #title {
        font-size: 30px;
        font-weight: bold;
        color: #333;
        text-align: center;
      }

      .form-grup {
        padding: 0.5em;
      }

      .text {
        width: 100%;
        padding: 0.5em;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        color: #333;
      }

      .text:hover {
        border: 1px solid #ffa580;
      }


      #submit {
        width: 100%;
        padding: 0.5em;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        color: #333;
        background: #ffa580;
        cursor: pointer;
      }

    </style>
	</head>
	<body>
		<div class="container col-md-5">
			<header id="header">
				<h1 id="title">Tambah Penjualan</h1>
			</header>
			<main>
				<form action="simpan-penjualan.php" id="survey-form" method="POST" class="form">

          <!-- Form obat -->
          <div class="form-grup col-md-4">
            <label for="idObat">ID Obat</label>
            <br />
            <select name="idObat" class="form-select col-md-4">
              <option>Pilih id Obat</option>
              <?php
                $listObat=getListObat();
                foreach($listObat as $obat){
                  echo "<option value='$obat[id]'>$obat[id]</option>";
                }
              ?>
            </select>
          </div>

          <!-- Form name -->
          <div class="form-grup">
            <label for="namapasien">Nama Pasien</label>
            <br />
            <select name="idPasien" class="form-select col-md-4">
              <option>Pilih Pasien</option>
              <?php
                $listPasien=getListPasien();
                foreach($listPasien as $pasien){
                  echo "<option value='$pasien[id]'>$pasien[nama]</option>";
                }
              ?>
            </select>
          </div>

					<div class="form-grup">
						<label for="tanggal" >Tanggal</label>
						<br />
						<input class="text" type="date" name="tanggal" placeholder="Tanggal" required /><br />
					</div>


					<div class="form-grup">
						<label for="stok">Jumlah</label>
						<br />
						<input type="number" class="text" id="number" name="stok" placeholder="Stok" max="999" required /><br />
					</div>

          <div class="form-grup">
            <label for="nama-admin">Nama Admin</label>
            <br />
            <select name="idAdmin" class="form-select col-md-4 mb-4">
              <option>Pilih Admin</option>
              <?php
                $listAdmin=getListAdmin();
                foreach($listAdmin as $admin){
                  echo "<option value='$admin[id]'>$admin[nama]</option>";
                }
              ?>
          </div>

					<!-- Submit Form -->
					<div class="form-grup">
						<input type="submit" name="simpan" value="Submit" class="btn btn-primary"/>
					</div>
				</form>
			</main>
		</div>
	</body>
</html>
