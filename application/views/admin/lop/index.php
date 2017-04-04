<?php 
$arsUser=$this->session->userdata('arsUser');
$url=$this->uri->segment(1);
$arid=explode("-",$url);
$arID=$arid[count($arid)-1];
$id=explode(".",$arID)[0];
?>
<div class="x_content bs-example-popovers">
<div class="col-xs-12" id="message">
    <?php $this->load->view('templates/admin/thongbao');?>
</div>
</div>

<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> Lớp <?php echo $arName["name"]?></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Tất cả tài sản </a> </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <div class="x_content table-responsive">
                            <table class="table table-hover table-striped table-bordered bulk_action" id="index_cat_table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th style="width: 10%;">Số thẻ</th>
                                        <th>Tên</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th style="width: 15%;">Đánh giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php 
                                 $i=1;
                                 foreach ($arAssets as $key => $value) {
                                    $id=$value["id_sotaisan"];
                                    ?>
                                    <tr data-id=<?=$id?>>
                                        
                                        <td><?php echo $i?></td>
                                        <td><?php echo $value["so_the"]?></td>
                                        <td><?php echo $value["name"]?></td>
                                        <td><?php echo $value["don_gia"]?></td>
                                        <td><?php echo $value["so_luong"]?></td>
                                        <td><?php echo $value["star"]?></td>
                                      </td>                               </tr>
                               <?php $i++;}?>
                           </tbody>
                       </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit"></div>
