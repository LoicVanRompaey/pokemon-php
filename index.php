<?php
$requestID = $_POST['pokemon-id'];
$file = file_get_contents("https://pokeapi.co/api/v2/pokemon/".$requestID);
$pokeInfo = json_decode($file, true);
$name = $pokeInfo["name"];
$id = $pokeInfo["id"];
$type = $pokeInfo[types][0][type][name];
$height = $pokeInfo["height"];
$weight = $pokeInfo["weight"];
$movesArray = [];
$sprite = $pokeInfo[sprites][front_default];

$evolution = $pokeInfo[species][url];
$evolutionfile = file_get_contents($evolution);
$evolutionInfo = json_decode($evolutionfile, true);

$previousName = $evolutionInfo[evolves_from_species][name];

$previousForm = $evolutionInfo[evolves_from_species][url];
$previousFormFile = file_get_contents($previousForm, true);
$previousFormData = json_decode($previousFormFile);

$previousSprite = $previousFormData->varieties[0]->pokemon->url;
$previousSpriteFile = file_get_contents($previousSprite);
$previousSpriteData = json_decode($previousSpriteFile);

$previousSpriteImage = $previousSpriteData->sprites->front_default;


for ($movecounter = 0; $movecounter < 4; $movecounter++) {
    $moves = $pokeInfo[moves][$movecounter][move][name];
    array_push($movesArray, $moves);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="http://cdn0.iconfinder.com/data/icons/pokemon-go-vol-2/135/_Pokedex_tool-512.png">


</head>
<body>

<div id="pokedex">
    <div id="left">
        <div id="logo"></div>
        <div id="bg_curve1_left">


        </div>


        <div id="bg_curve2_left"></div>
        <div id="curve1_left">
            <div id="buttonGlass">
                <div id="reflect"></div>
            </div>

            <div id="miniButtonGlass1"></div>
            <div id="miniButtonGlass2"></div>
            <div id="miniButtonGlass3"></div>

            <h1 class="title"> Pokémon </h1>

        </div>
        <div id="curve2_left">
            <div id="junction">
                <div id="junction1"></div>
                <div id="junction2">

                </div>
            </div>
        </div>
        <div id="screen">
            <div id="topPicture">
                <div id="buttontopPicture1"></div>
                <div id="buttontopPicture2"></div>
            </div>
            <div id="picture">
                <img class="rounded" id="img-pokemon"
                     src="<?php echo $sprite ?>"
                     alt="psykokwak" height="160" width="235"/>
            </div>
            <div id="buttonbottomPicture"></div>
            <div id="speakers">
                <div class="sp"></div>
                <div class="sp"></div>
                <div class="sp"></div>
                <div class="sp"></div>
            </div>
        </div>
        <div id="bigbluebutton"><span class="col text-center" id="playicon"> ► </span></div>
        <div id="barbutton1"></div>
        <div id="barbutton2"></div>
        <div id="cross">
            <div id="leftcross">
                <div id="leftT"></div>
            </div>
            <div id="topcross">
                <div id="upT"></div>
            </div>
            <div id="rightcross">
                <div id="rightT"></div>
            </div>
            <div id="midcross">
                <div id="midCircle"></div>
            </div>
            <div id="botcross">
                <div id="downT"></div>
            </div>
        </div>
    </div>
    <div id="right">


        <div id="stats">


            <section>
                <ul class="list-unstyled">
                    <li><span class="font-weight-bold">ID:</span> <?php echo $id ?> </li>
                    <li><span class="font-weight-bold">Name:</span> <?php echo $name ?> </li>
                    <li><span class="font-weight-bold">Type:</span> <?php echo $type ?> </li>
                    <li><span class="font-weight-bold">Height:</span> <?php echo $height ?> </li>
                    <li><span class="font-weight-bold">Weight:</span> <?php echo $weight ?> </li>


                </ul>
            </section>
        </div>
        <div class="text-center text-white" id="blueButtons1">
            <div class="blueButton"> <?php echo $movesArray[0] ?></div>
            <div class="blueButton"> <?php echo $movesArray[1] ?></div>

        </div>
        <div class="text-center text-white" id="blueButtons2">
            <div class="blueButton"> <?php echo $movesArray[2] ?></div>
            <div class="blueButton"> <?php echo $movesArray[3] ?></div>

        </div>
        <div id="miniButtonGlass4"></div>
        <div id="miniButtonGlass5"></div>
        <div id="barbutton3"></div>
        <div id="barbutton4"></div>
        <div class="text-center font-weight-bold" id="yellowBox1"> <?php echo $previousName ?></div>
        <div id="yellowBox2"><img class="rounded" id="prev-img" src=" <?php echo $previousSpriteImage ?>" alt="" height="75" width="75"> </div>
        <div id="bg_curve1_right">


        </div>
        <div id="bg_curve2_right"></div>
        <div id="curve1_right"></div>
        <div id="curve2_right">

            <div class="container ">
                <div class="d-flex justify-content-center ">
                    <div class="searchbar">
                        <form method="post" action="index.php">
                            <!-- <input id="user-input" class="search_input" type="text" name="search_text" placeholder="Pokemon name/id">
                             <button type=submit id="btn-search" class="search_icon"><i class="fas fa-search"><img
                                         id="icon-search" src="assets/ball.png" alt="icon-search"> </i></button> -->

                            <input type="text" name="pokemon-id">
                            <input type="submit" value="submit">
                        </form>

                        <?php

                        if (isset($_POST['pokemon-id'])) {
                            $requestID = $_POST['pokemon-id'];
                        } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>
</html>


