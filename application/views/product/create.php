<div class="col-md-10 col-lg-8">
    <div class="card">
        <div class="card-header text-center">
            <h4>Tambah Produk</h4>
        </div>
        <div class="card-body">
            <?php echo form_open('product/create'); ?>
            <div class="form-group">
                <label for="product_name">Nama Produk</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo set_value('product_name'); ?>">
                <?php echo form_error('product_name', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo set_value('price'); ?>">
                <?php echo form_error('price', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="category">Kategori</label>
                <select name="category" id="category" class="form-control">
                <option value="">Pilih</option>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category['id_kategori']; ?>" <?= set_select('category', $category['id_kategori']); ?>>
                    <?= $category['nama_kategori']; ?>
                    </option>
                <?php } ?> 
                </select>
                <?php echo form_error('category', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
            <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                <option value="">Pilih</option>
                <?php foreach ($status as $select_status) { ?>
                    <option value="<?= $select_status['id_status']; ?>" <?= set_select('status', $select_status['id_status']); ?>>
                    <?= $select_status['nama_status']; ?>
                    </option>
                <?php } ?> 
                </select>
                <?php echo form_error('status', '<div class="text-danger">', '</div>'); ?>
            </div>
			<a href="<?= site_url('product/') ?>" class="btn btn-warning">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

