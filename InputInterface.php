<?php

interface InputInterface
{
    public function rightColorCount(): int;

    public function rightColorAndPositionCount(): int;

    public function getColors(): array;
}