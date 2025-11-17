<?php
// D:\exe\OSPanel_5_4_3\domains\yangiliklar.uz\admin\views\categories\category_form.php

require_once __DIR__ . '/../widgets/header.php';
require_once __DIR__ . '/../widgets/sidebar.php';
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
                        <h3 class="mb-0">Kategoriyalar</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="/admin">Asosiy</a></li>
                            <li class="breadcrumb-item"><a href="?acontroller=category_index">Kategoriyalar</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page"><?= !empty($categoryItem['id']) ? "Tahrirlash" : "Qo'shish" ?></li>
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
                        <h3 class="card-title">Kategoriyalar jadvali</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <?php if (!empty($_SESSION['error'])) : ?>
                            <div class="col-sm-12 mt-2 failed_alert">
                                <div class="alert alert-danger">
                                    <?= $_SESSION['error']; ?>
                                </div>
                            </div>
                                    <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>

                        <form method="post"
                                <?php // get so'rovga qarab category ni yangilash ?>
                              action="?acontroller=<?= !empty($categoryItem['id']) ? 'category_update&id=' . $categoryItem['id'] : 'category_create'; ?>">
                            <!--begin::Body-->
                            <div class="card-body">
                                <?php if (!empty($categoryItem['id'])) : ?>
                                    <label class="form-label">Kategoriya ID: </label>
                                    <div class="mb-3 form-control bg-danger-subtle">
                                        <?= $categoryItem['id']; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="mb-3">
                                    <label for="categoryName" class="form-label">Nomi</label>
                                    <input
                                            type="text" name="name"
                                            class="form-control"
                                            required
                                            id="categoryName"
                                            value="<?= !empty($categoryItem['name']) ? htmlspecialchars($categoryItem['name']) : ''; ?>" />
                                    <?php if (isset($_POST['name']))  : ?>
                                        <div class="mb-2 alert-danger">
                                            <label class="form-label"><i
                                                        class="text-accessible-danger">"<b><?= $_POST['name'] ?></b>" nomi
                                                    kategoriya jadvalida takrorlanyapti!</i></label>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-3">
                                    <?php // menga bu ko'rinish yoqdi ?>
                                    <label for="switch" class="form-label"> Status </label><br>
                                    <label for="switch" class="switch form-label">
                                        <input id="switch"
                                               type="checkbox"
                                               name="status"
                                               value="<?= ACTIVE ?>"
                                                <?= isset($categoryItem) && $categoryItem['status'] === ACTIVE ? 'checked' : ''; ?>>
                                        <span class="slider"></span>
                                    </label>
                                </div>

<!--                            </div>-->
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit"
                                        class="btn btn-primary"><?= !empty($categoryItem['id']) ? "Yangilash" : "Saqlash"; ?></button>
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

<?php
require_once __DIR__ . '/../widgets/footer.php';