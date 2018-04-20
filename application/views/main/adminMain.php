<!DOCTYPE html>
<html lang="ru">
      <head>        
        <meta name="viewport" content="initial-scale=1, maximum-scale=1.0">        
        <title>Админпанель</title>       
        <link rel="stylesheet" type="text/css" href="/css/admin.css">                       
      </head>
      <body>
            <div class='wrapper'>
                  
                        <a href="/admin/exit">Выход</a>
                            
                  <?php include './application/views/'.$input; ?>                 
            </div> 
      <script src='/js/jquery/jquery-3.2.1.min.js'></script>
      <script src='/js/admin_settings.js'></script>            
      </body>
</html>