<?php
    include 'arrays.php';
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Portal</title>
        <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../css/styleAdmin.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="../css/form.css" type="text/css" media="screen" />
        <!-- <link rel="stylesheet" href="../css/calendar.css" type="text/css" media="screen" /> -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans|Baumans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Calendar Inclusion -->
        <link href='../../calendar/css/fullcalendar.css' rel='stylesheet' />
        <link href='../../calendar/css/style.css' rel='stylesheet' />
        <link href='../../calendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />
    

        
        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="../favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="../favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <!-- include extern jQuery file but fall back to local file if extern one fails to load !-->
        <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js\/vendor\/1.7.2.jquery.min.js"><\/script>')</script>
        
        <script src="../js/prefixfree.min.js"></script>
        <script src="../js/jquery.slides.min.js"></script>
        <script src="../js/jquery.easing.min.js"></script>
        <script src="../js/script.js"></script>
        <script src="../js/jqMenu.js"></script>
        <script src="../js/modernizr-custom.js"></script>
        <script src="../js/respond.js"></script>
        <script src="../js/countries-2.0-min.js"></script>       
        <!--[if lt IE 9]>
            <style>
                header
                {
                    margin: 0 auto 20px auto;
                }
                #four_columns .img-item figure span.thumb-screen
                {
                    display:none;
                }  
            </style>
        <![endif]-->
        
        
        <script>
        $(function() {
          $('#slides').slidesjs({   
            navigation: false,
            height:350,
            pagination: false,
            effect: {
              fade: {
                speed: 400
              }
            },
            callback: {
                start: function(number)
                {           
                    $("#slider_content1,#slider_content2,#slider_content3").fadeOut(500);
                },
                complete: function(number)
                {           
                    $("#slider_content" + number).delay(500).fadeIn(1000);
                }       
            },
            play: {
                active: false,
                auto: true,
                interval: 6000,
                pauseOnHover: false,
                effect: "fade"
            }
          });
        });
        </script>

        <script>
            $(function() {
            //jQuery time
            var current_fs, next_fs, previous_fs; //fieldsets
            var left, opacity, scale; //fieldset properties which we will animate
            var animating; //flag to prevent quick multi-click glitches
            $(".next").click(function(){
                if(animating) return false;
                animating = true;
                
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                
                //activate next step on progressbar using the index of next_fs
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                
                //show the next fieldset
                next_fs.show(); 
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale current_fs down to 80%
                        scale = 1 - (1 - now) * 0.2;
                        //2. bring next_fs from the right(50%)
                        left = (now * 50)+"%";
                        //3. increase opacity of next_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({'transform': 'scale('+scale+')'});
                        next_fs.css({'left': left, 'opacity': opacity});
                    }, 
                    duration: 800, 
                    complete: function(){
                        current_fs.hide();
                        animating = false;
                    }, 
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });
            $(".previous").click(function(){
                if(animating) return false;
                animating = true;
                
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                
                //de-activate current step on progressbar
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                
                //show the previous fieldset
                previous_fs.show(); 
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function(now, mx) {
                        //as the opacity of current_fs reduces to 0 - stored in "now"
                        //1. scale previous_fs from 80% to 100%
                        scale = 0.8 + (1 - now) * 0.2;
                        //2. take current_fs to the right(50%) - from 0%
                        left = ((1-now) * 50)+"%";
                        //3. increase opacity of previous_fs to 1 as it moves in
                        opacity = 1 - now;
                        current_fs.css({'left': left});
                        previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
                    }, 
                    duration: 800, 
                    complete: function(){
                        current_fs.hide();
                        animating = false;
                    }, 
                    //this comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });
            $(".submit").click(function(){
                return false;
            })
            });
        </script>

                <!-- For Calendar inclusion on the registration page -->

        <script src='../../calendar/js/moment.min.js'></script>
        <!-- <script src='../calendar/js/jquery.min.js'></script> -->
        <script src='../../calendar/js/fullcalendar.min.js'></script> 
    </head>

    <body>
            
    <div id="main-wrapper"> 
      <header>
            <section class="container">
                <h2 class="hidden">Technical Information</h2>
               

                <img src="../img/backend.png" alt="Cleaning" />

            </section>

     </header>