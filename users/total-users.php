$result = $conn->query(
"SELECT COUNT(DISTINCT ip_address) as total FROM user_activity"
);

$row = $result->fetch_assoc();
echo $row['total'];
