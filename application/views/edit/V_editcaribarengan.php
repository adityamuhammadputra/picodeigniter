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
foreach($tbl_cari_barengan as $dt):
	$username = $dt->username;
	$tanggal = $dt->tanggal;
	$kategori = $dt->kategori;
	$tujuan = $dt->tujuan;
	$asal = $dt->asal;
	$tanggal_berangkat = $dt->tanggal_berangkat;
	$tanggal_pulang = $dt->tanggal_pulang;
	$deskripsi = $dt->deskripsi;
	$id = $dt->id;
endforeach;
?>
 <form method="post" action="<?php echo site_url('logged/C_caribarengan/post/')?>">
                            <div id="wrap_content_modal">
                            	<input type="hidden" name="id" value="<?php echo $id ?>">
                            	<input type="hidden" name="tanggal" value="<?php echo $tanggal ?>">
                            	<p>Edit Data</p>
                                Kategori            <br> 
                                <select name="kategori" class="input_kategori_kontak">
                                <option><?php echo $kategori ?> </option>
                                <option>Gunung</option>
                                <option>Pantai</option>
                                <option>Goa</option>
                                <option>Air Terjun</option>
                                <option>Explore</option>
                                <option>Panjat tebing</option>
                                <option>Bakti Sosial</option>
                                </select>
                                <input type="text" class="input_kontak" name="tujuan" value="<?php echo $tujuan ?>"><br>
                                Asal                <br><input type="text" class="input_text" name="asal" value="<?php echo $asal ?>"><br>
                                Tanggal Berangkat   <br><input type="date" class="input_text" name="tanggal_berangkat" value="<?php echo $tanggal_berangkat ?>"><br>
                                Tanggal Pulang      <br><input type="date" class="input_text" name="tanggal_pulang" value="<?php echo $tanggal_pulang ?>"><br>
                                <u>Deskripsi</u> <textarea name="deskripsi" class="post_deskripsi"><?php echo $deskripsi ?> </textarea>                              
                                <input type="submit" name="update" value="Edit" class="button_post">  
                            </div>
                            </form>
                            </div>

</body>
</html>