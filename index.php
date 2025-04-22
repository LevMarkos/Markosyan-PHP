<?php

abstract class Animal
{
    protected string $nickname;
    private int $age;

    public function __construct(string $nickname, int $age)
    {
        $this->nickname = $nickname;
        $this->setAge($age);
    }

    public function live(): void
    {
        echo "{$this->nickname} живёт рядом с хозяином." . PHP_EOL;
    }

    public function sleep(): void
    {
        echo "{$this->nickname} спит." . PHP_EOL;
    }

    abstract public function makeSound(): void;

    public function getAge(): int
    {
        return $this->age;
    }

    private function setAge(int $age): void
    {
        if ($age < 0) {
            throw new InvalidArgumentException('Возраст животного должен быть положительным');
        }

        $this->age = $age;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }
}

class Rat extends Animal
{
    public function makeSound(): void
    {
        echo "{$this->nickname} издаёт звук: Пи." . PHP_EOL;
    }
}

class Dog extends Animal
{
    public function makeSound(): void
    {
        echo "{$this->nickname} издаёт звук: Аф." . PHP_EOL;
    }
}

class Parrot extends Animal
{
    public function makeSound(): void
    {
        echo "{$this->nickname} издаёт звук: Чирик." . PHP_EOL;
    }
}

$animals = [
    new Rat('Вольт', 1),
    new Dog('Вихрь', 5),
    new Parrot('Элвис', 2),
];

foreach ($animals as $animal) {
    echo "Кличка животного: {$animal->getNickname()}, Возраст: {$animal->getAge()}<br>";

    $animal->live();
    $animal->sleep();
    $animal->makeSound();

    echo "<br><br>";
}
