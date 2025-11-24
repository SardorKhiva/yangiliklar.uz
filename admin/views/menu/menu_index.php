<?php
//D:\exe\OSPanel_5_4_3\domains\yangiliklar.uz\admin\views\menu\menu_index.php

require_once __DIR__ . '/../widgets/header.php';
require_once __DIR__ . '/../widgets/sidebar.php';
?>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Menyular</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">

                <?php if (!empty($menusAll)): ?>

                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/admin">Asosiy</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Menyular</li>
                    </ol>

                    <div class="col-sm-12 d-flex justify-content-end pr-5 mb-3">
                        <a href="?acontroller=menu_create" class="btn btn-success">+ qo'shish</a>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Menyu nomlari</h3>
                        </div>

                        <!-- Success alert -->
                        <?php if (!empty($_SESSION['success'])) : ?>
                            <div class="col-sm-12 mt-2 success_alert">
                                <div class="alert alert-success">
                                    <?= $_SESSION['success']; ?>
                                </div>
                            </div>
                            <?php unset($_SESSION['success']); ?>
                        <?php endif; ?>

                        <!-- Error alert -->
                        <?php if (!empty($_SESSION['error'])) : ?>
                            <div class="col-sm-12 mt-2 failed_alert">
                                <div class="alert alert-danger">
                                    <?= $_SESSION['error']; ?>
                                </div>
                            </div>
                            <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>

                        <!-- table-responsive qo'shish va p-0 saqlab qolish -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0" role="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nomi</th>
                                        <th scope="col">Pozitsiya</th>
                                        <th scope="col">URL</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tahrirlash</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $i = 1;
                                    foreach ($menusAll as $menuItem): ?>
                                        <tr class="align-middle">
                                            <td><?= $i++ ?></td>
                                            <td><?= $menuItem['id']; ?></td>
                                            <td><?= htmlspecialchars($menuItem['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?= $menuItem['position']; ?></td>
                                            <td>
                                                <!--  keyinchalik commentdan olinadi -->
                                                <!-- <a href="<?= htmlspecialchars($menuItem['url'], ENT_QUOTES, 'UTF-8'); ?>"
                                                   target="_blank"
                                                   class="text-primary"> -->
                                                <?= htmlspecialchars($menuItem['url'], ENT_QUOTES, 'UTF-8'); ?>
                                                <!--                                                </a>-->
                                            </td>
                                            <td>
                                                <?php if ($menuItem['status']): ?>
                                                    <label for="switch-<?= $menuItem['id'] ?>"
                                                           class="switch form-label mb-0">
                                                        <input id="switch-<?= $menuItem['id'] ?>"
                                                               type="checkbox"
                                                               name="status"
                                                               disabled
                                                               value="<?= ACTIVE ?>"
                                                                <?= $menuItem['status'] === ACTIVE ? 'checked' : ''; ?>>
                                                        <span class="slider"></span>
                                                    </label>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">O'chirilgan</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="?acontroller=menu_update&id=<?= $menuItem['id'] ?>"
                                                   class="btn btn-success btn-sm">
                                                    <i class="fas fa-pencil"></i>
                                                </a>
                                                <a href="?acontroller=menu_delete&id=<?= $menuItem['id'] ?>"
                                                   class="btn btn-danger btn-sm delete_btn"
                                                   data-type="menu"
                                                   data-id="<?= $menuItem['id'] ?>"
                                                   data-name="<?= $menuItem['name'] ?>"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                <?php else: ?>
                    <div class="alert alert-info">
                        Hozircha menyular yo'q. <a href="?acontroller=menu_create">Birinchi menyuni qo'shing</a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </main>

<?php require_once __DIR__ . "/../widgets/footer.php"; ?>