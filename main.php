<?php
/**
 * Класс основной для всего сада
 */
abstract class tree{
    // Статическая переменая для хранения ключа
    static $id = 1;
    // номер деревьев
    public $idTree=0;
    // количество фрукты
    public abstract function getFruits();
    // вернуть
    public function getNameOfClass()
    {
        return static::class;
    }
}

/**
 * Класс груши
 */
class pear extends tree{
    // коснтруктор класса, задаем уникальный номер
    function __construct() {
        // Задаем уникальный номер
        $this->idTree=parent::$id++;
        //Задаем уникальный номер
        // print "pear id-".$this->idTree." \n";
    }
    // сколько можно собрать груш
    public function getFruits(){
        return rand(0,20);
    }

}

/**
 * Класс яблоней
 */
class apple extends tree{
    // коснтруктор класса, задаем уникальный номер
    function __construct() {
        // задаем номер уникальный
        $this->idTree=parent::$id++;
        // print "Конструктор класса apple". $this->idTree." \n";
    }

    // сколько можно собрать яблок
    public function getFruits(){
        return rand(40, 50);
    }
}

/**
 * Создание деревьев (Паттерн - Абстрактный сад)
 */
class ConcreteGarden
{
    // Регистриурем груш
    public function createPear(): pear
    {
        return new pear;
    }
    // Регистрируем яблонией
    public function createApple(): apple
    {
        return new apple;
    }
}


// Абстрактный сад для регистрации деревьев
$garden=new ConcreteGarden();
// Сад(где все деревы )
$a = array();
// регистрируем 10 яблонь
for($i=1;$i<=10;$i++){
    $a[]=$garden->createApple();
}
// регистрируем 15 груш
for($i=1;$i<=20;$i++){
    $a[]=$garden->createPear();
}

// обнуляем корзину
$allApples=0;
$allPears=0;
// обходим и собераем продукцию
foreach ($a as $value){
    // в зависемости от деревьев слаживаем проудкцию
    switch ($value->getNameOfClass()) {
        case "apple":
           $allApples +=$value->getFruits();
            break;
        case "pear":
            $allPears +=$value->getFruits();
            break;
    }
    //echo $value->getFruits();
}
echo "Apple-".$allApples."\n";
echo "Pear-".$allPears."\n";
