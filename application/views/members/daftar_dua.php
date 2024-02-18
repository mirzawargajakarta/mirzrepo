<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"  crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<style>
		/*
		*
		* ==========================================
		* CUSTOM UTIL CLASSES
		* ==========================================
		*
		*/

		.border-md {
			border-width: 2px;
		}

		.btn-facebook {
			background: #405D9D;
			border: none;
		}

		.btn-facebook:hover, .btn-facebook:focus {
			background: #314879;
		}

		.btn-twitter {
			background: #42AEEC;
			border: none;
		}

		.btn-twitter:hover, .btn-twitter:focus {
			background: #1799e4;
		}



		/*
		*
		* ==========================================
		* FOR DEMO PURPOSES
		* ==========================================
		*
		*/

		body {
			min-height: 100vh;
		}

		.form-control:not(select) {
			padding: 1.5rem 0.5rem;
		}

		select.form-control {
			height: 52px;
			padding-left: 0.5rem;
		}

		.form-control::placeholder {
			color: #ccc;
			font-weight: bold;
			font-size: 0.9rem;
		}
		.form-control:focus {
			box-shadow: none;
		}
	</style>
	<script>
			// For Demo Purpose [Changing input group text on focus]
			$(function () {
				$('input, select').on('focus', function () {
					$(this).parent().find('.input-group-text').css('border-color', '#80bdff');
				});
				$('input, select').on('blur', function () {
					$(this).parent().find('.input-group-text').css('border-color', '#ced4da');
				});
			});
	</script>
    <title><?php echo $title; ?></title>

  </head>
  <body>
    
  <!-- Navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container">
            <!-- Navbar Brand -->
            <a href="#" class="navbar-brand">
                <img src="<?php echo base_url('assets/img/permatani_logo.jpg');?>" alt="logo" width="120">
            </a>
        </div>
    </nav>
</header>


<div class="container">
    <div class="row py-2 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="<?php echo base_url('assets/img/permatani.jpeg');?>" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h2>Form Pendataan Anggota</h2>
            <p class="font-italic text-muted mb-0">Form pendataan untuk anggota yang telah terdaftar</p>
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="#">
                <div class="row">
                    <!-- Kategori Produk -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <select id="kategoriproduk" name="kategoriproduk" class="form-control custom-select bg-white border-left-0 border-md">
							<option value="">- Kategori Produk -</option>
							<option value="Pertanian">Pertanian</option>
							<option value="Nelayan">Nelayan</option>
                        </select>
                    </div>

                    <!-- Hasil Produk -->
                    <div class="input-group col-lg-6 mb-4">
                        <input id="hasilproduk" type="text" name="hasilproduk" placeholder=" Hasil Produk" class="form-control bg-white border-md">
                    </div>

                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                        <select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                            <option value="">+12</option>
                            <option value="">+10</option>
                            <option value="">+15</option>
                            <option value="">+18</option>
                        </select>
                        <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                    </div>.

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <a href="#" class="btn btn-primary btn-block py-2">
                            <span class="font-weight-bold">Simpan Data</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>

</body>
</html>