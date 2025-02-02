<div class="col-md-10 col-lg-8">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Kategori</h4>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <a href="<?= site_url('category/create') ?>" class="btn btn-primary">Tambah Kategori</a>
                <a href="<?= site_url('product/') ?>" class="btn btn-primary">Produk</a>
                <a href="<?= site_url('status/') ?>" class="btn btn-primary">Status</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($categories as $category) :?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $category['nama_kategori'] ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url('category/update/' . $category['id_kategori']) ?>" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                <td class="text-center">
                                    <a href="<?= site_url('category/delete/' . $category['id_kategori']) ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>