<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Orders</h1>

    </div>
    <? //= Flasher::flash('message'); 
    ?>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Transaksi</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Pembayaran</th>
                    <th scope="col">No Pembayaran</th>
                    <th scope="col">Pengiriman</th>
                    <th scope="col">Status</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($data['orders'] as $order) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $order['kode_transaksi']; ?></td>
                        <td><?= $order['nama']; ?></td>
                        <td><?= $order['alamat'] . " " . $order['provinsi'] . " " . $order['kota'] . " " . $order['kecamatan']; ?></td>
                        <td><?= $order['pembayaran']; ?></td>
                        <td><?= $order['no_pembayaran']; ?></td>
                        <td><?= $order['pengiriman']; ?></td>
                        <td><?= $order['status']; ?></td>
                        <td><a href="<?= BASEURL; ?>dashboard/detailorder/<?= $order['id']; ?>" class="btn btn-sm btn-primary">Detail</a></td>
                    </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>


</main>

</div>
</div>