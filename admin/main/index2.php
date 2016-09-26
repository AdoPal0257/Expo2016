<?php
require("../lib/page2.php");
Page::header("Bienvenid@");
?>
<div class="row">
	<h4>Hoy es <?php print(date('d/m/Y')); ?></h4>
</div>
<?php
Page::footer();
?>