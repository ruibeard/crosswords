# PHP coding test

Read in a crossword from the supplied text file and print out grid and clues.

## Instructions

The supplied text file contains the definition of a crossword puzzle. The file format is described below. The objective 
of this test is to write a command line script to read the file, process the data and print out the crossword:

* Read in the contents of the file and process the data to an appropriate data structure.
* Print the crossword title and byline
* Print the empty crossword grid (you can use "#" for black squares and " " for blank ones).
* Print the completed grid.
* Print the lists of across and down clues together with the clue formats and solution words. 

## File format
 
 The crossword text file format has 4 lines:
 
1.  Width of the grid and height of the grid (in boxes) separated by the pipe character.
 
2. Answer letters, row by row with a plus sign for a black square, all strung together in a single string (so for this
   15 x 15 puzzle it's a string of 225 characters).
 
3. Clues, both Across and Down, by number, in the format: clue number; pipe character;   Across clue (left blank if the
   number is only used for a Down clue); pipe character; Down clue (left blank if the number is only used for an Across
   clue); pipe character.
 
4. Title and byline, separated by the pipe character.
 
This crossword format is a bit restrictive in that it does not explicitly give the square where a clue starts (i.e. the 
clue number square). This has to be inferred from the squares around it, i.e. a square is a clue number square if one of
the following conditions is met:

 1) The square is not black and is on the top or left of the grid.
 2) The square is not black but has a black square above or to the left of it.

Clues are numbered sequentially from 1 going from top left to bottom right of the grid, left to right and top to bottom.
The clue number squares need to be identified so that the answer words can be matched to the clues.
