<?php

// Class to store the crossword puzzle
//Note: I am not using this class yet

class CrossWord
{
    public function __construct(
        public string $title,
        public string $clues,
        public string $squares,
        public int $width,
        public int $height,
    ) {
    }

    public function render(): void
    {
    }

    public function isClueSquare()
    {
        //The square is not black and is on the top or left of the grid.
        for ($r = 0; $r < $this->height; $r++) {
            for ($c = 0; $c < $this->width; $c++) {
                $current_square_value = $this->squares[$r * $this->width + $c];
                $isTopLeft            = $this->isTopOrLeft($r, $c);
                $isBlackSquare        = $this->isSquareBlack($r * $this->width + $c);

                if (($isTopLeft && !$isBlackSquare)) {
                    return true;
                } // The square is not black but has a black square above or to the left of it.
                elseif (($this->squares[($r - 1) * $this->width + $c] === '+') || ($this->squares[$r * $this->width + $c - 1] === '+')) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        return false;
    }

    public function isSquareBlack(int $position): bool
    {
        return $this->squares[$position] === '+';
    }

    public function isTopOrLeft(int $r, int $c): bool
    {
        $isTop  = $r === 0;
        $isLeft = $c === 0;

        return $isTop || $isLeft;
    }
}