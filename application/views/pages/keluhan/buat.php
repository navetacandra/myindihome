<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="h3 mb-4 card-title text-center text-uppercase">buat laporan</h3>
                    <form action="<?= base_url('buat-laporan'); ?>" class="form" method="post">
                        <div class="mb-3">
                            <label for="keluhan" class="d-none">Keluhan</label>
                            <textarea class="form-control" name="keluhan" id="keluhan" value="<?= set_value('keluhan') ?>" placeholder="Tulis Laporan Anda Disini.."></textarea>
                            <?= form_error('keluhan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="d-none">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" value="<?= set_value('alamat') ?>" placeholder="Tulis Alamat Anda Disini.."></textarea>
                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="mb-3 text-end">
                            <button type="reset" class="btn btn-secondary text-uppercase">batal</button>
                            <button type="submit" class="btn btn-danger text-uppercase">buat laporan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>