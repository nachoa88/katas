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


    public function fight(): void
    {
        while ($this->isBattleActive()) {
            echo "Round " . $this->round . " begins!\n";

            $attacker = $this->getAttacker($this->fighter1, $this->fighter2);
            $defender = $this->getDefender($attacker);
            echo $attacker->getName() . " is attacking!\n";

            $damage = $this->calculateDamage($attacker, $defender);
            echo $defender->getName() . " receives " . $damage . " damage!\n";
            $this->applyDamage($defender, $damage);
            
            echo $defender->getName() . " has " . $defender->getLife() . " life points! While " . $attacker->getName() . " has " . $attacker->getLife() . " points and willing to continue!\n";
            echo "Round " . $this->round . " ends!\n\n";

            $this->round++;
        }
        $winner = ($this->fighter1->getLife() > 0) ? $this->fighter1 : $this->fighter2;
        echo "THE BATTLE IS OVER! " . strtoupper($winner->getName()) . " WINS!!!\n";
    }

    private function isBattleActive(): bool 
    {
        return $this->fighter1->getLife() > 0 && $this->fighter2->getLife() > 0;
    }

    private function getAttacker(Fighter $fighter1, Fighter $fighter2): Fighter
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

    private function getDefender(Fighter $attacker): Fighter
    {
        return $attacker === $this->fighter1 ? $this->fighter2 : $this->fighter1;
    }

    private function calculateDamage(Fighter $attacker, Fighter $defender): int
    {
        $damage = $attacker->getAttack() - $defender->getDefense();
        return $damage <= 0 ? 1 : $damage;
    }

    private function applyDamage(Fighter $defender, int $damage): void
    {
        $defender->setLife($defender->getLife() - $damage);
    }
}
