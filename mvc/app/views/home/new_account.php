<?php $connection = Controller::db_connection(); ?>

<?php include_once "includes/header.php" ?>

<?php $title = "Create New Account"; ?>

<?php include_once "includes/start_form_design.php" ?>
    <form id="account-form" action="\PHP_MVC/mvc/public/home/new_account" method="post" role="form">
    <div class="row">
      <div class="col-md-12 mb-3">
        <div class="form-group">
          <input required minlength="5" type="text" name="username" class="form-control" id="username" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
        </div>
      </div>
      <div class="col-md-12 mb-3">
        <div class="form-group">
          <input required minlength="5" type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
        </div>
      </div>
      <div class="col-md-12 mb-3">
          <div class="input-group">
            <input required minlength="5" type="password" class="form-control" name="password" id="password" placeholder="Your Password"/>
            <div class="input-group-append">
                <div class="input-group-text"><i class="fa fa-eye-slash"></i></div>
            </div>
          </div>
      </div>
      <div class="col-md-12 mb-3">
          <div class="form-group">
            <select required class="form-control" name="status" id="status">
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select>
          </div>
      </div>
      <div class="col-md-12 d-flex justify-content-center">
        <button type="submit" name="create-submit" class="button button-a button-big button-rouded">Create Account</button>
      </div>
    </div>
  </form>              
<?php include_once "includes/end_form_design.php" ?>
<?php include_once "includes/footer.php" ?>
<?php Controller::db_close($connection); ?>