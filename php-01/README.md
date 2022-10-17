# Latin square coding test

A Latin square is an *n x n* array filled with n different symbols, each occurring exactly once in each row and
exactly once in each column. For the purpose of number puzzles this class can generate them using single digits (1-9) 
based on a given *n* value. An example of a 5 x 5 Latin square is given below:

```
2 4 1 3 5
1 3 5 4 2
4 5 3 2 1
3 1 2 5 4
5 2 4 1 3
```

## Instructions

The sample PHP code includes a simple class [LatinSquare.php](LatinSquare.php) which can generate a random Latin square 
and validate it. It can also take an existing Latin square as input and validate it. It handles squares with the numbers
1-9 as symbols and works with 1 x 1 up to 9 x 9 Latin squares. There is also a test script [test.php](test.php) which uses
the LatinSquare class and can be run from the command line. The test script either generates and prints a valid Latin
square or checks the validity of a supplied array of Latin squares, some of which are valid and some invalid.

The objective of this test is to complete the LatinSquare class:
 
 * Run the test script from the command line and observe that it prints Latin squares and that both the valid and
  invalid squares are marked as *INVALID*.
 * Look at the LatinSquare class and see how it represents the data for the square.
 * Complete the class methods with missing code indicated by the  *TODO* comments which will provide the validation
  functionality.
 * Completing these methods will validate both a generated and a supplied Latin square.
 * If you wish to generate some more valid Latin squares this can be done by altering the test script accordingly. 

As an optional additional task:

 * Look at the methods in the LatinSquare class that are used to generate a random Latin square.
 * Can you see any drawbacks in the way that this algorithm has been implemented?
 * Describe an alternative algorithm and implementation that would remove any drawbacks you have noted. 

## Links
[https://en.wikipedia.org/wiki/Latin_square](https://en.wikipedia.org/wiki/Latin_square)