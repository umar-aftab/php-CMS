<?php
 include_once '../dbscripts/lang.php';
 //$reglang = new lang(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
 $reglang = new lang('fr');
 ?>
<section class="container">
            <h2 class="hidden">Technical Information</h2>
           
            <img src="img/slide1.jpg" alt="markaz" />
            <article id="logo">
            </article>
			

           <div id="toll-free">
               
               <a href="http://www.alisbaah-online.com/public">||<?php echo $reglang->xlate("English"); ?>||</a>

               <a href="http://www.alisbaah-en-ligne.com/public">||<?php echo $reglang->xlate("French"); ?>||</a>

            </div>

           
            <div>
                 <a href="selectSchedule.php" id="register-study" class="icon"><?php echo $reglang->xlate("registerClass"); ?></a>
            </div>
            
</section>






