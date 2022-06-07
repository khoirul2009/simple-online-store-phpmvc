<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
    </div>
    <?= Flasher::flash('message'); ?>

    <a href="<?= BASEURL; ?>dashboard/products" class="btn btn-primary mb-2">Back to Products</a>

    <div class="col-md-5">
        <form action="<?= BASEURL; ?>dashboard/saveproduct" method="post" enctype="multipart/form-data">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" id="harga" class="form-control" name="harga">
            <img src="" id="img-target" class="img-fluid">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" id="gambar" class="form-control" name="gambar" onchange="previewImg()">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" id="stock" class="form-control" name="stock">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-select" id="category" aria-label="Default select example" name="id_kategori">
                <?php foreach ($data['category'] as $key) : ?>
                    <option value="<?= $key['id']; ?>"><?= $key['nama_kategori']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="deskripsi" class="form-label">Kategori</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
            <button type="submit" class="btn btn-success mt-4">Simpan</button>
        </form>

    </div>



</main>

</div>
</div>