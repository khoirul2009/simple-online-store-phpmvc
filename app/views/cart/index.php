<div class="container">
    <div class="d-block mt-3 row">
        <h2 class="my-3">Carts</h2>
        <?= Flasher::flash('message'); ?>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga/Product</th>
                        <th scope="col">Jumlah Order</th>
                        <th scope="col">Harga Total</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($data['carts']) == 0) : ?>
                        <tr>
                            <td colspan="8" class="text-center">Cart Masih Kosong</td>
                        </tr>
                    <?php else : ?>
                        <?php
                        $i = 1;
                        foreach ($data['carts'] as $key) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $key['nama']; ?></td>
                                <td><?= Helper::rupiah($key['harga']); ?></td>
                                <td><?= $key['jumlah']; ?></td>
                                <td><?= Helper::rupiah($key['harga'] * $key['jumlah']); ?></td>
                                <td>
                                    <form action="<?= BASEURL; ?>cart/deletefromcart" method="post">
                                        <input type="hidden" name="id_products" id="" value="<?= $key['id_products']; ?>">
                                        <input type="hidden" name="id_users" id="" value="<?= $key['id_users']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
    <a href="<?= BASEURL; ?>cart/checkout" class="btn btn-primary">Check Out</a>
</div>