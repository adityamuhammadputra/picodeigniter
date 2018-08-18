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
    $alamat = $dt->alamat;
    $hubungan = $dt->hubungan;
    $kontak = $dt->kontak;
    $kategori_kontak = $dt->kategori_kontak;
    $about = $dt->about;
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

    <div class="content">
        <div class="header_profile">
            Galeri Saya
            <div id="write_right" title="Tambah">
                <a href="#open-modal"><img id="img_write" src="<?php echo base_url('assets/images/write.png'); ?>"></a>
            </div>
        </div>
            <div id="open-modal" class="modal-window">
                    <div>
                        <div id="wrap_modal"> 
                            <div id="header_modal">
                                Create<a href="#modal-close" title="Close" class="modal-close"><img src="<?php echo base_url ('assets/images/close2.png')?>" height="25" width="25"></a>
                             </div>
                            <form method="post" action="<?php echo site_url('logged/C_galeri/post/')?>" enctype="multipart/form-data" >
                                <div id="wrap_content_modal">
                                    Upload Foto <br><br>
                                    <input type="file" name="filename" class="input_text" /> <br>
                                    <input type="submit" name="post" value="Upload" class="button_post" > 
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        <div class="output_galeri">
          <?php
          if ($lst != null)
          {
             foreach ($lst as $tampil) {
             ?>
             <div class="wrapgaleri">
                    <ul>
                    <li class="fotogaleri"><img src="<?php echo base_url ('upload/galeri/'.$tampil->foto); ?>" >
                    Upload: <?php $date=date_create($tampil->tanggal); echo date_format($date,"d F Y")?>
                    <?php
                        if($this->session->userdata('username')==$tampil->username||$this->session->userdata('level')=='admin'){  
                    ?>
                    <a title="hapus" href="<?php echo site_url('logged/C_galeri/hapus/'.$tampil->id)?>"><img id="hapusimg" src="<?php echo base_url ('assets/images/del.png')?>"></a>
                    <?php } ?>
                    </li> 
                    </ul>
                </div>
        <?php
        }
        }
        ?>
        </div>
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

<br><br>


</body>
</html>
