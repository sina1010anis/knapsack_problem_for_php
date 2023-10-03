<?php  
$time = time();
class Set 
{
    public $n = 8;
    public $pop = 3000;
    public $ps = [[]];
    public $mut_over = 0.8;
    public $MHR = 200;
/**
 * 
     * Set the value of ps
     */
    public function setPs($ps): self
    {
        $this->ps = $ps;

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
     * Set the value of pop
     */
    public function setPop($pop): self
    {
        $this->pop = $pop;

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

}
class NQueen extends Set
{

    public function pushPop() : self
    {
        for ($j = 0 ; $j <= $this->pop-1 ; $j++) {
            for ($i = 0 ; $i <= $this->n-1 ; $i++) {
                $this->ps[$j][$i] = rand(0, $this->n-1);
            }
        }
        return $this;
    }

    
    
    public function crossOver() : self
    {
        $w = 0;
        while ($w < $this->pop) {
            $p1 = $this->ps[$w];
            $p2 = $this->ps[$w+1];
            $temp = [];
            $n_up = ceil($this->n / 2);
            $n_down = $this->n - ceil($this->n / 2);
            for ($i = 0 ; $i <= count($p1)-1 ; $i++) {
                if ($i < $n_up) {
                    $temp[$i] = $p1[$i];
                }else {
                    $temp[$i] = $p2[$i];
                }
            }
            $this->ps[] = $temp;
            $w += 2;
        }

        //unset($this->ps[count($this->ps)-1]);
        return $this;
    }

    public function matation() : self 
    {
        $pop = $this->pop;
        $pop_ps = count($this->ps)-1;
        $temp = [];
        $w = 0;
        for ($pop ; $pop <= count($this->ps)-1 ; $pop++) {
            $temp[$w] = $this->ps[$pop];
            $w++;
        }
        for ($pop_ps ; $pop_ps > $this->pop - 1 ; $pop_ps--) {
            unset($this->ps[$pop_ps]);
        }
        shuffle($temp);
        for ($i = 0 ; $i <= count($temp)-1 ; $i++) {
            $this->ps[$this->pop + $i] = $temp[$i];
        }
        for ($i =0 ; $i <= count($this->ps)-1 ; $i++) {
            $this->ps[$i][$this->n] = 0;
        }
        return $this;
    }

    public function fitness()
    {
        $counter = 0;
        global $n;
        for ($i = 0 ; $i <= count($this->ps)-1 ; $i++) {
            for ($j = 0 ; $j <= $this->n-1 ; $j++) {
                for ($k = $j+1 ; $k <= $this->n-1 ; $k++) {
                    if ($this->ps[$i][$j] == $this->ps[$i][$k]) {
                        $this->ps[$i][$this->n] += 1;
                    } else if (abs($j - $k) == abs($this->ps[$i][$j]-$this->ps[$i][$k])) {
                        $this->ps[$i][$this->n] += 1;
                    }
                }
                
            }
        }
        usort($this->ps, function($a, $b)
        {
            if ($a[$this->n] == $b[$this->n])
                return 0;
            else if ($a[$this->n] < $b[$this->n])
                return -1;
            else 
                return 1;
        });
        return $this;
    }

    public function getBestRequest(bool $draw = false) {
        if ($this->ps[0][$this->n] == 0) {
            //print_r($this->ps[0]);
            if ($draw) {
                echo '<style>table, th, td {border:2px solid black;}tr , td {width:200px;height:200px;}</style><table>';
                for ($i = 0 ; $i <= $this->n-1;$i++) {
                    echo '<tr>';
                    for ($j = 0 ; $j <= $this->n-1;$j++) {
                        if ($j == $this->ps[0][$i]){
                            echo '<td style="background-color:red"></td>';
                        }else{
                            echo '<td></td>';
                        }
                    }
                    echo '</tr>';
                }
                echo '</table>';
            }else{
                return 'Search Good ...!';
            }
        }
    }
}

$n_queen = new NQueen();
$n_queen->pushPop()->crossOver()->matation()->fitness()->getBestRequest(true);