<section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <span>Stand Blog HTML5 Template</span>
                            <h4>Creative HTML Template For Bloggers!</h4>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-button">
                                <a rel="nofollow" href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download
                                    Now!</a>
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

                                <!--  rasm joylashgan yo'lni dinamik olish  -->
                                <?php $image = getImage('news', $news_item['news_id'], $news_item['rasm']); ?>
                                <div class="col-lg-12">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <img src="<?= $image; ?>"
                                                 style="height: 269px; width: 610px; object-fit: cover" alt="<?= $news_item['sarlavha']; ?> ">
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
                                            <p> <?= $news_item['qisqa_tavsif'] ?> </p>

                                            <!--
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
                                            -->

                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>

                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <a href="blog.html">Barcha yangiliklarni ko'rish</a>
                                    </div>
                                </div>

                    </div>


                </div>
            </div>
            <div class="col-lg-4">

                <!--   sidebar:             -->

                <!--
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-item search">
                                <form id="search_form" name="gs" method="GET" action="#">
                                    <input type="text" name="q" class="searchText" placeholder="type to search..."
                                           autocomplete="on">
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Oxirgi yangiliklar</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li><a href="post-details.html">
                                                <h5>Vestibulum id turpis porttitor sapien facilisis scelerisque</h5>
                                                <span>May 31, 2020</span>
                                            </a></li>
                                        <li><a href="post-details.html">
                                                <h5>Suspendisse et metus nec libero ultrices varius eget in risus</h5>
                                                <span>May 28, 2020</span>
                                            </a></li>
                                        <li><a href="post-details.html">
                                                <h5>Swag hella echo park leggings, shaman cornhole ethical coloring</h5>
                                                <span>May 14, 2020</span>
                                            </a></li>
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
                                        <li><a href="#">- Nature Lifestyle</a></li>
                                        <li><a href="#">- Awesome Layouts</a></li>
                                        <li><a href="#">- Creative Ideas</a></li>
                                        <li><a href="#">- Responsive Templates</a></li>
                                        <li><a href="#">- HTML5 / CSS3 Templates</a></li>
                                        <li><a href="#">- Creative &amp; Unique</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item tags">
                                <div class="sidebar-heading">
                                    <h2>Tag Clouds</h2>
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


          -->