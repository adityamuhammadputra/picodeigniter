<html>
<head>
<title>Backpacker_id</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/css/index.css')?>">
<link rel="icon" type="image/gif" href="<?php echo base_url('assets/images/icons.jpg')?>">
</head>
<body>
<div id="wrap">
		<div class="header1">
			<div id="wrap_header1">
				<div id="logos">
					<img src="<?php echo base_url ('assets/images/logo3.jpg')?>" height="60" width="150">
				</div>
				<div id="login">
					<div id="open-modal" class="modal-window">
					  <div>   
					     	<form method="post" class="form_login" action="<?php echo site_url('C_login/proses/')?>">
						     	<div class="header_login_form">Login <a href="#modal-close" title="Close" class="modal-close"><img src="<?php echo base_url ('assets/images/close.png')?>" height="25" width="25"></a></div>
						     	<div id="wrap_input"><br>
								<input type="text" class="input_login" name="username"  placeholder="Masukan username..."><br><br>
								<input type="password" class="input_login" name="password" placeholder="masukan Password ..."><br><br>
								<input type="submit" class="login" name="login" value="Login">
								<a href="#open-modal2">belum punya akun?</a>
								</div>
							</form>
					  	</div>
					</div>
					<a href="#open-modal"><input type="submit" name="login" title="login" value="Login" class="login"/></a>
   				</div>
			</div>
		</div>
		<div class="header2">
			<h2>
  			<p class="br">Melangkahlah Semaumu & Nikmati kebebasan</p>
			</h2>
			<p >Life Only Once</p>
			<a href="#open-modal2"><input type="submit" name="signup" title="signup" value="BERGABUNG" class="signup"></a>
			<div id="open-modal2" class="modal2-window">
					  <div>
					  		<div id="wrap_signup">  
						     	<form method="post" action="<?php echo site_url('C_login/signup/')?>"> 
						     		<div id="header_signup">
						     		Sign Up<a href="#modal2-close" title="Close" class="modal2-close"><img src="<?php echo base_url ('assets/images/close.png')?>" height="25" width="25"></a>
						     		</div>
									Username  <br>
									<input type="text" class="input_login" name="username" placeholder="Masukan Username..."><br>
									E-Mail 	 <br>
									<input type="text" class="input_login" name="email" placeholder="Masukan Email...."><br>
									Nama Lengkap 	 <br>
									<input type="text" class="input_login" name="nama" placeholder="Masukan Nama...."><br>
									Password  <br>
									<input type="password"  class="input_login" name="password"><br><br>
									<input type="submit" class="signup" name="signup" value="signup">
								</form>
							</div>
					  	</div>
					</div>
		</div>			
				<div id="wrap_content1">
					<div id="content1">
						<div id="cirle">
							<img id="cirle" src="<?php echo base_url ('assets/images/2.jpg')?>">
						</div><br>
						<h3><p align="center"> Pengalaman Baru</p> </h3> <br>
						<p align="center">Sepertinya anda harus mencoba pengalaman baru yang sangat berharga, mencoba hal-hal baru yang berbeda dan lebih menantang </p>
					</div>
					<div id="content1">
						<div id="cirle">
							<img id="cirle" src="<?php echo base_url ('assets/images/1.jpg')?>">
						</div><br>
						<h3><p align="center"> Teman Baru</p> </h3> <br>
						<p align="center">Berpetualang selain menyenangkan juga bisa untuk anda mendapatkan Teman Baru. Anda bisa banyak banyak berbagi cerita dan pengalaman</p>
					</div>
					<div id="content1">
						<div id="cirle">
							<img id="cirle" src="<?php echo base_url ('assets/images/4.jpg')?>">
						</div><br>
						<h3><p align="center">Kebebasan</p></h3><br>
						<p align="center"> Indonesia itu terlalu luas bila anda hanya tingggal dikamar atau sibuk dengan rutinitas anda. Melangkahlah dan nikmati Kebebasan! </p>
					</div>
				</div>
				<div id="wrap_content2">
					<div id="text_content2"><h2>Ayo Kita Coba !</h2> </div>
						<div id="wrap_wrap_content2">
							<div id="content22">
								<div id="icon">
									<img src="<?php echo base_url ('assets/images/icon1.jpg')?>">
								</div>
								<h4><p align="center"> Rumah Singgah</p></h4> <br>
								<p align="center"> Bila anda sedang perjalanan jauh dan anda butuh rumah singgah, Coba cari disini !</p>
							</div>
							<div id="content22">
								<div id="icon">
									<img src="<?php echo base_url ('assets/images/icon2.jpg')?>">
								</div>
								<h4><p align="center"> Cari Barengan </p></h4> <br>
								<p align="center"> Pernah suatu hari anda membutuhkan teman untuk berlibur? dan mendapatkan teman baru? </p>
							</div>
							<div id="content22">
								<div id="icon">
									<img src="<?php echo base_url ('assets/images/icon3.png')?>">
								</div>
								<h4><p align="center"> Info Wisata</p></h4> <br>
								<p align="center"> Kadang anda bingung ingin berlibur kemana? mungkin Info disini bisa dijadikan sedikit referensi. </p>
							</div>
						</div>
					</div>				
	<div class="footer">
		<a>&copy;2017 backpacker_id.com<p>Indonesians is out of the room</p></a>
		<b><img src="<?php echo base_url('assets/images/asal3.png')?>"> Cinagara Village 02/05, Caringin, Bogor 16730. Indonesia</b><br>
		 <b><img src="<?php echo base_url('assets/images/call2.png')?>"> +62251224947 | +628577 8888 684</b><br>
		 <b><img src="<?php echo base_url('assets/images/email.png')?>"> backpacker_id@gmail.com</b>
	</div>
</div>
</body>
</html>