<?php

interface I
{
    public function x1();
    public function x2();
}

abstract class I2 implements I
{
    abstract public function x3();
}