<?php
    require_once '../../dbscripts/model/session.php';
    include '../../includesAdmin/header.php';
    include '../../includesAdmin/spacer.php';
    require_once '../../dbscripts/model/database.php';
    include_once '../../dbscripts/lang.php';
 
    
    
   //$lang = new lang('../'.substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
    $lang = new lang('../fr');
    echo "<a href=\"../index.php\"><i class=\"fa fa-home\" class=\"menu-icon\" id=\"big-icon\"></i></a>";

?>   
      
       <section id="text_columns">
            <form action="../../dbscripts/loginAdmin.php" method="post" id="msform">
              <p>
                <label>
                  <?php echo $lang->xlate("username"); ?>* :
                </label>
                </p>

                <p>
                <input id="admin-username" type="text" name="admin-username" size="30" maxlength="30" 
                value="<?php if(isset($_POST['admin-username'])) echo htmlspecialchars($_POST['admin-username']); ?>" required placeholder="<?php echo $lang->xlate("place1"); ?>">
                </p>

                <p>
                <label>
                  <?php echo $lang->xlate("password"); ?>* :
                </label>
                </p>

                <p>
                <input id="admin-password" type="password" name="admin-password" size="30" maxlength="30" 
                value="<?php if(isset($_POST['admin-password'])) echo htmlspecialchars($_POST['admin-password']); ?>" required placeholder="<?php echo $lang->xlate("place2"); ?>">
                </p>


                <p>
                <input type="submit" name="submit" value="<?php echo $lang->xlate("login"); ?>" class="action-button">
                </p>

            </form>
        </section>
</div>        
 <script type="text/javascript">
   $('#register').click(function() {
      $('#admin-username').prop('required', false);
      $('#admin-password').prop('required', false);
    });
 </script>

<?php

  include '../../includesAdmin/footer.php';

  if(isset($database)) { $database->close_connection();}
?>       
