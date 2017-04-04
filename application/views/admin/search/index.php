<div class="x_content bs-example-popovers">
  <div class="col-xs-12" id="message">
    <?php
$arsUser=$this->session->userdata("arsUser");
     $this->load->view('templates/admin/thongbao');?>
  </div>
</div>
<div class="col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-bars"></i> SEARCH</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <?php if (isset($arNguoidung)) {?>
      <table class="table table-hover table-stripped table-bordered" id="example">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Fullname</th>
            <th>Chức vụ</th>
            <th>Avatar</th>
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
         <?php 
         $i=1;
         foreach ($arNguoidung as $key => $value) {
          $id=$value["id_user"];
          if ($value["picture"]=="") {
            $picture="Không có hình";
          }else{
            $url_pic=$_SERVER["DOCUMENT_ROOT"]."/assets/files/admin/".$value['picture'];

              if(file_exists($url_pic)){//nếu tồn tai file thì xóa=>update
               $picture='<img src="'.FILES.'/admin/'. $value["picture"].' " alt="" width="100px" height="100px" " style="border-radius:5px"/>';
             }else{
              $picture="Lỗi ảnh gốc"; 
            }
          }
          if ($value["active"]==1) {
           $checked='checked'; 
         }else{
           $checked='';
         }
         if ($value["username"]=="admin") {
           $chucvu="Admin";
         }else if($value["id_lop"] >0){
          $chucvu="GVCN LỚP ".$value["tenlop"]." ( ".$value["short_name"].")";
        }else{
          $chucvu=$value["tenchucvu"]."  ".$value["short_name"];
        }
        ?>

        <tr data-id=<?=$id?>>
          <td><?php echo $i?></td>
          <td><?php echo $value["username"]?></td>
          <td><?php echo $value["fullname"]?></td>

          <td><?php echo $chucvu ?></td>
          <td><?php echo $picture?></td>
          <td style="width: 12%;text-align: center;">
            <a href="" data-toggle="modal" data-target=".bs-example-modal-lg"  class="xem_users"><i class="fa fa-eye"></i></i></a>

          </td>
        </tr>
        <?php $i++;}?>
      </tbody>
    </table>
    <?php } else{?>
    <table class="table table-hover table-striped table-bordered bulk_action" id="example">
      <thead>
        <tr>
        <?php if ($arsUser["chuc_vu"]==4) {?>
          <th><input type="checkbox" class="checkboxassets" id="check_all_assets" ><a href=""  title=""  id="del_assets" style="display: none"> Dell</a> </th>
<?php }?>
          <th >Số thẻ</th>
          <th>Tên</th>
          <th>Đơn giá</th>
          <th>Số lượng</th>
          <th>Danh mục</th>
          <th>Đơn vị</th>
          <th>Người mua</th>
          <th >Đánh giá</th>
          <?php if ($arsUser["chuc_vu"]==4) {?>
          <th>Chức năng</th>
          <?php }?>
        </tr>
      </thead>
      <tbody>
       <?php 
       $i=1;
       foreach ($arTaisan as $key => $value) {
        $id=$value["id_sotaisan"];
        if ($value["tinhtrang"]==1) {
         $checked='checked="checked"'; 
       }else{
         $checked='';
       }
       ?>
       <tr data-id=<?=$id?>>
        <?php if ($arsUser["chuc_vu"]==4) {?>
        <td><input type="checkbox" class="flat checkboxassets" value="<?php echo $id?>" id="xoa"  name="assets[]"></td>
        <?php }?>
        <td><?php echo $value["so_the"]?></td>
        <td><?php echo $value["name"]?></td>
        <td><?php echo number_format($value["don_gia"],0,",",".")?> đ</td>
        <td><?php echo $value["so_luong"]?></td>
        <td><?php echo $value["tenmuctaisan"]?></td>
        <td><?php echo $value["tenlop"]." ".$value["short_name"]?></td>
        <td><?php echo $value["username"]?></td>

        <td>
          <div>
            <input  value="<?=$value["star"]?>" type="number" class="rating danhgiatong" min=0 max=5 step=0.1  >
          </div>
        </td>
        <?php if ($arsUser["chuc_vu"]==4) {?>
        <td>

         <a href="/admin/admin_assets/detail/<?=$id?>" title="Chi tiết"><i class="fa fa-eye"></i></a>
         <a href="/admin/admin_assets/del/<?=$id?>" title="Xóa" id="del"><i class="fa fa-trash"></i></a>
         <a href="/admin/admin_assets/translate/<?=$id?>" title="Điều chuyển"> <i class="fa fa-mail-forward"></i> </a>
       </td>
     </tr>
     <?php }?>
     <?php $i++;}?>
   </tbody>
 </table>
 <?php }?>
</div>
</div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="edit"></div>