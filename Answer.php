<?php

class Answer
{
    private $_game;
    private $_colors = [];

    public function __construct(GameInterface $game)
    {
        $this->_game = $game;      
    }

    public function addColor($color)
    {
        if (count($this->_colors) > $this->_game->getColumnCount()) {
            throw new \Exception("You can only provided as much colors as columns.");
        }

        $this->_colors[] = $color;
    }

    public function addColors(array $colors)
    {
        foreach ($colors as $color) {
            $this->addColor($color);
        }
    }

    public function getColors()
    {
        return $this->_colors;
    }
}