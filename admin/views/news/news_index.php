<?php
//D:\exe\OSPanel_5_4_3\domains\yangiliklar.uz\admin\views\newsItem\news_index.php
//dd($_GET, 0);

require_once __DIR__ . '/../widgets/header.php';
require_once __DIR__ . '/../widgets/sidebar.php';
?>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Yangiliklar</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="/admin">Asosiy</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Yangiliklar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">

                <!-- Success/Error alerts -->
                <?php if (!empty($_SESSION['success'])) : ?>
                    <div class="alert alert-success alert-dismissible fade show success_alert" role="alert">
                        <i class="fas fa-check-circle"></i> <?= $_SESSION['success']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>

                <?php if (!empty($_SESSION['error'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show failed_alert" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> <?= $_SESSION['error']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <?php if (!empty($newsAll)): ?>

                    <!-- Qo'shish tugmasi -->
                    <div class="row mb-3">
                        <div class="col-12 text-end">
                            <a href="?acontroller=news_create" class="btn btn-success">
                                <i class="fas fa-plus"></i> qo'shish
                            </a>
                        </div>
                    </div>

                    <!-- Yangiliklar jadvali -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Yangiliklar ro'yxati</h3>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th style="width: 60px">ID</th>
                                        <th style="width: 240px">Rasm</th>
                                        <th style="width: 200px">Sarlavha</th>
                                        <th style="width: 150px">Qisqa tavsif</th>
                                        <th style="width: 120px">Kategoriya</th>
                                        <th style="width: 120px">Muallif</th>
                                        <th style="width: 100px">Ko'rishlar soni</th>
                                        <th style="width: 120px">Sana</th>
                                        <th style="width: 150px" class="text-center">Amallar</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($newsAll as $newsOneItem):
                                        ?>
                                        <tr class="align-middle">
                                            <td><?= $i++ ?></td>
                                            <td><?= $newsOneItem['news_id'] ?></td>

                                            <!-- Rasm -->
                                            <td>
                                                <?php if (!empty($newsOneItem['rasm'])): ?>
                                                    <img src="/uploads/news/<?= $newsOneItem['news_id'] . "/" . htmlspecialchars($newsOneItem['rasm']) ?>"
                                                         alt="Rasm"
                                                         class="img-thumbnail"
                                                         style="width: 100px; height: 100px; object-fit: cover; cursor: pointer;"
                                                         data-bs-toggle="modal"
                                                         data-bs-target="#imageModal-<?= $newsOneItem['news_id'] ?>">
                                                <?php else: ?>
                                                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center"
                                                         style="width: 60px; height: 60px;">
                                                        <i class="fas fa-image text-white"></i>
                                                    </div>
                                                <?php endif; ?>
                                            </td>

                                            <!-- Sarlavha -->
                                            <td>
                                                <a href="/?controller=news_view&id=<?= $newsOneItem['news_id'] ?>">
                                                    <?= $newsOneItem['sarlavha'] ?>
                                                </a>
                                            </td>

                                            <!-- Qisqa tavsif  -->
                                            <td>
                                                <?php if (!empty($newsOneItem['qisqa_tavsif'])): ?>
                                                    <?php echo htmlspecialchars(mb_substr($newsOneItem['qisqa_tavsif'], 0, 40));
                                                    if (mb_strlen($newsOneItem['qisqa_tavsif']) > 40) echo '...';
                                                    ?>
                                                <?php else: ?>
                                                    <span class="text-muted">-</span>
                                                <?php endif; ?>
                                            </td>

                                            <!-- Kategoriya -->
                                            <td>
                                            <span class="badge bg-info">
                                                <?= htmlspecialchars($newsOneItem['kategoriya']) ?>
                                            </span>
                                            </td>

                                            <!-- Muallif -->
                                            <td>
                                                <i class="fas fa-user-circle text-muted"></i>
                                                <?= htmlspecialchars($newsOneItem['muallif']) ?>
                                            </td>

                                            <!-- Ko'rishlar -->
                                            <td>
                                            <span class="badge bg-success">
                                                <i class="fas fa-eye"></i> <?= number_format($newsOneItem['kurishlar_soni']) ?>
                                            </span>
                                            </td>

                                            <!-- Sana -->
                                            <td>
                                                <small class="text-muted">
                                                    <i class="far fa-calendar"></i>
                                                    <?= date('d.m.Y H:i', strtotime($newsOneItem['yaratilgan_vaqti'])) ?>
                                                </small>
                                            </td>

                                            <!-- Amallar -->
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="?acontroller=news_update&id=<?= $newsOneItem['news_id'] ?>"
                                                       class="btn btn-success btn-sm"
                                                       title="Tahrirlash">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="?acontroller=news_delete&id=<?= $newsOneItem['news_id'] ?>"
                                                       class="btn btn-danger btn-sm delete_btn"
                                                       data-id="<?= $newsOneItem['news_id'] ?>"
                                                       title="O'chirish">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer clearfix">
                            <p class="text-muted mb-0">
                                Jami: <strong><?= count($newsAll) ?></strong> ta yangilik
                            </p>
                        </div>
                    </div>

                <?php else: ?>
                    <div class="alert alert-info d-flex align-items-center">
                        <i class="fas fa-info-circle fa-2x me-3"></i>
                        <div>
                            <h5 class="alert-heading">Hozircha yangiliklar yo'q</h5>
                            <p class="mb-0">
                                Birinchi yangilikni qo'shish uchun
                                <a href="?acontroller=news_create" class="alert-link">bu yerni bosing</a>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </main>

<?php
require_once __DIR__ . '/../widgets/footer.php';