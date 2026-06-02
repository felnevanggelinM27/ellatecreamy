<form method="GET">

<input type="text" name="search">

<button>Search</button>

</form>

<?php

$search = $_GET['search'] ?? '';

$query = mysqli_query($conn,
"SELECT * FROM products
WHERE name LIKE '%$search%'");

?>