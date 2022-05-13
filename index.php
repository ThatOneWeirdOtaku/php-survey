<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        What type of sports do you do?
    </title>

    <!--Background colors & etc-->
    <style>
        body {
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
            font-family: Verdana;
            text-align: center;
        }

        form {
            background-color: #fff;
            max-width: 500px;
            margin: 50px auto;
            padding: 30px 20px;
            box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.5);
        }

        .form-control {
            text-align: left;
            margin-bottom: 25px;
        }

        .form-control label {
            display: block;
            margin-bottom: 10px;
        }

        .form-control input,
        .form-control select,
        .form-control textarea {
            border: 1px solid #777;
            border-radius: 2px;
            font-family: inherit;
            padding: 10px;
            display: block;
            width: 95%;
        }

        .form-control input[type="radio"],
        .form-control input[type="checkbox"] {
            display: inline-block;
            width: auto;
        }


        a {
            padding: 10px;
            margin-top: 10px;
            font-size: 10px;
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

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1>CS Survey Form</h1>
    <a href="surveyresults.php">Results</a>
    <h2 id="error" class="error"></h2>

    <form action="surveyhandler.php" id="form" method="post">
        <!--Basic details for data-->
        <div action="handle_form.php" method="get" class="form-control">
            <label for="name" id="label-name">
                Name
            </label>

            <input type="text" name="name" id="name" placeholder="Enter your name" />
        </div>

        <div class="form-control">
            <label for="email" id="label-email">
                Email
            </label>

            <input type="text" name="email" id="email" placeholder="Enter your email" />
        </div>

        <div class="form-control">
            <label for="age" id="label-age">
                Age
            </label>

            <input type="text" name="age" id="age" placeholder="Enter your age" />
        </div>
        <!--Asking participant what level they play sports at-->
        <div class="form-control">
            <label for="role" id="label-role">
                What level do you play at?
            </label>
            <select name="sport_level" id="sport_level">
                <option value="I don't play">I don't play sports</option>
                <option value="Highschool"> Highschool</option>
                <option value="College">College</option>
                <option value="Professional">
                    Professional
                </option>
                <option value="Other">Other</option>
            </select>
            <br>
            <!--EOSL 'Enter other sports level'-->
            <label for="sport" id="label-sport level">
                Enter other level.</label>
            <input type="text" name="EOSL" id="EOSL" placeholder="Enter other level" />
        </div>
        <!--Asking participant if their friends play any sports-->
        <div class="form-control">
            <script>
                function ShowHideDiv() {
                    var chkYes = document.getElementById("SFYes");
                    var dvtext = document.getElementById("dvtext");
                    var chkMaybe = document.getElementById("SFMaybe");
                    dvtext.style.display = chkYes.checked ? "block" : "none";
                }
            </script>

            <label>
                Do you have any friends that play sports
            </label>

            <label for="SFYes">
                <input type="radio" id="SFYes" name="SFR" value="SFYes" onclick="ShowHideDiv()">Yes</input>

            </label>

            <label for="SFNo">
                <input type="radio" id="SFNo" name="SFR" value="SFno" onclick="ShowHideDiv()">No</input>

            </label>

            <label for="SFMaybe">
                <input type="radio" id="SFMaybe" name="SFR" value="SFMaybe" onclick="ShowHideDiv()">Maybe</input>

                <div id="dvtext" style="display: none;">
                    <br>What sport do they play?
                    <input type="text" id="txtbox" name="SFT">
                </div>
        </div>
        </label>
        <br>
        <!--SYFP 'Sport that your friend plays'<label for="sport" id="label-Sport that you're friend plays">
            If so what sport that you're friend play?.</label>
                     <input type="text"
                    id="SYFP"
                    placeholder="Enter what sport does your friend play"/>-->

        </div>


        <!--Check list for kinds of sports participant does-->
        <div class="form-control">
            <label>What sports do you play?
                <small>(Check all that apply)</small>
            </label>

            <label for="inp-1">
                <input type="checkbox" value="Soccer" name="sport_list[]">Soccer</input></label>
            <label for="inp-2">
                <input type="checkbox" value="Football" name="sport_list[]">Football</input></label>
            <label for="inp-3">
                <input type="checkbox" value="Cross country" name="sport_list[]">Cross country</input></label>
            <label for="inp-4">
                <input type="checkbox" value="track" name="sport_list[]">Track</input></label>
            <label for="inp-5">
                <input type="checkbox" value="Swiming" name="sport_list[]">Swiming</input></label>
            <label for="inp-6">
                <input type="checkbox" value="Rugby" name="sport_list[]">Rugby</input></label>
            <label for="inp-7">
                <input type="checkbox" value="Boxing" name="sport_list[]">Boxing</input></label>
            <label for="inp-7">
                <input type="checkbox" value="Hockey" name="sport_list[]">Hockey</input></label>
            <label for="inp-7">
                <input type="checkbox" value="Tennis" name="sport_list[]">Tennis</input></label>
            <label for="inp-7">
                <input type="checkbox" value="Volleyball" name="sport_list[]">Volleyball</input></label>
            <!--SNOL 'Sport not on list'-->
            <label for="sport" name="SOther" id="label-sport not on list">
                Sport that you play that's not on the list.</label>
            <input type="text" id="SNOL" name="ESTL" placeholder="Enter sport you play that's not on list" />

        </div>
        <!--Comment/suggestion box-->
        <div class="form-control">
            <label for="comment">
                Any comments or suggestions?
            </label>

            <textarea name="comment" id="comment" placeholder="Enter your comment here"></textarea>
        </div>
        <!--Submit button-->
        <button type="submit" value="submit">
            Submit
        </button>
    </form>
    <script>
        // https://stackoverflow.com/questions/901115/how-can-i-get-query-string-values-in-javascript
        function getParameterByName(name, url = window.location.href) {
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
        const error = document.getElementById("error");
        var errortext = getParameterByName("error");
        if (!errortext == "" || null) {
            error.innerText = errortext;
        }
    </script>
</body>
</html>