<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<form action="../proses_tambah.php" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="inputnama3" class="col-sm-2 col-form-label">ID:</label>
    <div class="col-sm-10">
      <input type="number" name="id" class="form-control" id="inputnama3" placeholder="Tambahkan ID">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputalamat3" class="col-sm-2 col-form-label">Nama Menu:</label>
    <div class="col-sm-10">
      <input type="text" name="menu" class="form-control" id="inputalamat3" placeholder="Masukkan Nama Menu"></input>
    </div>
   </div>
   <div class="form-group row"> 
    <label for="inputnama3" class="col-sm-2 col-form-label">Harga:</label>
    <div class="col-sm-10">
      <input type="number" name="harga" class="form-control" id="inputnama3" placeholder="Masukkan Harga">
    </div>
  </div>    

  
  <p hidden>
    <label for="Tipe">Tipe:</label>
    <select name="tipe" id="tipe">
        <option value="tipe" hidden>Atur Tipe</option>
        <option value="Food">Food</option>
        <option value="Drink">Drink</option>
    </select>
    </p> 	
    <p hidden>
        <label for="statuss">Status:</label>
        <select name="statuss" id="statuss">
            <option value="status" hidden>Atur Status</option>
            <option value="Available">Available</option>
            <option value="Out of Stock">Out of Stock</option>
        </select>
    </p>

    <div class="form-group row"> 
    <label for="inputnama3" class="col-sm-2 col-form-label"> Pilih Gambar: </label>
    <div class="col-sm-10">
        
    <div class="input-group mb-3">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile03" name="berkas[]" multiple accept=".png,.jpg,.jpeg,.gif" onchange="checkFileCount(this)">
        <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
      </div>
    </div>
    </div>
  </div>    
 
  <div class="form-group row">
    <div class="col-sm-10  offset-sm-2">
    <input type="submit" name="submit" value="submit" class="btn btn-success">
    <input type="reset" name="reset" class="btn btn-danger">
    <a href="" name="kembali" class="btn btn-primary">Kembali</a>
    </div>
  </div>


   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-3.2.1.js" crossorigin="anonymous"></script>
    <script src="assets/js/boostrap.js" crossorigin="anonymous"></script>
</form>
</body>
</html>