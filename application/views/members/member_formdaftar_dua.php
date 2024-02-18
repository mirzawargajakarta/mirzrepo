
<div class="container px-5 my-5">
    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
        <div class="mb-3">
            <label class="form-label" for="kategori">Kategori</label>
            <select class="form-select" id="kategori" aria-label="Kategori">
                <option value="- Pilih Kategori Produk -">- Pilih Kategori Produk -</option>
                <option value="Pertanian">Pertanian</option>
                <option value="Nelayan">Nelayan</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="hasilProduk">Hasil Produk</label>
            <input class="form-control" id="hasilProduk" type="text" placeholder="Hasil Produk" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="hasilProduk:required">Hasil Produk is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="jumlahKapasitasProduksiPertahun">Jumlah Kapasitas Produksi Pertahun</label>
            <input class="form-control" id="jumlahKapasitasProduksiPertahun" type="text" placeholder="Jumlah Kapasitas Produksi Pertahun" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="jumlahKapasitasProduksiPertahun:required">Jumlah Kapasitas Produksi Pertahun is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="satuanProduk">Satuan Produk</label>
            <select class="form-select" id="satuanProduk" aria-label="Satuan Produk">
                <option value="- Pilih Satuan Produk -">- Pilih Satuan Produk -</option>
                <option value="Kgs">Kgs</option>
                <option value="Ton">Ton</option>
                <option value="Ekor">Ekor</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="jenisUsaha">Jenis Usaha</label>
            <select class="form-select" id="jenisUsaha" aria-label="Jenis Usaha">
                <option value="- Pilih Jenis Usaha -">- Pilih Jenis Usaha -</option>
                <option value="PT">PT</option>
                <option value="CV">CV</option>
                <option value="Koperasi">Koperasi</option>
                <option value=""></option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="namaUsaha">Nama Usaha</label>
            <input class="form-control" id="namaUsaha" type="text" placeholder="Nama Usaha" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="namaUsaha:required">Nama Usaha is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="berdiriSejak">Berdiri Sejak</label>
            <input class="form-control" id="berdiriSejak" type="text" placeholder="Berdiri Sejak" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="berdiriSejak:required">Berdiri Sejak is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="jumlahKaryawan">Jumlah Karyawan</label>
            <select class="form-select" id="jumlahKaryawan" aria-label="Jumlah Karyawan">
                <option value="- Pilih Jumlah Karyawan -">- Pilih Jumlah Karyawan -</option>
                <option value="1 - 9 Orang">1 - 9 Orang</option>
                <option value="10 - 49 Orang">10 - 49 Orang</option>
                <option value="50 - 99 Orang">50 - 99 Orang</option>
                <option value="100 &gt; Orang">100 &gt; Orang</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="alamatUsaha">Alamat Usaha</label>
            <textarea class="form-control" id="alamatUsaha" type="text" placeholder="Alamat Usaha" style="height: 10rem;" data-sb-validations="required"></textarea>
            <div class="invalid-feedback" data-sb-feedback="alamatUsaha:required">Alamat Usaha is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="propinsiUsaha">Propinsi Usaha</label>
            <input class="form-control" id="propinsiUsaha" type="text" placeholder="Propinsi Usaha" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="propinsiUsaha:required">Propinsi Usaha is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="kabupaten">Kabupaten</label>
            <input class="form-control" id="kabupaten" type="text" placeholder="Kabupaten" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="kabupaten:required">Kabupaten is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="kodePos">Kode Pos</label>
            <input class="form-control" id="kodePos" type="text" placeholder="Kode Pos" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="kodePos:required">Kode Pos is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="emailUsaha">Email Usaha</label>
            <input class="form-control" id="emailUsaha" type="text" placeholder="Email Usaha" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="emailUsaha:required">Email Usaha is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nomorHpUsaha">Nomor HP Usaha</label>
            <input class="form-control" id="nomorHpUsaha" type="text" placeholder="Nomor HP Usaha" data-sb-validations="" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="kodeAreaTeleponKantor">Kode Area Telepon Kantor</label>
            <input class="form-control" id="kodeAreaTeleponKantor" type="text" placeholder="Kode Area Telepon Kantor" data-sb-validations="" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="nomorTeleponKantor">Nomor Telepon Kantor</label>
            <input class="form-control" id="nomorTeleponKantor" type="text" placeholder="Nomor Telepon Kantor" data-sb-validations="" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="namaPic">Nama PIC</label>
            <input class="form-control" id="namaPic" type="text" placeholder="Nama PIC" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="namaPic:required">Nama PIC is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="tempatLahir">Tempat Lahir</label>
            <input class="form-control" id="tempatLahir" type="text" placeholder="Tempat Lahir" data-sb-validations="" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="tanggalLahir">Tanggal Lahir</label>
            <input class="form-control" id="tanggalLahir" type="text" placeholder="Tanggal Lahir" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="tanggalLahir:required">Tanggal Lahir is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Jenis Kelamin</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="pria" type="radio" name="jenisKelamin" data-sb-validations="required" />
                <label class="form-check-label" for="pria">Pria</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="wanita" type="radio" name="jenisKelamin" data-sb-validations="required" />
                <label class="form-check-label" for="wanita">Wanita</label>
            </div>
            <div class="invalid-feedback" data-sb-feedback="jenisKelamin:required">One option is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="emailPic">Email PIC</label>
            <input class="form-control" id="emailPic" type="text" placeholder="Email PIC" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="emailPic:required">Email PIC is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nomorHpPic">Nomor HP PIC</label>
            <input class="form-control" id="nomorHpPic" type="text" placeholder="Nomor HP PIC" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="nomorHpPic:required">Nomor HP PIC is required.</div>
        </div>
        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                <p>To activate this form, sign up at</p>
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
        </div>
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>