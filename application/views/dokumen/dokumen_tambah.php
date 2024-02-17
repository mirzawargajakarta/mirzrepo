<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header">
                    <strong>Form Tambah Dokumen Aktif</strong>

                    <div class="float-right">
                        <a href="<?= base_url('dokumen') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- <form action="<?= base_url('dokumen/tambahdata'); ?>" id="form-tambah" method="post"> -->
                    <?= form_open_multipart('dokumen/tambahdata'); ?>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="jenisdokumen"><strong>Jenis Dokumen</strong></label>
                            <select class="custom-select" id="jenisdokumen" name="jenisdokumen">
                                <option selected>-Pilih Jenis Dokumen-</option>
                                <?php foreach ($jenisdoks as $jenisdok) : ?>
                                    <option value="<?= $jenisdok['id']; ?>"><?= $jenisdok['nama_dokumen']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('jenisdokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="isremind"><strong>Reminder</strong></label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="isremind" name="isremind">
                                <label class="custom-control-label" for="isremind">Aktifkan Reminder</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="titledokumen"><strong>Titel Dokumen</strong></label>
                            <input type="text" name="titledokumen" id="titledokumen" placeholder="Masukkan Titel Dokumen" autocomplete="off" class="form-control" required value="<?= set_value('titledokumen'); ?>">
                            <?= form_error('titledokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nodokumen"><strong>Nomor Dokumen</strong></label>
                            <input type="text" name="nodokumen" placeholder="Masukkan No Dokumen" autocomplete="off" class="form-control" required value="<?= set_value('nodokumen'); ?>">
                            <?= form_error('nodokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tglberlaku"><strong>Tanggal Mulai</strong></label>
                            <input type="text" name="tglberlaku" placeholder="Masukkan tanggal" autocomplete="off" class="form-control datepicker" required value="<?= set_value('tglberlaku'); ?>">
                            <?= form_error('tglberlaku', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tglberakhir"><strong>Tanggal Berakhir</strong></label>
                            <input type="text" name="tglberakhir" placeholder="Masukkan tanggal" autocomplete="off" class="form-control datepicker" required value="<?= set_value('tglberakhir'); ?>">
                            <?= form_error('tglberakhir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="keterangan"><strong>Keterangan</strong></label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="5"><?= set_value('keterangan'); ?></textarea>
                            <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="softcopy"><strong>File Dokumen</strong></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="softcopy" name="softcopy">
                                <label class="custom-file-label" for="softcopy">Pilih file</label>
                                <?php if($error_upload!=='') { ?>
                                <small class="text-danger pl-3"><?=$error_upload?></small>
                                <?php }?>
                            </div>
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