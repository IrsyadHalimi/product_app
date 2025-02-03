<div class="col-md-10 col-lg-8">
    <div class="card">
        <div class="card-header text-center">
            <h4>Ambil data API</h4>
        </div>
        <div class="card-body">
            <?php echo form_open('product/fetch_api'); ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>">
                <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
            </div>
            <button onclick="javascript:history.back()" class="btn btn-warning">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
