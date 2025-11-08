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

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <?php if (!empty($news)): ?>
                            <?php foreach ($news as $news_item): ?>
                                <?php if (!empty($news_item['sarlavha']) ): ?>
                                        <!--  rasm joylashgan yo'lni dinamik olish  -->
                                        <?php $image = getImage('news', $news_item['news_id'], $news_item['rasm']); ?>
                                        <div class="col-lg-12">
                                            <div class="blog-post">
                                                <div class="blog-thumb">
                                                    <a href="?controller=news_view&id=<?= htmlspecialchars($news_item['news_id']); ?>">
                                                        <img src="<?= $image; ?>"
                                                             style="height: 269px; width: 610px; object-fit: cover"
                                                             alt="<?= $news_item['sarlavha']; ?> ">
                                                    </a>
                                                </div>
                                                <div class="down-content">
                                                    <span> <?= $news_item['kategoriya'] ?></span>
                                                    <a href="?controller=news_view&id=<?= $news_item['news_id'] ?>">
                                                        <h4> <?= $news_item['sarlavha']; ?> </h4></a>
                                                    <ul class="post-info">
                                                        <li><a href="#"> <?= $news_item['muallif'] ?> </a></li>
                                                        <li>
                                                            <a> <?= date('d.m.Y  |  H:i', strtotime($news_item['yaratilgan_vaqti'])); ?> </a>
                                                        </li>
                                                        <li><a> <i class="fas fa-eye"></i>
                                                                Ko'rildi: <?= $news_item['kurishlar_soni']; ?> </a></li>
                                                    </ul>
                                                    <a href="?news.php&controller=news_view&id=<?= htmlspecialchars($news_item['news_id']); ?>">
                                                        <p> <?= $news_item['qisqa_tavsif'] ?> </p>
                                                    </a>

                                                    <?php
                                                    /*

                                                     <div class="post-options">
                                                       <div class="row">
                                                         <div class="col-6">
                                                           <ul class="post-tags">
                                                             <li><i class="fa fa-tags"></i></li>
                                                             <li><a href="#">Beauty</a>,</li>
                                                             <li><a href="#">Nature</a></li>
                                                           </ul>
                                                         </div>
                                                         <div class="col-6">
                                                           <ul class="post-share">
                                                             <li><i class="fa fa-share-alt"></i></li>
                                                             <li><a href="#">Facebook</a>,</li>
                                                             <li><a href="#"> Twitter</a></li>
                                                           </ul>
                                                         </div>
                                                       </div>
                                                     </div>
                                                    */ ?>

                                                </div>
                                            </div>
                                        </div>

                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <div class="col-lg-12">
                            <div class="main-button">
                                <!-- barcha yangiliklar linkini ham dinamik qilib bazadan olamiz   -->
                                <a href="<?= $menus[2]['url'] ?? " "; ?>">Barcha yangiliklarni ko'rish</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">