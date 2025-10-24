<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="../../about.php"><h2><?= SITE_NAME ?> <em>.</em></h2></a>
            <!--            <a class="navbar-brand" href="/-->
            <?php //= $currentFile ?><!-- >"><h2>-->
            <?php //=$currentPage?><!--<em>.</em></h2></a>-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <?php if (!empty($getMenuItems)): ?>
                        <?php foreach ($getMenuItems as $menuItem): ?>

                            <li class="nav-item <?= ($menuItem['name'] === $currentPage) ? 'active' : '' ?> ">
                                <a class="nav-link" href="<?= $menuItem['url'] ?>"> <?= $menuItem['name'] ?>
                                    <?php
                                    if ($menuItem['url'] == '/index.php') : ?>
                                        <span class="sr-only">(current)</span>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>