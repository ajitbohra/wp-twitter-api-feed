<form action='options.php' method='post'>

<h2>Twitter API Feed</h2>

<?php
settings_fields( 'tafSettings' );
do_settings_sections( 'tafSettings' );
submit_button();
?>

</form>
