<?php

require 'CrossWord.php';

$lines = file('crossword-20121008-0001.txt');

//Width of the grid and height of the grid (in boxes) separated by the pipe character.
[$width, $height] = explode('|', $lines[0]);

//Answer letters, row by row with a plus sign for a black square, all strung together in a single string (so for this 15 x 15 puzzle it's a string of 225 characters).
$squares = $lines[1];

// Clues
$clues = $lines[2];

//Title and byline
$title = $lines[3];

//$cw = new Crossword(title: $title, clues: $clues, squares: $squares, width: $width, height: $height);

/**
 * regular expression to match the clues https://regex101.com/r/2PWNtX/1
 * Format:
 * clue number;
 * pipe character;
 * Across clue (left blank if the number is only used for a Down clue);
 * pipe character;
 * Down clue (left blank if the number is only used for an Across clue);
 * pipe character.
 **/
$clues = preg_split('/(\d\d?\|.*?\|.*?\|)/', $clues, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

require_once 'index.view.php';
