<?php

class Algo implements AlgoInterface
{
    private $_stack;

    private $_colorRating = [];

    private function addStack($turn, array $colors)
    {
        $this->_stack[$turn] = $colors;
    }

    public function getStack($turn)
    {
        return $this->_stack[$turn];
    }

    public function output($turn, GameInterface $game) : Answer
    {
        // turn variables
        $gameColors = $game->getColors();
        $turnsTakingColors = ceil($game->getColorsCount() / $game->getColumnCount());
        $pickColorRange = range(1, $turnsTakingColors);
        $colors = [];

        if (in_array($turn, $pickColorRange)) {
            // take the first turns to genearte the arrays with the colors
            $offset = ($turn * $game->getColumnCount()) - $game->getColumnCount();
            $colors = array_slice($gameColors, $offset, $game->getColumnCount());

            // if less colors are picked then we need, we have to fill up the array with the first
            if (count($colors) < $game->getColumnCount()) {
                $missingCount = $game->getColumnCount() - count($colors);

                // get missing colors from first step
                $first = array_slice($this->getStack(1), 0, $missingCount);
                foreach ($first as $acol) {
                    $colors[] = $acol;
                }

            }
        } else {
            // upcoming actions
            $lastLastStackColors = $this->getStack($turn - 2);
            $lastColor = array_pop($lastLastStackColors);

            $colors = $this->getStack($turn - 1);
            array_unshift($colors, $lastColor);
            array_pop($colors);
        }

        $this->addStack($turn, $colors);

        // post answer object
        $answer = new Answer($game);
        $answer->addColors($colors);
        return $answer;
    }

    public function input($turn, InputInterface $input)
    {
        foreach ($input->getColors() as $color) {
            if (!isset($this->_colorRating[$color])) {
                $this->_colorRating[$color] = 0;
            }
            $this->_colorRating[$color] += $input->rightColorCount();
        }

        if ($turn == 999) {
            var_dump($this->_colorRating);
        }
    }
}