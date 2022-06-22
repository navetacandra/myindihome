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
    <h2 class="text-center text-uppercase mb-2">keluhan manager</h2>
    <?php if (count($all_keluhan) < 1) : ?>
        <h2 class="text-center mb-2">Tidak Ada Laporan Ditemukan!</h2>
    <?php else : ?>
        <div class="table-container" style="overflow: auto;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">No. Telpon</th>
                        <th scope="col">Tiket</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody id="users_table">
                </tbody>
            </table>
        </div>
</div>
<div id="modal_container"></div>
<script>
    const users = [
        <?php foreach ($all_keluhan as $keluhan) : ?> {
                keluhan_id: 'keluhan_<?= $keluhan['tiket'] ?>',
                penulis: '<?= $keluhan['creator'] ?>',
                tel: '<?= $keluhan['tel'] ?>',
                tiket: '<?= $keluhan['tiket'] ?>',
                status: '<?= $keluhan['status_code'] ?>'
            },
        <?php endforeach; ?>
    ];

    let modal = {};

    users.forEach((el, i) => {
        const el1 = `<tr>
    <th class="align-center" scope="row">${i + 1}</th>
    <td class="align-center">${el.penulis}</td>
    <td class="align-center">${el.tel}</td>
    <td class="align-center">
    <a href="<?= base_url('keluhan') ?>/${el.tiket}">${el.tiket}</a>
    </td>
    <td class="align-center">${el.status == 1 ? 'Selesai' : 'Proses'}</td>
    <td>
    <button class="btn btn-warning text-uppercase me-2" data-action="edit" data-id="editKeluhan_${el.keluhan_id}">edit</button>
    </td>
    <td>
        <button class="btn btn-danger text-uppercase" data-action="delete" data-id="${el.keluhan_id.replace('keluhan_', '')}">delete</button>
    </td>
</tr>`;
        modal[`editKeluhan_${el.keluhan_id}`] = `<div class="modal" id="editKeluhan_${el.keluhan_id}Modal" tabindex="-1" aria-labelledby="editKeluhan_${el.keluhan_id}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editKeluhan_${el.keluhan_id}ModalLabel">Edit ${el.email}'s Profile</h5>
            <button type="button" class="btn-close" onclick="closeModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('keluhan-manager') ?>" method="post">
            <ul class="list-group list-group-flush text-center">
            <li class="list-group-item">Penulis :
            <br />
            <input type="text" name="penulis" id="penulis" value="${el.penulis}" class="form-control edit-input mt-2" required readonly />
            </li>
                    <li class="list-group-item">No. Telpon :
                        <br />
                        <input type="text" name="tel" id="tel" value="${el.tel}" class="form-control edit-input mt-2" required readonly />
                        </li>
                        <li class="list-group-item">Tiket :
                        <br />
                        <input type="text" name="tiket" id="tiket" value="${el.tiket}" class="form-control edit-input mt-2" readonly />
                        </li>
                        <li class="list-group-item">Status :
                        <br />
                        <input type="text" name="status" id="status" value="${el.status}" class="form-control edit-input mt-2" maxlength="1" required />
                    </li>
                </ul>
                <div class="text-center mt-2">
                <button type="submit" class="text-uppercase btn btn-primary" style="width: 50%; border-radius: 20px;">edit</button>
                </div>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
            </div>
        </div>
        </div>
</div>`;

        document.querySelector('#users_table').innerHTML += el1;
    });

    document.querySelectorAll('[data-action="edit"]').forEach(el => {
        el.addEventListener('click', (e) => {
            const mdl = modal[el.getAttribute('data-id')];
            document.querySelector('#modal_container').innerHTML = mdl;
            const current_modal = document.querySelector(`#${el.getAttribute('data-id')}Modal`);
            (new bootstrap.Modal(current_modal, {})).show();
        });
    });

    document.querySelectorAll('[data-action="delete"]').forEach(el => {
        el.addEventListener('click', e => deleteConfirm(el.getAttribute('data-id')))
    });

    function deleteConfirm(tiket) {
        const url = `<?= base_url('delete-keluhan') ?>/${tiket}`;
        if (confirm(`Apakah kamu yakin ingin menghapus keluhan ${tiket}?`)) {
            window.location = url;
        }
    }

    function closeModal() {
        document.querySelector(`.modal.show`).remove();
        document.querySelector(`.modal-backdrop`).remove();
    }
</script>
<?php endif; ?>