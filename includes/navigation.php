
<!-- ako je korisnik nelogovan sakrij navigaciju -->
<div class="container">
	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="index.php">Home</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Password_reset_request") {?>active<?php }?>" href="new_password_requests.php">Password reset request</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") {?>active<?php }?>" href="contact.php">Lager</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") {?>active<?php }?>" href="contact.php">Check</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") {?>active<?php }?>" href="contact.php">Employee</a>
	  </li>
	</ul>
</div>