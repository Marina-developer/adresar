<?php

require_once './config.php';
include './header.php';
try {
   $sql = "SELECT * FROM users WHERE 1 AND id = :cid";
   $stmt = $DB->prepare($sql);
   $stmt->bindValue(":cid", intval($_GET["cid"]));
   
   $stmt->execute();
   $results = $stmt->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}

?>

<div class="row">
  <ul class="breadcrumb">
     
    </ul>
</div>

  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Detalji odvjetnika</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" name="contact_form" id="contact_form" enctype="multipart/form-data" method="post" action="process_form.php">
          <fieldset>
            <div class="form-group">
              <label class="col-lg-4 control-label" for="first_name"><span class="required"></span>Ime i prezime: </label>
              <div class="col-lg-5">
                <input type="text" readonly="" placeholder="Ime i prezime" value="<?php echo $results[0]["name"] ?>" id="first_name" class="form-control" name="first_name"><span id="first_name_err" class="error"></span>
              </div>
            </div>
            
          
            
            
             <div class="form-group">
              <label class="col-lg-4 control-label" for="profile_pic"> </label>
              <div class="col-lg-5">
                <?php $pic = ($results[0]["image"] <> "" ) ? $results[0]["image"] : "avatar.png" ?>
                <img src="../images/<?php echo $pic ?>" alt="" width="100" height="130" class="thumbnail" >
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="email_id"><span class="required"></span>E-mail:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["email"] ?>" placeholder="E-mail" id="email_id" class="form-control" name="email_id"><span id="email_id_err" class="error"></span>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="contact_no1"><span class="required"></span>Kontakt: </label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["mobile"] ?>" placeholder="Kontakt" id="contact_no1" class="form-control" name="contact_no1"><span id="contact_no1_err" class="error"></span>
              </div>
            </div>
             <div class="form-group">
              <label class="col-lg-4 control-label" for="contact_no2">Drzava:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" value="<?php echo $results[0]["countries"] ?>" placeholder="Drzava" id="contact_no2" class="form-control" name="contact_no2"><span id="contact_no2_err" class="error"></span>
              </div>
            </div>
              <div class="form-group">
              <label class="col-lg-4 control-label" for="contact_no2">Grad:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" style="text-transform: uppercase;" value="<?php echo $results[0]["grad"] ?>" placeholder="Grad" id="contact_no2" class="form-control" name="contact_no2"><span id="contact_no2_err" class="error"></span>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-4 control-label" for="contact_no2">Adresa:</label>
              <div class="col-lg-5">
                <input type="text" readonly="" style="text-transform: uppercase;" value="<?php echo $results[0]["address"] ?>" placeholder="Adresa" id="contact_no2" class="form-control" name="contact_no2"><span id="contact_no2_err" class="error"></span>
              </div>
            </div>
            
           
            <div class="form-group">
              <label class="col-lg-4 control-label" for="address">Podrucja rada:</label>
              <div class="col-lg-5">
                <textarea id="address" readonly="" name="address" rows="3"  placeholder="Podrucja rada" class="form-control"><?php echo $results[0]["surname"] ?></textarea>
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="col-lg-4 control-label" for="address">Zivotopis:</label>
              <div class="col-lg-5">
                <textarea id="address" readonly="" name="address" rows="10"  placeholder="Zivotopis" class="form-control"><?php echo $results[0]["description"] ?></textarea>
              </div>
            </div>
              <div class="form-group">
              
              <div class="col-lg-4">
         
                  <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-backward"></span>&nbsp; Povratak</a>
              </div>
            </div>
          </fieldset>
         
        </form>

      </div>
    </div>
  </div>
<?php
include './footer.php';
?>