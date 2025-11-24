<?php
//D:\exe\OSPanel_5_4_3\domains\yangiliklar.uz\admin\views\newsItem\news_form.php
/**
 * @var $allAuthors - newsAdminController dagi barcha mualliflar;
 * @var $categories - hamma kategoriyalar
 * @var $oxirgiID - oxirgi yangilik id si
 */

require_once __DIR__ . '/../widgets/header.php';
require_once __DIR__ . '/../widgets/sidebar.php';
require_once __DIR__ . '/../../../models/authors.php';

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
                        <h3 class="mb-0">Yangiliklar</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="/admin">Asosiy</a></li>
                            <li class="breadcrumb-item"><a href="?acontroller=news_index">Yangiliklar</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page"><?= !empty($newsOneItem['news_id']) ? "Tahrirlash" : "Qo'shish" ?></li>
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
                        <?php if (!empty($newsOneItem['news_id'])) : ?>
                            <h3 class="card-title">Yangilikni tahrirlash</h3>
                        <?php else : ?>
                        <h3 class="card-title">Yangilik qo'shish</h3>
                    </div>
                    <?php endif; ?>

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
                                <?php // get so'rovga qarab news ni yangilash ?>
                              action="?acontroller=<?= !empty($newsOneItem['news_id']) ? 'news_update&id=' . $newsOneItem['news_id'] : 'news_create'; ?>"
                                <?php //  formadan kelgan fayllarni qabul qilish uchun  ?>
                              enctype="multipart/form-data"
                        >

                            <div class="card-body">

                                <!-- yangilik ID ni ko'rish, kiritish emas -->
                                <div class="mb-3">
                                    <label class="form-label">Yangilik ID: </label>
                                    <div class="mb-3 form-control bg-danger-subtle">
                                        <?= $oxirgiID; ?>
                                    </div>
                                </div>

                                <!-- yangilik sarlavhasi -->
                                <div class="mb-3">
                                    <label for="sarlavha" class="form-label">Sarlavha</label>
                                    <input
                                            type="text"
                                            name="sarlavha"
                                            class="form-control"
                                            autofocus
                                            required
                                            id="sarlavha"
                                            value="<?= !empty($newsOneItem['sarlavha']) ? $newsOneItem['sarlavha'] : '' ?>"
                                    />
                                </div>

                                <!-- yangilik qisqa_tavsif -->
                                <div class="mb-3">
                                    <label for="qisqa_tavsif" class="form-label">Qisqa tavsif</label>
                                    <textarea class="form-control"
                                              name="qisqa_tavsif"
                                              autofocus
                                              placeholder="Yangilik haqida qisqacha yozuv yozing"
                                              id="qisqa_tavsif"
                                              cols="10"
                                              rows="5">
                                            <?= !empty($newsOneItem['qisqa_tavsif']) ? $newsOneItem['qisqa_tavsif'] : ''; ?>
                                    </textarea>
                                </div>

                                <!-- yangilik kategoriyasi -->
                                <div class="mb-3">
                                    <label for="kategoriya" class="form-label">Kategoriyani tanlang
                                        <select
                                                name="kategoriya"
                                                id="kategoriya"
                                                required
                                                class="form-select">
                                            <?php foreach ($categories as $categoryOneItem) :
                                                $catId = (string)$categoryOneItem['id'];

                                                // 1) tahrirlash rejimida mavjud yangilikdan olinadigan qiymat
                                                $selectedFromItem = !empty($newsOneItem) && isset($newsOneItem['category_id']) && (string)$newsOneItem['category_id'] === $catId;

                                                // 2) formani submit qilib qaytarishda POST qiymatidan olinadigan tanlov
                                                $selectedFromPost = isset($_POST['kategoriya']) && (string)$_POST['kategoriya'] === $catId;

                                                // oxirida tanlanganmi?
                                                $isSelected = $selectedFromItem || $selectedFromPost;
                                                ?>
                                                <option value="<?= htmlspecialchars($catId) ?>" <?= $isSelected ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($categoryOneItem['name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </div>


                                <!-- yangilik muallif -->
                                <div class="mb-3">
                                    <label for="muallif"
                                           class="form-label">
                                        Muallifni tanlang
                                        <select
                                                name="muallif"
                                                id="muallif"
                                                required
                                                class="form-select">

                                            <?php foreach ($allAuthors as $authorItem) : ?>
                                                <option
                                                        value="<?= $authorItem['id']; ?>"
                                                        <?php if (!empty($newsOneItem) && $newsOneItem['author_id'] == $authorItem['id']) : ?>
                                                            selected
                                                        <?php endif; ?>
                                                >
                                                    <?= $authorItem['name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </div>

                                <!-- yangilik matni -->
                                <div class="mb-3">
                                    <label for="yangilik_matni" class="form-label">Yangilik matni</label>
                                    <textarea class="form-control"
                                              name="yangilik_matni"
                                              id="yangilik_matni"
                                              cols="30"
                                              rows="10">
                                        <?php if (!empty($newsOneItem['yangilik_matni']))
                                            echo $newsOneItem['yangilik_matni'];
                                        else echo '' ?>
                                    </textarea>
                                </div>

                                <!-- yangilik rasmi -->
                                <div class="mb-3">
                                    <label for="rasm" class="form-label">Rasm</label>
                                    <input type="file"
                                           class="form-control"
                                           name="rasm"
                                           id="rasm"
                                           accept="image/jpeg, image/png">
                                </div>

                                <!-- yangilik statusi -->
                                <div class="mb-3">
                                    <label for="switch" class="form-label"> Status </label><br>
                                    <label for="switch" class="switch form-label">
                                        <input id="switch"
                                               type="checkbox"
                                               name="status"
                                               value="<?= ACTIVE ?>"
                                                <?= isset($newsOneItem) && $newsOneItem['status'] === ACTIVE ? 'checked' : 'unchecked'; ?>>
                                        <span class="slider"></span>
                                    </label>
                                </div>

                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit"
                                        class="btn btn-primary">
                                    <?= !empty($newsOneItem['news_id']) ? "Yangilash" : "Saqlash"; ?>
                                </button>
                            </div>
                            <!--end::Footer -->
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