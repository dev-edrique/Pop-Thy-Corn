<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
    </head>

    <style>
        .signUpForm{
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            background-color: #ffc404;
            padding: 1vw;
            width: 30%;
        }

        .signUpForm input[type=text], input[type=password], input[type=email]{
            border-radius: 1vw;
            border: none;
            font-size: 1.5vw;
        }

        .signUpForm input[type=submit]{
            border-radius: 1.5vw;
            border: none;
            padding: .5vw;
            font-size: 1.5vw;
        }

        .signUpForm input[type=submit]:hover{
            transition: .5s;
            background-color: #9e0000;
            color: white;
            
        }

        body{
            background-color: #9e0000;
        }

        .navBar ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #ffc404;
        }

        .navBar li{
            float: left;
        }

        .navBar li a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navBar li a:hover {
            background-color: white;
        }
    </style>

    <body>
        <div class="navBar">
            <ul>
                <li><a href="#">Go Back</a></li>
            </ul>
        </div><br><br>

        <?php session_start(); ?>

        <div class="signUpForm">
            <form action="process.php" method="POST">
                <h2>Sign Up</h2>
                <input type="text" placeholder="Username" name="username"><br><br>
                <input type="text" placeholder="First Name" name="first_name"><br><br>
                <input type="text" placeholder="Last Name" name="last_name"><br><br>
                <input type="email" placeholder="Email" name="email"><br><br>
                <input type="password" placeholder="Password" name="password"><br><br>
                <input type="submit" value="Sign Up">
            </form>
        </div>
    </body>

    <!--
    <script>
        function signUp(){
            var newUser = document.getElementById('user').value;
            var newPass = document.getElementById('pass').value;

            //checks if empty
            if(newUser == ""){
                alert("Username is empty!");
            }
            else if(newPass == ""){
                alert("Password is empty!");
            }
            else{
                alert("Sign Up Success!");
                location.replace("../login/login.html");
            }
        }
    </script>
    -->

</html>