<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>
                            <!-- Kategoriya havolasi -->
                            <a href="?controller=category&cat=<?= urlencode($newsItem['kategoriya']); ?>"
                               class="category-link">
                                <?= htmlspecialchars($newsItem['kategoriya']); ?>
                            </a>
                        </h4>
                        <h2> <?= $newsItem['sarlavha']; ?> </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Banner Ends Here -->