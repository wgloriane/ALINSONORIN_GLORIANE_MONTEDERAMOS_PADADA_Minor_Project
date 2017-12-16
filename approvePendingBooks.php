
<?php
    include('server.php');

    $currentID = 0;
    $username = $_SESSION['username'];
    if(!empty($_GET['id'])){
        
        $id = $_GET['id'];
        
        $select_sql = "SELECT * FROM bookings WHERE id = $id";
        $select_res = mysqli_query($db, $select_sql);
        $select_data = mysqli_fetch_assoc($select_res);
        
        $id1 = $select_data['id'];
        $user = $select_data['username'];
        $fname = $select_data['fname'];
        $email = $select_data['email'];
        $phone = $select_data['phone'];
        $troom = $select_data['troom'];
        $nroom = $select_data['nroom'];
        $meal = $select_data['meal'];
        $cin = $select_data['cin'];
        $cout = $select_data['cout'];
        
        $result = "INSERT INTO approve (id, fname, email, phone, troom, nroom, meal, cin, cout, status, username) values ($id1, '$fname', '$email', '$phone', '$phone', '$nroom', '$meal', '$cin' , '$cout', 'ACCEPTED', '$user')";
        
        mysqli_query($db, $result);
        
        $currentID = $_GET['id'];
        echo $currentID;
        $query = "delete from bookings where id = $currentID";
        mysqli_query($db, $query);
        header("location: userPending.php");
    }

?>

