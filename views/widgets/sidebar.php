<?php
/**
 * Foydalanuvchi: User
 * Loyiha nomi: yangiliklar.uz
 * Fayl nomi: sidebar.php
 * Fayl yaratilgan: 04.11.2025 15:45
 * Maqsad: index va news details sahifalaridagi so'nggi 3 ta post va kategoriyalar turadigan qismi
 */
?>

<div class="sidebar">
    <div class="row">
        <div class="col-lg-12">
            <div class="sidebar-item search">
                <form id="search_form" name="gs" method="GET" action="#">
                    <input type="text" name="q" class="searchText" placeholder="qidirish uchun yozing..."
                           autocomplete="on">
                </form>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="sidebar-item recent-posts">
                <div class="sidebar-heading">
                    <h2>So'nggi yangiliklar</h2>
                </div>
                <div class="content">
                    <ul>
                        <?php if (!empty($news)): ?>
                        <?php foreach ($news as $news_item): ?>
<!--                        --><?php //= dd($news_item); ?>
                        <li>
                            <a href="post-details.html">
                                <h5> <?= $news_item['sarlavha']; ?> </h5>
                                <span><?= date('d.m.Y  |  H:i', strtotime($news_item['yaratilgan_vaqti'])); ?></span>
                            </a>

                            <?php endforeach; ?>
                            <?php endif; ?>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="sidebar-item categories">
                <div class="sidebar-heading">
                    <h2>Kategoriyalar</h2>
                </div>
                <div class="content">
                    <ul>
                        <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                        <li><a href="#"> <?= $category['name'] ?> </a></li>

                       <?php endforeach; ?>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="sidebar-item tags">
                <div class="sidebar-heading">
                    <h2>Teglar</h2>
                </div>
                <div class="content">
                    <ul>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">HTML5</a></li>
                        <li><a href="#">Inspiration</a></li>
                        <li><a href="#">Motivation</a></li>
                        <li><a href="#">PSD</a></li>
                        <li><a href="#">Responsive</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>