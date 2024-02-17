<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Dokumen Aktif</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url('dokumen/tambahdata/'); ?>" class="btn btn-primary btn-sm mb-2">
                <i class="fas fa-file-plus"></i><strong>Tambah Data</strong>
            </a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Dokumen</th>
                            <th>Nomor Dokumen</th>
                            <th>Title</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Berakhir</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $dok) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dok['nama_dokumen']; ?></td>
                                <td><?= $dok['no_dokumen']; ?></td>
                                <td><?= $dok['title_dokumen']; ?></td>
                                <td><?= $dok['tgl_berlaku']; ?></td>
                                <td><?= $dok['tgl_kadaluarsa']; ?></td>
                                <td style="text-align:center">
                                    <a href="<?= base_url('dokumen/detail/') . $dok['id'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('dokumen/hapus/') . $dok['id'] ?>" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>