<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Orders</h1>
    </div>

    <div class="row">
        <div class="col-md-8 card p-3 m-3">
            <?= Flasher::flash('message'); ?>
            <h5>Kode Transaksi : <?= $data['detailOrder']['kode_transaksi']; ?></h5>
            <table>
                <tr>
                    <td>Nama Pemesan </td>
                    <td><?= $data['detailOrder']['nama']; ?></td>
                </tr>
                <tr>
                    <td>Alamat </td>
                    <td><?= $data['detailOrder']['alamat'] . " " . $data['detailOrder']['provinsi'] . " " . $data['detailOrder']['kota'] . " " . $data['detailOrder']['kecamatan']; ?></td>
                </tr>
                <tr>
                    <td>Pembayaran </td>
                    <td><?= $data['detailOrder']['pembayaran']; ?></td>
                </tr>
                <tr>
                    <td class="col-5">Nomor Rekening/Pembayaran </td>
                    <td><?= $data['detailOrder']['no_pembayaran']; ?></td>
                </tr>
                <tr>
                    <td class="col-5">Pengiriman </td>
                    <td><?= $data['detailOrder']['pengiriman']; ?></td>
                </tr>
                <tr>
                    <td class="col-5">Status </td>
                    <td><?= $data['detailOrder']['status'] == 'sending' ? 'Pesanan dalam pengiriman' : $data['detailOrder']['status']; ?></td>
                </tr>
                <tr>
                    <td class="col-5">Estimasi Pengiriman </td>
                    <td><?= "Pesanan diterima pada tanggal " . ($data['detailOrder']['status'] == 'received' ? date('d-m-Y H:i:s', $data['detailOrder']['received_at'] + 259200) : date('d-m-Y H:i:s', $data['detailOrder']['sent_at'] + 259200) . " - " . date('d-m-Y H:i:s', $data['detailOrder']['sent_at'] + 432000)) ?></td>
                </tr>

            </table>


            <div class="col-md mt-3">
                <h5>Products </h5>



                <div class="">
                    <ul class="list-group list-group-flush">
                        <?php $sum = [];
                        foreach ($data['products'] as $key) : ?>
                            <li class="list-group-item">
                                <div class="d-flex">
                                    <h6><?= $key['nama']; ?></h6>
                                    <h6 class="ms-auto badge bg-primary"><?= $key['jumlah']; ?></h6>
                                </div>
                                <p><?= Helper::rupiah($key['harga'] * $key['jumlah']); ?></p>
                                <?php array_push($sum, $key['harga'] * $key['jumlah']); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <h5 class="mt-2">Total : <?= Helper::rupiah(array_sum($sum)); ?></h5>

            </div>


            <?php if ($data['detailOrder']['status'] == 'sending') : ?>
                <form action="<?= BASEURL; ?>orders/prosesOrder" class="my-3" method="post">
                    <input type="hidden" name="id" id="" value="<?= $data['detailOrder']['id']; ?>">

                    <button type="submit" class="btn btn-primary">Terima Pesanan</button>
                </form>
            <?php endif; ?>




        </div>
    </div>



</main>

</div>
</div>