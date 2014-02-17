<!doctype html>
<html>
    <head>
        <title>DVD Search</title>
    </head>
    <body>
    <form method ="get" action="results.php">
        Movie Title:
        <input type= "text" name="title"/>
        <div>
            <?php
            echo '<select name = "ratings">';
                foreach($ratings as $line){

                echo '<option value='.$i.'">'.$line.'</option>';
                $i ++;
                }
            ?>
        </div>
        <div>
            <?php
            echo '<select name = "genres">';
            foreach($genres as $line){

                echo '<option value='.$i.'">'.$line.'</option>';
                $i ++;
            }
            ?>
        </div>
        <div>
            <input type = "submit" value = "Search"/>
        </div>
    </form>

    </body>

</html>