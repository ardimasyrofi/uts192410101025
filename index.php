<?php 
    $servername = "127.0.0.1";
    $username = "192410101025";
    $password = "secret";
    $dbname = "uts192410101025";
    
    //connect db
    $koneksi = mysqli_connect($servername, $username, $password, $dbname);
    if(!$koneksi){
        die("Koneksi gagal: ".mysqli_connect_error());
    }

	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE city set
											 	Name = '$_POST[tnama]',
											 	CountryCode = '$_POST[tkode]',
												District = '$_POST[tkab]',
											 	Population = '$_POST[tpen]'
											    WHERE ID = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO city (Name, CountryCode, District, Population)
										  VALUES ('$_POST[tnama]', 
										  		 '$_POST[tkode]', 
										  		 '$_POST[tkab]', 
										  		 '$_POST[tpen]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}


		
	}


	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM city WHERE ID = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vName = $data['Name'];
				$vCountryCode = $data['CountryCode'];
				$vDistrict = $data['District'];
				$vPopulation = $data['Population'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM city WHERE ID = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
				     </script>";
			}
		}
	}
    $limit = 10;
    $page = isset($_GET['page'])?(int)$_GET['page'] : 1;
    $first_page = ($page>1) ? ($page * $limit) - $limit : 0;

    // navigate
    $previous = $page - 1;
    $next = $page + 1;

    // connect & query read db
    $query = mysqli_query($koneksi, "SELECT * FROM city ORDER BY ID DESC");
    $total_result = mysqli_num_rows($query);
    $total_page = ceil($total_result / $limit);

    // limited query
    $limited = mysqli_query($koneksi,"SELECT * FROM city ORDER BY ID DESC LIMIT $first_page, $limit");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>UTS 192410101025</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">  
    <h1>Muhammad Zukhrofi Ardi Masyrofi</h1> 
    <h2>192410101025</h2>


    <div class="card mt-5">
        <div class="card-header bg-success">
            Menambah Data Kota
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="tnama" class="form-control" placeholder="Masukkan Nama Kota" required>
                </div>
                <div class="form-group">
                    <label>Kode Kota</label>
                    <input type="text" name="tkode" class="form-control" placeholder="Masukkan Kode Kota" required>
                </div>
                <div class="form-group">
                    <label>Kabupaten</label>
                    <input type="text" name="tkab" class="form-control" placeholder="Masukkan Nama Kabupaten" required>
                </div>
                <div class="form-group">
                    <label>Jumlah Penduduk</label>
                    <input type="text" name="tpen" class="form-control" placeholder="Masukkan Jumlah Penduduk" required>
                </div>
            <button type="submit" class="btn btn-success" name="bsave">Simpan</button>
            <button type="reset" class="btn btn-danger" name="bsreset">Reset</button>
            </form>
            
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header bg-success">
            Tabel Data Kota
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kode Kota</th>
                    <th>Kabupaten</th>
                    <th>Jumlah Penduduk</th>
                    <th>Opsi</th>
                </tr>
                <?php
                    $No=1;
                    $tampil = mysqli_query($koneksi,"SELECT * from city order by ID desc");
                    while($data = mysqli_fetch_array($tampil)):
                
                ?>
                <tr>
                    <td><?=$No++;?></td>
                    <td><?=$data['Name'];?></td>
                    <td><?=$data['CountryCode'];?></td>
                    <td><?=$data['District'];?></td>
                    <td><?=$data['Population'];?></td>
                    <td>
                        <a href="index.php?hal=edit&id=<?=$data['ID']?>"  class="btn btn-warning">Edit</a>
                    	<a href="index.php?hal=hapus&id=<?=$data['ID']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
                </tr>
            <?php endwhile; ?>
            </table>
            
        </div>
    </div>
</div>  
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>