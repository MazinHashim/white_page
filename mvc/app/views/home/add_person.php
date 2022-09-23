
<?php $connection = Controller::db_connection(); ?>

<?php include_once "includes/header.php" ?>

<?php $title = "Add New Person";
      $btn_title = "Add Person"; ?>
<?php

$edit_person = new Person("","","","");
if(!empty($_GET["personal_id"])){
  $personal_id = $_GET["personal_id"];
  $title = "Edit Person";
  $btn_title = "Edit Person";
  $result = Controller::db_get_person($personal_id);
  if($data = mysqli_fetch_assoc($result)){
    $edit_person = new Person($data['fullname'],$data['phone'],$data['jop'],$data['location']);
  }
}
?>
<?php include_once "includes/start_form_design.php" ?>
<?php if(!empty($personal_id)){ ?>
    <form id="person-form" action="\PHP_MVC/mvc/public/home/edit_person/<?=$personal_id?>" method="post" role="form">
<?php } else { ?>
    <form id="person-form" action="\PHP_MVC/mvc/public/home/personal_data" method="post" role="form">
  <?php } ?>
    <div class="row">
      <div class="col-md-12 mb-3">
        <div class="form-group">
          <input required minlength="5" value="<?=$edit_person->fullname?>" type="text" name="fullname" class="form-control" id="fullname" placeholder="Full Name"/>
        </div>
      </div>
      <div class="col-md-12 mb-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">+249</div>
            </div>
          <input required minlength="5" value="<?=$edit_person->phone?>" type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number"/>
        </div>
      </div>
      <div class="col-md-12 mb-3">
          <div class="form-group">
            <input required minlength="5" value="<?=$edit_person->jop?>" type="text" class="form-control" name="jop" id="jop" placeholder="Your Jop"/>
          </div>
      </div>
      <div class="col-md-12 mb-3">
          <div class="form-group">
            <input required minlength="5" value="<?=$edit_person->location?>" type="text" class="form-control" name="location" id="location" placeholder="Your Location"/>
          </div>
      </div>
      <div class="col-md-12 d-flex justify-content-center">
        <button type="submit" name="add-submit" class="button button-a button-big button-rouded"><?=$btn_title?></button>
      </div>
    </div>
  </form>              
<?php include_once "includes/end_form_design.php" ?>
<?php include_once "includes/footer.php" ?>
<?php Controller::db_close($connection); ?>