<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/css/style.css') ?>">
    <link rel="icon" type="image/gif" href="<?php echo base_url('assets/images/icons.jpg')?>">
</head>
<body>
<div class="bg_edit"></div>
	<div class="content_edit">

<?php
foreach($tbl_info_wisata as $dt):
	$username = $dt->username;
	$tanggal = $dt->tanggal;
	$id_kategori = $dt->id_kategori;
	$judul = $dt->judul;
	$foto = $dt->foto;
	$deskripsi = $dt->deskripsi;
	$id = $dt->id;
endforeach;
?>
 <form method="post" action="<?php echo site_url('logged/C_infowisata/post/')?>" enctype="multipart/form-data">
                            <div id="wrap_content_modal">
                            	<input type="hidden" name="id" value="<?php echo $id ?>">
                            	<input type="hidden" name="tanggal" value="<?php echo $tanggal ?>">
                            	<p>Edit Data</p>
                                Kategori            <br> 
                                    <select name="id_kategori" class="input_kategori_kontak" >
                                    <option><?php echo $id_kategori ?> </option>
                                    <option>Gunung</option>
                                    <option>Pantai</option>
                                    <option>Goa</option>
                                    <option>Air Terjun</option>
                                    <option>Explore</option>
                                    <option>Panjat tebing</option>
                                    <option>Bakti Sosial</option>
                                    </select><br>
                                    Judul                <br><input type="text" class="input_text" name="judul" value="<?php echo $judul ?>"><br>
                                    Tambah Foto <br><br>
                                    <input type="file" name="filename" class="input_text" value="<?php echo $foto ?>" /> <br>
                                    <u>Deskripsi</u> <textarea name="deskripsi" placeholder="Masukan Deskripsi" class="post_deskripsi"><?php echo $deskripsi ?> </textarea>      
                                <input type="submit" name="update" value="Edit" class="button_post">  
                            </div>
                            </form>
                            </div>

</body>
</html>