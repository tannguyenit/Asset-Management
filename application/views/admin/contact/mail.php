<?php $arsUser=$this->session->userdata('arsUser');
$frommail=$arsUser["email"];
$id_user=$arsUser["id_user"];
if ($arsUser["chuc_vu"]==3) {
    redirect('/trang-chu.html','refresh');
}
?>


<div class="x_content bs-example-popovers">
  <div class="col-xs-12" id="message">
    <?php $this->load->view('templates/admin/thongbao');?>
  </div>
</div>
<div class="">
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Quản lý Mail</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-sm-3 col-xs-12 mail_list_column">
              <div class="container">
                <button id="compose" class="btn btn-sm btn-success btn-block" type="button">New Message</button>
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a data-toggle="pill" href="#to">Hộp thư đến</a>
                  </li>
                  <li><a data-toggle="pill" href="#from">Hộp thư đi</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-9 col-xs-12 mail_view tab-content table-responsive" style="height: 350px">
              <div id="to" class="tab-pane fade in active">
                <?php foreach ($arDen as $key => $value) {
                  
                  if ($value["trangthai"]==0) {
                    $trangthai="unread_mail";
                    $circle="fa fa-circle";
                  }else{
                   $trangthai="";
                   $circle="fa fa-circle-o";
                 }
                 ?>
                 <a href="/read-mail/<?php echo $value["id_mail"]?>" onclick="read_mail(<?php echo $value["id_mail"] ?>)">
                  <div class="mail_list <?php echo $trangthai ?>" >
                    <div class="left"> <i class="<?php echo $circle?>"></i> <i class="fa fa-edit"></i> </div>
                    <div class="right">
                      <h3><?php echo $value["fullname"]?> <i style="font-weight: normal;">( <?php echo $value["mail_di"]?> )</i><small><?php echo date("d-n-Y h:i:s",strtotime($value["date"]))?></small></h3>
                      <p><?php echo $value["title_mail"]?></p>
                    </div>
                  </div>
                </a>
                <?php }?>
              </div>
              <div id="from" class="tab-pane fade in ">
                <?php foreach ($arDi as $key => $value) {
                 
                 ?>
                 <a href="/admin/admin_contact/read/<?php echo $value["id_mail"]?>">
                  <div class="mail_list " >
                    <div class="left"> <i class="fa fa-circle-o"></i> <i class="fa fa-edit"></i> </div>
                    <div class="right">
                      <h3><?php echo $value["fullname"]?> <i style="font-weight: normal;">( <?php echo $value["mail_den"]?> )</i><small><?php echo date("d-n-Y h:i:s",strtotime($value["date"]))?></small></h3>
                      <p><?php echo $value["title_mail"]?></p>
                    </div>
                  </div>
                </a>
                <?php }?>
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
<!-- compose -->
<div class="compose col-md-6 col-xs-12">
  <div class="compose-header"> New Message
    <button type="button" class="close compose-close"> <span>×</span> </button>
  </div>
  <div class="compose-body">
    <div class="container" style="margin-top: 2%">
      <form action="/admin/admin_contact/send_mail" method="post" id="send_mail">
          <div class="form-group has-feedback col-xs-12">
            <label class="control-label  col-xs-12" >Tiêu đề mail<span class="required">*</span> </label>
                <div class=" col-xs-12">
                    <input type="text" name="title_mail" placeholder="Vui lòng nhập tiêu đề mail"  class="form-control col-md-7 col-xs-12" required="required" >
                    <i class='glyphicon glyphicon-ok form-control-feedback'></i>
                </div>
          </div>
          <div class="clearfix"></div>
          <div class="form-group has-feedback col-xs-12">
          <label class="control-label  col-xs-12" >Người nhận<span class="required">*</span> </label>
            <div class=" col-xs-12">
              <select class=" form-control "  tabindex="-1" name="nguoinhan" required="required" >
              <option> </option>
              <?php foreach ($arUser as $key => $value) {?>
              <option value="<?php echo $value['id_user']?>"><?php echo $value["fullname"]?></option>
              <?php }?>
            </select>
            </div>
          </div>
    </div>
    <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
      <div class="btn-group"> <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
        <ul class="dropdown-menu"> </ul>
      </div>
      <div class="btn-group"> <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li>
            <a data-edit="fontSize 5">
              <p style="font-size:17px">Huge</p>
            </a>
          </li>
          <li>
            <a data-edit="fontSize 3">
              <p style="font-size:14px">Normal</p>
            </a>
          </li>
          <li>
            <a data-edit="fontSize 1">
              <p style="font-size:11px">Small</p>
            </a>
          </li>
        </ul>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
        <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
        <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
        <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
        <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
        <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
        <div class="dropdown-menu input-append">
          <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
          <button class="btn" type="button">Add</button>
        </div> <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a> </div>
        <div class="btn-group">
          <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
          <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" /> </div>
          <div class="btn-group">
            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
          </div>
        </div>
        
          <div id="editor" class="editor-wrapper" onkeyup ="message()" required="required"></div>
          <input type="hidden"  name="message" value="" id="noidungmail">
          <input type="hidden"  name="mail_di" value="<?php echo $frommail?>" >
          <input type="hidden"  name="nguoigui" value="<?php echo $id_user?>" >
        </div>
        <div class="compose-footer">
        <input id="send" class="btn btn-sm btn-success"  type="submit" name="send" value="Send">
        </div>
      </form>
    </div>
    <!-- /compose -->

