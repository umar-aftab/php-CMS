<?php
 include_once '../dbscripts/lang.php';
 //$reglang = new lang(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
 $reglang = new lang('fr');
 ?>
<section class="container">
 	
<img src="img/slide3.jpg" alt="markaz" />
 <!--  <div id="toll-free">
                <a href="tel:1-888-888-8888">1.888.888.8888</a>
            </div>-->

             <div>
                 <a href="register.php" id="register-study-what" class="icon"> <?php echo $reglang->xlate("registerClass"); ?></a>
            </div>         
</section>