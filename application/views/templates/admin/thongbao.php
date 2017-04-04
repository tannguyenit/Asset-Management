<?php
  $message=$this->session->userdata("kt");
  $kt=$message["kt"];
  $msg=$message["msg"];
  if(isset($kt)){
    if($kt==1){
?>
  <div class="alert alert-success alert-dismissible fade in" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
</button>
<strong>OK! <?php echo $msg?></strong> 
</div>
        <?php
        $this->session->unset_userdata('kt');
          }else if($kt==2){
        ?>
          <div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Sorry! <?php echo $msg?></strong> 
  </div>
        <?php 
          $this->session->unset_userdata('kt');
        }else if($kt=3){
        ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Sorry! Bạn không được quyền xóa admin.</strong> 
  </div>
        <?php 
          $this->session->unset_userdata('kt');
            }
          }
        ?>


