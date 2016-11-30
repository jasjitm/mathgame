<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Math Game</title>
			<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" media="screen"/>
   </head>
   <body>
      <div class="container">
         <form action="MathGame.php" method="post" role="form" class="form-horizontal">
            <div class="row">
               <div class="col-sm-4 col-sm-offset-4">
                  <h1>Math Game</h1>
               </div>
               <div class="col-sm-4"><a href="Logout.php" class="btn btn-default btn-sm">Logout</a></div>
            </div>
            <div class="row">
               <label class="col-sm-2 col-sm-offset-3"><?php echo $firstNum; ?></label>
               <label class="col-sm-2"><?php echo $operation; ?></label>
               <label class="col-sm-2"><?php echo $secondNum; ?></label>
               <div class="col-sm-3"></div>
            </div>
            <input type="hidden" name="firstNum" value="<?php echo $firstNum; ?>">
            <input type="hidden" name="operation" value="<?php echo $operation; ?>">
            <input type="hidden" name="secondNum" value="<?php echo $secondNum; ?>">
            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <input type="hidden" name="score" value="<?php echo $score; ?>">
            <div class="form-group">
               <div class="col-sm-3 col-sm-offset-4">
                  <input type="text" class="form-control" id="answer" name="answer" placeholder="Enter the answer" size="8">
               </div>
               <div class="col-sm-5"></div>
            </div>
            <div class="row">
               <div class="col-sm-3 col-sm-offset-4">
                  <button type="submit" class="btn btn-primary btn-sm">Submit</button>
               </div>
               <div class="col-sm-3"></div>
            </div>
         </form>
         <hr>
         <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
              <?php
              if($correct == 1) {
                echo '<span style="color: green; ">Thats right!</span>';
              } else if($correct == 2) {
                echo '<span style="color: red; ">Thats wrong!, ' . $firstNum2 . ' ' . $operation2 . ' ' . $secondNum2 . ' is ' . $correctAnswer . '.</span>';
              } else if ($error) {
                echo '<span style="color: red;">Please enter a number.</span>';
              }
              ?>
            </div>
            <div class="col-sm-4"></div>
         </div>
         <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
              <?php
              if ($total !== 0) {
                echo 'Your score: ' . $score . ' / ' . $total;
              } else {
                echo 'Your score: 0 / 0';
              }
              ?>
            </div>
            <div class="col-sm-4"></div>
         </div>
      </div>
    </body>
</html>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if(empty($_SESSION['Login'])) {
	header('Location: Login.php');
}
$correct = NULL;
$score = NULL;
$total = NULL;
$error = NULL;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstNum2 = $_POST['firstNumber'];
  $secondNum2 = $_POST['secondNumber'];
  $operation2 = $_POST['operationPeformed'];
  $score2 = $_POST['score'];
  $total2 = $_POST['total'] + 1;

  if (is_numeric($_POST['answer'])) {

    if($operation2 == '+') {
      $answer = $firstNum2 + $secondNum2;
    } else {
      $answer = $firstNum2 - $secondNum2;
    }

    if($_POST['answer'] == $answer) {
      $correct = 1;
      $score2++;
    } else {
      $correct = 2;
    }

  } else {
    $error = true;
  }

  $score = $score2;
  $total = $total2;

} else {
  $score = 0;
  $total = 0;
}

$placeHolder = rand(0, 1);
$firstNum2 = rand(0, 20);
$secondNum2 = rand(0, 20);

if($placeHolder == 1) {
  $operation = '+';
}
else {
  $operation = '-';
}

?>
