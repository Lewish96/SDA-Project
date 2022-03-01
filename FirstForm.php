<!DOCTYPE html>

<html>
    <head>
        <title> My Form </title>
        <link rel="stylesheet" href="FormStyle.css">
    </head>
    <body style="font-family: Roboto;">

    <?php

        $name = $email = $comment = $gender = $nation = "";
        $nameErr = $emailErr = $genderErr = $nationErr = "";
        require("Nationalities.php");
        $nations = $nationalities;
        
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(empty($_POST["name"])){
                $nameErr = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
                if(!preg_match("/^[a-zA-Z' ]*$/", $name)){
                $nameErr = "Only letters and white space allowed";
                }
            }

            if(empty($_POST["email"])){
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Invalid email address";
                }
            }

            if(empty($_POST["comment"])){
                $comment = "";
            } else {
                $comment = test_input($_POST["comment"]);
            }

            if(empty($_POST["gender"])){
                $genderErr = "Gender is required";
            } else {
                $gender = test_input($_POST["gender"]);
            }

            if(empty($_POST["nation"])){
                $nationErr = "Nationality is required";
            } else {
                $nation = test_input($_POST["nation"]);
            }
        }
        
    ?>

        <div class="myForm"><h1>My Form</h1></div>

        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <!-- The input for a name -->
            <div class="inputField"><label class="inputLabel" style="top: 7px;" for="name"> Name: </label>
                <input id="name" class="inputBox" type="text" name="name" value="<?php echo $name; ?>"> <span class="requiedText"> * <?php echo $nameErr; ?></span> </div><br><br>
            <!-- The input for an email -->
            <div class="inputField"><label class="inputLabel" style="top: 7px;" for="email"> Email: </label>
                <input id="email" class="inputBox" type="text" name="email" value="<?php echo $email; ?>"> <span class="requiedText"> * <?php echo $emailErr; ?></span> </div> <br><br>
            <!-- The input for a comment -->
            <div class="inputField"><label class="inputLabel" style="top: 7px;" for="comment"> Comment: </label>
                <textarea id="comment" name="comment" rows="4" cols="58" style="border-radius: 5px; width: 487px;"><?php echo $comment; ?></textarea></div><br><br>
            <!-- The radio buttons for a gender -->
            <div class="inputField"><label class="inputLabel"> Gender: </label>
                <div><input id="male" type="radio" name="gender" value="Male" <?php echo $gender == "Male" ? "checked" : "";?>> <label for="male" style="margin-left: 5px; margin-right: 17px;">:Male</label></div>
                <div><input id="female" type="radio" name="gender" value="Female" <?php echo $gender == "Female" ? "checked" : "";?>> <label for="female" style="margin-left: 5px; margin-right: 17px;">:Female</label></div>
                <div><input id="other" type="radio" name="gender" value="Other" <?php echo $gender == "Other" ? "checked" : "";?>> <label for="other" style="margin-left: 5px;">:Other</label></div><span class="requiedText"> * <?php echo $genderErr; ?></span></div><br><br>
            <!-- The dropdown for a nationality -->
            <div class="inputField"><label class="inputLabel" style="top: 7px;" for="nation">Nationality: </label>
                <select class="inputBox" id="nation" name="nation" style="width: 497px;">
                    <?php foreach ($nations as $forNation) { ?>
                        <option value="<?php echo $forNation == $nations[0] ? "" : $forNation; ?>" <?php echo $nation == $forNation ? "selected" : "";?>><?php echo $forNation ?></option><?php 
                    } ?>
                </select> <span class="requiedText"> * <?php echo $nationErr; ?></span> </div><br><br>
            <input type="submit" value="Submit">
        </form>

        <div class="aboutMe"><h1>About Me</h1></div>

        <div><p class="aboutP"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sapien tortor, interdum id facilisis ac, ornare et lectus. Pellentesque eget diam tempus, interdum ex vel, consectetur lacus. Nulla luctus libero vitae augue consequat fermentum. Quisque tempor placerat libero, ut pretium velit varius ut. Suspendisse cursus, velit quis elementum malesuada, nunc justo tempor sem, sed rutrum risus erat nec felis. Curabitur iaculis ut nibh quis pellentesque. Mauris consequat, enim sed facilisis commodo, odio ex dapibus tortor, sed pharetra purus erat non elit. Maecenas erat eros, rutrum ac tincidunt eu, condimentum nec erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse cursus sapien quis ultricies ornare. Praesent ac mi vel nunc ornare ornare. Vestibulum varius varius dignissim. Mauris ligula enim, tincidunt ac vehicula sit amet, congue vitae libero. Quisque consequat eros arcu, blandit ultrices eros dapibus sed.  </p></div>

    </body>
</html>
