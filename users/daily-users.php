$result = $conn->query(
"SELECT COUNT(DISTINCT ip_address) as today
 FROM user_activity
 WHERE DATE(last_active)=CURDATE()"
);

$row = $result->fetch_assoc();
echo $row['today'];
