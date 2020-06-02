<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>cakal</title>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script>
    $.ajax({
      'url'  : 'form.php',
      'type' : 'POST',
      'data' : {
        'hakkinda' : 'Hakkımı yiyene helal olsun...'
      }
    });
  </script>
</head>
<body>
  İncelediğimiz, ne olduğunun farkına varmadığımız içerik sayfası....
</body>
</html>
