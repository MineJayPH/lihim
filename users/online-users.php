<?php
$conn = new mysqli("localhost","DB_USER","DB_PASS","DB_NAME");

$result = $conn->query(
"SELECT COUNT(*) as online 
 FROM user_activity 
 WHERE last_active > NOW() - INTERVAL 5 MINUTE"
);

$data = $result->fetch_assoc();
echo $data['online'];
?>
