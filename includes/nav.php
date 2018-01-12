<?php
	include_once '../dbscripts/lang.php';
	//$menulang = new lang(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
	$menulang = new lang('fr');
?>
<ul>
   <li><a href="index.php"><i class="fa fa-home" class="menu-icon" id="big-icon"></i></a></li>  
    
    <?php 
          foreach ($navItems as $item) {
          		 echo "<li><a href=\"$item[slug]\"><i class=\"$item[class]\" class=\"menu-icon\"></i><h2>".$menulang->xlate($item['title'])."</h2></a></li>";                         
          }
    ?>
                 
</ul>
