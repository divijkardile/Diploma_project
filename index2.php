<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
session_destroy();

header('location:index.php');
?>

</body>
</html>