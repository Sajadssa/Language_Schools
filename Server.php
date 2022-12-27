
<?php

// Enter your host name, database username, password, and database name.
// If you have not set database password on localhost then set empty.
$conn = mysqli_connect("localhost", "root", "", "language_schools");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>