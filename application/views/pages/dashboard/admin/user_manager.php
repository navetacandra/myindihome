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
    <h2 class="text-center text-uppercase mb-2">user manager</h2>
    <div class="table-container" style="overflow: auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
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
        <?php foreach ($all_users as $user) : ?> {
                user_id: '<?= $user['id'] ?>',
                nama: '<?= $user['nama'] ?>',
                tel: '<?= $user['tel'] ?>',
                email: '<?= $user['email'] ?>',
                role: '<?= $user['role'] ?>',
                active: '<?= $user['is_active'] ?>'
            },
        <?php endforeach; ?>
    ];

    let modal = {};

    users.forEach((el, i) => {
        const el1 = `<tr>
    <th class="align-center" scope="row">${i + 1}</th>
    <td class="align-center">${el.email}</td>
    <td>
        <button class="btn btn-warning text-uppercase me-2" data-action="edit" data-id="editUser_${el.user_id}">edit</button>
    </td>
    <td>
        <button class="btn btn-danger text-uppercase" onclick="deleteConfirm('${el.user_id}', '${el.email}')">delete</button>
    </td>
</tr>`;
        modal[`editUser_${el.user_id}`] = `<div class="modal" id="editUser_${el.user_id}Modal" tabindex="-1" aria-labelledby="editUser_${el.user_id}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUser_${el.user_id}ModalLabel">Edit ${el.email}'s Profile</h5>
                <button type="button" class="btn-close" onclick="closeModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('user-manager') ?>" method="post">
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item">Nama :
                        <br />
                        <input type="text" name="nama" id="nama" value="${el.nama}" class="form-control edit-input mt-2" required />
                    </li>
                    <li class="list-group-item">Email :
                        <br />
                        <input type="email" name="email" id="email" value="${el.email}" class="form-control edit-input mt-2" readonly />
                    </li>
                    <li class="list-group-item">Nomor Telepon :
                        <br />
                        <input type="text" name="tel" id="tel" value="${el.tel}" class="form-control edit-input mt-2" minlength="10" maxlength="13" required />
                    </li>
                    <li class="list-group-item">Role Id :
                        <br />
                        <input type="text" name="role" id="role" value="${el.role}" class="form-control edit-input mt-2" minlength="1" maxlength="1" required />
                    </li>
                    <li class="list-group-item">Active Status :
                        <br />
                        <input type="text" name="is_active" id="is_active" value="${el.active}" class="form-control edit-input mt-2" minlength="1" maxlength="1" required />
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

    function deleteConfirm(id, email) {
        const url = `<?= base_url('delete-user') ?>/${id}`;
        if (confirm(`Apakah kamu yakin ingin menghapus user ${email}?`)) {
            window.location = url;
        }
    }

    function closeModal() {
        document.querySelector(`.modal.show`).remove();
        document.querySelector(`.modal-backdrop`).remove();
    }
</script>