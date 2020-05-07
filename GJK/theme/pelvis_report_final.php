<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style>
  .button {
    font-family: "Comic Sans MS", "Comic Sans", cursive;
    background-color: #dce5f3; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
  }

  .button1 {
    background-color: #dce5f3;
    color: black;
    border: 2px solid #410b77;
  }

  .button1:hover {
    background-color: #410b77;
    color: white;
  }

  .button2 {
    background-color: #cef5f2;
    color: black;
    border: 2px solid #008CBA;
  }

  .button2:hover {
    background-color: #008CBA;
    color: white;
  }

  .button3 {
    background-color: white;
    color: black;
    border: 2px solid #f44336;
  }

  .button3:hover {
    background-color: #f44336;
    color: white;
  }

  .button4 {
    background-color: white;
    color: black;
    border: 2px solid #e7e7e7;
  }

  .button4:hover {background-color: #e7e7e7;}

  .button5 {
    background-color: #c4c9c9;
    color: black;
    border: 2px solid #2d2b2f;
  }

  .button5:hover {
    background-color: #2d2b2f;
    color: white;
  }
  </style>
  <body>
    <table>
      <tr>
        <td>
          <form action="form_pelvis.php" method="post">
            <input class="button button1" type="submit" name="newPelvis" value="New"/>
          </form>
        </td>
        <td>
          <form action="form_pelvis.php" method="post">
            <input type="submit" class="button button2" name="date2" value="Second time"/>
          </form>
        </td>
        <td>
          <form action="form_pelvis.php" method="post">
            <input type="submit" class="button button2" name="date3" value="Third time"/>
          </form>
        </td>
        <td>
          <form action="form_pelvis.php" method="post">
            <input type="submit" class="button button5" name="date4" value="Final report"/>
          </form>
        </td>
      </tr>
      <tr>
        <td>
          <form action="form_pelvis.php" method="post">
            <input type="submit" class="button button5" name="final" value="reports"/>
          </form>
        </td>
      </tr>
    </table>
  </body>
</html>
