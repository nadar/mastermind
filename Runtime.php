<?php

class Runtime
{
    public $columns;
    public $turns = 1000; // the algo has max amount of turns to find out the solution.
    public $colors = ['red', 'green', 'yellow', 'blue', 'black', 'white', 'orange', 'pink'];

    protected $solution;

    public function setSolution(array $colors)
    {
        $this->columns = count($colors);
        $this->solution = $colors;
    }

    public function getSolution()
    {
        return $this->solution;
    }

    public function run()
    {
        $game = new Game($this);
        
        for ($i = 1; $i < $this->turns; $i++) {
            $game->providerAnswer($i);
            if ($this->getSolution() == $game->getAnswerSolution()) {
                echo "=========================" . PHP_EOL;
                echo "TURN: " . $i . " found the solution!" .  PHP_EOL;
                echo "=========================" . PHP_EOL;
                exit;
            }
        }

        echo "=========================" . PHP_EOL;
        echo "TURN Unable to find the solution after $i turns." .  PHP_EOL;
        echo "=========================" . PHP_EOL;
    }
}