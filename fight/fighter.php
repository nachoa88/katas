<?php

class Fighter
{
    private string $name;
    private int $life = 10;
    private int $attack;
    private int $defense;

    public function __construct(string $name, int $attack, int $defense)
    {
        $this->name = $name;
        $this->attack = $attack <= 0 ? 1 : ($attack > 10 ? 10 : $attack);
        $this->defense = $defense <= 0 ? 1 : ($defense > 10 ? 10 : $defense);
        $this->life = 10;
    }

    public function __toString(): string
    {
        return "Fighter: " . $this->name . ". Remaining Life: " . $this->life . ". Attack: " . $this->attack . ". Defense: " . $this->defense . ".\n";
    }

    // Getters & Setters.
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLife(): int
    {
        return $this->life;
    }

    public function setLife(int $life): void
    {
        $this->life = $life;
    }

    public function getAttack(): int
    {
        return $this->attack;
    }

    public function setAttack(int $attack): void
    {
        $this->attack = $attack;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): void
    {
        $this->defense = $defense;
    }
}
