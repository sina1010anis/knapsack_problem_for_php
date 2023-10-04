<?php
$time_start = microtime(true); 

class Set
{
    // Env Knapsack
    public $storage = 15;
    public $tools = [[10, 2], [5, 3], [15, 5], [7, 7], [6, 1], [18, 4], [3, 1]];
    public $n_tools;

    // Env GA
    public $pop = 4;
    public $mu = 0.5;
    public $MHR = 5;
    public $ps = [[]];
    public $best = [];
    public function __construct()
    {
        $this->n_tools = count($this->tools);
    }

    /**
     * Get the value of storage
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * Set the value of storage
     */
    public function setStorage($storage): self
    {
        $this->storage = $storage;

        return $this;
    }

    /**
     * Get the value of tools
     */
    public function getTools()
    {
        return $this->tools;
    }

    /**
     * Set the value of tools
     */
    public function setTools($tools): self
    {
        $this->tools = $tools;

        return $this;
    }

    /**
     * Get the value of n_tools
     */
    public function getNTools()
    {
        return $this->n_tools;
    }

    /**
     * Set the value of n_tools
     */
    public function setNTools($n_tools): self
    {
        $this->n_tools = $n_tools;

        return $this;
    }

    /**
     * Get the value of pop
     */
    public function getPop()
    {
        return $this->pop;
    }

    /**
     * Set the value of pop
     */
    public function setPop($pop): self
    {
        $this->pop = $pop;

        return $this;
    }

    /**
     * Get the value of n
     */
    public function getN()
    {
        return $this->n;
    }

    /**
     * Set the value of n
     */
    public function setN($n): self
    {
        $this->n = $n;

        return $this;
    }

    /**
     * Get the value of mu
     */
    public function getMu()
    {
        return $this->mu;
    }

    /**
     * Set the value of mu
     */
    public function setMu($mu): self
    {
        $this->mu = $mu;

        return $this;
    }

    /**
     * Get the value of ps
     */
    public function getPs()
    {
        return $this->ps;
    }

    /**
     * Set the value of ps
     */
    public function setPs($ps): self
    {
        $this->ps = $ps;

        return $this;
    }

    /**
     * Get the value of best
     */
    public function getBest()
    {
        return $this->best;
    }

    /**
     * Set the value of best
     */
    public function setBest($best): self
    {
        $this->best = $best;

        return $this;
    }
}
class KnapsachGA extends Set
{
    public function initPop() : self
    {
        for ($j = 0 ; $j < $this->pop ; $j++) {
            for ($i = 0 ; $i <= $this->n_tools-1 ; $i++) {
                $this->ps[$j][$i] = rand(0, 1);
            }
        }
        return $this;
    }

    public function crossOver() 
    {
        $w = 0;
        $c = count($this->ps);
        while ($w < $this->pop-1) {
            for ($i = 0 ; $i <= $this->n_tools-1 ; $i++) {
                if ($i <= ceil(($this->n_tools-1)/2)) {
                    $this->ps[$c][$i] = $this->ps[$w][$i];
                } else {
                    $this->ps[$c][$i] = $this->ps[$w+1][$i];
                }
            }
            $w += 2;
            $c++;
        }
        return $this;
    }

    public function muation() : self
    {
        $temp = [];
        $c = count($this->ps)-1;
        $k = 0;
        for ($i = $c ; $i > $this->pop-1 ; $i--) {
            $temp[$k] = $this->ps[$i];
            unset($this->ps[$i]);
            $k++;

        }
        shuffle($temp);
        $mu = floor(count($temp) * (1-$this->mu));
        for ($i = 0 ; $i <= $mu ; $i++) {
            $temp[$i][rand(0, $this->n_tools-1)] = rand(0, 1);
        } 
        $k = 0;
        for ($i = $this->pop ; $i <= $c ; $i++) {
            $this->ps[$i] = $temp[$k];
            $k++;
        }
        return $this;
    }

    public function fitnnes() : self
    {
        $c_ps = count($this->ps);
        $c_n = count($this->ps);
        for ($i = 0 ; $i <= count($this->ps)-1 ; $i++) {
            for ($j = 0 ; $j <= $this->n_tools-1 ; $j++) {
                if ($this->ps[$i][$j] == 1) {
                    @$this->ps[$i][$this->n_tools] += $this->tools[$j][0];
                    @$this->ps[$i][$this->n_tools+1] += $this->tools[$j][1];
                }
            }
        }

        for ($i= 0; $i<=$c_ps-1;$i++) {
            if (@$this->ps[$i][$this->n_tools+1] > $this->storage) {
                unset($this->ps[$i]);
            } else {
                @$avg = ($this->ps[$i][$this->n_tools+1]+$this->ps[$i][$this->n_tools])/2;
                $this->ps[$i][$this->n_tools+2] = $avg;
            }
        }
        shuffle($this->ps);
        return $this;
    }

    public function sort() : self
    {

        usort($this->ps, function($a, $b) {
            if ($a[$this->n_tools+2] < $b[$this->n_tools+2]) {
                return 1;
            } elseif ($a[$this->n_tools+2] > $b[$this->n_tools+2]) {
                return -1;
            }
            return 0;
        });

        return $this;
    }

    public function loop(bool $loop = false) : self
    {
        if (empty($this->best) || $this->ps[0][$this->n_tools+2] > $this->best[0][$this->n_tools+2]) {
            if (!empty($this->best)) {
                unset($this->best[0]);
            }
            $this->best[0] = $this->ps[0];
        }
        // if ($loop) {
        //     for ($i = 0 ; $i <= $this->MHR ; $i++) {
        //         $this->initPop()->crossOver()->muation()->fitnnes()->sort()->loop();
        //     }
        // }
        return $this;
    }
}

$GA = new KnapsachGA();
print_r($GA->initPop()->crossOver()->muation()->fitnnes()->sort()->loop(true)->getBest());































echo "\n------------------------------------------";
echo "\n Total execution time in seconds: " . (microtime(true) - $time_start).PHP_EOL;
echo "------------------------------------------\n\n";