<div class="col-lg-3 tip-item ti-video col-sm-6 col-md-6 grid-item">
    <div class="inner">
        <a href="#" class="vid-play-btn" data-toggle="modal" data-target="#test-video"></a> <!-- /.vid-play-btn -->       
        <div class="tip-overlay"></div>
        <img src="<?= get_template_directory_uri();?>/assets/img/tips/video-ex.jpg" alt="The title">
        <!-- /.tip-overlay -->
        <div class="tip-headline">
            <h3>This is the title</h3>
        </div>
        <!-- /.tip-headline -->
        <div class="tip-social">
            <ul>
                <li>
                    <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href=""><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
        <!-- /.tip-social -->
    </div>
    <!-- /.inner -->
</div>
<!-- /.col-lg-4 tip-item col-sm-6 col-md-6 -->

<div class="modal fade tips-modal" tabindex="-1" role="dialog" id="test-video">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><img src="<?=get_template_directory_uri();?>/assets/img/close.png" alt="Close button"></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12">
            <div class="modal-video-wrap">
                <img src="<?=get_template_directory_uri();?>/assets/img/video-modal-ph.jpg" alt="The title">
            </div>
            <!-- /.modal-video-wrap -->
            <div class="modal-content-wrap">
                <h2>Test title</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo placeat id iure repellendus quas eligendi veniam reiciendis fugit, commodi rem dolores delectus consequatur eaque dignissimos quo earum inventore ipsum neque!</p>
            </div>
            <!-- /.modal-content-wrap -->
            </div>
            <!-- /.col-12 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </div>
    </div>
  </div>
</div>