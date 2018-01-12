<?php
	require_once '../../dbscripts/lang.php';
	//$menulang = new lang('../'.substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
	$menulang = new lang('../fr');
  //require_once 'arrays.php';
 ?>
<ul>
<?php 
          foreach ($navItems as $item) { 
              echo "<li>
              			<a href=\"$item[slug]\" class=\"button\" target=\"$item[prop]\">".$menulang->xlate($item['title'])."
              				<i class=\"$item[icon]\" id=\"big-icon\"></i>	
              			</a>
              		</li>";                         
          }
?>
</ul>
