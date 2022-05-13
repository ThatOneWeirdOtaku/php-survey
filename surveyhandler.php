<?php
function error($error)
{
    header("Location: index.php?error={$error}");
    exit;
}

function validation()
{
    if (!$_SERVER["REQUEST_METHOD"] == "POST") {
        error("Server error: Wrong request method");
    }
    if (empty($_POST["name"])) {
        error("Please fill in your name");
    }
    if (empty($_POST["email"])) {
        error("Please fill in your email");
    }
    if (empty($_POST["age"])) {
        error("Please input your age");
    }
    if (empty($_POST["sport_level"])) {
        error("Malformed request");
    }
    if (empty($_POST["EOSL"])) {
        if ($_POST["sport_level"] == "Other") {
            error("Please input sport level");
        }
    }
    if (empty($_POST["SFR"])) {
        error("Enter friend's sport status");
    }
    if ($_POST["SFR"] == "SFYes") {
        if (empty($_POST["SFT"])) {
            error("Please input friend's sport status");
        }
    }
    if (empty($_POST["sport_list"])) {
        if (empty($_POST["ESTL"])) {
            error("Please select a sport");
        }
    }
}

function santatize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function saving()
{
    $data_array = [];
    foreach ($_POST as $key => $val) {
        if (is_array($val)) {
            array_push($data_array, $key);
            foreach ($val as $thing) {
                array_push($data_array, santatize($thing));
            }
            array_push($data_array, "ENDOFSPORTS");
        } else {
            array_push($data_array, $key, santatize($val));
        }
    }
    $f = fopen("data.csv", "a");
    if ($f == false) {
        error("Data could not be written");
    }
    fputcsv($f, $data_array);
    fclose($f);
}

function main()
{
    $name = $email = $age = $sport_level = $EOSL = $check_res =  "";
    $form_data = $_POST;
    validation(); // checks if data is valid, if not, error & exit.
    saving();
    header("Location: surveyresults.php");
}
main();
