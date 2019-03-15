<?php

class Game implements GameInterface
{
    protected $runtime;
    protected $algo;

    public function __construct(Runtime $runtime)
    {
        $this->runtime = $runtime;
        $this->algo = new Algo();
    }
    
    public function providerAnswer($step)
    {
        $answer = $this->algo->output($step, $this);
        
        $input = new Input($answer, $this, $this->runtime);

        $IOInput = $this->algo->input($step, $input);

        $this->_answerSolution = $answer->getColors();

        return implode(" | ", $answer->getColors());
    }

    private $_answerSolution = [];

    public function getAnswerSolution() : array
    {
        return $this->_answerSolution;
    }

    public function getColors() : array
    {
        return $this->runtime->colors;
    }

    public function getColorsCount()
    {
        return count($this->runtime->colors);
    }

    public function getColumnCount()
    {
        return $this->runtime->columns;
    }

    public function getRandomColor()
    {
        $key = array_rand($this->getColors());

        return $this->getColors()[$key];
    }
    
    public function eachColumn(callable $fn) {
        for($i = 1; $i <= $this->getColumnCount(); $i++) {
            call_user_func($fn, $i);
        }
    }
}