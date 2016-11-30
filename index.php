<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" media="screen"/>
<head>
  <title>Math Game</title>
</head>
<body>
  <div class="container">
  <form action="index.php" method="post" role="form" class="form-horizontal">
  <div class="row">
    <div class="col-md-4">
      <h1>Math Game</h1>
      <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
      session_start();
      $correctAnswer = NULL;
      $userScore = NULL;
      $userTotal = NULL;
      $error = NULL;

      $placeHolder = rand(0, 1);
      $firstNumber = rand(0, 20);
      $secondNumber = rand(0, 20);

      if(empty($_SESSION['login'])) {
      	header('Location: login.php');
      }

      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numberOne = $_POST['firstNumber'];
        $numberTwo = $_POST['secondNumber'];
        $operationPeformed = $_POST['operation'];
        $userScore2 = $_POST['userScore'];
        $userTotal2 = $_POST['userTotal'] + 1;

      if (is_numeric($_POST['answer'])) {
        if($_POST['answer'] == $answer) {
          $correctAnswer = 1;
          $userScore++;
        } else {
          $correctAnswer = 2;
        }
        if($operationPeformed == '+') {
          $correctAnswer = $numberOne + $numberTwo;
        } else {
          $correctAnswer = $numberOne - $numberTwo;
        }
      } else {
        $error = true;
      }

      $userScore = $userScore2;
      $userTotal = $userTotal2;

    } else {
      $userScore = 0;
      $userTotal = 0;
    }
    if($placeHolder == 1) {
      $operation = '+';
    }
    else {
      $operation = '-';
    }
    ?>

    </div>
    <div class="col-sm-4"><a href="logout.php" class="btn btn-default btn-sm">Logout</a></div>
    </div>
  <div class="row">
    <div class="col-md-3"></div>
      <label class="col-md-2"><?php echo $firstNumber; ?></label>
      <label class="col-md-2"><?php echo $operation; ?></label>
      <label class="col-md-2"><?php echo $secondNumber; ?></label>
    </div>
      <input type="hidden" name="firstNumber"
      value="<?php echo $firstNumber; ?>">
      <input type="hidden" name="secondNumber"
      value="<?php echo $secondNumber; ?>">
      <input type="hidden" name="operation"
      value="<?php echo $operation; ?>">
      <input type="hidden" name="userScore"
      value="<?php echo $userScore; ?>">
      <input type="hidden" name="userTotal"
      value="<?php echo $userTotal; ?>"
  <div class="form-group">
   <div class="col-md-3">
    <input type="text" class="form-control" id="answer" name="answer" placeholder="Enter the answer" size="8">
   </div>
  <div class="col-md-5"></div>
  </div>
  <div class="row">
  <div class="col-md-3">
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
  </div>
  </div>
  </form>
  <div class="row">
    <div class="col-md-4">
      <?php
      if($correctAnswer == 1) {
        echo '<span style="color: green; font-weight: bold;">Thats correct!</span>';
      } else if($correct == 2) {
        echo '<span style="color: red; font-weight: bold;">Thats incorrect!, '
        . $numberOne . ' ' . $operationPeformed . ' ' . $numberTwo . ' = ' . $correctAnswer . '.</span>';
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
        echo 'Your score is: ' . $userScore . ' / ' . $userTotal;
      } else {
        echo 'Your score is: 0 / 0';
      }
      ?>
    </div>
  </div>
  </div>
  </body>
</html>
