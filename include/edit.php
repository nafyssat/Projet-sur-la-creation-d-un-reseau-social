<?php
$sessionuser = $userConnecte['userhash'];
$queryperso = "SELECT * FROM utilisateur WHERE userhash = '$sessionuser'";
$result = $conn->query($queryperso);
while ($row = $result -> fetch_assoc()){
    $resultfetch = $row["private"];
}
if($resultfetch){
    $testprivate = "1";
    $textprivate = "Public";
}
else{
    $testprivate = "0";
    $textprivate = "Private";
}

if(isset($_GET["datedenaissance"])){
    $date = $_GET["datedenaissance"];
    if ($date != ""){
    $sql = " UPDATE utilisateur SET datedenaissance='$date' WHERE userhash = '$sessionuser ' ";
    if ($conn->query($sql) == TRUE) {
        header('Location:./parametres.php');
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
}
if(isset($_GET["email"])){
    $email = $_GET["email"];
    if ($email != ""){
    $sql = " UPDATE utilisateur SET email='$email' WHERE userhash = '$sessionuser' ";
    if ($conn->query($sql) == TRUE) {
        header('Location:./parametres.php');
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
}
if(isset($_GET["private"])){
    $action = $_GET["private"];
    if ($action == '"1"'){  
        $public =" UPDATE utilisateur SET private='0' WHERE userhash = '$sessionuser' ";
        if ($conn->query($public) == TRUE) {
            header('Location:./parametres.php');
        } else {
        echo "Error: " . $public . "<br>" . $conn->error;
        }
    }
    elseif($action == '"0"'){
        $private =" UPDATE utilisateur SET private='1' WHERE userhash = '$sessionuser' ";
        if ($conn->query($private) == TRUE) {
            header('Location:./parametres.php');
        } else {
        echo "Error: " . $private . "<br>" . $conn->error;
        }
    }
}
?>