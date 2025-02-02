<div class="col-md-10 col-lg-8">
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Kategori</h4>
        </div>
        <div class="card-body">
            <?php echo form_open('category/edit/' . $category['id_kategori']); ?>
            <div class="form-group">
                <label for="category_name">Nama Kategori</label>
                <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo set_value('category_name', $category['nama_kategori']); ?>">
                <?php echo form_error('category_name', '<div class="text-danger">', '</div>'); ?>
            </div>
            <button onclick="javascript:history.back()" class="btn btn-warning">Kembali</button>
            <button type="submit" class="btn btn-primary">Update</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>