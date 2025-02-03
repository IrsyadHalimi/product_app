<div class="col-md-10 col-lg-12">
    <div class="card">
        <div class="card-header text-center">
            <?php if (isset($title) && !empty($title)) : ?>
                <h4><?= $title ?></h4>
            <?php else : ?>
                <h4>Produk</h4>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <a href="<?= site_url('product/create') ?>" class="btn btn-primary">Tambah Produk</a>
                <a href="<?= site_url('product/username_api_input') ?>" class="btn btn-warning">Ambil Data dari API</a>
                <?php if (isset($title) && $title == 'Produk Dijual') : ?>
                    <a href="<?= site_url('product/index') ?>" class="btn btn-info">Lihat Semua Produk</a>
                <?php else : ?>
                    <a href="<?= site_url('product/sell') ?>" class="btn btn-success">Lihat Produk Dijual</a>
                <?php endif; ?>
                <a href="<?= site_url('category/') ?>" class="btn btn-primary">Kategori</a>
                <a href="<?= site_url('status/') ?>" class="btn btn-primary">Status</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($product as $prod) : 
                            $harga = $prod['harga'];
                            $formatted_harga = number_format($harga, 0, ',', '.');
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $prod['nama_produk'] ?></td>
                                <td><?= $formatted_harga ?></td>
                                <td><?= $prod['nama_kategori'] ?></td>
                                <td><?= $prod['nama_status'] ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url('product/update/' . $prod['id_produk']) ?>" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                <td class="text-center">
                                    <a href="<?= site_url('product/delete/' . $prod['id_produk']) ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
