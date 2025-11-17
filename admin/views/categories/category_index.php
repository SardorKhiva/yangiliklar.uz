<?php
//D:\exe\OSPanel_5_4_3\domains\yangiliklar.uz\admin\views\categories\category_index.php

require_once __DIR__ . '/../widgets/header.php';
require_once __DIR__ . '/../widgets/sidebar.php';

?>


<?php if (!empty($categoriesAll)): ?>


    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Yangiliklar kategoriyalari</h3>
        </div>
        <!-- /.card-header -->
            <div class="col-sm-12 d-flex justify-content-end pr-5">
                <a href="?acontroller=category_create" class="btn btn-success">+ qo'shish</a>
            </div>


        <?php if (!empty($_SESSION['success'])) : ?>
            <div class="col-sm-12 mt-2 success_alert">
                <div class="alert alert-success">
                    <?= $_SESSION['success']; ?>
                </div>
            </div>
        <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <div class="card-body p-0">
            <table class="table table-striped" role="table">


                <thead>
                <tr>
                    <th style="width: 2cm" scope="col">#</th>
                    <th style="width: 2cm" scope="col">ID</th>
                    <th style="width: 15cm" scope="col">Nomi</th>
                    <th style="width: 1cm" scope="col">Status</th>
                    <th scope="col">Tahrirlash</th>
                </tr>
                </thead>

                <tbody>

                <?php $i = 1;
                foreach ($categoriesAll as $category): ?>
                    <tr class="align-middle">
                        <td><?= $i++ ?> </td>
                        <td><?= $category['id']; ?> </td>
                        <td> <?= $category['name']; ?> </td>
                        <td>
                            <?php if ($category['status']): ?>
                                <label for="switch" class="switch form-label">
                                    <input id="switch"
                                           type="checkbox"
                                           name="status"
                                           disabled
                                           value="<?= ACTIVE ?>"
                                            <?= isset($category) && $category['status'] === ACTIVE ? 'checked' : ''; ?>>
                                    <span class="slider"></span>
                                </label>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="?acontroller=category_update&id=<?= $category['id'] ?>"
                               class="btn btn-success">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <a href="?acontroller=category_delete&id=<?= $category['id'] ?>"
                               class="btn btn-danger delete_category_btn"
                               data-id="<?= $category['id'] ?>">

                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

<?php endif; ?>

<?php require_once __DIR__ . "/../widgets/footer.php"; ?>