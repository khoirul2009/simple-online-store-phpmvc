<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Customers</h1>

    </div>
    <?= Flasher::flash('message'); ?>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">role</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($data['users'] as $key) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $key['nama']; ?></td>
                        <td><?= $key['email']; ?></td>
                        <td><?= $key['role']; ?></td>
                        <td class="d-flex">
                            <form action="<?= BASEURL; ?>dashboard/deleteUser" class="me-2" method="post">
                                <input type="hidden" name="id" value="<?= $key['id']; ?>">
                                <input type="hidden" name="image" value="<?= $key['image']; ?>">
                                <button type="submit" class="btn btn-sm btn-danger text-decoration-none">delete</button>
                            </form>


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