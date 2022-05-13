<?php
$f = fopen("./data.csv", "r");
$data = [];

while (($row = fgetcsv($f)) !== false) {
    $data[] = $row;
}

fclose($f);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Survey results</title>
</head>
<style>
    body {
        background: rgb(238, 174, 202);
        background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
        font-family: Verdana;
        text-align: center;
    }

    button {
        background-color: rgba(148, 187, 233, 1);
        border: 1px solid #777;
        border-radius: 2px;
        font-family: inherit;
        font-size: 21px;
        display: block;
        width: 100%;
        margin-top: 50px;
        margin-bottom: 20px;
    }

    .container {
        background-color: #fff;
        max-width: 500px;
        margin: 50px auto;
        padding: 30px 20px;
        box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.5);
    }
</style>

<body>
    <h1>Your results from the survey here!</h1>
    <!--Need to figure out how to pull data from survey and display it on this page-->

    <div class="container">
        <?php
            foreach ($data as $response_array) {
                echo "<h3>{$response_array[1]}'s reponse:</h3>";
                foreach ($response_array as $index => $item) {
                    if ($item == "age") {
                        echo "Age: {$response_array[$index + 1]}";
                    }

                    if ($item == "sport_level") {
                        if ($response_array[$index + 1] == "Other") {
                            echo "<br>Sport level: {$response_array[$index + 3]}";
                        } else {
                            echo "<br>Sport level: {$response_array[$index + 1]}";
                        }

                    }

                    if ($item == "SFR") {
                        if ($response_array[$index + 1] == "SFYes") {
                            echo "<br>Friend plays: {$response_array[$index + 3]}";
                        } else {
                            echo "<br>Friend doesn't play a sport";
                        }
                    }


                    if ($item == "sport_list") {
                        $iter = 1;
                        echo "<br>Sports played:";
                        while (true) {
                            if ($response_array[$index + $iter] == "ENDOFSPORTS") {
                                break;
                            }
                            if ($iter == 1) {
                                echo " {$response_array[$index + $iter]}";
                            } else {
                                echo ", {$response_array[$index + $iter]}";
                            }
                            
                            $iter = $iter + 1; 
                        }
                        $sport_list = 1;
                    }

                    if ($item == "ESTL") {
                        if ($response_array[$index + 1] == "") {
                            // pass
                        } else {
                            if ($response_array[$index - 1] == "ENDOFSPORTS") {
                                echo ", {$response_array[$index + 1]}";

                            } else {
                                echo "<br>Sports played: {$response_array[$index + 1]}";
                            }
                        }
                    }
                    if ($item == "comment") {
                        if ($response_array[$index + 1] == "") {
                            
                        } else {
                            echo "<br>User's comment: {$response_array[$index +1]}";
                        }
                    }
                }
            }
        ?>
    </div>
</body>

</html>