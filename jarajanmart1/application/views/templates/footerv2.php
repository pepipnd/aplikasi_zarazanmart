
<?php
$categoriesLimit = $this->Categories_model->getCategoriesLimit();
$setting = $this->Settings_model->getSetting();
$sosmed = $this->Settings_model->getSosmed();
$footerhelp = $this->Settings_model->getFooterHelp();
$footerinfo = $this->Settings_model->getFooterInfo();
$rekening = $this->db->get('rekening');
 ?>
 <?php echo $this->session->flashdata('subscriber'); ?>
    <footer>
        <div class="information">
            <div class="main">
            <div class="about about-hide">
                <h2 class="brand-footer"><?= $this->config->item('app_name'); ?></h2>
                <p>
                <?= $setting['short_desc']; ?>
                </p>
                <div class="sosmed">
                <h3>Temukan kami di</h3>
                <?php foreach($sosmed->result_array() as $s): ?>
                  <a href="<?= $s['link']; ?>" target="_blank" title="<?= $s['name']; ?>">
                      <i class="fab fa-<?= $s['icon']; ?>"></i>
                  </a>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="item item-hide">
                <h3 class="title">KATEGORI</h3>
                <?php foreach($categoriesLimit->result_array() as $c): ?>
                    <a href="<?= base_url(); ?>c/<?= $c['nama_kategori']; ?>"><?= $c['nama_kategori']; ?></a>
                <?php endforeach; ?>
            </div>
            <div class="item">
                <h3 class="title">INFO <?= strtoupper($this->config->item('app_name')); ?></h3>
                <?php foreach($footerinfo->result_array() as $f): ?>
                  <a href="<?= base_url(); ?><?= $f['slug']; ?>"><?= $f['title']; ?></a>
                <?php endforeach; ?>
            </div>
            <div class="item">
                <h3 class="title">BANTUAN</h3>
                <?php foreach($footerhelp->result_array() as $f): ?>
                  <a href="<?= base_url(); ?><?= $f['slug']; ?>"><?= $f['title']; ?></a>
                <?php endforeach; ?>
            </div>
            <div class="item item-hide">
              <h3 class="title">PEMBAYARAN</h3>
              <?php foreach($rekening->result_array() as $r): ?>
                  <p class="mb-0"><?= $r['rekening']; ?></p>
              <?php endforeach; ?>
            </div>
            </div>
        </div>
        <div class="contact">
            <div class="main">
                <div class="item">
                    <i class="fa fa-map-marker-alt"></i>
                    <p><?= nl2br($setting['address']); ?></p>
                </div>
                <div class="item">
                    <i class="fa fa-phone"></i>
                    <p><?= $this->config->item('whatsapp'); ?></p>
                </div>
                <div class="item">
                    <i class="fa fa-envelope"></i>
                    <p><?= $this->config->item('email_contact'); ?></p>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright &copy; <span id="footer-cr-years"></span> <?= $this->config->item('app_name'); ?>. All Right Reserved.</p>
        </div>
        </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.countdown.min.js"></script>
    <script>
        
        slickProccess();

        function slickProccess(){
            var wBrowser = window.innerWidth;
            if(wBrowser >= 950){
                $('.recent-product').slick({
                    infinite: false,
                    slidesToShow: 6,
                    slidesToScroll: 1
                });
            }else if(wBrowser >= 600){
                $('.recent-product').slick({
                    infinite: false,
                    slidesToShow: 4,
                    slidesToScroll: 1
                });
            }else{
                $('.recent-product').slick({
                    infinite: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                });
            }
        }

        $("div.best-product div.main-product button.slick-prev").html("<i class='fa fa-chevron-left'></i>")
        $("div.best-product div.main-product button.slick-next").html("<i class='fa fa-chevron-right'></i>")

        const years = new Date().getFullYear();
        $("#footer-cr-years").text(years);

        $("#countdownPromo").countdown({
            date: "<?= $setting['promo_time']; ?>",
            render: function (data) {
                var el = $(this.el);
                el.empty()
                .append(
                    this.leadingZeros(data.days, 2) + " : "
                )
                .append(
                    this.leadingZeros(data.hours, 2) + " : "
                )
                .append(
                    this.leadingZeros(data.min, 2) + " : "
                )
                .append(
                    this.leadingZeros(data.sec, 2)
                );
            },
        });

        //loading screen
        $(window).ready(function(){
            $(".loading-animation-screen").fadeOut("slow");
        })

        // detail
        $("#detailBtnPlusJml").click(function(){
            var val = parseInt($(this).prev('input').val());
            $(this).prev('input').val(val + 1).change();
            return false;
        })

        $("#detailBtnMinusJml").click(function(){
            var val = parseInt($(this).next('input').val());
            if (val !== 1) {
                $(this).next('input').val(val - 1).change();
            }
            return false;
        })

    </script>
</html>
