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
<!-- <?php echo  $this->session->userdata('email'); ?> -->

<body>
    <table class="tabelcakep">
        <caption>List Masa Berlaku Dokumen per tgl 9 Maret 2022 </caption>
        <thead>
            <th>Jenis Dokumen</th>
            <th>No Dokumen</th>
            <th>Titel Dokumen</th>
            <th>Tgl Berakhir</th>
            <th>Sisa Waktu Berlaku</th>
        </thead>
        <tbody>
            <tr>
                <td>Sertifikat Tanah</td>
                <td>01234/THN/SHM-1983/DKIJKT</td>
                <td>SHM Jalan Margasatwa No.5</td>
                <td class="rightalign">12 April 2022</td>
                <td class="rightalign">34 Hari</td>
            </tr>
        </tbody>
    </table>
</body>

</html>