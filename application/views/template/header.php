<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($title) && !empty($title)) : ?>
        <title><?= $title ?></title>
    <?php else: ?>
        <title>Produk</title>
    <?php endif; ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
<div class="row justify-content-center">
