<?php
$conn = new mysqli("localhost","DB_USER","DB_PASS","DB_NAME");

$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];

$stmt = $conn->prepare(
"SELECT id FROM user_activity WHERE ip_address=?"
);
$stmt->bind_param("s",$ip);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){

    $update = $conn->prepare(
    "UPDATE user_activity 
     SET last_active=NOW() 
     WHERE ip_address=?"
    );
    $update->bind_param("s",$ip);
    $update->execute();

}else{

    $insert = $conn->prepare(
    "INSERT INTO user_activity(ip_address,user_agent)
     VALUES(?,?)"
    );
    $insert->bind_param("ss",$ip,$agent);
    $insert->execute();
}
?>
