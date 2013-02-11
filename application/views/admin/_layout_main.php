<?php $this->load->view('admin/components/page_head') ?>
  <body style=>
    <div class="navbar navbar-static-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>

          <a class="brand" href="<?php echo site_url('admin/dashboard') ?>"><?php echo $meta_title ?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a></li>
              <li><?php echo anchor('admin/page','Pages') ?></li>
              <li><?php echo anchor('admin/page/order','Order pages') ?></li>
              <li><?php echo anchor('admin/article','New articles') ?></li>
              <li><?php echo anchor('admin/user','Users') ?></li>
            </ul>
          </div>
        </div>
      </div>
  </div>
  <div class="container">
    <div class="row">
    <!-- Main column -->
    <div class="span9">
      <?php $this->load->view($subview); ?>
    </div>
    <!-- Sidebar -->
    <div class="span3">
      <section>
        <?php echo mailto('uffe@ecart.dk', '<i class="icon-user"></i> uffe@ecart.dk' ) ?><br />
        <?php echo anchor('admin/user/logout', '<i class="icon-off"></i> log out'); ?>
      </section>
    </div>
  </div>
</div>
<?php $this->load->view('admin/components/page_footer') ?>