<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <?php if ($this->session->flashdata('success_msg')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success_msg') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('error_msg')) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error_msg') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
        </div>
    </div>
    <h2 class="text-center text-uppercase mb-2 mt-1">riwayat laporan</h2>
    <?php if (count($user_keluhan) < 1) : ?>
        <h2 class="text-center">Tidak Ada Riwayat Ditemukan!</h2>
    <?php else : ?>
        <div class="table-container mt-3" style="overflow: auto;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tiket</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody id="users_table">
                    <?php foreach ($user_keluhan as $key => $keluhan) : ?>
                        <tr>
                            <td scope="row"><?= $key + 1 ?></td>
                            <td>
                                <a href="<?= base_url('keluhan/' . $keluhan['tiket']) ?>"><?= $keluhan['tiket'] ?></a>
                            </td>
                            <td><?= $keluhan['keluhan'] ?></td>
                            <td><?= $keluhan['status_code'] == 0 ? "Proses" : "Selesai" ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>