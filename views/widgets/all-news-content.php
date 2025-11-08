<section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <span><?= SITE_NAME ?? 'Bu yerda sayt nomi' ?></span>
                            <h4> <?= SLOGAN ?> </h4>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-button">
                                <a href="https://t.me/settings" target="_parent">Menga Telegramdan yozing!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">

                        <?php if (!empty($ommabopYangiliklar)): ?>
                            <?php foreach ($ommabopYangiliklar as $ommabopYangilik): ?>

                                <div class="col-lg-6">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <?php $image = getImage('news', $ommabopYangilik['news_id'], $ommabopYangilik['rasm']); ?>
                                            <a href="?controller=news_view&id=<?= $ommabopYangilik['news_id'] ?>">
                                                <img src="<?= $image; ?>" alt="<?= $ommabopYangilik['sarlavha'] ?>">
                                            </a>
                                        </div>
                                        <div class="down-content">
                                            <span> <?= $ommabopYangilik['kategoriya']; ?> </span>
                                            <a href="?controller=news_view&id=<?= $ommabopYangilik['news_id'] ?>">
                                                <h4><?= $ommabopYangilik['sarlavha']; ?> </h4>
                                            </a>
                                            <ul class="post-info">
                                                <li><a href="#"> <?= $ommabopYangilik['muallif']; ?> </a></li>
                                                <li>
                                                    <a> <?= date('d.m.Y  |  H:i', strtotime($ommabopYangilik['yaratilgan_vaqti'])); ?> </a>
                                                </li>
                                                <li><a> <i class="fas fa-eye"></i>
                                                        Ko'rildi: <?= $ommabopYangilik['kurishlar_soni']; ?> </a></li>
                                            </ul>
                                            <a href="?controller=news_view&id=<?= htmlspecialchars($ommabopYangilik['news_id']); ?>">
                                                <p> <?= $ommabopYangilik['qisqa_tavsif'] ?> </p>
                                            </a>
                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-tags"></i></li>
                                                            <li><a href="#">Best Templates</a>,</li>
                                                            <li><a href="#">TemplateMo</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>


                        <div class="col-lg-12">
                            <ul class="page-numbers">
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        <?php require_once __DIR__ . '/sidebar.php'; ?>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>