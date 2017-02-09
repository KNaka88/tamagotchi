<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Tamagochi.php";



    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(),array('twig.path'=>__DIR__.'/../views'));


    session_start();
    if(empty($_SESSION['tamagochi'])){
      $_SESSION['tamagochi'] = new Tamagochi("");
    }

    $app->get("/", function() use($app) {

      return $app['twig']->render('user_name.html.twig');
    });

    $app->post("/main", function() use($app) {
      $new_tamagochi = new Tamagochi($_POST['name']);
      $new_tamagochi->save();
      var_dump($new_tamagochi);
      return $app['twig']->render('main.html.twig');
    });

    $app->get("/full", function() use($app) {
      $new_tamagochi = Tamagochi::loadData();
      $new_tamagochi->feed(2);
      $new_tamagochi->save();
      var_dump($new_tamagochi->getFood());
      var_dump($new_tamagochi->getTime());
      return $app['twig']->render('main.html.twig');
    });

    $app->get("/rest", function() use($app) {
      $new_tamagochi = Tamagochi::loadData();
      $new_tamagochi->rest(2);
      $new_tamagochi->save();
      echo "Sleep: ";
      var_dump($new_tamagochi->getSleep());
      echo "play";
      var_dump($new_tamagochi->getPlay());
      var_dump($new_tamagochi->getTime());
      return $app['twig']->render('main.html.twig');
    });

    $app->get("/engage", function() use($app) {
      $new_tamagochi = Tamagochi::loadData();
      $new_tamagochi->engage(2);
      $new_tamagochi->save();
      echo "Play: ";
      var_dump($new_tamagochi->getPlay());
      echo "Time: ";
      var_dump($new_tamagochi->getTime());
      return $app['twig']->render('main.html.twig');
    });

    return $app;

 ?>
