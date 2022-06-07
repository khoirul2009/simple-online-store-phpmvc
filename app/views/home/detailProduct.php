<main class="container bg-white" style="height: 100vh;">
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

                <form action="<?= BASEURL; ?>cart/addtocart" class="me-2" method="post">
                    <input type="hidden" name="id_product" value="<?= $data['product']['id']; ?>">
                    <button type="submit" class="btn btn-primary text-decoration-none">Masukan Ke Keranjang</button>
                </form>


            </div>
        </div>
    </div>



</main>

</div>
</div>