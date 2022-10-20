<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Digital Marmelade - Rui Almeida</title>
   <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="mx-auto max-w-screen-2xl">

<div class="text-4xl text-center py-10 "><?= $title ?></div>

<main class=" flex space-between border p-4">
   <div class="flex flex-col">

       <?php
       $hint = 0;
       for ($r = 0; $r < $height; $r++) {
           echo '<div class="flex ">';
           for ($c = 0; $c < $width; $c++) {
               $current_square = $squares[$r * $width + $c];

               $isBlack        = $current_square === '+';
               $isTop          = $r === 0;
               $isLeft         = $c === 0;
               $isTopLeft      = $isTop || $isLeft;
               $isTopLeftBlack = $isTopLeft && $isBlack;


               if ($current_square === '+') {
                   echo '<div class="w-12 h-12 bg-[#314047]"></div> ';
               } else {
                   echo '<div class="w-12 h-12 border border-black flex items-center justify-center text-center relative ">';
                   //
                   //  The square is not black and is on the top or left of the grid.
                   if (($isTopLeft && !$isBlack)) {
                       $hint++;
                       echo "<p class=\"text-red-500 text-xs absolute bottom-0 right-1 \">".$hint." </p> ";
                       echo "<p class=\"\">$current_square</p>";
                   } // The square is not black but has a black square above or to the left of it.
                   elseif (($squares[($r - 1) * $width + $c] === '+') || ($squares[$r * $width + $c - 1] === '+')) {
                       $hint++;
                       echo "<p class=\"text-red-500 text-xs absolute bottom-0 right-1 \">".$hint." </p> ";
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
   </div>

   <div class="flex p-8">
      <div class="">
          <?php
          foreach ($across as $k => $hint) {
              echo '<div class="">'.$k.": ".$hint.'</div>';
          }
          ?>

      </div>
      <div class="">
          <?php
          foreach ($down as $k => $hint) {
              echo '<div class="">'.$k.": ".$hint.'</div>';
          }
          ?>

      </div>
   </div>
</main>

</body>
</html>