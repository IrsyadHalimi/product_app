<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Produk</h2>
        <?php echo form_open('product/edit/' . $product['id_produk']); ?>
        <div class="form-group">
            <label for="product_name">Nama Produk</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo set_value('product_name', $product['nama_produk']); ?>">
            <?php echo form_error('product_name', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo set_value('price', $product['harga']); ?>">
            <?php echo form_error('price', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" class="form-control" id="category" name="category" value="<?php echo set_value('category', $product['kategori_id']); ?>">
            <?php echo form_error('category', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="product_name">Status</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo set_value('product_name', $product['nama_produk']); ?>">
            <?php echo form_error('product_name', '<div class="text-danger">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <?php echo form_close(); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
