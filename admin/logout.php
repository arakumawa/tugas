<?php
session_start();
echo "<script>alert('mugo-mugo kangen lan mbalek maneh yo :3 $_SESSION[nama]');</script>";
session_destroy();
?>
<meta http-equiv="refresh" content="0;url=index.php"/>