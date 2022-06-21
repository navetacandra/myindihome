<style>
    .admin-card {
        border-bottom-right-radius: 20px;
        border-top-left-radius: 20px;
        border-top-right-radius: 0;
        border-bottom-left-radius: 0;
    }
</style>
<div class="container mt-5">
    <div class="row">
        <div class="col me-3 mb-3">
            <div class="card bg-primary text-white admin-card">
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <h3 class="card-title me-2">Jumlah Anggota</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="2rem" height="2rem" fill="#FFC107">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M319.9 320c57.41 0 103.1-46.56 103.1-104c0-57.44-46.54-104-103.1-104c-57.41 0-103.1 46.56-103.1 104C215.9 273.4 262.5 320 319.9 320zM369.9 352H270.1C191.6 352 128 411.7 128 485.3C128 500.1 140.7 512 156.4 512h327.2C499.3 512 512 500.1 512 485.3C512 411.7 448.4 352 369.9 352zM512 160c44.18 0 80-35.82 80-80S556.2 0 512 0c-44.18 0-80 35.82-80 80S467.8 160 512 160zM183.9 216c0-5.449 .9824-10.63 1.609-15.91C174.6 194.1 162.6 192 149.9 192H88.08C39.44 192 0 233.8 0 285.3C0 295.6 7.887 304 17.62 304h199.5C196.7 280.2 183.9 249.7 183.9 216zM128 160c44.18 0 80-35.82 80-80S172.2 0 128 0C83.82 0 48 35.82 48 80S83.82 160 128 160zM551.9 192h-61.84c-12.8 0-24.88 3.037-35.86 8.24C454.8 205.5 455.8 210.6 455.8 216c0 33.71-12.78 64.21-33.16 88h199.7C632.1 304 640 295.6 640 285.3C640 233.8 600.6 192 551.9 192z" />
                        </svg>
                    </div>
                    <div class="mt-2 ms-2">
                        <h4><?= $user_counts; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col me-3 mb-3">
            <div class="card bg-warning text-dark admin-card">
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <h3 class="card-title me-2">Jumlah Laporan</h3>
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
    </div>
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