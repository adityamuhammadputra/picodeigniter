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
foreach($tbl_rumah_singgah as $dt):
	$username = $dt->username;
	$tanggal = $dt->tanggal;
    $lokasi = $dt->lokasi;
	$kategori_kontak = $dt->kategori_kontak;
	$kontak = $dt->kontak;
	$deskripsi = $dt->deskripsi;
	$id = $dt->id;
endforeach;
?>
 <form method="post" action="<?php echo site_url('logged/C_rumahsinggah/post/')?>">
                            <div id="wrap_content_modal">
                            	<input type="hidden" name="id" value="<?php echo $id ?>">
                            	<input type="hidden" name="tanggal" value="<?php echo $tanggal ?>">
                            	<p>Edit Data</p>
                               Kota/Daerah <br><input type="text" name="lokasi" class="input_text" value="<?php echo $lokasi ?>"><br>
                                    Kontak <br><select name="kategori_kontak" class="input_kategori_kontak" >
                                                <option><?php echo $kategori_kontak ?></option>
                                                <option>Sms / Call</option>
                                                <option>id Line</option>
                                                <option>Whatsup</option>
                                                <option>Pin BBM</option>
                                            </select>
                                    <input type="text" name="kontak" class="input_kontak" value="<?php echo $kontak ?>"><br>
                                    <u>Deskripsi</u> <textarea name="deskripsi" placeholder="Masukan Deskripsi" class="post_deskripsi"> <?php echo $deskripsi ?></textarea>                               
                                <input type="submit" name="update" value="Edit" class="button_post">  
                            </div>
                            </form>
                            </div>

</body>
</html>