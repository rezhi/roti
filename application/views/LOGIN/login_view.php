<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: white;
        }
    </style>
</head>
<body>

<div id="login">
       <center>
            <form role="form" action="Login" method="POST">
                        <input type="text" name="username" placeholder="Username"  /><br>
                        <input type="password" name="password" placeholder="Password"  />
                        <br>
                        <br>
                        <input style="font-family:Impact; font-size: 20px;" type="submit" name="btn_log" value="LOGIN"><br><br>
                        
                    </form>
                     <b><p style="color: black; font-size: 16px;"><?php echo $model->notif;?></p></b>
    </center>
    
        </div>
                </div>
                </div>

</body>
</html>