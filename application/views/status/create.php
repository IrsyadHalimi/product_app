<div class="col-md-10 col-lg-6">
    <div class="card">
        <div class="card-header text-center">
            <h4>Tambah Status</h4>
        </div>
        <div class="card-body">
            <?php echo form_open('status/create'); ?>
            <div class="form-group">
                <label for="status_name">Nama Status</label>
                <input type="text" class="form-control" id="status_name" name="status_name" value="<?php echo set_value('status_name'); ?>">
                <?php echo form_error('status_name', '<div class="text-danger">', '</div>'); ?>
            </div>
            <button onclick="javascript:history.back()" class="btn btn-warning">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>