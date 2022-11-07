<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>L3Task-3</title>
    <style>

      div {
        text-align: left;

        width: 420px;
        padding: 10px;
        border: 1px solid black;
      }
    </style>
  </head>

  <body>
    <h2>PROFILE PICTURE</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <div>
        <input type="file" name="file" />
      </div>
      <div>
        <input type="submit" name="submit" value="Submit" />
      </div>
    </form>
  </body>
</html>