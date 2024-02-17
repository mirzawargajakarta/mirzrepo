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
                        <a href="<?= base_url('dokumen') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- <form action="<?= base_url('dokumen/detail/') . $dok['id']; ?>" id="form-tambah" method="post"> -->
                    <?= form_open_multipart('dokumen/detail/' . $dok['id']); ?>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="jenisdokumen"><strong>Jenis Dokumen</strong></label>
                            <select class="custom-select" id="jenisdokumen" name="jenisdokumen">
                                <option>-Pilih Jenis Dokumen-</option>
                                <?php foreach ($jenisdoks as $jenisdok) :
                                    $selectedstr = ($dok['jenisdokumen_id'] == $jenisdok['id']) ? ' selected' : '';
                                ?>
                                    <option value="<?= $jenisdok['id']; ?>" <?= $selectedstr ?>><?= $jenisdok['nama_dokumen']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('jenisdokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="isremind"><strong>Reminder</strong></label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="isremind" name="isremind" <?= ($dok['is_reminding'] == '1') ? 'checked' : ''; ?>>
                                <label class="custom-control-label" for="isremind">Aktifkan Reminder</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="titledokumen"><strong>Titel Dokumen</strong></label>
                            <input type="text" name="titledokumen" id="titledokumen" placeholder="Masukkan Titel Dokumen" autocomplete="off" class="form-control" value="<?= $dok['title_dokumen'] ?>">
                            <?= form_error('titledokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nodokumen"><strong>Nomor Dokumen</strong></label>
                            <input type="text" name="nodokumen" placeholder="Masukkan No Dokumen" autocomplete="off" class="form-control" value="<?= $dok['no_dokumen'] ?>">
                            <?= form_error('nodokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tglberlaku"><strong>Tanggal Berlaku</strong></label>
                            <input type="text" name="tglberlaku" placeholder="Masukkan tanggal" autocomplete="off" class="form-control datepicker" value="<?= $dok['tgl_berlaku'] ?>">
                            <?= form_error('tglberlaku', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tglberakhir"><strong>Tanggal Berakhir</strong></label>
                            <input type="text" name="tglberakhir" placeholder="Masukkan tanggal" autocomplete="off" class="form-control datepicker" value="<?= $dok['tgl_kadaluarsa'] ?>">
                            <?= form_error('tglberakhir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="keterangan"><strong>Keterangan</strong></label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="5"><?= $dok['keterangan'] ?></textarea>
                            <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8" >
                            <label for="softcopy"><strong>File Dokumen</strong></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="softcopy" name="softcopy">
                                <?php
                                    $label_txt  = ($dok['doc_softcopy']==null)?'Pilih File':$dok['doc_softcopy'];
                                ?>
                                <label class="custom-file-label" for="softcopy"><?=$label_txt?></label>
                                <?php if($error_upload!=='') { ?>
                                <small class="text-danger pl-3"><?=$error_upload?></small>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <?php
                        if($dok['doc_softcopy']==null) {

                        } else { ?>

                    <div class="form-row">
                        <div class="col-md-2" style="background-color: white;text-align: left;">
                            <a href="<?=base_url().'dokumen/getfile/'.$dok['id'];?>">
                                <strong>Download File</strong>
                            </a>
                        </div>
                        <div class="col-md-4" style="background-color: white;">&nbsp;</div>
                        <div class="col-md-2" style="background-color: white;">&nbsp;</div>
                    </div>

                    <?php } ?>
                    

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