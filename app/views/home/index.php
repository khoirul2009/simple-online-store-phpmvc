<div class="container">
    <div class="d-block mt-3 row">
        <h2 class="my-3">Highlight Products</h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">

                <?php for ($i = 0; $i < 3; $i++) : ?>
                    <div class="carousel-item <?= $i == 1 ? 'active' : ''; ?> w-100 bg-dark">
                        <div class="row">
                            <div class="col-6">
                                <img src="<?= BASEURL; ?>img/<?= $data['products'][$i]['gambar']; ?>" class="d-block" alt="..." height="500px">
                            </div>
                            <div class="col-6 text-white mt-5">
                                <h5><?= $data['products'][$i]['nama']; ?></h5>
                                <p><?= $data['products'][$i]['harga']; ?></p>
                                <div><?= str_word_count($data['products'][$i]['deskripsi']) > 60 ? substr($data['products'][$i]['deskripsi'], 0, 300) : $data['products'][$i]['deskripsi']; ?><a class="text-white" href="<?= BASEURL; ?>home/detailProduct/<?= $data['products'][$i]['id']; ?>"> Lihat Selengkapnya..</a></div>
                            </div>

                        </div>
                    </div>
                <?php endfor; ?>


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="row mt-3">
        <h2 class="my-3">Products</h2>
        <?php foreach ($data['products'] as $product) : ?>
            <div class="col-lg-3 col-6">
                <div class="card p-2">
                    <img src="<?= BASEURL; ?>/img/<?= $product['gambar']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['nama']; ?></h5>
                        <p class="card-title"><?= Helper::rupiah($product['harga']); ?></p>
                        <div class="d-flex">

                            <form action="<?= BASEURL; ?>cart/addtocart" method="post">
                                <input type="hidden" name="id_product" value="<?= $product['id']; ?>">
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </button>
                            </form>
                            <a href="<?= BASEURL; ?>home/detailProduct/<?= $product['id']; ?>" class="btn btn-success ms-1">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>