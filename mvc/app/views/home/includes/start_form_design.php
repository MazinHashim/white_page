<div id="signin">
          <div class="row box-shadow-full">
            <?php if(!isset($table)){ ?>
            <div class="col-lg-6">
            <?php } else{ ?>
              <div class="col-md-12">
            <?php } ?>
              <div class="d-flex justify-content-between title-box-2">
                <h5 class="title-left">
                  <?php echo $title ?>
                </h5>
                <?php if(isset($_SESSION["usersignin"])){ ?>
                  <form action="\PHP_MVC/mvc/public/home/personal_data" method="post">
                    <button type="submit" name="logout-submit"class="button btn-link"><i class="fa fa-sign-out-alt"></i> Sign out</button>
                  </form>
                <?php } ?>
              </div>
              <div>