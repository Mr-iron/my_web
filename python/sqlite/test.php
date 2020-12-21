<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <?php
    echo "2";

    $db = new SQLite3('/home/pi/my_web/sqlite/test.db');

    $results = $db->query('SELECT * FROM COMPANY');
    while ($row = $results->fetchArray()) {
        var_dump($row);
    }

    // class MyDB extends SQLite3
    // {
    //     function __construct()
    //     {
    //         try {
    //             $this->open('/home/pi/my_web/sqlite/test.db');
    //         } catch (Exception $e) {
    //             echo $e;
    //         }
    //     }
    // }
    // $db = new MyDB();
    // echo "2";
    // if (!$db) {
    //     echo $db->lastErrorMsg();
    // } else {
    //     echo "Opened database successfully\n";
    // }
    // echo "3";
    // $sql = "select * from company";


    // $ret = $db->exec($sql);
    // echo "4";
    // if (!$ret) {
    //     echo $db->lastErrorMsg();
    // } else {
    //     echo "Table created successfully\n";
    // }
    // $db->close();
    ?>

</body>

</html>