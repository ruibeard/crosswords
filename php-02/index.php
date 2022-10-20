<?php


//TODO: Improve and use CrossWord.php class

require 'CrossWord.php';
//$cw = new Crossword(title: $title, clues: $clues, squares: $squares, width: $width, height: $height);


$lines = file('crossword-20121008-0001.txt');

//Width of the grid and height of the grid (in boxes) separated by the pipe character.
[$width, $height] = explode('|', $lines[0]);

//Answer letters, row by row with a plus sign for a black square, all strung together in a single string (so for this 15 x 15 puzzle it's a string of 225 characters).
$squares = $lines[1];

// Clues
$clues = $lines[2];

//Title and byline
$title = $lines[3];


/**
 * regular expression to match the clues https://regex101.com/r/2PWNtX/1
 * Format:
 * clue number;
 * pipe character;
 * Across clue (left blank if the number is only used for a Down clue);
 * pipe character;
 * Down clue (left blank if the number is only used for an Across clue);
 * pipe character.
 *
 * Splits clues line into an array like below:
 * 1|Dudley's "Arthur" co-star|Croft of video games|
 * or
 * 2||Borodin prince|
 * or
 * 69|Chapeau site||
 * */
$clues = preg_split('/(\d\d?\|.*?\|.*?\|)/', $clues, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);


$across = [];
$down   = [];
// Loops throught all the clues
//Splits them into:
//across and down arrays.

foreach ($clues as $clue) {
    $clue_separated = explode('|', $clue);
    $clue_number    = $clue_separated[0];
    // across clue
    if (!empty($clue_separated[1])) {
        $across[$clue_number] = $clue_separated[1];
    }
    // down clue
    if (!empty($clue_separated[2])) {
        $down[$clue_number] = $clue_separated[2];
    }
}

require_once 'index.view.php';
