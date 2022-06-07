<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
    </div>
    <?= Flasher::flash('message'); ?>

    <a href="<?= BASEURL; ?>dashboard/products" class="btn btn-primary mb-2">Back to Products</a>

    <div class="col-md-5">
        <form action="<?= BASEURL; ?>dashboard/updateproduct" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?= $data['product']['id']; ?>" name="id">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?= $data['product']['nama']; ?>">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" id="harga" class="form-control" name="harga" value="<?= $data['product']['harga']; ?>">
            <input type="hidden" name="gambar_lama" value="<?= $data['product']['gambar']; ?>">
            <img src="<?= BASEURL; ?>img/<?= $data['product']['gambar']; ?>" id="img-target" class="img-fluid">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" id="gambar" class="form-control" name="gambar" onchange="previewImg()">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" id="stock" class="form-control" name="stock" value="<?= $data['product']['stock']; ?>">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-select" id="category" aria-label="Default select example" name="id_kategori">
                <?php foreach ($data['category'] as $key) : ?>
                    <?php if ($data['product']['nama_kategori'] == $key['nama_kategori']) : ?>
                        <option value="<?= $key['id']; ?>" selected><?= $key['nama_kategori']; ?></option>
                    <?php endif; ?>
                    <option value="<?= $key['id']; ?>"><?= $key['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="deskripsi" class="form-label">Kategori</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"><?= $data['product']['deskripsi']; ?></textarea>
            <button type="submit" class="btn btn-success mt-4">Simpan</button>
        </form>

    </div>



</main>

</div>
</div>