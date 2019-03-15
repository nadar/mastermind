<?php

interface GameInterface
{
    public function providerAnswer($step);

    public function getAnswerSolution() : array;

    public function getColors() : array;

    public function getColorsCount();

    public function getColumnCount();

    public function getRandomColor();

    public function eachColumn(callable $fn);
}