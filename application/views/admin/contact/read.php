<?php 
$arsUser=$this->session->userdata('arsUser');
if ($arsUser["chuc_vu"]==3) {
    redirect('/trang-chu.html','refresh');
}
?>
<div class="">
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Mail<small>Hộp thư đến</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-xs-12 mail_view tab-content table-responsive" >
              <div class="inbox-body" id="menu3" class="tab-pane fade">
                <div class="mail_heading row">
                  <div class="col-md-8">
                    <div class="btn-group">
                      <button class="btn btn-sm btn-default" onclick="history.back()" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Go Back"><i class="fa fa-reply"></i></button>
                      
                      <a href="/admin/admin_contact/del/<?php echo $arRead["id_mail"]?>" class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></a>
                    </div>
                  </div>
                  <div class="col-md-4 text-right">
                    <p class="date"> <?php echo date("d-n-Y h:i:s",strtotime($arRead["date"]))?></p>
                  </div>
                  <div class="col-md-12" >
                    <h4 id="title_mail"> <?php echo $arRead["title_mail"]?></h4>
                  </div>
                </div>
                <div class="sender-info">
                  <div class="row">
                    <div class="col-md-12">
                      <strong><?php echo $arRead["fullname"]?></strong>
                      <span>(<?php echo $arRead["mail_den"]?>)</span> to
                      <strong>me</strong>
                      
                    </div>
                  </div>
                </div>
                <div class="view-mail">
                  <p><?php echo $arRead["content_mail"]?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- /page content -->
</div>
</div>

