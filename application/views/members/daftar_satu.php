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
        .rata-kanan {
            text-align:right;
        }

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
    <div class="row py-2 mt-4 align-items-top">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="<?php echo base_url('assets/img/permatani.jpeg');?>" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h2>Form Pendataan Anggota</h2>
            <p class="font-italic text-muted mb-0">Form pendataan untuk anggota yang telah terdaftar</p>
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="<?php echo base_url('members/simpan');?>" method="post" />
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label class="font-italic"><strong>Produk</strong></label>
                    </div>
                    <div class="form-group col-lg-6 mb-2">
                            <label for="kategori">Kategori</label>
                            <select class="form-control custom-select bg-white border-md" id="kategori" name="kategori">
                                <option value="">- Pilih Kategori -</option>
                                <option value="Pertanian">Pertanian</option>
                                <option value="Nelayan">Nelayan</option>
                            </select>                            
                            <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-6 mb-2">
                        <label for="hasilProduk">Hasil</label>
                        <input type="text" id="hasilProduk" name="hasilProduk" type="text" placeholder="Hasil Produk" autocomplete="off" class="form-control" required value="<?= set_value('hasilProduk'); ?>">
                        <?= form_error('hasilProduk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-12 mb-2 mt-2">
                        <label class="font-italic"><strong>Kapasitas Produksi Pertahun</strong></label>
                    </div>
                    <div class="form-group col-lg-6 mb-2">
                        <label for="jumlahproduksi">Jumlah</label>
                        <input type="text" id="jumlahproduksi" name="jumlahproduksi" type="text" placeholder="Jumlah Produksi" autocomplete="off" class="form-control rata-kanan" required value="<?= set_value('jumlahproduksi'); ?>">
                        <?= form_error('jumlahproduksi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-6 mb-2">
                            <label for="satuanproduksi">Satuan</label>
                            <select class="form-control custom-select bg-white border-md" id="satuanproduksi" name="satuanproduksi">
                                <option value="">- Pilih Satuan Produksi -</option>
                                <option value="Kgs">Kgs</option>
                                <option value="Ton">Ton</option>
                                <option value="Ekor">Ekor</option>
                            </select>                            
                            <?= form_error('satuanproduksi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-12 mb-2 mt-4">
                        <label class="font-italic"><strong>Usaha</strong></label>
                    </div>

                    <div class="form-group col-lg-6 mb-2">
                            <label for="kategori">Jenis</label>
                            <select class="form-control custom-select bg-white border-md" id="jenis" name="jenis">
                                <option value="">- Pilih Jenis -</option>
                                <option value="PT">PT</option>
                                <option value="CV">CV</option>
                                <option value="Koperasi">Koperasi</option>
                            </select>                            
                            <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-6 mb-2">
                        <label for="namausaha">Nama</label>
                        <input type="text" id="namausaha" name="namausaha" type="text" placeholder="Nama Usaha" autocomplete="off" class="form-control" required value="<?= set_value('namausaha'); ?>">
                        <?= form_error('namausaha', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group col-lg-6 mb-2">
                        <label for="berdiri">Berdiri Sejak</label>
                        <input type="text" id="berdiri" name="berdiri" type="text" placeholder="Tanggal Pendirian" autocomplete="off" class="form-control" required value="<?= set_value('berdiri'); ?>">
                        <?= form_error('berdiri', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-6 mb-2">
                            <label for="jumkaryawan">Jumlah Karyawan</label>
                            <select class="form-control custom-select bg-white border-md" id="jumkaryawan" name="jumkaryawan">
                                <option value="">- Pilih Jumlah Karyawan -</option>
                                <option value="1 - 9 Karyawan">1 - 10 Karyawan</option>
                                <option value="10 - 49 Karyawan">11 - 50 Karyawan</option>
                                <option value="51 - 100 Karyawan">51 - 100 Karyawan</option>
                                <option value="Lebih dari 100 Karyawan">Lebih dari 100 Karyawan</option>
                            </select>                            
                            <?= form_error('jumkaryawan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group col-lg-12 mb-2">
                        <label for="berdiri">Alamat</label>
                        <textarea class="form-control" id="alamatusaha" name="alamatusaha" type="text" placeholder="Alamat Usaha" required></textarea>
                        <?= form_error('alamatusaha', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group col-lg-6 mb-2">
                        <label for="propinsi">Propinsi</label>
                        <input type="text" id="propinsi" name="propinsi" type="text" placeholder="Propinsi" autocomplete="off" class="form-control" required value="<?= set_value('propinsi'); ?>">
                        <?= form_error('propinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-6 mb-2">
                        <label for="kabupaten">Kabupaten</label>
                        <input type="text" id="kabupaten" name="kabupaten" type="text" placeholder="Kabupaten" autocomplete="off" class="form-control" required value="<?= set_value('kabupaten'); ?>">
                        <?= form_error('kabupaten', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group col-lg-3 mb-2">
                        <label for="kodepos">Kode pos</label>
                        <input type="text" id="kodepos" name="kodepos" type="text" placeholder="Kode pos" autocomplete="off" class="form-control" required value="<?= set_value('kodepos'); ?>">
                        <?= form_error('kodepos', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-9 mb-2">
                        <label for="emailusaha">Email</label>
                        <input type="text" id="emailusaha" name="emailusaha" type="text" placeholder="Email" autocomplete="off" class="form-control" required value="<?= set_value('emailusaha'); ?>">
                        <?= form_error('emailusaha', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group col-lg-5 mb-2">
                        <label for="nohpusaha">No HP</label>
                        <input type="text" id="nohpusaha" name="nohpusaha" type="text" placeholder="No HP" autocomplete="off" class="form-control" required value="<?= set_value('nohpusaha'); ?>">
                        <?= form_error('nohpusaha', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-3 mb-2">
                        <label for="kodearea">Kode Area</label>
                        <input type="text" id="kodearea" name="kodearea" type="text" placeholder="Kode Area" autocomplete="off" class="form-control" required value="<?= set_value('kodearea'); ?>">
                        <?= form_error('kodearea', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-4 mb-2">
                        <label for="notelp">No Telepon Kantor</label>
                        <input type="text" id="notelp" name="notelp" type="text" placeholder="Nomor Telepon" autocomplete="off" class="form-control" required value="<?= set_value('notelp'); ?>">
                        <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    


                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block py-2">
                            <i class="fa fa-save"></i>
                            <span class="font-weight-bold">Simpan Data</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
        <br /><br /><br />

</body>
</html>