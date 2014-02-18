<!doctype html>
<html>
    <head>
        <title>DVD Search</title>
    </head>
    <body>
    <form method ="get" action="/results">
        <div align='center'>
        Movie Title:
        <input  type= "text" name="title"/>
        </div>
        <div align='center'>
            <select name = "ratings">
                <?php
                foreach($ratings as $line){
                    echo '<option value='.$line->id.'>'.$line->rating_name.'</option>';
                }
                $i = -1;
                echo '<option value='.$i.'>'."ALL".'</option>';
                ?>
            </select>
        </div>

        <div align='center'>
            <select name = "genres">
                <?php
                foreach($genres as $line){
                    echo '<option value='.$line->id.'>'.$line->genre_name.'</option>';
                }
                $i = -1;
                echo '<option value='.$i.'>'."ALL".'</option>';
            ?>
            </select>
        </div>

        <div align='center'>
            <input type = "submit" value = "Search"/>
        </div>
    </form>

    </body>

</html>