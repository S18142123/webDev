<! DOCTYPE html>
<html>
<head> 
<title>form example</title>
<head>
        <title>Form</title>

        <style>
            body {
                margin: 10px;
                padding: 10px;
            }

            th, td, table {
                border: 1px dotted black;
            }

            table {
                width: 50%;
                text-align: center;
                margin: auto;
                padding: auto;
                border-collapse: collapse;
                border: 1px solid black;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        </style>

        <script>
          function validateForm() {
                var a = document.forms["form1"]["name"].value;
                var b = document.forms["form1"]["email"].value;
                var c = document.forms["form1"]["contact"].value;
                var d = document.forms["form1"]["city"].value;
                var e = document.forms["form1"]["course"].value;
                var f = document.forms["form1"]["intr"].value;
                if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "", e == null || e == "", f == null || f == "") {
                    alert("Please Fill All Required Field");
                    return false;
                }
                return true;
            }

            function ValidateEmail() {
                var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                inputText = document.getElementById("email");
                if (inputText.value.match(mailformat))
                    return true;
                else {
                    alert("You have entered an invalid email address!");
                    return false;
                }
            }

            function phonenumber() {
                var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
                inputtxt = document.getElementById("number");
                if (inputtxt.value.match(phoneno))
                    return true;
                else {
                    alert("Please enter a valid Phone Number");
                    return false;
                }
            }

            function validateInterest() {
                var options = document.getElementById('intr').options,
                    n = 0;
                for (var i = 0; i < options.length; i++) {
                    if (options[i].selected)
                        n++;
                }
                if (n < 3) {
                    alert("Please select at least 3 field of interests");
                    return false;
                } else if (n > 5) {
                    alert("Please select at most 5 field of interests");
                    return false;
                } else
                    return true;
            }
        </script>
</head>
<body>
	<form method ="post" action="form.php" name= "form1">
       NAME:<input type="text" name="name" placeholder="Enter your name"  required><br/><br/>
       E-MAIL:<input type="email" name="email" placeholder="abc@gmail.com" required><br/><br />
       CONTACT:<input type="text" name="contact" placeholder="Enter your contact 10 digits" value="" minlength="10" maxlength="10" required onkeypress="return event.charCode === 0 || /\d/.test(String.fromCharCode(event.charCode));"><br><br>
       CITY:<input type="text" name="city" placeholder="Enter your city name" required>
       Course: <input type="text" id="course" name="course" placeholder="Course" required><br><br>
       Interests: <br><br>
       <select name="intr[]" id="interest" multiple>
       	
                <option value="Badminton">Badminton</option>
                <option value="Painting">Painting</option>
                <option value="Vlogging">Vlogging</option>
                <option value="Reading">Reading</option>
                <option value="Cooking">Cooking</option>
                <option value="Music">Music</option>
                <option value="Dancing">Dancing</option>
                <option value="Chess">Chess</option>
                <option value="Travel">Travel</option>
         </select>
         <input id="submit" type="submit" name="submit" value="SUBMIT" onclick="if( !(validateForm() && ValidateEmail() && phonenumber() && validateInterest())){
                    event.preventDefault();
                }">
            <br><br><br><br>

  </form>

            <?php
        if (isset($_POST['submit'])) { ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>City</th>
                <th>Course</th>
                <th>Interest</th>
            </tr>

            <tr>
                <td><?php echo $_POST['name']?></td>
                <td><?php echo $_POST['email']?></td>
                <td><?php echo $_POST['contact']?></td>
                <td><?php echo $_POST['city']?></td>
                <td><?php echo $_POST['course']?></td>
                <td><?php echo join(", ", $_POST['intr']) ?></td>
            </tr>
        </table>
        <?php } ?>



</body>
</html>