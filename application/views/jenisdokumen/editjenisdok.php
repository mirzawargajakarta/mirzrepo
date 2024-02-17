<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header">
                    <strong>Form Edit Dokumen Aktif</strong>

                    <div class="float-right">
                        <a href="<?= base_url('jenisdokumen') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="<?= base_url('jenisdokumen/edit/') . $jenisdoks['id']; ?>" id="form-edit" method="post">

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="nama_dokumen"><strong>Nama Jenis Dokumen</strong></label>
                                <input type="text" name="nama_dokumen" id="nama_dokumen" placeholder="Masukkan Nama Jenis Dokumen" autocomplete="off" class="form-control" value="<?= $jenisdoks['nama_dokumen'] ?>">
                                <?= form_error('nama_dokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                            <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->