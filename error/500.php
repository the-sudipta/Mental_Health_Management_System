<?php

global $routes;
require '../routes.php';
require '../utils/system_functions.php';


$not_error = $routes['INDEX'];
$go_back = $routes['login'];
$error_message = "";
if (isset($_GET['error_message'])) {
    // Retrieve and display the error message
    $error_message = $_GET['error_message'];

} else {

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
    <link rel="stylesheet" href="style.css">

    <style type="text/css">
        body,
        html {
            padding: 0;
            margin: 0;
            font-family: 'Quicksand', sans-serif;
            font-weight: 400;
            overflow: hidden;
        }

        .writing {
            width: 320px;
            height: 200px;
            background-color: #3f3f3f;
            border: 1px solid #bbbbbb;
            border-radius: 6px 6px 4px 4px;
            position: relative;
        }

        .writing .topbar {
            position: absolute;
            width: 100%;
            height: 12px;
            background-color: #f1f1f1;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }

        .writing .topbar div {
            height: 6px;
            width: 6px;
            border-radius: 50%;
            margin: 3px;
            float: left;
        }

        .writing .topbar div.green {
            background-color: #60d060;
        }

        .writing .topbar div.red {
            background-color: red;
        }

        .writing .topbar div.yellow {
            background-color: #e6c015;
        }

        .writing .code {
            padding: 15px;
        }

        .writing .code ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .writing .code ul li {
            background-color: #9e9e9e;
            width: 0;
            height: 7px;
            border-radius: 6px;
            margin: 10px 0;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            width: 100%;
            transition: transform .5s;
        }

        .stack-container {
            position: relative;
            width: 420px;
            height: 210px;
            transition: width 1s, height 1s;
        }

        .pokeup {
            transition: all .3s ease;
        }

        .pokeup:hover {
            transform: translateY(-10px);
            transition: .3s ease;
        }

        .error {
            width: 400px;
            padding: 40px;
            text-align: center;
        }

        .error h1 {
            font-size: 125px;
            padding: 0;
            margin: 0;
            font-weight: 700;
        }

        .error h2 {
            margin: -30px 0 0 0;
            padding: 0px;
            font-size: 47px;
            letter-spacing: 12px;
        }

        .perspec {
            perspective: 1000px;
        }

        .writeLine {
            animation: writeLine .4s linear forwards;
        }

        .explode {
            animation: explode .5s ease-in-out forwards;
        }

        .card {
            animation: tiltcard .5s ease-in-out 1s forwards;
            position: absolute;
        }

        @keyframes tiltcard {
            0% {
                transform: rotateY(0deg);
            }

            100% {
                transform: rotateY(-30deg);
            }
        }

        @keyframes explode {
            0% {
                transform: translate(0, 0) scale(1);
            }

            100% {
                transform: translate(var(--spreaddist), var(--vertdist)) scale(var(--scaledist));
            }
        }

        @keyframes writeLine {
            0% {
                width: 0;
            }

            100% {
                width: var(--linelength);
            }
        }

        @media screen and (max-width: 1000px) {
            .container {
                transform: scale(.85);
            }
        }

        @media screen and (max-width: 850px) {
            .container {
                transform: scale(.75);
            }
        }

        @media screen and (max-width: 775px) {
            .container {
                flex-wrap: wrap-reverse;
                align-items: inherit;
            }
        }

        @media screen and (max-width: 370px) {
            .container {
                transform: scale(.6);
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="error">
        <h1>500</h1>
        <h2>error</h2>
        <h4 style="color: #dc3545"><?php echo $error_message; ?></h4>

        <p>Ruh-roh, something just isn't right... Time to paw through your logs and get down and dirty in your stack-trace;)</p>
        <a href="<?php echo $go_back; ?>"
           class="btn btn-primary"
           style="background-color: #007bff; color: white; padding: 10px 20px; border-radius: 5px; text-align: center; text-decoration: none;">
            Return Home
        </a>
    </div>
    <div class="stack-container">
        <div class="card-container">
            <div class="perspec" style="--spreaddist: 125px; --scaledist: .75; --vertdist: -25px;">
                <div class="card">
                    <div class="writing">
                        <div class="topbar">
                            <div class="red"></div>
                            <div class="yellow"></div>
                            <div class="green"></div>
                        </div>
                        <div class="code">
                            <ul></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-container">
            <div class="perspec" style="--spreaddist: 100px; --scaledist: .8; --vertdist: -20px;">
                <div class="card">
                    <div class="writing">
                        <div class="topbar">
                            <div class="red"></div>
                            <div class="yellow"></div>
                            <div class="green"></div>
                        </div>
                        <div class="code">
                            <ul></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-container">
            <div class="perspec" style="--spreaddist:75px; --scaledist: .85; --vertdist: -15px;">
                <div class="card">
                    <div class="writing">
                        <div class="topbar">
                            <div class="red"></div>
                            <div class="yellow"></div>
                            <div class="green"></div>
                        </div>
                        <div class="code">
                            <ul></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-container">
            <div class="perspec" style="--spreaddist: 50px; --scaledist: .9; --vertdist: -10px;">
                <div class="card">
                    <div class="writing">
                        <div class="topbar">
                            <div class="red"></div>
                            <div class="yellow"></div>
                            <div class="green"></div>
                        </div>
                        <div class="code">
                            <ul></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-container">
            <div class="perspec" style="--spreaddist: 25px; --scaledist: .95; --vertdist: -5px;">
                <div class="card">
                    <div class="writing">
                        <div class="topbar">
                            <div class="red"></div>
                            <div class="yellow"></div>
                            <div class="green"></div>
                        </div>
                        <div class="code">
                            <ul></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-container">
            <div class="perspec" style="--spreaddist: 0px; --scaledist: 1; --vertdist: 0px;">
                <div class="card">
                    <div class="writing">
                        <div class="topbar">
                            <div class="red"></div>
                            <div class="yellow"></div>
                            <div class="green"></div>
                        </div>
                        <div class="code">
                            <ul></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        const stackContainer = document.querySelector('.stack-container');
        const cardNodes = document.querySelectorAll('.card-container');
        const perspecNodes = document.querySelectorAll('.perspec');
        const perspec = document.querySelector('.perspec');
        const card = document.querySelector('.card');

        let counter = stackContainer.children.length;

        function randomIntFromInterval(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        }

        card.addEventListener('animationend', function () {
            perspecNodes.forEach(function (elem) {
                elem.classList.add('explode');
            });
        });

        perspec.addEventListener('animationend', function (e) {
            if (e.animationName === 'explode') {
                cardNodes.forEach(function (elem) {
                    elem.classList.add('pokeup');

                    elem.addEventListener('click', function () {
                        let updown = [800, -800]
                        let randomY = updown[Math.floor(Math.random() * updown.length)];
                        let randomX = Math.floor(Math.random() * 1000) - 1000;
                        elem.style.transform = `translate(${randomX}px, ${randomY}px) rotate(-540deg)`;
                        elem.style.transition = "transform 1s ease, opacity 2s";
                        elem.style.opacity = "0";
                        counter--;
                        if (counter === 0) {
                            stackContainer.style.width = "0";
                            stackContainer.style.height = "0";
                        }
                    });

                    let numLines = randomIntFromInterval(5, 10);

                    for (let index = 0; index < numLines; index++) {
                        let lineLength = randomIntFromInterval(25, 97);
                        var node = document.createElement("li");
                        node.classList.add('node-' + index);
                        elem.querySelector('.code ul').appendChild(node).setAttribute('style', '--linelength: ' + lineLength + '%;');

                        if (index == 0) {
                            elem.querySelector('.code ul .node-' + index).classList.add('writeLine');
                        } else {
                            elem.querySelector('.code ul .node-' + (index - 1)).addEventListener('animationend', function () {
                                elem.querySelector('.code ul .node-' + index).classList.add('writeLine');
                            });
                        }
                    }
                });
            }
        });
    });
</script>
</body>
</html>

