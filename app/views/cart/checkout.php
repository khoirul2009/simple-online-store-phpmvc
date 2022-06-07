<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-center my-3">Checkout Orders</h2>
            <form action="<?= BASEURL; ?>cart/order" method="post">
                <label for="" class="form-label">Nama Pembeli</label>
                <input type="text" class="form-control" name="nama">
                <label for="" class="form-label">Alamat Pembeli</label>
                <input type="text" class="form-control" name="alamat">
                <label for="" class="form-label">Provinsi</label>

                <input type="hidden" id="hprovinsi" name="provinsi">
                <input type="hidden" id="hkota" name="kota">
                <select class="form-select" aria-label="Default select example" id="provinsi" onchange="getProvinsi(this)">
                </select>
                <label for="" class="form-label">Kota</label>
                <select class="form-select" aria-label="Default select example" id="kota" onchange="getKota(this)">
                </select>
                <label for="" class="form-label">Kecamatan</label>
                <select class="form-select" aria-label="Default select example" id="kecamatan" name="kecamatan">
                </select>
                <div class="d-flex row">
                    <div class="col">
                        <label for="" class="form-label">Opsi Pembayaran</label>
                        <select class="form-select" aria-label="Default select example" id="pembayaran" name="pembayaran">
                            <option value="Bank">Bank</option>
                            <option value="OVO">Ovo</option>
                            <option value="Gopay">Gopay</option>
                        </select>

                    </div>
                    <div class="col">
                        <label for="" class="form-label">Nomor Pembayaran</label>
                        <input type="number" class="form-control" name="no_pembayaran">
                    </div>

                </div>
                <label for="" class="form-label">Pengiriman</label>
                <select class="form-select" aria-label="Default select example" id="pengiriman" name="pengiriman">
                    <option value="JNE">JNE</option>
                    <option value="JNT">JNT</option>
                    <option value="SiCepat">SiCepat</option>
                </select>
                <button class="btn btn-primary mt-4">Create Orders</button>
            </form>

        </div>
        <div class="col-md-4">
            <h2 class="text-center my-3">Your Carts</h2>

            <div class="card mt-4">
                <ul class="list-group list-group-flush">
                    <?php foreach ($data['carts'] as $key) : ?>
                        <li class="list-group-item">
                            <div class="d-flex">
                                <h6><?= $key['nama']; ?></h6>
                                <h6 class="ms-auto badge bg-primary"><?= $key['jumlah']; ?></h6>
                            </div>
                            <p><?= Helper::rupiah($key['harga'] * $key['jumlah']); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    const provinsi = document.querySelector("#provinsi");
    const kota = document.querySelector("#kota");
    const kecamatan = document.querySelector("#kecamatan");



    fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi')
        .then(response => response.json())
        .then(data => {
            for (var i = 0; i < data.provinsi.length; i++) {
                const option = document.createElement("option");
                const provinsi = document.querySelector("#provinsi");
                option.value = data.provinsi[i].id;
                option.innerHTML = data.provinsi[i].nama;
                provinsi.appendChild(option);

            }

        });

    function getProvinsi(sel) {
        const idProvinsi = provinsi.value;
        const options = document.querySelector("#kota");

        while (options.hasChildNodes()) {
            options.removeChild(options.firstChild);
        }

        fetch('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' + idProvinsi)
            .then(response => response.json())
            .then(data => {

                for (var i = 0; i < data.kota_kabupaten.length; i++) {
                    const option = document.createElement("option");
                    const kota = document.querySelector("#kota");
                    option.value = data.kota_kabupaten[i].id;
                    option.innerHTML = data.kota_kabupaten[i].nama;
                    kota.appendChild(option);

                }

            });
        const hProv = document.querySelector("#hprovinsi");
        hProv.value = sel.options[sel.selectedIndex].text;
    }



    function getKota(sel) {
        const idKota = kota.value;
        const options = document.querySelector("#kecamatan");

        while (options.hasChildNodes()) {
            options.removeChild(options.firstChild);
        }

        fetch('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' + idKota)
            .then(response => response.json())
            .then(data => {

                for (var i = 0; i < data.kecamatan.length; i++) {
                    const option = document.createElement("option");
                    const kecamatan = document.querySelector("#kecamatan");
                    option.value = data.kecamatan[i].nama;
                    option.innerHTML = data.kecamatan[i].nama;
                    kecamatan.appendChild(option);
                }

            });

        const hKota = document.querySelector("#hkota")
        hKota.value = sel.options[sel.selectedIndex].text;
    }
</script>