<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="<?php echo base_url() ?>">
        <i class="bi bi-grid"></i>
        <span>Home</span>
      </a>
    </li><!-- End Home Nav -->

    <li class="nav-item">
      <a class="nav-link <?php echo (uri_string() == 'keranjang') ? "" : "collapsed" ?>" href="<?php echo base_url('keranjang') ?>">
        <i class="bi bi-cart-check"></i>
        <span>Keranjang</span>
      </a>
    </li><!-- End Keranjang Nav -->

    <?php if (session()->get('role') == 'admin') : ?>
      <li class="nav-item">
        <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="<?php echo base_url('produk') ?>">
          <i class="bi bi-receipt"></i>
          <span>Produk</span>
        </a>
      </li><!-- End Produk Nav -->

      <li class="nav-item">
        <a class="nav-link <?php echo (uri_string() == 'diskon') ? "" : "collapsed" ?>" href="<?php echo base_url('diskon') ?>">
          <i class="bi bi-tags"></i>
          <span>Diskon</span>
        </a>
      </li><!-- End Diskon Nav -->

      <li class="nav-item">
        <a class="nav-link <?php echo (uri_string() == 'pembelian') ? "" : "collapsed" ?>" href="<?php echo base_url('pembelian') ?>">
          <i class="bi bi-cart-dash"></i>
          <span>Pembelian</span>
        </a>
      </li><!-- End Pembelian Nav -->
    <?php endif; ?>

    <li class="nav-item">
      <a class="nav-link <?php echo (uri_string() == 'history') ? "" : "collapsed" ?>" href="<?php echo base_url('history') ?>">
        <i class="bi bi-clock-history"></i>
        <span>History</span>
      </a>
    </li><!-- End History Nav -->

    <!-- Menu Profile untuk UTS -->
    <li class="nav-item">
      <a class="nav-link <?php echo (uri_string() == 'profile') ? "" : "collapsed" ?>" href="<?php echo base_url('profile') ?>">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Nav -->

  </ul>

</aside><!-- End Sidebar-->