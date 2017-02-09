<?php
  class Tamagochi
  {
    private $name;
    private $food;
    private $play;
    private $sleep;
    private $time;

    function __construct($name)
    {
      $this->name= $name;
      $this->food = 5;
      $this->play = 5;
      $this->sleep = 5;
      $this->time = 15;
    }


    function setName($new_name)
    {
      $this->name = $new_name;
    }
    function setFood($new_food)
    {
      $this->food = $new_food;
    }
    function setPlay($new_play)
    {
      $this->play = $new_play;
    }
    function setSleep($new_sleep)
    {
      $this->sleep = $new_sleep;
    }

    function getName()
    {
      return $this->name;
    }
    function getFood()
    {
      return $this->food;
    }
    function getSleep()
    {
      return $this->sleep;
    }

    function getPlay()
    {
      return $this->play;
    }

    function getTime()
    {
      return $this->time;
    }

static function getAll()
{
    return $_SESSION['tamagochi'];
}

    function save(){
      $_SESSION['tamagochi'] = $this;
    }


    static function clearData()
    {
      $_SESSION['tamagochi'] = new Tamagochi('');
    }

    static function loadData(){
      return   $_SESSION['tamagochi'];
    }

    function feed($food)
    {
      $this->food += $food;
      $this->time -= 1;
    }
    function engage($play)
    {
      $this->play += $play;
      $this->time -= 1;
    }
    function rest($sleep)
    {
      $this->sleep += $sleep;
      $this->time -= 1;
    }




}


 ?>
