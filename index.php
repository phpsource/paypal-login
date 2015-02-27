<?php
    include_once 'constants.php';
    session_start(); // i think that it's better if we put a condition to don't start session twice
   if (isset($user))
   {
      foreach($user as $key => $value)
      {
          if (is_array($value)) // it is one case when value is an array
          {
                foreach( $value as $k => $v)
                    $_SESSION['user'][$key][$k] = $v;
          }
          else
            $_SESSION['user'][$key] = $value;
      }
       
   }
    if(!isset($_GET['scope'])) // means that i'm not comming after paypal login
    {
        echo '<hr>'; // -----------------------> Login button

        echo '<span id="myContainer"></span>
                <script src="https://www.paypalobjects.com/js/external/api.js"></script>
                <script>
                paypal.use( ["login"], function(login) {
                login.render ({
                "appid": "'.CLIENT_ID.'",
                "authend": "sandbox",
                "scopes": "profile email address phone https://uri.paypal.com/services/paypalattributes",
                "containerid": "myContainer",
                "locale": "en-us",
                "returnurl": "'.RETURN_URL.'"
              });
            });
            </script>
        <br><hr>'; // <--------------------------------------------------------------
    
        // <========================= Show results button
        echo '<form action="index.php" method=POST>';
            echo '<input type=submit name="see" value="See user info">';
        echo '</form>';
        
        if (isset($_POST['see']) && $_POST['see'] == "See user info")
        {
            if (isset($_SESSION['user']))
            {
                echo 'This is you\'re personal info??';

                echo '<hr><pre>';
                    print_r($_SESSION['user']);
                echo '</pre>';
                echo '<form action="index.php" method=POST>';
                    echo '<input type=submit name="see" value="Ok! Thanks">';
                echo '</form><hr>';
                
            }else
                echo '<hr>Please login first!<hr><br>';
        }
    
    }

?>

