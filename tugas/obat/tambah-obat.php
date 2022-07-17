<?
 include('../functions.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="style.css" />
		<title>Tambah obat</title>
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
		<div class="container">
			<header id="header">
				<h1 id="title">Tambah Obat</h1>
			</header>
			<main>
				<form action="simpan-obat.php" id="survey-form" method="POST">
					<!-- Form name -->
					<div class="form-grup">
						<label for="idObat">ID Obat</label>
						<br />
						<input class="text" type="text" name="idObat" placeholder="ID Obat" required /><br />
					</div>

					<div class="form-grup">
						<label for="nama" id="nama-label">Nama Obat</label>
						<br />
						<input class="text" type="text" name="nama" placeholder="Nama Obat" required /><br />
					</div>

					<div class="form-grup">
						<label for="stok" id="number-label">Stok</label>
						<br />
						<input type="number" class="text"name="stok" placeholder="Stok" max="999" required /><br />
					</div>

          <div class="form-grup">
            <label for="harga">Harga</label>
            <br />
            <input type="text" class="text" name="harga" placeholder="Harga" required /><br />
          </div>

					<!-- Submit Form -->
					<div class="form-grup">
						<input type="submit" id="submit" value="Tambah" name="simpan" />
					</div>
				</form>
			</main>
		</div>
	</body>
</html>
