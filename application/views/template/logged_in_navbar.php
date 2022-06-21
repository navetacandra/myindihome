<style>
    .offcanvas-link:hover {
        background-color: #cc2d3c !important;
    }

    .offcanvas-link.active {
        background-color: #cc2d3c !important;
    }

    .offcanvas-link>span {
        opacity: .8;
    }

    .offcanvas-link.active>span {
        opacity: 1;
    }
</style>

<nav class="navbar navbar-dark bg-danger">
    <button class="ms-3 navbar-toggler align-self-center d-none d-lg-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideNavbar" aria-controls="sideNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="me-3 navbar-toggler d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideNavbar" aria-controls="sideNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<div class="offcanvas offcanvas-start bg-danger text-white" tabindex="-1" id="sideNavbar" aria-labelledby="sideNavbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sideNavbarLabel">My Indihome</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mt-3">
        <div class="row">
            <section id="auth_action">
                <div class="list-group">
                    <a class="bg-danger text-white border-0 list-group-item py-3 offcanvas-link" href="<?= base_url(); ?>">
                        <span class="align-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="me-2" width="20" height="20" fill="#ffffff">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM280 292.7V88C280 74.75 269.3 64 256 64C242.7 64 232 74.75 232 88V292.7C208.5 302.1 192 325.1 192 352C192 387.3 220.7 416 256 416C291.3 416 320 387.3 320 352C320 325.1 303.5 302.1 280 292.7zM144 176C161.7 176 176 161.7 176 144C176 126.3 161.7 112 144 112C126.3 112 112 126.3 112 144C112 161.7 126.3 176 144 176zM96 224C78.33 224 64 238.3 64 256C64 273.7 78.33 288 96 288C113.7 288 128 273.7 128 256C128 238.3 113.7 224 96 224zM416 288C433.7 288 448 273.7 448 256C448 238.3 433.7 224 416 224C398.3 224 384 238.3 384 256C384 273.7 398.3 288 416 288zM368 112C350.3 112 336 126.3 336 144C336 161.7 350.3 176 368 176C385.7 176 400 161.7 400 144C400 126.3 385.7 112 368 112z" />
                            </svg>
                            Dashboard
                        </span>
                    </a>
                    <a class="bg-danger text-white border-0 list-group-item py-3 offcanvas-link" href="<?= base_url('edit-profile'); ?>">
                        <span class="align-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="me-2" width="20" height="20" fill="#ffffff">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M223.1 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 223.1 256zM274.7 304H173.3C77.61 304 0 381.7 0 477.4C0 496.5 15.52 512 34.66 512h286.4c-1.246-5.531-1.43-11.31-.2832-17.04l14.28-71.41c1.943-9.723 6.676-18.56 13.68-25.56l45.72-45.72C363.3 322.4 321.2 304 274.7 304zM371.4 420.6c-2.514 2.512-4.227 5.715-4.924 9.203l-14.28 71.41c-1.258 6.289 4.293 11.84 10.59 10.59l71.42-14.29c3.482-.6992 6.682-2.406 9.195-4.922l125.3-125.3l-72.01-72.01L371.4 420.6zM629.5 255.7l-21.1-21.11c-14.06-14.06-36.85-14.06-50.91 0l-38.13 38.14l72.01 72.01l38.13-38.13C643.5 292.5 643.5 269.7 629.5 255.7z" />
                            </svg>
                            Edit Profile
                        </span>
                    </a>
                    <?php if ($this->session->userdata('role') == 1) : ?>
                        <a class="bg-danger text-white border-0 list-group-item py-3 offcanvas-link" href="<?= base_url('user-manager'); ?>">
                            <span class="align-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="me-2" width="20" height="20" fill="#ffffff">
                                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path d="M319.9 320c57.41 0 103.1-46.56 103.1-104c0-57.44-46.54-104-103.1-104c-57.41 0-103.1 46.56-103.1 104C215.9 273.4 262.5 320 319.9 320zM369.9 352H270.1C191.6 352 128 411.7 128 485.3C128 500.1 140.7 512 156.4 512h327.2C499.3 512 512 500.1 512 485.3C512 411.7 448.4 352 369.9 352zM512 160c44.18 0 80-35.82 80-80S556.2 0 512 0c-44.18 0-80 35.82-80 80S467.8 160 512 160zM183.9 216c0-5.449 .9824-10.63 1.609-15.91C174.6 194.1 162.6 192 149.9 192H88.08C39.44 192 0 233.8 0 285.3C0 295.6 7.887 304 17.62 304h199.5C196.7 280.2 183.9 249.7 183.9 216zM128 160c44.18 0 80-35.82 80-80S172.2 0 128 0C83.82 0 48 35.82 48 80S83.82 160 128 160zM551.9 192h-61.84c-12.8 0-24.88 3.037-35.86 8.24C454.8 205.5 455.8 210.6 455.8 216c0 33.71-12.78 64.21-33.16 88h199.7C632.1 304 640 295.6 640 285.3C640 233.8 600.6 192 551.9 192z" />
                                </svg>
                                User Manager
                            </span>
                        </a>
                    <?php endif; ?>
                    <a class="bg-danger text-white border-0 list-group-item py-3 offcanvas-link" href="<?= base_url('logout'); ?>">
                        <span class="align-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="me-2" width="20" height="20" fill="#ffffff">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64c17.67 0 32-14.33 32-32S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256c0 53.02 42.98 96 96 96h64c17.67 0 32-14.33 32-32S177.7 416 160 416zM502.6 233.4l-128-128c-12.51-12.51-32.76-12.49-45.25 0c-12.5 12.5-12.5 32.75 0 45.25L402.8 224H192C174.3 224 160 238.3 160 256s14.31 32 32 32h210.8l-73.38 73.38c-12.5 12.5-12.5 32.75 0 45.25s32.75 12.5 45.25 0l128-128C515.1 266.1 515.1 245.9 502.6 233.4z" />
                            </svg>
                            Log Out
                        </span>
                    </a>
                </div>
            </section>
        </div>

    </div>
</div>

<script>
    const full_url = `${window.location.protocol}//${window.location.host}${window.location.pathname}`;
    document.querySelectorAll('.offcanvas-link').forEach(el => {
        const text = el.getAttribute('href').toLowerCase();
        if (text !== full_url) el.classList.remove('active');
        else el.classList.add('active');
    })
</script>