<!doctype html>

<?php
		
	$host="localhost"; //Variabel Host MYSQL
	$user="root"; //Variabel USer MYSQL
	$password=""; //Variabel Password MYSQL
	$database="arkademy_sql"; //Variabel Database

	//sambungkan ke database
	$koneksi=mysql_connect($host,$user,$password); 

	//memilih database yang akan dipakai
	$select_db = mysql_select_db($database, $koneksi);

	if($koneksi == false && $select_db == false) {  //cek koneksi. Baru jalan kalau koneksi gagal 
		echo "koneksi ke database mysql gagal karena : ".mysql_error();
		exit();
	}
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    <title>GB Arkademy Test No. 7</title>

    <style>
      html, body {
    height: 100%;
    }

    html {
        display: table;
        margin: auto;
    }

    body {
        display: table-cell;
        vertical-align: middle;
    }

    table {
      vertical-align: middle;
    }

    </style>
  </head>
  <body>
    <h2>Tabel Jumlah Produk di Tiap Kategori</h2>
    <div class="table-resposive">
    
    
    <?php
    
      $sql = 'select `product_categories`.`id` AS `ID`,`product_categories`.`name` AS `NAME`,count(0) AS `jumlah_product`
              from (`product_categories` join `products`)
              where (`arkademy_sql`.`product_categories`.`id` = `arkademy_sql`.`products`.`category_id`)
              group by `arkademy_sql`.`product_categories`.`id`';

      $connect = mysql_query($sql);
      #=============================================================================
      echo "
        <table class='table'>
          <tr>
            <td><strong>ID</strong></td>
            <td><strong>NAME</strong></td>
            <td><strong>JUMLAH PRODUCT</strong></td>
          </tr>";
      while($f = mysql_fetch_array($connect, MYSQLI_BOTH)) {
        echo "<tr>
          <td>" . $f['ID'] . "</td>
          <td>" . $f['NAME']	. "</td>
          <td>" . $f['jumlah_product']	. "</td>
        </tr>";
      }
      echo "</table>";
            
    ?>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>