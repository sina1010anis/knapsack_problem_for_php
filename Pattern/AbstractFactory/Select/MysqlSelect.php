<?php

namespace Pattern\AbstractFactory;

class MysqlSelect implements ISelect 
{
    public function Sub () : string
    {
        return (string) get_class($this);
    }
}