<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/dash1.scss">

    <title>X-42 Discord Music Bot</title>
</head>
<body>
  
<div class="principal">
  <div class="logo">
    <img src="../img/logo.png" alt="">
  </div>

  <div class="menu">
  
      <div class='grain'></div>
    <div class='intro'>
      <div class='center'>
        <div class='core'></div>
        <div class='outer_one'>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
          <div class='outer_one__piece'></div>
        </div>
        <div class='outer_two'>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
          <div class='outer_two__piece'></div>
        </div>
        <div class='outer_three'>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
          <div class='outer_three__piece'></div>
        </div>
        <div class='outer_four'>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
          <div class='outer_four__piece'></div>
        </div>
        <div class='outer_five'>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
          <div class='outer_five__piece'></div>
        </div>
        <div class='pieces'>
          <a href="sons.php">
          <div class='future_ui__piece'>
              <span>SONS</span>
              <div class='line'></div>
              <div class='tip'>Sim, Comandante!</div>
          </a>
          </div>
          <div class='future_ui__piece'>
            <span>CONSOLE</span>
            <div class='line'></div>
            <div class='tip'>
            Sim, Comandante!
            </div>
          </div>
          <div class='future_ui__piece'>
            <span>CONFIG</span>
            <div class='line'></div>
            <div class='tip'>
            Sim, Comandante!
            </div>
          </div>
          <div class='future_ui__piece'>
            <span>MEU PERFIL</span>
            <div class='line'></div>
            <div class='tip'>
            Sim, Comandante!
            </div>
          </div>
          <div class='future_ui__piece'>
            <span>LOGOUT</span>
            <div class='line'></div>
            <div class='tip'>
            Sim, Comandante!
            </div>
          </div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
          <div class='future_ui__piece blank'></div>
        </div>
      </div>
    </div>
  </div><!--menu-->
</div><!--principal-->

    <script src="../js/dashcript.js"></script>
</body>
</html>