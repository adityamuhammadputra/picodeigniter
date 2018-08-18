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
<div id="wrap">
	<div class="header">
		<div id="wrap_header">
			<div id="wrap_header1">
				<div id="logo">
					<img src="<?php echo base_url ('assets/images/logo3.jpg')?>" height="60" width="70">
				</div>
                   <form id="form_search">
                        <input name="search_data" id="search_data" class="search" placeholder="Cari User...." type="text" onkeyup="ajaxSearch();">                    
                        <input class="button" type="button" value="">
                        <div id="suggestions">
                            <div id="autoSuggestionsList"></div>                        
                        </div>
                    </form>
                <script type="text/javascript">
                    function ajaxSearch()
                    {
                        var input_data = $('#search_data').val();

                        if (input_data.length === 0)
                        {
                            $('#suggestions').hide();
                        }
                        else
                        {

                            var post_data = {
                                'search_data': input_data,
                                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                            };

                            $.ajax({
                                type: 'POST',
                                url: '<?php echo site_url(); ?>/logged/C_home/autocomplete/',
                                data: post_data,
                                success: function (data) {
                                    // return success
                                    if (data.length > 0) {
                                        $('#suggestions').show();
                                        $('#autoSuggestionsList').addClass('auto_list');
                                        $('#autoSuggestionsList').html(data);
                                    }
                                }
                            });

                        }
                    }
                </script>
			</div>
			<div id="wrap_header2">
				<a href="<?php echo site_url('logged/C_profile');?>"><img id="foto_header" src="<?php echo base_url ('upload/'.$foto); ?>" >
				<div id="text_nama"><?php echo $username; ?></a>  | </div>
				<a href="<?php echo site_url('logged/C_home/logout');?>"><img id="logout" src="<?php echo base_url('assets/images/logout.png')?>" height="15" width="15"></a> 
			</div>
		</div>
		<div class="menu">
			<div id="wrap_menu">
				<ul class="float">
					<li><a href="<?php echo site_url('logged/C_home')?>">Beranda</a></li>
                    <li><a class="aktif" href="<?php echo site_url('logged/C_caribarengan');?>">Cari Barengan</a></li>
                    <li><a href="<?php echo site_url('logged/C_rumahsinggah');?>">Rumah Singgah</a></li>
                    <li><a href="<?php echo site_url('logged/C_infowisata');?>">Info Wisata</a></li>
				</ul>
			</div>
		</div>
	</div>

<!-- Batas Header dan menu-->
    <div id="wrap_sidebar_content">
        <div class="sidebar">
            <img id="foto_sidebar" src="<?php echo base_url ('upload/'.$foto); ?>"><br>
            <div id="text_sidebar_nama"><?php echo $nama; ?> <br></div>
            <div id="text_sidebar_lokasi"><img id="img_asal" src="<?php echo base_url ('assets/images/asal2.png'); ?>" ><?php echo $kota; ?>, <?php echo $provinsi; ?> <br></div>
            <div id="text_sidebar_profil">
            <ul type="square">
                <li id="li"><?php echo $tempat ?>,<?php $date=date_create($tgl_lahir); echo date_format($date,"d F Y");?></li>
                <li id="li"><?php echo $hobby ?></li>
                <li id="li"><?php echo $pekerjaan ?> </li>
            </ul>
        </div>    
        <div id="wrap_button_profile">
            <a href="<?php echo site_url('logged/C_profile');?>" title="About Me"><input type="submit" name="about" value="About Me" id="button_profile"></a>
        <a href="<?php echo site_url('logged/C_galeri');?>" title="My Galery"><input type="submit" name="galery" value="My Galery" id="button_profile"></a>
        </div>
    </div>

<!-- Batas sidebar-->
    <div class="content">
    	<div id="wrap_header_content">
        	<a href="#open-modal">
                <img id="img_write" src="<?php echo base_url('assets/images/write.png'); ?>">
            </a>
                <div id="open-modal" class="modal-window">
                    <div>
                        <div id="wrap_modal"> 
                            <div id="header_modal">
                                Create<a href="#modal-close" title="Close" class="modal-close"><img src="<?php echo base_url ('assets/images/close2.png')?>" height="25" width="25"></a>
                            </div>
                            <form method="post" action="<?php echo site_url('logged/C_caribarengan/post/')?>">
                            <div id="wrap_content_modal">
                                Kategori            <br> 
                                <select name="kategori" class="input_kategori_kontak">
                                <option> </option>
                                <option>Gunung</option>
                                <option>Pantai</option>
                                <option>Goa</option>
                                <option>Air Terjun</option>
                                <option>Explore</option>
                                <option>Panjat tebing</option>
                                <option>Bakti Sosial</option>
                                </select>
                                <input type="text" class="input_kontak" name="tujuan" placeholder="Contoh : Gunung Salak / Pantai carita / Goawalet"><br>
                                Asal                <br><input type="text" class="input_text" name="asal" placeholder="Contoh: Jakarta / bogor / Padang"><br>
                                Tanggal Berangkat   <br><input type="date" class="input_text" name="tgl_berangkat"><br>
                                Tanggal Pulang      <br><input type="date" class="input_text" name="tgl_pulang"><br>
                                <u>Deskripsi</u> <textarea name="deskripsi" placeholder="Masukan Deskripsi" class="post_deskripsi"> </textarea>                              
                                <input type="submit" name="post" value="post" class="button_post">  
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

        	<form id="form_search2" method="get" action="<?php echo site_url('logged/C_caribarengan/cari')?>">
                <input class="search2" name="asal" type="text" placeholder="Cari Barengan..." required>
                <input class="button2" type="submit" value="">
            </form>  

        </div>
        <?php
         foreach ($lst as $tampil){
        ?>    
        <div class="output_post">
        <div id="wrap_nav">
        <?php if($this->session->userdata('username')==$tampil->username||$this->session->userdata('level')=='admin'){ ?>
                    <nav>
                        <ul>
                            <li>
                                <img title="option" src="<?php echo base_url('assets/images/icon.png')?>" height="20" width="20">
                                <ul>
                                    <li>
                                    <a href="<?php echo site_url('logged/C_caribarengan/hapus/'.$tampil->id)?>"><img src="<?php echo base_url('assets/images/delete.png')?>" height="11" width="12">Hapus</a>
                                    <a href="<?php echo site_url('logged/C_caribarengan/edit/'.$tampil->id)?>" ><img src="<?php echo base_url('assets/images/edit.png')?>" height="11" width="12">Edit</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav> 
             <?php } ?> 
            </div>   
            <img id="foto_post" src="<?php echo base_url ('upload/'.$tampil->foto); ?>" >
            <div id="nama_post"><a href="<?php echo site_url ('/logged/C_profile/user/'.$tampil->username)?>"><?php echo $tampil->username?></a></div> 
            <div id="tgl_post"><?php $date=date_create($tampil->tanggal); echo date_format($date,"d F Y / H:i")?></div>
            <img id="img_icon" src="<?php echo base_url ('assets/images/tujuan.png'); ?>" > <?php echo $tampil->kategori?>, <?php echo $tampil->tujuan?><br>
            <img id="img_icon" src="<?php echo base_url ('assets/images/hom.png'); ?>" > <?php echo $tampil->asal?><br>
            <img id="img_icon" src="<?php echo base_url ('assets/images/tanggal.png'); ?>" ><font id="tgl_berangkat"><?php $date=date_create( $tampil->tanggal_berangkat); echo date_format($date,"d F Y") ?> s/d <?php $date=date_create( $tampil->tanggal_pulang); echo date_format($date,"d F Y") ?></font><br><br>
            <div class="txt_deskripsi"><?php echo $tampil->deskripsi?></div>
        </div>
        <?php
         }
        ?>        
    </div>
</div>
<!-- Batas Content-->
  <div class="wrapfooter">
  <div class="footer">
        <a>&copy;2017 backpacker_id.com<p>Indonesians is out of the room</p></a>
        <b><img src="<?php echo base_url('assets/images/asal3.png')?>"> Cinagara Village 02/05, Caringin, Bogor 16730. Indonesia</b><br>
         <b><img src="<?php echo base_url('assets/images/call2.png')?>"> +62251224947 | +628577 8888 684</b><br>
         <b><img src="<?php echo base_url('assets/images/email.png')?>"> backpacker_id@gmail.com</b>
    </div>    
</div>


</body>
</html>

