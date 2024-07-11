<nav class="navbar navbar-expand-xl navbar-light bg-light sticky-top">
  <div class="container">
    <div class="row">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navigation" aria-controls="main-navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?php bloginfo('url');?>">
          <img src="<?=get_template_directory_uri();?>/assets/img/logo.svg" style="height: 57px;" alt="Swift">
        </a>
    
      <!-- /.show-for-sm-only -->
      <div class="collapse navbar-collapse" id="main-navigation">
        <ul class="navbar-nav">
          <li class="nav-item <?php if(is_page('meat-masterclass')) { echo 'active';} ?>">
            <a class="nav-link" href="/meat-masterclass">Meat Masterclass</a>
          </li>
          <li class="nav-item <?php if(is_page('tips-recipes')) { echo 'active';} ?>">
            <a class="nav-link" href="/tips-recipes">Tips &amp; Recipes</a>
          </li>
          <li class="nav-item <?php if(is_page('products') || is_singular('products')) { echo 'active';} ?>">
            <a class="nav-link" href="/products">Products</a>
          </li>
          <li class="nav-item <?php if(is_page('locations')) { echo 'active';} ?>">
            <a class="nav-link" href="/store-locator">Where To Buy</a>
          </li>
          <li class="nav-item <?php if(is_page('offers')) { echo 'active';} ?>">
            <a class="nav-link" href="/offers">Offers</a>
          </li>
          <!--
          <li class="nav-item <?php if(is_page('news') || is_singular('activation')) { echo 'active';} ?>">
            <a class="nav-link" href="/news">Swift News</a>
          </li>
           -->
          <li class="nav-item dropdown d-none d-xl-inline-flex">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              About
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item <?php if(is_page('sustainability')) { echo 'active';} ?>" href="/sustainability">Sustainability</a></li>
              <li><a class="dropdown-item <?php if(is_page('heritage')) { echo 'active';} ?>" href="/heritage">Heritage</a></li>
            </ul>
          </li>
          <li class="nav-item d-xl-none <?php if(is_page('sustainability')) { echo 'active';} ?>">
            <a class="nav-link" href="/sustainability">Sustainability</a>
          </li>
          <li class="nav-item d-xl-none <?php if(is_page('heritage')) { echo 'active';} ?>">
            <a class="nav-link" href="/heritage">Heritage</a>
          </li>
        </ul>
      </div>
      <!-- //.collapse -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</nav>
<div class="clearfix"></div>