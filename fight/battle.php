<?php

require_once 'fighter.php';

class Battle
{
    private Fighter $fighter1;
    private Fighter $fighter2;
    private int $round = 1;

    public function __construct(Fighter $fighter1, Fighter $fighter2)
    {
        $this->fighter1 = $fighter1;
        $this->fighter2 = $fighter2;
        $this->round = 1;
    }

    public function __toString(): string
    {
        return "BATTLE INFORMATION: " . $this->fighter1->getName() . "- VS - " . $this->fighter2->getName() . ".\n";
    }

    // Getters & Setters.
    public function getFighter1(): Fighter
    {
        return $this->fighter1;
    }

    public function getFighter2(): Fighter
    {
        return $this->fighter1;
    }

    public function getRound(): int
    {
        return $this->round;
    }

    public function setRound(int $round): void
    {
        $this->round = $round;
    }

/*   

- El combat acaba quan un dels dos lluitadors té la vida a 0. S’anuncia el guanyador/a llavors*/
    public function fight()
    {
        while ($this->fighter1->getLife() > 0 && $this->fighter2->getLife() > 0) {
            echo "Round " . $this->round . " begins!\n";

            $attacker = $this->determineAttacker($this->fighter1, $this->fighter2);
            $defender = $attacker === $this->fighter1 ? $this->fighter2 : $this->fighter1;
            echo $attacker->getName() . " is attacking!\n";

            $damage = $this->calculateDamage($attacker, $defender);
            echo $defender->getName() . " receives " . $damage . " damage!\n";

            $defender->setLife($defender->getLife() - $damage);
            echo $defender->getName() . " has " . $defender->getLife() . " life points, while " . $attacker->getName() . " has " . $attacker->getLife() . " life points.\n";
            echo "Round " . $this->round . " ends!\n\n";

            $this->round++;
        }
        $winner = ($this->fighter1->getLife() > 0) ? $this->fighter1 : $this->fighter2;
        echo "The battle is over! " . $winner->getName() . " wins!\n";
    }

    public function determineAttacker(Fighter $fighter1, Fighter $fighter2): Fighter
    {
        // random number between 1 and 100 in order to determine the attacker
        $random = mt_rand(1, 100);

        if ($fighter1->getAttack() === $fighter2->getAttack()) {
            // 50-50 chance
            return $random <= 50 ? $fighter1 : $fighter2;
        }
        if ($fighter1->getAttack() > $fighter2->getAttack()) {
            // 70-30 chance, fighter1 is stronger
            return $random <= 70 ? $fighter1 : $fighter2;
        }
        // 70-30 chance, fighter2 is stronger
        return $random <= 70 ? $fighter2 : $fighter1;
    }

    public function calculateDamage(Fighter $attacker, Fighter $defender): int
    {
        $damage = $attacker->getAttack() - $defender->getDefense();
        return $damage <= 0 ? 1 : $damage;
    }
}
