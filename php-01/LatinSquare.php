<?php

namespace Puzzles\Generate;

use Exception;

/**
 * Class LatinSquare
 * @package Puzzles\Generate
 *
 * A Latin square is an n * n array filled with n different symbols, each occurring exactly once in each row and
 * exactly once in each column (https://en.wikipedia.org/wiki/Latin_square). For the purpose of number puzzles this
 * class can generate them using single digits (1-9) based on the width.
 */
class LatinSquare
{
    protected $gridString = null;
    protected $width = 5;
    protected $height = 5;

    public function isValidDimensions()
    {
        // TODO: Check that the width and height are equal and that they match the length of the grid string
        return false;
    }

    public function isValidRowValues()
    {
        // TODO Check that each row contains numbers in the range 1 to width
        return false;
    }

    public function isValidColValues()
    {
        // TODO: Check that each column contains numbers in the range 1 to height
        return false;
    }

    public function isValid()
    {
        return is_string($this->gridString) &&
            $this->isValidDimensions() &&
            $this->isValidRowValues() &&
            $this->isValidColValues();
    }

    public static function generate($size)
    {
        $instance = new static;

        return $instance->generateLatinSquare($size);
    }

    public static function use(string $gridString)
    {
        $instance = new static;

        return $instance->useGridString($gridString);
    }

    public function asString()
    {
        return $this->gridString;
    }

    public function asArray()
    {
        return array_map(function($row) {return str_split($row); }, str_split($this->gridString, $this->width));
    }

    public function print($checkIsValid = false)
    {
        $str = implode(' ', str_split($this->gridString));
        echo implode("\n", str_split($str, $this->width * 2)). "\n";

        if ($checkIsValid) {
            echo ($this->isValid() ? 'VALID' : 'INVALID') . "\n";
        }
        echo "\n";

        return $this;
    }

    public function generateLatinSquare(int $size)
    {
        // Generate a grid which is a latin square
        $this->setGridSize($size);
        $this->gridString = null;

        $maxRetries = 1000;
        for ($retries = $maxRetries; ($this->gridString === null)  && ($retries > 0); $retries--) {
            $this->gridString = $this->generateGrid();
        }

        return $this;
    }

    public function useGridString(string $gridString)
    {
        $this->gridString = $gridString;
        return $this->setGridSize(intval(sqrt(strlen($this->gridString))));
    }

    private function setGridSize(int $size)
    {
        $this->width = $size;
        $this->height = $this->width;

        if ($this->width > 9) {
            throw new Exception('Unsupported grid size');
        }

        return $this;
    }

    private function getValidCellValueKey(int $row, int $col, array $values)
    {
        $value = $this->gridString[($row * $this->width) + $col];

        return array_search($value, $values);
    }

    private function generateGrid()
    {
        // The values to use in grid cells
        $possibleValues = range(1, $this->width);

        // Generate a grid where each cell has all the possible values
        $grid = array_fill(0, $this->height, array_fill(0, $this->width, $possibleValues));

        // Go over each cell, pick a random value for it and then remove that value from its row and column
        $gridString = str_pad('', $this->width * $this->height);
        for ($row = 0; $row < $this->height; $row++) {
            for ($col = 0; $col < $this->width; $col++) {
                $cell = $grid[$row][$col];

                if (count($cell) > 0) {
                    // Select a value for the cell and set it in the grid
                    $value = $cell[array_rand($cell)];
                    $gridString[($row * $this->width) + $col] = $value;
                    $grid[$row][$col] = null;

                    // Remove this value from the other cells in the same row and column
                    $grid = $this->removeValueFromRowAndCol($grid, $value, $row, $col);
                } else {
                    // Failed to generate a valid grid
                    return null;
                }
            }
        }

        return $gridString;
    }

    private function removeValueFromRowAndCol(array $grid, $value, int $row, int $col)
    {
        for ($removeRow = 0; $removeRow < count($grid); $removeRow++) {
            $grid[$removeRow][$col] = $this->removeValueFromCell($grid[$removeRow][$col], $value);
        }

        for ($removeCol = 0; $removeCol < count($grid[$row]); $removeCol++) {
            $grid[$row][$removeCol] = $this->removeValueFromCell($grid[$row][$removeCol], $value);
        }

        return $grid;
    }

    private function removeValueFromCell($cell, $value)
    {
        if (is_array($cell)) {
            $key = array_search($value, $cell);
            if ($key !== false) {
                unset($cell[$key]);
            }
        }

        return $cell;
    }
}
