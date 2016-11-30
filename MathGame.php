<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" media="screen"/>
<head>
  <title>Math Game</title>
</head>
<body>
  <div class="container">
  <form action="mathgame.php" method="post" role="form" class="form-horizontal">
  <div class="row">
    <div class="col-md-4">
      <h1>Math Game</h1>
      <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
      session_start();

      $correctAnswer = NULL;
      $currentScore = NULL;
      $userTotal = NULL;
      $error = NULL;

      $placeHolder = rand(0, 1);
      $numOne = rand(0, 20);
      $numTwo = rand(0, 20);

      if(empty($_SESSION['login'])) {
      	header('Location: index.php');
      }

      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lastNumOne = $_POST['numOne'];
        $lastNumTwo = $_POST['numTwo'];
        $lastOperation = $_POST['operation'];
        $lastcurrentScore = $_POST['currentScore'];
        $lastUserTotal = $_POST['userTotal'] + 1;

        if (is_numeric($_POST['answer'])) {

          if($lastOperation == '+') {
            $answer = $lastNumOne + $lastNumTwo;
          } else {
            $answer = $lastNumOne - $lastNumTwo;
          }

          if($_POST['answer'] == $answer) {
            $correctAnswer = 1;
            $lastcurrentScore++;
          } else {
            $correctAnswer = 2;
          }

        } else {
          $error = true;
        }

        $currentScore = $lastcurrentScore;
        $userTotal = $lastUserTotal;

      } else {
        $currentScore = 0;
        $userTotal = 0;
      }

      if($placeHolder == 1) {
        $operation = '+';
      }
      else {
        $operation = '-';
      }
      ?>
  <div class="row">
    <div class="col-md-3"></div>
    <label class="col-sm-2 col-sm-offset-3">
      <?php echo $numOne; ?></label>
    <label class="col-sm-2">
      <?php echo $operation; ?></label>
    <label class="col-sm-2">
      <?php echo $numTwo; ?></label>
    </div>
    <input type="hidden" name="numOne"
    value="<?php echo $numOne; ?>">
    <input type="hidden" name="operation"
     value="<?php echo $operation; ?>">
    <input type="hidden" name="numTwo"
    value="<?php echo $numTwo; ?>">
    <input type="hidden" name="userTotal"
    value="<?php echo $userTotal; ?>">
    <input type="hidden" name="currentScore"
    value="<?php echo $currentScore; ?>">
  <div class="form-group">
   <div class="col-md-3">
    <input type="text" class="form-control" id="answer" name="answer" placeplaceHolder="Enter the answer" size="8">
   </div>
  <div class="col-md-5"></div>
  </div>
  <div class="row">
  <div class="col-md-3">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
  </div>
  </form>
  <div class="row">
    <div class="col-md-4">
      <?php
      if($correctAnswer == 1) {
        echo '<span style="color: green; font-weight: bold;">Thats right!</span>';
      } else if($correctAnswer == 2) {
        echo '<span style="color: red; font-weight: bold;">Thats wrong!, '
         . $lastNumOne . ' ' . $lastOperation . ' ' . $lastNumTwo . ' is ' . $answer . '.</span>';
      } else if ($error) {
        echo '<span style="color: red; font-weight: bold;">Please enter a number value.</span>';
      }
      ?>
    </div>
    <div class="col-md-4">
    </div>
    </div>
  <div class="row">
    <div class="col-md-4">
      <?php
      if ($userTotal !== 0) {
        echo 'Your score is: ' . $currentScore . ' / ' . $userTotal;
      } else {
        echo 'Your score is: 0 / 0';
      }
      ?>
    </div>
  </div>
  <div class="col-sm-4"><a href="logout.php" class="btn btn-info">Logout</a></div>
  </div>
  </div>
  </div>
  </body>
</html>
