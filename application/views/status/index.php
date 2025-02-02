<div class="col-md-10 col-lg-6">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Status</h4>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <a href="<?= site_url('status/create') ?>" class="btn btn-primary">Tambah status</a>
                <a href="<?= site_url('product/') ?>" class="btn btn-primary">Produk</a>
                <a href="<?= site_url('category/') ?>" class="btn btn-primary">Kategori</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama status</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($status as $status_view) :?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $status_view['nama_status'] ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url('status/update/' . $status_view['id_status']) ?>" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                <td class="text-center">
                                    <a href="<?= site_url('status/delete/' . $status_view['id_status']) ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>