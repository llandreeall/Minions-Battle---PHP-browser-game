<?php

class Minion
{
    public $health = 0;
    public $strength = 0;
    public $defense = 0;
    public $speed = 0;
    public $luck = 0;
    public $type = 0;
    
    public function constructGoodMinion() {
        $this->health = rand(70,100);
        $this->strength = rand(70,80);
        $this->defense = rand(45,55);
        $this->speed = rand(40,50);
        $this->luck = rand(10,30);
        $this->type = 1;
        
        return $this;
    }
    
    public function constructEvilMinion() {
        $this->health = rand(60,90);
        $this->strength = rand(60,90);
        $this->defense = rand(40,60);
        $this->speed = rand(40,60);
        $this->luck = rand(25,40);
        $this->type = 2;
        
        return $this;
    }
    
    public function showStats() {
        echo "Health: ", $this->health, "<br>";
        echo "Strength: ", $this->strength, "<br>";
        echo "Defense: ", $this->defense, "<br>";
        echo "Speed: ", $this->speed, "<br>";
        echo "Luck: ", $this->luck, "<br>";
        if ($this->type == 1) {
            echo "Type: Good Minion <br>";
        } elseif ($this->type == 2) {
            echo "Type: Evil Minion <br>";
        }
    }
    
    //getters
    public function getHealth(){
        return $this->health;
    }
    public function getStrength(){
        return $this->strength;
    }
    public function getDefense(){
        return $this->defense;
    }
    public function getSpeed(){
        return $this->speed;
    }
    public function getLuck(){
        return $this->luck;
    }
    public function getType(){
        return $this->type;
    }
    
    //setters    
    public function setHealth($h){
        $this->health = $h;
    }
    public function setStrength($s){
        $this->strength = $s;
    }
    public function setDefense($d){
        $this->defense = $d;
    }
    public function setSpeed($s){
        $this->speed = $s;
    }
    public function setLuck($l){
        $this->luck = $l;
    }
    public function setType($t){
        $this->type = $t;
    }
}
 
$tim = new Minion;
$evil = new Minion;

$tim = $tim->constructGoodMinion();
$evil = $evil->constructEvilMinion();
 
echo "INITIAL STATS<br>";
echo "TIM<br>" , $tim->showStats(), "<br>"; 
echo "THE EVIL<br>" , $evil->showStats(), "<br>"; 

$round = 1;

if ($tim->getSpeed() > $evil->getSpeed()) {
    $attacker = $tim;
    $defender = $evil;
} elseif ($tim->getSpeed() > $evil->getSpeed()) {
    $attacker = $evil;
    $defender = $tim;
} else {
    if ($tim->getLuck() > $evil->getLuck()) {
        $attacker = $tim;
        $defender = $evil;
    } else {
        $attacker = $evil;
        $defender = $tim;
    }
}

while (($tim->getHealth() > 0 && $evil->getHealth() > 0) && $round <= 20) {
    echo "<br>ROUND " , $round , "<br>";
    $damage = $attacker->getStrength() - $defender->getDefense();
    $chance = rand(1,100);
    if ($chance < $defender->getLuck() + 1) {
        echo "Defender got lucky, ATTACK MISSED<br>";
        $damage = 0;
    } else {
        if($attacker->type == 1) {
            $chance_strike = rand(1,100);
            if ($chance_strike < 10 + 1) {
                echo "TIM uses BANANA STRIKE, the damage will double<br>";
                $damage *= 2;
            }
        }
        if($defender->type == 1) {
            $chance_shield = rand(1,100);
            if ($chance_shield < 20 + 1) {
                echo "TIM uses UMBRELLA SHIELD, the damage will be halved<br>";
                $damage /= 2;
            }
        }
        $defender->setHealth($defender->getHealth() - $damage);
    }
    
    if ($attacker->getHealth() < 0 )
        $attacker->setHealth(0);
    if ($defender->getHealth() < 0 )
        $defender->setHealth(0);
    
    if($attacker->getType() == 1) {
        echo "The attacker is TIM, the damage dealt is " , $damage , " <br>";
        $tim = $attacker;
    } else {
        echo "The attacker is THE EVIL, the damage dealt is " , $damage , " <br>";
        $evil = $attacker;
    }
    if($defender->getType() == 1) {
        echo "The defender is TIM, his health is " , $defender->getHealth() , " <br>";
        $tim = $defender;
    } else {
        echo "The defender is THE EVIL, his health is " , $defender->getHealth() , " <br>";
        $evil = $defender;
    }
    
    $aux = $attacker;
    $attacker = $defender;
    $defender = $aux;
    $round++;
}

echo "<br>FINAL STATS<br>";
if ($tim->getHealth() == 0 )
    echo "THE EVIL HAS WON! TIMM WILL GET HIM NEXT TIME!<br>";
if ($evil->getHealth() == 0 )
    echo "TIM HAS WON! CONGRATULATIONS!<br>";
echo "<br>" , "TIM<br>" ,  $tim->showStats(), "<br>"; 
echo "THE EVIL<br>" , $evil->showStats(), "<br>"; 

?>