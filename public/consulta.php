
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Compra BTC</title>

        <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>





    <body>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" 
                            data-toggle="collapse" data-target="#navbar" aria-expanded="false" 
                            aria-controls="navbar">
                        <span class="sr-only">Bitcoin Local Bank</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
                    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                    <!--
                    
                    -->
                    <a class="navbar-brand" href="#">Bitcoin Local Bank</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">

                    <!--
                    <ul class="nav navbar-nav">
                        <li><a href="{{url("../")}}">Inicio</a></li>
                    </ul>
                    -->
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="#">Inicio</a></li>

                    </ul>
                </div>
            </div>
        </nav>

        </br>
        </br>
        </br>
        </br>

        </br>
        </br>
        </br>
        </br>

        </br>
        </br>
        </br>
        </br>
    <center><p>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "laravel";

// Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT name, usd, btc FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "Cliente: " . $row["name"] . "</br> Saldo en USD: " . $row["usd"] . "</br> Saldo en BTC: " . $row["btc"] . "<br>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>

        </p></center> 


</body>
</html>