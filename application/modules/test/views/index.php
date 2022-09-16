<?php

$documents['test'] = array(
    array(
        "name" => "Markos",
        "lastname" => "papadopoulos",
        "country" => "Greece",
        "nationality" => "greek",
        "job" => "web developer",
        "hobbies" => array(
            "sports" => "boxing",
            "others" => array(
                "freetime" => "watching Tv"
            )
        )
    ),
    array(
        "name" => array(
            'firstname' => 'Jonard',
            'nickname' => 'nardjo'
        ),
        "lastname" => "Baring",
        "country" => "Philippines",
        "nationality" => "Filipino",
        "job" => "web developer",
        "hobbies" => array(
            "sports" => "Soccer",
            "others" => array(
                "freetime" => "Playing games",
                "other other" => "others"
            )
        )
    ),
); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // print_r($documents);

    function display_multi_level_array($array)
    {
        foreach ($array as $key) {
            if (is_array($key)) {
                display_multi_level_array($key);
                continue;
            }?>

           <p><?= $key ?></p>
             <!-- echo $key . " " . $value . "<br>"; -->
             <?php 
        }
    }

    display_multi_level_array($documents);

    // foreach($documents as $document){
    //     echo $document['name']."<br>".
    //       $document['lastname']."<br>".
    //       $document['country']."<br>".
    //       $document['nationality']."<br>".
    //       $document['job']."<br>".
    //       $document['job']."<br>".
    //       $document['hobbies']['sports']."<br>".
    //       $document['hobbies']['others']['freetime']."<br>";
    //       $document['hobbies']['others']['other other'];
    //   }
    // ?>
</body>

</html>