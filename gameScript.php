<?php
class base {
        private static function connect() {
               try{
                $server = "localhost";
                $user= "root";
                $dbname = "petvet";
                $parola = "";
                $pdo = new PDO("mysql:host=$server; dbname = $dbname; charset = utf8", $user, $parola);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
        }
         public static function query($query, $params = array()) {
            //se conecteaza la baza de date si pregateste interogarea
            $statement = self::connect()->prepare($query);
            //executa interogarea
            $statement->execute($params);

            if(explode(' ', $query)[0] == 'SELECT') {
            //ia datele returnate din interogare
                $data = $statement->fetchALL();
                return $data;
            }
        }
}

class Stats {
    public $health = 0;
    public $strength = 0;
    public $defense = 0;
    public $speed = 0;
    public $luck = 0;
    public $type = 0;
    public $damage = 0;
    public $skills;

    public function showStats() {
        if($this->type == 1) {
            echo "<span class=\"badge badge-success\">Health:</span> ", $this->health, "<br>";
            echo "<span class=\"badge badge-danger\">Strength:</span> ", $this->strength, "<br>";
            echo "<span class=\"badge badge-primary\">Defense:</span> ", $this->defense, "<br>";
            echo "<span class=\"badge badge-light\">Speed:</span> ", $this->speed, "<br>";
            echo "<span class=\"badge badge-info\">Luck:</span> ", $this->luck, "<br>";
            echo "<span class=\"badge badge-secondary\">Type:</span> Good Minion <br>";
        } else if($this->type == 2) {
            echo $this->health, " :<span class=\"badge badge-success\">Health</span>", "<br>";
            echo $this->strength, " :<span class=\"badge badge-danger\">Strength</span>", "<br>";
            echo $this->defense, " :<span class=\"badge badge-primary\">Defense</span>", "<br>";
            echo $this->speed, " :<span class=\"badge badge-light\">Speed</span>", "<br>";
            echo $this->luck, " :<span class=\"badge badge-info\">Luck</span>", "<br>";
            echo "Evil Minion :<span class=\"badge badge-secondary\">Type</span><br>";
        }
        
    }

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
    public function getDamage(){
        return $this->damage;
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
    public function setDamage($d){
        $this->damage = $d;
    }

   //skills
   public function doDamage($defense){
        $this->damage = $this->strength - $defense;
   }

   public function skillBananaStrike(){
        echo "TIM uses <span class=\"badge badge-danger \">BANANA STRIKE</span>, the damage will double!<br>";
        $this->damage = $this->damage * 2 ;
   }

   public function skillUmbrellaShield(){
        echo "TIM uses <span class=\"badge badge-primary \">UMBRELLA SHIELD</span>, the damage will be halved!<br>";
        $this->damage = $this->damage / 2 ;
    }

    public function attackMissed($defender){
        $chance = rand(1,100);
        if ($chance <= $defender->getLuck()){
            echo "Defender got lucky, <span class=\"badge badge-success \">ATTACK MISSED</span>!<br>";
            return 0;
        } else {
            return 1;
        }
    }

    public function getSkill($name) {
        foreach ($this->skills as $skill) {
            foreach ($skill as $key => $item) {
                if ($item['skill'] == 'skillBananaStrike' && $item['skill'] == $name) {
                    $chance_strike = rand(1,100);
                    if ($chance_strike <= $item['chance']) {
                        $this->skillBananaStrike();
                    }
                }
                if ($item['skill'] == 'skillUmbrellaShield' && $item['skill'] == $name) {
                    $chance_strike = rand(1,100);
                    if ($chance_strike <= $item['chance']) {
                        $this->skillUmbrellaShield();
                    }
                }
            }
        }
    }
}

class Minion extends Stats{
    public function __construct() {
        $this->health = rand(70,100);
        $this->strength = rand(70,80);
        $this->defense = rand(45,55);
        $this->speed = rand(40,50);
        $this->luck = rand(10,30);
        $this->type = 1;
        $this->setSkills();
    }

    private function setSkills() {
        $this->skills = array (
            'attack' => array (
                'bananaStrike' => array(
                    'skill' => 'skillBananaStrike',
                    'chance' => 10
                    
                )
            ),
            'defense' => array (
                'umbrellaShield' => array(
                    'skill' => 'skillUmbrellaShield',
                    'chance' => 20
                )
            )    
        );
    }
}

class Battle {
    public $attacker;
    public $defender;
    public $rounds;

    public function __construct($a, $d) {
        if ($a->getSpeed() > $d->getSpeed()) {
            $this->attacker = $a;
            $this->defender = $d;
        } elseif ($a->getSpeed() > $d->getSpeed()) {
            $this->attacker = $d;
            $this->defender = $a;
        } else {
            if ($a->getLuck() > $d->getLuck()) {
                $this->attacker = $a;
                $this->defender = $d;
            } else {
                $this->attacker = $d;
                $this->defender = $a;
            }
        }
        $this->rounds = 1;
    }

    public function doBattle() {
        while (($this->attacker->getHealth() > 0 && $this->defender->getHealth() > 0) && $this->rounds <= 20) {
            echo "<span class=\"badge badge-pill \"><h3> ROUND " , $this->rounds ;
            echo "</h3></span><br><br>";
            $this->attacker->doDamage($this->defender->getDefense());
            echo "<h4><p class=\"border-bottom border-dark\">";
            $this->attacker->setDamage($this->attacker->getDamage()*$this->attacker->attackMissed($this->defender));
            
            if($this->attacker->getType() == 1 && $this->attacker->getDamage()) {
                $this->attacker->getSkill('skillBananaStrike');
            }
            if($this->defender->getType() == 1 && $this->attacker->getDamage()) {
                $this->attacker->getSkill('skillUmbrellaShield');
            }

            $this->defender->setHealth($this->defender->getHealth() - $this->attacker->getDamage());
            
            
            if ($this->attacker->getHealth() < 0 )
                $this->attacker->setHealth(0);
            if ($this->defender->getHealth() < 0 )
                $this->defender->setHealth(0);
            
            if($this->attacker->getType() == 1) {
                echo "The attacker is <span style=\"color: #00CD00; \">TIM</span>, the damage dealt is " , $this->attacker->getDamage() , "! ";
                //$tim = $attacker;
            } else if($this->attacker->getType() == 2){
                echo "The attacker is <span style=\"color: #FF0000; \">THE EVIL</span>, the damage dealt is " , $this->attacker->getDamage() , "! ";
                //$evil = $attacker;
            }
            if($this->defender->getType() == 1) {
                echo "The defender is <span style=\"color: #00CD00; \">TIM</span>, his health is " , $this->defender->getHealth() , "!<br>";
                //$tim = $defender;
            } else {
                echo "The defender is <span style=\"color: #FF0000; \">THE EVIL</span>, his health is " , $this->defender->getHealth() , "!<br>";
               // $evil = $defender;
            }
            $aux = $this->attacker;
            $this->attacker = $this->defender;
            $this->defender = $aux;
            $this->rounds++;
            echo "<br></p></h4>";
        }

        $this->rounds--;
        $winner_name = '';
        $loser_name = '';
        $winner_health = 0;
        $loser_health = 0;
        if($this->attacker->getHealth() < $this->defender->getHealth()) {
            if($this->attacker->getType() == 1) {
                $winner_name = "THE EVIL";
                $winner_health = $this->defender->getHealth();
                $loser_name = "TIM";
                $loser_health = $this->attacker->getHealth();
            } else if($this->attacker->getType() == 2) {
                $winner_name = "TIM";
                $winner_health = $this->defender->getHealth();
                $loser_name = "THE EVIL";
                $loser_health = $this->attacker->getHealth();
            }
        } else if($this->defender->getHealth() < $this->attacker->getHealth()) {
            if($this->defender->getType() == 1) {
                $winner_name = "THE EVIL";
                $winner_health = $this->attacker->getHealth();
                $loser_name = "TIM";
                $loser_health = $this->defender->getHealth();
            } else if($this->defender->getType() == 2) {
                $winner_name = "TIM";
                $winner_health = $this->attacker->getHealth();
                $loser_name = "THE EVIL";
                $loser_health = $this->defender->getHealth();
            }
        }
        base::query('INSERT INTO minionsbattle.history VALUES (\'\', :winner, :loser, :no_of_rounds, :winner_health, :loser_health)', 
        array(':winner'=>$winner_name, ':loser'=>$loser_name, ':no_of_rounds'=>$this->rounds, ':winner_health'=>$winner_health, ':loser_health'=>$loser_health));
    }

    public function getWinner() {
        if($this->defender->getType() == 1) {
            $tim = $this->defender; 
        } else if($this->defender->getType() == 2) {
            $evil = $this->defender;
        }

        if($this->attacker->getType() == 1) {
            $tim = $this->attacker; 
        } else if($this->attacker->getType() == 2) {
            $evil = $this->attacker;
        }
        
        if ($tim->getHealth() == 0 ) {
            echo "<div class=\"row row-header align-items-center text-center\">";
            echo "<div class=\"col-12 align-self-center text-center\"><h1 class=\"text-center\">";
            echo "THE EVIL HAS WON! TIM WILL GET HIM NEXT TIME!</h1><br></div></div>";
        }
        if ($evil->getHealth() == 0 ) {
            echo "<div class=\"row row-header align-items-center text-center\">";
            echo "<div class=\"col-12 align-self-center text-center\"><h1>";
            echo "TIM HAS WON! CONGRATULATIONS!</h1></div></div>";
        }
        echo "<div class=\"row row-content text-center align-items-center\" style=\"border-bottom: none;\">";
        echo "<div class=\"col-12 col-sm-6 align-self-center text-center\">";
        echo "<h4><span style=\"color: #00CD00; \">TIM</span>'s health:  " ,  $tim->getHealth(), "<br>"; 
        echo "<span style=\"color: #FF0000; \">THE EVIL</span>'s health:  " , $evil->getHealth(), "<br></h4></div>"; 
        echo "<div class=\"col-12 col-sm align-self-center\">";
        if ($evil->getHealth() == 0 ) 
            echo "<img src=\"images/tim-happy-icon.png\" class=\"img-fluid\"></div>";
        if ($tim->getHealth() == 0 )
            echo "<img src=\"images/evil-win-icon.png\" class=\"img-fluid\"></div>";
        echo  "</div>";
        echo  "<div class=\"row  justify-content-center\">";
        echo  "<a role=\"button\" type=\"button\" id=\"next_button\" class=\"btn btn-lg btn-default btn-block next_button\" href=\"game.php\">NEXT BATTLE</a></div>";
        echo  "<br><br><div class=\"row  justify-content-center\">";
        echo  "<a role=\"button\" type=\"button\" id=\"next_button\" class=\"btn btn-lg btn-default btn-block next_button\" href=\"index.html\">BACK</a>";
        echo  "</div>";
    }

}
