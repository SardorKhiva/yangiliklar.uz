<?php
//D:\exe\OSPanel_5_4_3\domains\yangiliklar.uz\admin\views\menu\menu_form.php

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
                        <h3 class="mb-0">Menyular</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="/admin">Asosiy</a></li>
                            <li class="breadcrumb-item"><a href="?acontroller=menu_index">Menyular</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page"><?= !empty($menuItem['id']) ? "Tahrirlash" : "Qo'shish" ?></li>
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
                        <h3 class="card-title">Menyular jadvali</h3>
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
                                <?php // get so'rovga qarab menyu ni yangilash ?>
                              action="?acontroller=<?= !empty($menuItem['id']) ? 'menu_update&id=' . $menuItem['id'] : 'menu_create'; ?>">
                            <!--begin::Body-->
                            <div class="card-body">

                                <!-- menu ID -->
                                <?php if (!empty($menuItem['id'])) : ?>
                                    <label class="form-label">Menyu ID: </label>
                                    <div class="mb-3 form-control bg-danger-subtle"> <?= $menuItem['id']; ?>
                                    </div>
                                <?php endif; ?>

                                <!-- menu name -->
                                <div class="mb-3">
                                    <label for="menuName" class="form-label">Nomi</label>
                                    <input
                                            type="text"
                                            name="name"
                                            class="form-control"
                                            required
                                            id="menuName"
                                            value="<?= !empty($menuItem['name']) ? $menuItem['name'] : ''; ?>"
                                    />
                                    <?php if (isset($_POST['name']))  : ?>
                                        <div class="mb-2 success_alert">
                                            <label class="form-label"><i
                                                        class="text-accessible-danger">"<b><?= $_POST['name'] ?></b>" nomi
                                                    menyu jadvalida takrorlanyapti!</i></label>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- menu position -->
                                <div class="mb-3">
                                    <label for="menuPosition" class="form-label">Pozitsiyasi</label>
                                    <input
                                            type="number"
                                            name="position"
                                            class="form-control"
                                            required
                                            id="menuPosition"
                                            step="1"
                                            min="<?= empty($menuItem) ? getMaxMenuPosition() + 1 : $menuItem['position']; ?>"
                                            <?php // getMaxMenuPosition()+1 degani, yangi menu qo'shilganda mavjud oxirgi pozitsiyaga birni avtomat qo'shadi ?>
                                            value="<?= !empty($menuItem['position']) ? $menuItem['position'] : getMaxMenuPosition() + 1; ?>"
                                    />
                                </div>

                                <!-- Menu URL -->
                                <div class="mb-3">
                                    <label for="menuUrl" class="form-label">URL</label>
                                    <input
                                            type="text"
                                            name="url"
                                            class="form-control"
                                            required
                                            id="menuUrl"
                                            value="<?= !empty($menuItem['url']) ? $menuItem['url'] : ''; ?>"
                                    />
                                    <?php if (isset($_POST['url']) && urlExists($_POST['url']))  : ?>
                                        <div class="mb-2 success_alert">
                                            <label class="form-label"><i
                                                        class="text-accessible-danger">"<b><?= $_POST['url'] ?></b>"
                                                    manzili
                                                    menyu jadvalida takrorlanyapti!</i></label>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Menu status -->
                                <div class="mb-3">

                                    <!-- bu oddiyroq select form:
                                    <label class="form-label"> Status </label>
                                    <select name="status" class="form-select">
                                        <option <?php /*= isset($menuItem) && $menuItem['status'] === ACTIVE ? 'selected' : ''; */ ?>
                                                value="<?php /*= ACTIVE */ ?>">Aktiv</option>
                                        <option <?php /*= isset($menuItem) && $menuItem['status'] === NOT_ACTIVE ? 'selected' : ''; */ ?>
                                                value="<?php /*= NOT_ACTIVE */ ?>">Aktiv emas</option>
                                    </select>
                                    -->

                                    <?php // menga bu ko'rinish yoqdi ?>
                                    <label for="switch" class="form-label"> Status </label><br>
                                    <label for="switch" class="switch form-label">
                                        <input id="switch"
                                               type="checkbox"
                                               name="status"
                                               value="<?= ACTIVE ?>"
                                                <?= isset($menuItem) && $menuItem['status'] === ACTIVE ? 'checked' : 'unchecked'; ?>>
                                        <span class="slider"></span>
                                    </label>

                                </div>

                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit"
                                        class="btn btn-primary"><?= !empty($menuItem['id']) ? "Yangilash" : "Saqlash"; ?></button>
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
