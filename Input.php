<?php

class Input implements InputInterface
{
    private $_answer;
    private $_game;
    private $_runtime;
    
    public function __construct(Answer $answer, GameInterface $game, Runtime $runtime)
    {
        $this->_answer = $answer;    
        $this->_game = $game;
        $this->_runtime = $runtime;
    }

    public function rightColorCount() : int
    {
        $picked = $this->_answer->getColors();
        $solution = $this->_runtime->getSolution();

        $count = 0;
        foreach ($picked as $pick) {
            if (in_array($pick, $solution)) {
                $count++;
            }
        }

        return $count;
    }

    public function rightColorAndPositionCount() : int
    {
        $picked = $this->_answer->getColors();
        $solution = $this->_runtime->getSolution();
        
        $count = 0;
        foreach ($picked as $pos => $pick) {
            if ($solution[$pos] == $pick) {
                $count++;
            }
        }

        return $count;
    }

    public function getColors() : array
    {
        return $this->_answer->getColors();
    }
}