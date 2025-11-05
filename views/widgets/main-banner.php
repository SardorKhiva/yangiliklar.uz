    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">

            <?php if (!empty($banner)): ?>
            <?php foreach ($banner as $item): ?>
            <!--  rasm joylashgan yo'lni dinamik olish  -->
            <?php $image = getImage('news', $item['news_id'], $item['rasm']); ?>
<!--                --><?php //dd($item); ?>
          <div class="item">
            <img src=" <?= $image; ?> " style="height: 426px; width: 493px; " alt="<?= $item['sarlavha']; ?> ">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span> <?= $item['kategoriya']; ?> </span>
                </div>
                <a href="?controller=news_view&id=<?= $item['news_id'] ?>"><h4> <?= $item['sarlavha']; ?> </h4></a>
                <ul class="post-info">
                  <li><a href="#"> <?= $item['muallif']; ?> </a></li>
                  <li><a href="#"> <?= date('d.m.Y  |  H:i', strtotime($item['yaratilgan_vaqti'])); ?>  </a></li>
                  <li><a> <i class="fas fa-eye"></i><?= $item['kurishlar_soni']; ?> </a></li>
                </ul>
              </div>
            </div>
          </div>

            <?php endforeach; ?>
            <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->