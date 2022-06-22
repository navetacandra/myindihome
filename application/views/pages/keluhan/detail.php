<div class="container mt-5">
    <h2 class="text-center text-uppercase">Detail Laporan</h2>
    <?php if ($keluhan) : ?>
        <div class="table-container row justify-content-center mt-3">
            <div class="col-10" style="overflow: auto;">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Judul</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody id="users_table">
                        <?php foreach ($keluhan as $key => $k) : ?>
                            <tr>
                                <td scope="row"><?= $key ?></td>
                                <td><?= $k ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>