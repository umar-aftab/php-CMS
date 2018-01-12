<?php
	require_once 'arraysAdmin.php';
 ?>
<ul><?php 
          foreach ($navItems as $item) { 
              echo "<li>
              			<a href=\"$item[slug]\" class=\"button\">$item[title]
              				<i class=\"$item[icon]\"></i>	
              			</a>
              		</li>";                         
          }
    ?>
</ul>
