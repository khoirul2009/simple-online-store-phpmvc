<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Products</h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <img src="<?= BASEURL; ?>img/<?= $data['product']['gambar']; ?>" class="img-fluid" alt="">
        </div>
        <div class="col-md">
            <h2><?= $data['product']['nama']; ?></h2>
            <h6><?= Helper::rupiah($data['product']['harga']); ?></h6>
            <h6>Stock : <?= $data['product']['stock']; ?></h6>
            <p><?= $data['product']['nama_kategori']; ?></p>
            <div><?= $data['product']['deskripsi']; ?></div>
            <div class="d-flex">
                <form action="<?= BASEURL; ?>dashboard/deleteProduct" class="me-2" method="post">
                    <input type="hidden" name="id" value="<?= $data['product']['id']; ?>">
                    <input type="hidden" name="id" value="<?= $data['product']['gambar']; ?>">
                    <button type="submit" class="btn btn-sm btn-danger text-decoration-none">delete</button>
                </form>
                <form action="<?= BASEURL; ?>dashboard/editProduct" class="me-2" method="post">
                    <input type="hidden" name="id" value="<?= $data['product']['id']; ?>">
                    <button type="submit" class="btn btn-sm btn-warning text-decoration-none">edit</button>
                </form>
            </div>
        </div>
    </div>



</main>

</div>
</div>