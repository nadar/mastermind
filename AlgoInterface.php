<?php

interface AlgoInterface
{
    public function output($turn, GameInterface $game) : Answer;

    public function input($turn, InputInterface $input);
}