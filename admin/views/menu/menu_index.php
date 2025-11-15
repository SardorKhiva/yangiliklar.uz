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
                    <div class="col-sm-12 d-flex justify-content-end">
                        <a href="?acontroller=menu_create" class="btn btn-success">+ qo'shish</a>
                    </div>
                    <?php if (!empty($_SESSION['success'])): ?>
                        <div class="col-sm-12 mt-2 success_alert">
                            <div class="alert alert-success"> <?= $_SESSION['success']; ?> </div>
                        </div>
                    <?php endif; ?>
                    <?php unset($_SESSION['success']); ?>
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
                        <h3 class="card-title">Menyular</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered" role="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Nomi</th>
                                <th>Pozitsiyasi</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                            if (!empty($menus)): ?>
                                <?php foreach ($menus as $menu): ?>
                                    <tr class="align-middle">
                                        <td><?= $i++ ?></td>
                                        <td><?= $menu['id'] ?></td>
                                        <td><?= $menu['name'] ?></td>
                                        <td><?= $menu['position'] ?></td>
                                        <td><?= $menu['url'] ?></td>
                                        <td><?= $menu['status'] ?></td>
                                        <td>
                                            <a href="?acontroller=menu_update&id=<?= $menu['id'] ?>"
                                               class="btn btn-success">
                                                <i class="fas fa-pencil"></i>
                                            </a>
                                            <a href="?acontroller=menu_delete&id=<?= $menu['id'] ?>"
                                               class="btn btn-danger delete_btn"
                                               data-id="<?= $menu['id'] ?>">

                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-end">
                            <li class="page-item">
                                <a class="page-link" href="#">&laquo;</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">&raquo;</a>
                            </li>
                        </ul>
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
