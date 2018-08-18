<html>
<head>
<title>Selamat Datang</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/css/style.css') ?>">
    <link rel="icon" type="image/gif" href="<?php echo base_url('assets/images/icons.jpg')?>">
<script src="<?php echo base_url('assets/jquery.js') ?>"></script>
</head>
<body>
<?php
foreach($profil as $dt):
    $id = $dt->id;
	$nama = $dt->nama;
	$foto = $dt->foto;
	$kota = $dt->kota;
	$provinsi = $dt->provinsi;
	$tempat = $dt->tempat;
	$tgl_lahir = $dt->tgl_lahir;
	$hobby = $dt->hobby;
	$pekerjaan = $dt->pekerjaan;
    $username = $dt->username;
endforeach;
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<div id="wrap">
	<div class="header">
		<div id="wrap_header">
			<div id="wrap_header1">
				<div id="logo">
					<img src="<?php echo base_url ('assets/images/logo3.jpg')?>" height="60" width="70">
				</div>
			<form id="form_search" action="<?php echo site_url('logged/C_home/search');?>" method="post">
                    <input name="cari" id="search_data" class="search" placeholder="Cari User...." type="text" >                    
                    <input class="button" type="button" value="">
            </form>
           			</div>
			<div id="wrap_header2">
				<a href="<?php echo site_url('logged/C_profile');?>" title="Perbaharui Profil" ><img id="foto_header" src="<?php echo base_url ('upload/'.$foto); ?>" >
				<div id="text_nama" title="Perbaharui profil"><?php echo $username; ?></a>  | </div>
				<a href="<?php echo site_url('logged/C_home/logout');?>"><img id="logout" title="logout" src="<?php echo base_url('assets/images/logout.png')?>" height="15" width="15"></a> 
			</div>
		</div>
		<div class="menu">
			<div id="wrap_menu">
				<ul class="float">
					<li><a href="<?php echo site_url('logged/C_home')?>">Beranda</a></li>
                    <?php
                                        if($this->session->userdata('level')=='admin'){  
                                    ?>
                    <li><a class="aktif" href="<?php echo site_url('logged/C_home/admin');?>">Admin</a></li>
                    <?php 
                                            }
                                        ?>  
				</ul>
			</div>
		</div>
	</div>
    </div>
    </div>
    </div>

<!-- Batas Header dan menu-->

<div class="wraptable">
 
        <table border="1">
                <tr><th>id</th>
                <th>username</th>
                <th>Foto</th>
                <th>nama</th>
                <th>tempat</th>
                <th>tgl_lahir</th>                
                <th>Alamat</th>
                <th>kategori_kontak</th>
                <th>kontak</th>
                <th>pekerjaan</th>
                <th>Aksi</th>
                </tr>
        <?php
 foreach ($lstadmin as $tampil){
?>
            
                <tr>
                    <td><?php echo $tampil->id ?></td>               
                    <td><?php echo $tampil->username ?></td>
                    <td><img id="img" src="<?php echo base_url ('upload/'.$tampil->foto); ?>"></td>
                    <td><?php echo $tampil->nama ?></td>
                    <td><?php echo $tampil->tempat ?></td>
                    <td><?php echo $tampil->tgl_lahir ?></td>
                    <td><?php echo $tampil->alamat ?></td>
                    <td><?php echo $tampil->kategori_kontak ?></td>
                    <td><?php echo $tampil->kontak ?></td>
                    <td><?php echo $tampil->pekerjaan ?></td>
                    <td><a href="<?php echo site_url('logged/C_home/hapusadmin/'.$tampil->id)?>"><img src="<?php echo base_url('assets/images/delete.png')?>" height="11" width="12">Hapus</a></td></tr>
               
            
            <?php
 }
?>
</table>
            
   
</div>


<div class="wrapfooter">
  <div class="footer">
        <a>&copy;2017 backpacker_id.com<p>Indonesians is out of the room</p></a>
        <b><img src="<?php echo base_url('assets/images/asal3.png')?>"> Cinagara Village 02/05, Caringin, Bogor 16730. Indonesia</b><br>
         <b><img src="<?php echo base_url('assets/images/call2.png')?>"> +62251224947 | +628577 8888 684</b><br>
         <b><img src="<?php echo base_url('assets/images/email.png')?>"> backpacker_id@gmail.com</b>
    </div>    
</div>
</div>
</div>
	
</body>
</html>
