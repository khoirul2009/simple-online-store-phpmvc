<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>

    </div>
    <?= Flasher::flash('message'); ?>
    <a href="#masih_off" class="btn btn-primary mb-2">Add Category</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Kategori</th>
                    <th scope="col">Nama Kategori</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($data['categories'] as $key) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $key['id']; ?></td>
                        <td><?= $key['nama_kategori']; ?></td>
                        <td>

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