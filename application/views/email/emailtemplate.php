<html>

<head>
    <style>
        .tabelcakep {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 80%;
        }

        .tabelcakep td,
        .tabelcakep th {
            border: 1px solid #ddd;
            padding: 8px;
            white-space: nowrap;
        }

        .tabelcakep tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tabelcakep tr:hover {
            background-color: #ddd;
        }

        .tabelcakep th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .rightalign {
            text-align: right;
        }
    </style>
</head>

<body>
    <?php
    $this->load->helper('date');
    ?>
    <table class="tabelcakep">
        <caption>List Dokumen per Tgl <?= localDate($today); ?></caption>
        <thead>
            <th>No.</th>
            <th>Jenis Dokumen</th>
            <th>No Dokumen</th>
            <th>Titel Dokumen</th>
            <th>Tgl Berakhir</th>
            <th>Sisa Waktu Berlaku</th>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($dokumens as $dok) :
                $jenisdok = $dok['nama_dokumen'];
                $nodokumen = $dok['no_dokumen'];
                $titeldokumen = $dok['title_dokumen'];
                $tglberakhir = localDate($dok['tgl_kadaluarsa']);
                $sisahari = $dok['Sisa'];
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $jenisdok; ?></td>
                    <td><?= $nodokumen; ?></td>
                    <td><?= $titeldokumen; ?></td>
                    <td class="rightalign"><?= $tglberakhir; ?></td>
                    <td class="rightalign"><?= $sisahari; ?> Hari</td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>