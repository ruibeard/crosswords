<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Digital Marmelade</title>
   <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="mx-auto max-w-screen-xl">

<div class="text-4xl "><?= $title ?></div>
<main class="mx-auto ">
   <!--   //The square is not black and is on the top or left of the grid.-->
   <!--   //The square is not black but has a black square above or to the left of it.-->
    <?php
    $hint = 0;
    for ($r = 0; $r < $height; $r++) {
        echo '<div class="flex text-center justify-center ">';
        for ($c = 0; $c < $width; $c++) {
            $current_square = $squares[$r * $width + $c];

            $isBlack        = $current_square === '+';
            $isTop          = $r === 0;
            $isLeft         = $c === 0;
            $isTopLeft      = $isTop || $isLeft;
            $isTopLeftBlack = $isTopLeft && $isBlack;


            if ($current_square === '+') {
                echo '<div class="w-8 h-8 bg-black">';
                echo '</div > ';
            } else {
                echo '<div class="w-8 h-8 border border-black flex items-center">';
                if (($isTopLeft && !$isBlack)) {
                    $hint++;
                    echo "<p class=\"text-red-500 text-xs sup\">".$hint." </p> ";
                    echo "<p class=\"\">$current_square</p>";
                } elseif (($squares[($r - 1) * $width + $c] === '+') || ($squares[$r * $width + $c - 1] === '+')) {
                    $hint++;
                    echo "<p class=\"text-red-500 text-xs sup\">".$hint." </p> ";
                    echo "<p class=\"\">$current_square</p>";
                } else {
                    echo "<p class=\"\">$current_square</p>";
                }
                echo ' </div > ';
            }
        }
        echo '</div > ';
    }
    ?>

   <div class="">

       <?php

       foreach ($clues as $clue) {
           $clue_separated = explode('|', $clue);
           echo ' <div class="flex justify-between flex-col">';
           echo '<div class="w-1/2">'.$temp = $clue_separated[2] ?? null.'</div>';
           echo '</div > ';
       }
       ?>

   </div>
</main>

</body>
</html>