<?php

require_once __DIR__ . '/../widgets/header.php';
require_once __DIR__ . '/../widgets/sidebar.php';
//require_once __DIR__ . '/../widgets/content.php':
?>

    <!--begin::App Main-->
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Menyular</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="/admin">Asosiy</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menyular</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!-- boshlanish::Jadval            -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Bordered Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="?acontroller=menu_create">
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="menuName" class="form-label">Nomi</label>
                                    <input
                                            type="text"
                                            name="name"
                                            class="form-control"
                                            required
                                            id="menuName"/>
                                </div>
                                <div class="mb-3">
                                    <label for="menuPosition" class="form-label">Pozitsiyasi</label>
                                    <input
                                            type="number"
                                            name="position"
                                            class="form-control"
                                            required
                                            id="menuPosition"/>
                                </div>
                                <div class="mb-3">
                                    <label for="menuUrl" class="form-label">URL</label>
                                    <input
                                            type="text"
                                            name="url"
                                            class="form-control"
                                            required
                                            id="menuUrl"/>
                                </div>
                                <div class="mb-3">
                                    <label for="switch" class="form-label"> Status </label><br>
                                    <label for="switch" class="switch form-label">
                                        <input id="switch"
                                               type="checkbox"
                                               name="status"
                                               value="<?= ACTIVE ?>">
                                        <span class="slider"></span>
                                    </label>

                                </div>

                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!--end::Footer-->
                        </form>
                    </div>

                </div>
                <!-- tugash::Jadval            -->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
    <!--end::App Main-->
    ?>
<?php
require_once __DIR__ . '/../widgets/footer.php';
