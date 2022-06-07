<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>

    </div>
    <?= Flasher::flash('message'); ?>
    <a href="<?= BASEURL; ?>dashboard/addproduct" class="btn btn-primary mb-2">Add Product</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($data['products'] as $key) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $key['nama']; ?></td>
                        <td><?= Helper::rupiah($key['harga']); ?></td>
                        <td><?= $key['stock']; ?></td>
                        <td><?= $key['nama_kategori']; ?></td>
                        <td class="d-flex">
                            <form action="<?= BASEURL; ?>dashboard/deleteProduct" class="me-2" method="post">
                                <input type="hidden" name="id" value="<?= $key['id']; ?>">
                                <input type="hidden" name="gambar" value="<?= $key['gambar']; ?>">
                                <button type="submit" class="btn btn-sm btn-danger text-decoration-none">delete</button>
                            </form>
                            <a href="<?= BASEURL; ?>dashboard/detailproduct/<?= $key['id']; ?>" class="btn btn-sm btn-primary me-2 text-decoration-none">detail</a>
                            <a href="<?= BASEURL; ?>dashboard/editproduct/<?= $key['id']; ?>" class="btn btn-sm btn-warning text-decoration-none">edit</a>
                        </td>

                    </tr>
                <?php $i++;
                endforeach; ?>

            </tbody>
        </table>
    </div>


</main>

</div>
</div>