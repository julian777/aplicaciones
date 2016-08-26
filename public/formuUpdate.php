

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
        <?php
        if (isset($_POST['update'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = 'root';
            $dbname = "test_db";

            $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            if (!$conn) {
                die('Could not connect: ' . mysql_error());
            }

            $emp_id = $_POST['emp_id'];
            $emp_salary = $_POST['emp_salary'];

            $sql = "UPDATE employee " . "SET emp_salary = $emp_salary " .
                    "WHERE emp_id = $emp_id";
            //  mysql_select_db('test_db');
            $retval = $conn->query($sql);
            //$retval = mysql_query( $sql, $conn );

            if (!$retval) {
                die('Could not update data: ' . mysql_error());
            }
            echo "Updated data successfully\n";
            $conn->close();
            // mysql_close($conn);
            header("Location: http://localhost/aplicaciones/public/select.php");
            die();
        } else {
            ?>
            </br>
            </br>
            </br>
            </br>
            </br>

            <form method = "post" action = "<?php $_PHP_SELF ?>">

                <div class="form-group" >
                    <label for="emp_id">ID:</label>
                    <input type="text" class="form-control" name="emp_id"  id = "emp_id" />
                </div>

                <div class="form-group" >
                    <label for="emp_id">Cantidad BTC:</label>
                    <input type="text" class="form-control" name="emp_salary"  id = "emp_salary"/>
                </div>

                <div>
                    <button type="submit" name="update" id="update" value="update" class="btn btn-primary">Registrarme</button>
                </div>
            </form>
            <?php
        }
        ?>



    </body>
</html>