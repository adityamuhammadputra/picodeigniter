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

<!-- Batas sidebar-->
    <div class="content">
        <?php
          foreach ($profil2 as $tampil2) {
        ?>
    <div class="header_profile">
            Tentang <?php echo $tampil2->nama; ?>            
        </div> 
         
        <div class="output_post">
            <div id="wrap_posted">
                <div id="keterangan_nama"><?php echo $tampil2->nama; ?> </div><br><br>
                <div><img id="keterangan_foto" src="<?php echo base_url ('upload/'.$tampil2->foto); ?>"></div>
                <div id="keterangan">Tempat, Tanggal Lahir <div id="keterangan_isi"><?php echo $tampil2->tempat ?>, <?php $date=date_create($tampil2->tgl_lahir); echo date_format($date,"d F Y");?></div></div><br>
                <div id="keterangan">Alamat <div id="keterangan_isi"><?php echo $tampil2->alamat ?> </div></div><br>
                <div id="keterangan">Kota, Provinsi <div id="keterangan_isi"><?php echo $tampil2->kota ?>, <?php echo $tampil2->provinsi ?> </div></div><br>            
                <div id="keterangan">Hobi <div id="keterangan_isi"><?php echo $tampil2->hobby ?></div></div><br>
                <div id="keterangan">Pekerjaan <div id="keterangan_isi"><?php echo $tampil2->pekerjaan ?> </div></div><br>
                <div id="keterangan">Status <div id="keterangan_isi"> <?php echo $tampil2->hubungan ?> </div></div><br>
                <div id="keterangan">kontak <div id="keterangan_kontak"> <?php echo $tampil2->kategori_kontak ?>, <?php echo $tampil2->kontak ?> </div></div><br>
                <div id="sekilas">Sekilas Tentang Saya</div> <div id="abouttext"><?php echo $tampil2->about?></div> <br>                              
                </div>      
        </div><br>    
            <div class="header_profile">
                Galeri <?php echo $tampil2->nama; ?>            
            </div>

                 <?php
        
        }
        ?>
        <div class="output_galeri">
          <?php
          if ($lst2 != null)
          {
             foreach ($lst2 as $tampil) {
             ?>
                    <ul>
                    <li class="fotogaleri"><img src="<?php echo base_url ('upload/galeri/'.$tampil->foto); ?>" >
                    Upload: <?php $date=date_create($tampil->tanggal); echo date_format($date,"d F Y")?>
                    </li> 
                    </ul>
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
