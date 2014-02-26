<html>
    <head>
        <title>DVD Add</title>
    </head>
    <body>

    <?php
    if(Session::has('success')): ?>
    <div align = "center" style="background-color:green;width:300px;height:25px;border:1px solid #000">
        <font font color="white">
        <?php
        echo Session::get('success');
        endif; ?>
        </font>
    </div>

    <form method ="post" action="/dvds">
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
    <input type = "submit" value = "Add Movie"/>
</div>
</form>

</body>


</html>