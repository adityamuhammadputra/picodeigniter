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
<meta name="viewport" content="width=device-width, initial-scale=1">
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

			</form>
			</div>  
			<div id="wrap_header2">

				<a href="<?php echo site_url('logged/C_profile');?>" title="Perbaharui Profil" ><img id="foto_header" src="<?php echo base_url ('upload/'.$foto); ?>" >
				<div id="text_nama" title="Perbaharui profil"><?php echo $username; ?></a>  | <?php
                                        if($this->session->userdata('level')=='admin'){  
                                    ?>
                    <a href="<?php echo site_url('logged/C_home/admin');?>">Daftar user</a>
                    <?php 
                                            }
                                        ?>  </div>
				<a href="<?php echo site_url('logged/C_home/logout');?>"><img id="logout" title="logout" src="<?php echo base_url('assets/images/logout.png')?>" height="15" width="15"></a> 
			</div>
		</div>
		<div class="menu">
			<div id="wrap_menu">
				<ul class="float">
					<li><a class="aktif" href="<?php echo site_url('logged/C_home')?>">Beranda</a></li>
                    <li><a href="<?php echo site_url('logged/C_caribarengan');?>">Cari Barengan</a></li>
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
        <li id="li"><?php echo $pekerjaan ?> </li></ul>
	</div>
    <div id="wrap_button_profile">
        <a href="<?php echo site_url('logged/C_profile');?>" title="About Me"><input type="submit" name="about" value="About Me" id="button_profile"></a>
        <a href="<?php echo site_url('logged/C_galeri');?>" title="My Galery"><input type="submit" name="galery" value="My Galery" id="button_profile"></a>
    </div>
</div>
<!-- Batas sidebar-->
    <div class="content">
        <div id="wrap_post">
            <form method="post" action="<?php echo site_url('logged/C_home/post/')?>">
            <textarea name="textarea" placeholder="Masukan Diskusi..." class="post"> </textarea>
            <input type="submit" value="Post" name="post" class="button_post"/> 
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
                                    <li><a href="<?php echo site_url('logged/C_home/hapus/'.$tampil->id)?>"><img src="<?php echo base_url('assets/images/delete.png')?>" height="11" width="12">Hapus</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav> 
                <?php } ?> 
            </div>   
            <img id="foto_post" src="<?php echo base_url ('upload/'.$tampil->foto); ?>" >

            <div id="nama_post"><a href="<?php echo site_url ('/logged/C_profile/user/'.$tampil->username)?>"><?php echo $tampil->username?></a></div>   
            <div id="tgl_post"><?php $date=date_create($tampil->tanggal); echo date_format($date,"d F Y H:i")?>  </div>
            <div class="txt_deskripsi"><?php echo $tampil->post?></div>
            <?php
            if(isset($_POST['komen'.$tampil->id]))
        {
            date_default_timezone_set('Asia/Jakarta');
            $tanggal2 = date("Y-m-d H:i:s");
            $sqli="insert into tbl_komen values ('','".$tampil->id."','".$this->session->userdata('username')."','".$this->input->post('textkomen'.$tampil->id)."','".($tanggal2)."')";
            $this->db->query($sqli);
            redirect('logged/C_home/');
        }
            ?>
            <form method="post" id="comment" action="">
                    <img id="foto_comment" src="<?php echo base_url ('upload/'.$foto); ?>">
                    <textarea id="input_commnet" name="textkomen<?php echo $tampil->id;?>" placeholder="Masukan Komentar...."></textarea>
                    <input type="submit" name="komen<?php echo $tampil->id;?>" class="buttoncomment" value="komen"></form>
                    <?php
                     $this->db->select('tbl_komen.*,tbl_user.username,tbl_user.foto');
                    $this->db->from('tbl_komen');
                    $this->db->join('tbl_user', 'tbl_komen.username = tbl_user.username','inner');
                    $this->db->where('tbl_komen.id_post',$tampil->id);
                    $this->db->order_by('date','desc');
                    $q = $this->db->get();
                    ?>
        <?php
        if($q->num_rows()>0)
        {
             $lst2=$q->result();
        
         foreach ($lst2 as $tampil2){
        ?>
        <div class="output_komen">
            <img id="foto_post" src="<?php echo base_url ('upload/'.$tampil2->foto); ?>" >
            <div id="nama_post"><a href="<?php echo site_url ('/logged/C_profile/user/'.$tampil2->username)?>"><?php echo $tampil2->username?></a></div>   
            <div id="tgl_post"><?php $date=date_create($tampil2->date); echo date_format($date,"d F Y H:i")?>  </div>
            <div class="txt_deskripsi"><?php echo $tampil2->komen?></div>
        </div>
        <?php
        }
    }
    ?>           
        </div>
        <?php
         }
        ?>    
</div>
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
</body>
</html>
