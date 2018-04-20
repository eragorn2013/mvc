<!DOCTYPE html>
<html lang="ru">
      <head>		
		<meta name="viewport" content="initial-scale=1, maximum-scale=1.0">		   
		<title><?= $data->title ?></title>
            <meta name="description" content="<?= $data->description ?>">
            <meta name="keywords" content="<?= $data->keywords ?>"/>
            <link rel="stylesheet" type="text/css" href="<?= User::generateLink('/css/styles.css') ?>">                                
      </head>
      <body>
            <div class='wrapper'>
                  <header>
                        <div class='container'>                                                           
                        </div>
                  </header>
                  <nav>
                        <div class='container'>                              
                        </div>
                  </nav>             
                 
                  <?php include './application/views/'.$input; ?>
                  <footer>
                        <div class='container'>                              
                        </div>
                  </footer>
            </div>      
      <link rel="stylesheet" type="text/css" href="/js/owlcarousel/docs/assets/owlcarousel/assets/owl.carousel.min.css">  
      <link rel="stylesheet" type="text/css" href="/js/owlcarousel/docs/assets/owlcarousel/assets/owl.theme.green.css"> 
      <link rel="stylesheet" type="text/css" href="/js/lightgallery/dist/css/lightgallery.css">      
      <script src='/js/jquery/jquery-3.2.1.min.js'></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
      <script src='/js/lightgallery/dist/js/lightgallery.min.js'></script>       
      <script src='/js/phone/jquery.mask.min.js'></script>   
      <script src='<?= User::generateLink("/js/site_settings.js") ?>'></script>      
      <script src='/js/owlcarousel/docs/assets/owlcarousel/owl.carousel.min.js'></script>     

      <script>
            $(document).ready(function() {
                  $(".photo").lightGallery(); 

                  $(".owl-carousel").owlCarousel({                      
                        margin:15,
                        nav:false,
                        responsive:{
                        0:{
                              items:1
                           },
                        800:{
                              items:3
                                },
                        1000:{
                               items:5
                                  }
                        }
                  });                     
            });  
            
      </script>   
            
      </body>
</html>