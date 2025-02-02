<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
</head>
<body>
    <h2>Data Produk</h2>
    <a href="<?= site_url('product/create') ?>">Tambah Produk</a><br>
    <a href="<?= site_url('product/fetch_api') ?>">Ambil Data dari API</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; foreach ($product as $p) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $p['nama_produk'] ?></td>
                <td><?= $p['harga'] ?></td>
                <td><?= $p['nama_kategori'] ?></td>
                <td><?= $p['nama_status'] ?></td>
                <td>
                    <a href="<?= site_url('product/update/' . $p['id_produk']) ?>">Edit</a>
                    <a href="<?= site_url('product/delete/' . $p['id_produk']) ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
