<style>
    .user-card {
        border-bottom-right-radius: 20px;
        border-top-left-radius: 20px;
        border-top-right-radius: 0;
        border-bottom-left-radius: 0;
    }
</style>
<div class="container mt-5">
    <div class="row">
        <div class="col me-3 mb-3">
            <div class="card bg-warning text-dark user-card">
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <h3 class="card-title me-2">Laporan Dibuat</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="#DC3545" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </div>
                    <div class="mt-2 ms-2">
                        <h4><?= $keluhan_counts ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col me-3 mb-3">
            <div class="card bg-success text-white user-card">
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <h3 class="card-title me-2">Laporan Selesai</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="#DC3545" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </div>
                    <div class="mt-2 ms-2">
                        <h4><?= $keluhan_selesai_counts ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card my-3 p-0">
                    <div class="card-body">
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item">
                                <div class="d-flex justify-content-center"><img class="rounded-circle shadow-sm profile-image" width="200" height="200" src="https://firebasestorage.googleapis.com/v0/b/photosheets.appspot.com/o/profilePict%2FDefaultUser.jpg?alt=media&token=78c7b801-5793-4ffe-8b7b-cebfc8c0cb33" alt="Profile Image"></div>
                            </li>
                            <li class="list-group-item">Nama :<br><?= $this->session->userdata('nama'); ?></li>
                            <li class="list-group-item">Nomor Telepon :<br><?= $this->session->userdata('tel'); ?></li>
                            <li class="list-group-item">Email :<br><?= $this->session->userdata('email'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>