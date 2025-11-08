<?php
require_once __DIR__ . '/widgets/header.php';
?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Biz bilan bog'lanish</h4>
                            <h2>Biz bilan bog'laning!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Banner Ends Here -->


    <section class="contact-us">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="down-contact">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="sidebar-item contact-form">
                                    <div class="sidebar-heading">
                                        <h2>Bizga xabar yuboring</h2>
                                    </div>
                                    <div class="content">
                                        <form id="contact" action="" method="post">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <input name="name" type="text" id="name" placeholder="Isminggiz"
                                                               required="">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <input name="email" type="text" id="email"
                                                               placeholder="Email"
                                                               required="">
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
                                                              placeholder="Xabaringgiz" required=""></textarea>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit" class="main-button">
                                                            Yuborish
                                                        </button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="sidebar-item contact-information">
                                    <div class="sidebar-heading">
                                        <h2>Bog'lanish uchun ma'lumotlar</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>
                                                <h5> <?= TELEFON_RAQAM ?></h5>
                                                <span>TELEFON RAQAM</span>
                                            </li>
                                            <li>
                                                <h5> <?= EMAIL_MANZIL ?> </h5>
                                                <span>EMAIL MANZIL</span>
                                            </li>
                                            <li>
                                                <h5> <?= ADDRESS ?></h5>
                                                <span>MANZILI</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d748.447511381554!2d60.35718978097634!3d41.37864605278587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41dfa410e650c89d%3A0x7b95d3fdbffb218!2sIchan%20Kala%20west%20gate!5e0!3m2!1sru!2s!4v1762593890570!5m2!1sru!2s"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php
require_once __DIR__ . '/widgets/footer.php';