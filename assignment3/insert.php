<?php
include('config.php');
?>

<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];

    $sql = "INSERT INTO `information` ('username', 'email', 'contact', 'city') VALUES ('$username', '$email', '$contact', '$city')";
    mysqli_query($conn, $sql);
}
else{
    echo "Please click submit button to submit the data..";
}
?>

<html>
    <head>
        <title>HTML Forms</title>
    </head>
<body>
<form method="POST" action="insert.php">
    USERNAME <input type="text" name="username" placeholder="Type Your Username" required><br>
    E-MAIL <input type="email" name="email" placeholder="Type Your E-mail" required><br>
    CONTACT <input type="text" name="contact" placeholder="Type Your Contact Number" required><br>
    Select City <select name="city">
        <option value="Dehradun">Dehradun</option>
        <option value="Delhi">Delhi</option>
        <option value="Jaipur">Jaipur</option>
        <option value="Nanital">Nanital</option>
        <option value="Mussoorie">Mussoorie</option>
        <option value="Lucknow">Lucknow</option>
    </select><br>
    <input type="submit" name="submit" value="Click Here To Submit Your Data">
</form>
</body>
</html>