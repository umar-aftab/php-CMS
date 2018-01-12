<?php
	require_once 'arrays.php';
 ?>
<ul><?php 
          foreach ($navItems as $item) { 
              echo "<li>
              			<a href=\"$item[slug]\" class=\"button\" target=\"$item[prop]\">$item[title]
              				<i class=\"$item[icon]\" id=\"big-icon\"></i>	
              			</a>
              		</li>";                         
          }
    ?>
</ul>
