<!-- <?php session_start(); ?> -->
<?php $connection = Controller::db_connection(); ?>
<?php include_once "includes/header.php" ?>

<?php $title = "Sign In"; ?>

<?php include_once "includes/start_form_design.php" ?>
<?= isset($_COOKIE["usernamecookie"]) ? "<ul><li class=\"cookie-message\">Last Sign In From This Device Was :<mark class=\"d-block w-75 text-primary\">{$_COOKIE['usernamecookie']}</mark></li></ul>" : ""; ?>
    <form id="signin-form" action="\PHP_MVC/mvc/public/home/signin" method="post" role="form">
    <div class="row">
      <div class="col-md-12 mb-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-user"></i></div>
            </div>
          <input required minlength="5" type="text" name="username" class="form-control" id="username" placeholder="User Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
        </div>
      </div>
      <div class="col-md-12 mb-3">
          <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-lock"></i></div>
            </div>
            <input required minlength="5" type="password" class="form-control" name="password" id="password" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
          </div>
      </div>
      <div class="col-md-12 d-flex justify-content-center">
        <button type="submit" name="signin-submit" class="button button-a button-big button-rouded"><i class="fa fa-sign-in-alt"></i> Sign In</button>
      </div>
    </div>
  </form>              
<?php include_once "includes/end_form_design.php" ?>
<?php include_once "includes/footer.php" ?>
<?php Controller::db_close($connection); ?>