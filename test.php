<?php
class X1 
{
    public $inc = null;

    public function setInc()
    {
        $this->inc = 'X1';
    }
    public function next()
    {
        if ($this->inc != null) {
            echo 'X1'.PHP_EOL;
            echo $this->inc.PHP_EOL;
        } else {
            echo 'X1 Not set'.PHP_EOL; 
        }
        
    }
}

class X2
{
    public $inc = null;

    public function setInc()
    {
        $this->inc = 'X2';
    }

    public function next(X1 $x1)
    {
        if ($this->inc != null) {
            $x1->next();
        } else {
            echo 'X2 Not set'.PHP_EOL;
        }
    }
}

// $x1 = new X1();
// $x2 = new X2();

// $x2->setInc();
// $x1->setInc();

// $x2->next($x1);
require './Exceptions/TestException.php';
$email = "someone@example.com";

try {
    throw new \TestException();
} catch (TestException $e) {
  echo $e->errorMessage();
}
