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
                    <img src="<?php echo base_url ('assets/images/logo3.jpg')?>">
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
        <div class="header_profile">
            Tentang Saya 
            <div id="write_right" title="ubah"><a href="#open-modal" >
                     <img id="img_write" src="<?php echo base_url('assets/images/write.png'); ?>">
                </a></div>
        </div> 
        <div class="output_post">
            <div id="wrap_posted">
                <div id="keterangan_nama"><?php echo $nama; ?> </div><br><br>
                <div><img id="keterangan_foto" src="<?php echo base_url ('upload/'.$foto); ?>"></div>
                <div id="keterangan">Tempat, Tanggal Lahir <div id="keterangan_isi"><?php echo $tempat ?>, <?php $date=date_create($tgl_lahir); echo date_format($date,"d F Y");?></div></div><br>
                <div id="keterangan">Alamat <div id="keterangan_isi"><?php echo $alamat ?> </div></div><br>
                <div id="keterangan">Kota, Provinsi <div id="keterangan_isi"><?php echo $kota ?>, <?php echo $provinsi ?> </div></div><br>            
                <div id="keterangan">Hobi <div id="keterangan_isi"><?php echo $hobby ?></div></div><br>
                <div id="keterangan">Pekerjaan <div id="keterangan_isi"><?php echo $pekerjaan ?> </div></div><br>
                <div id="keterangan">Status <div id="keterangan_isi"> <?php echo $hubungan ?> </div></div><br>
                <div id="keterangan">kontak <div id="keterangan_kontak"> <?php echo $kategori_kontak ?>, <?php echo $kontak ?> </div></div><br>
                <div id="sekilas">Sekilas Tentang Saya</div> <div id="abouttext"><?php echo $about?></div> <br>    
                
                <div id="open-modal" class="modal-window">
                    <div>
                        <div id="wrap_modal"> 
                            <div id="header_modal">
                                Create<a href="#modal-close" title="Close" class="modal-close"><img src="<?php echo base_url ('assets/images/close2.png')?>" height="25" width="25"></a>
                             </div>
                            <form method="post" action="<?php echo site_url('logged/C_profile/post/')?>" enctype="multipart/form-data" >
                                <div id="wrap_content_modal">
                                    Ubah Foto Profile <br><br>
                                    <input type="file" name="filename" class="input_text" /> <br>
                                    Tempat, Tgl lahir <br><input type="text" name="tempat" class="input_kota" value="<?php echo $tempat ?>"><input type="date" name="tgl_lahir" class="input_provinsi" value ="<?php echo $tgl_lahir?>"><br> 
                                    Alamat <br> <input type="text" class="input_text" name="alamat" value="<?php echo $alamat ?>"><br>
                                    Kota, Provinsi <br> <input type="text" class="input_kota" name="kota" value ="<?php echo $kota ?>" ><input type="text" class="input_provinsi" name="provinsi" value = "<?php echo $provinsi ?>"><br>
                                    Hobi <br> <input type="text" class="input_text" name="hobi" value="<?php echo $hobby ?>" ><br>
                                    Pekerjaan <br> <input type="text" class="input_text" name="pekerjaan" value="<?php echo $pekerjaan ?>"><br>
                                    Status <br> <div class="input_text">
                                    <input <?php if ($hubungan == "Nikah") echo "checked"; ?> type="radio" name="hubungan" value="Nikah">Nikah
                                    <input <?php if ($hubungan == "Lajang") echo "checked"; ?> type="radio" name="hubungan" value="Lajang">Lajang
                                    <input <?php if ($hubungan == "Berpacaran") echo "checked"; ?> type="radio" name="hubungan" value="Berpacaran">Berpacaran</div>
                                    Kontak <br><select name="kategori_kontak" class="input_kategori_kontak">
                                                <option> </option>
                                                <option <?php if ($kategori_kontak == "Sms / Call"){echo "selected";} ?> >Sms / Call</option>
                                                <option <?php if ($kategori_kontak == "id Line"){echo "selected";} ?> >id Line</option>
                                                <option <?php if ($kategori_kontak == "Whatsup"){echo "selected";} ?> >Whatsup</option>
                                                <option <?php if ($kategori_kontak == "Pin BBM"){echo "selected";} ?> >Pin BBM</option>
                                            </select>
                                    <input type="text" name="kontak" class="input_kontak" value="<?php echo $kontak ?>"><br>
                                    <u>Sekilas Tentang Anda</u> <textarea name="about" class="post_deskripsi">  <?php echo $about?> </textarea>                              
                                    <input type="submit" name="post" value="post" class="button_post" > 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>             
            </div>
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



</body>
</html>
