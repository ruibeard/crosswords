<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'LatinSquare.php';

use Puzzles\Generate\LatinSquare;

$testExistingLatinSquares = true;

if ($testExistingLatinSquares) {
    // Test if given Latin squares are valid or invalid
    $latinSquares = [
        // VALID
        '1',
        '2112',
        '213132321',
        '1423314242312314',
        '2413513542453213125452413',
        '612534541623453162326415264351135246',
        '6751324214567335621475237416431675274235611674235',
        '7265831418237546268451736137248557124638457638213458126783416752',
        '523176948981735264437962815759324681678543129195687432864291753216458397342819576',

        // INVALID
        '2',
        '2121',
        '213132312',
        '1423312442312314',
        '2413513542453213125452431',
        '612534541623453162324615264351135246',
        '6751324214567335621475237416431675247235611674235',
        '7265831418237546268451736137248557124638456738213458126783416752',
        '523176948981735264437962815759324681678543129195687432864291753216458397342819567',
    ];

    foreach ($latinSquares as $squareData) {
        LatinSquare::use($squareData)
            ->print(true);
    }
} else {
    try {
        // Generate a Latin square
        $size = 5;
        $latinSquare = LatinSquare::generate($size)
            ->print(true);
        //echo $latinSquare->asString() . "\n";
    } catch (Exception $e) {
        echo $e->getMessage() . "\n";
    }
}
