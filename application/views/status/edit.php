<div class="col-md-10 col-lg-6">
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Status</h4>
        </div>
        <div class="card-body">
            <?php echo form_open('status/edit/' . $status['id_status']); ?>
            <div class="form-group">
                <label for="status_name">Nama Status</label>
                <input type="text" class="form-control" id="status_name" name="status_name" value="<?php echo set_value('status_name', $status['nama_status']); ?>">
                <?php echo form_error('status_name', '<div class="text-danger">', '</div>'); ?>
            </div>
			<a href="<?= site_url('status/') ?>" class="btn btn-warning">Kembali</a>
			<button type="submit" class="btn btn-primary">Update</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
