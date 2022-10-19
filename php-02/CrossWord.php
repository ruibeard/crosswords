<?php

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
}