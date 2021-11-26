<?php $connection = Controller::db_connection(); ?>
<?php include_once "includes/header.php" ?>

<?php $title = "Wellcome <span style='color:#0078ff'>" . strtoupper($_SESSION["usersignin"]) . "</span>"; ?>
<?php $table = true; ?>


<?php include_once "includes/start_form_design.php" ?>

<div class="d-flex justify-content-between mb-3">
  <h4 style="font-family:'Righteous', cursive">Personal Data</h4>
  <form class="form-inline" action="" method="post">
    <div class="input-group">
      <input required type="text" class="form-control" name="svalue" id="svalue" placeholder="Search By Name"/>
      <div class="input-group-append">
        <button type="submit" name="search-submit"class="btn btn-primary"><i class='fa fa-search'></i></button>
        </div>
    </div>
  </form>
  <?php if($_SESSION["userstatus"] === "Admin"){ ?>
    <form action="\PHP_MVC/mvc/public/home/add_person" method="post">
      <input type="submit" name="new-person-submit"class="button btn-primary" value="Add New Person"/>
    </form>
  <?php } ?>
</div>

<div class="table-responsive-lg">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">PERSONAL ID</th>
        <th scope="col">FULL NAME</th>
        <th scope="col">PHONE</th>
        <th scope="col">JOP</th>
        <th scope="col">LOCATION</th>
        <?php if($_SESSION["userstatus"] === "Admin"){ ?>
          <th scope="col">EDIT</th>
          <th scope="col">DELETE</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php
      if(isset($_POST["svalue"])){
        $result = Controller::db_search_persons_data($_POST["svalue"]);
      } else {
        $result = Controller::db_get_persons_data();
      }
      while( $person = mysqli_fetch_assoc($result) ){
        echo "<tr class='text-center'>";
        echo "<td>{$person["personal_id"]}</td>";
        echo "<td>{$person["fullname"]}</td>";
        echo "<td>{$person["phone"]}</td>";
        echo "<td>{$person["jop"]}</td>";
        echo "<td>{$person["location"]}</td>";
        if($_SESSION["userstatus"] === "Admin"){
          echo "<td><a class='btn-sm btn-outline-primary' href='\PHP_MVC/mvc/public/home/add_person/{$person["personal_id"]}'><i class='fa fa-edit'></i></a></td>";
          echo "<td><a class='btn-sm btn-outline-danger' href='\PHP_MVC/mvc/public/home/personal_data/{$person["personal_id"]}'><i class='fa fa-trash-alt'></i></a></td>";
        }
        echo "</tr>";
      }
      ?>
      
    </tbody>
  </table>
</div>
<?php include_once "includes/end_form_design.php" ?>
<?php include_once "includes/footer.php" ?>
<?php Controller::db_close($connection); ?>