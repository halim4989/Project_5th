<!DOCTYPE html>
<?php require_once "../lib/db/connect.php" ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include 'config.php' ?>

    <style>
        .in {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>

    <title>Hotel Booking</title>
</head>

<body>

    <div class="topbar">



        <a style="float: right; font-size: 4ex; font-style: bold; color: gray; margin: 12px;">Online Hotel Reservation</a>

    </div>


    <div class="w3-content" style=" margin-top: 12em;">

        <h3>Administrator Login</h3>

        <div>
            <form  method="POST">
                <label for="user">Username</label>
                <input class="in" type="text" id="user" name="username" placeholder="Username.." required="required">

                <label for="psw">Password</label>
                <input class="in" type="password" id="psw" name="password" placeholder="Enter Password.." required="required"><br>

                <input class="" type="checkbox" onclick="myFunction()"> Show Password <br><br>

                <script>
                    function myFunction() {
                        var x = document.getElementById("psw");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }
                </script>



                <input type="submit" name="login" value="Login">

            </form>
            <?php require_once '../lib/db/login.php' ?>
        </div>

</body>

</html>