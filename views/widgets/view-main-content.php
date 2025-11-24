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

                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <?php $image = getImage('news', $newsItem['news_id'], $newsItem['rasm']); ?>
                                    <!-- 730 x 322 px rasm -->
                                    <a>
                                        <img src="<?= $image; ?>"

                                             class="img-fluid"
                                             alt="<?= $newsItem['sarlavha']; ?> ">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <span> <?= $newsItem['kategoriya']; ?> </span>
                                    <a><h4> <?= $newsItem['sarlavha'] ?> </h4></a>
                                    <ul class="post-info">
                                        <li><a href="#"> <?= $newsItem['muallif'] ?> </a></li>
                                        <li>
                                            <a> <?= date('d.m.Y  |  H:i', strtotime($newsItem['yaratilgan_vaqti'])); ?> </a>
                                        </li>
                                        <li><a> <i class="fas fa-eye"></i>
                                                Ko'rildi: <?= $newsItem['kurishlar_soni']; ?> </a></li>
                                    </ul>
                                    <p> <?= $newsItem['qisqa_tavsif'] ?> </p>
                                    <p> <?= $newsItem['yangilik_matni'] ?> </p>

                                    <!-- start:: yangilik ostidagi teglar va ulashish -->
                                    <!--
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-tags"></i></li>
                                                    <li><a href="#">Best Templates</a>,</li>
                                                    <li><a href="#">TemplateMo</a></li>
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
                                    -->
                                    <!-- end:: yangilik ostidagi teglar va ulashish -->

                                </div>
                            </div>

                        </div>
                        <!-- yozilgan izohlar qismi
                        <div class="col-lg-12">
                            <div class="sidebar-item comments">
                                <div class="sidebar-heading">
                                    <h2>4 comments</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>
                                            <div class="author-thumb">
                                                <img src="assets/images/comment-author-01.jpg" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Charles Kate<span>May 16, 2020</span></h4>
                                                <p>Fusce ornare mollis eros. Duis et diam vitae justo fringilla
                                                    condimentum eu quis leo. Vestibulum id turpis porttitor sapien
                                                    facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend
                                                    posuere id tellus.</p>
                                            </div>
                                        </li>
                                        <li class="replied">
                                            <div class="author-thumb">
                                                <img src="assets/images/comment-author-02.jpg" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Thirteen Man<span>May 20, 2020</span></h4>
                                                <p>In porta urna sed venenatis sollicitudin. Praesent urna sem, pulvinar
                                                    vel mattis eget.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="author-thumb">
                                                <img src="assets/images/comment-author-03.jpg" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Belisimo Mama<span>May 16, 2020</span></h4>
                                                <p>Nullam nec pharetra nibh. Cras tortor nulla, faucibus id tincidunt
                                                    in, ultrices eget ligula. Sed vitae suscipit ligula. Vestibulum id
                                                    turpis volutpat, lobortis turpis ac, molestie nibh.</p>
                                            </div>
                                        </li>
                                        <li class="replied">
                                            <div class="author-thumb">
                                                <img src="assets/images/comment-author-02.jpg" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Thirteen Man<span>May 22, 2020</span></h4>
                                                <p>Mauris sit amet justo vulputate, cursus massa congue, vestibulum
                                                    odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra
                                                    leo.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        -->

                        <div class="col-lg-12">
                            <div class="sidebar-item submit-comment">
                                <div class="sidebar-heading">
                                    <h2>Izoh qoldirish</h2>
                                </div>
                                <div class="content">
                                    <form id="comment" action="#" method="post">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="name" type="text" id="name"
                                                           placeholder="Ism"
                                                           required>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="email" type="text" id="email"
                                                           placeholder="Elektron pochta">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <fieldset>
                                                    <input name="subject" type="text" id="subject"
                                                           placeholder="Mavzu">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <textarea name="message" rows="6" id="message"
                                                              placeholder="Izoh" required></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <button type="submit" id="form-submit" class="main-button">Yuborish
                                                    </button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <?php require_once __DIR__ . '/sidebar.php'; ?>
            </div>
        </div>
    </div>

</section>

<div class="col-lg-4">