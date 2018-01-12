<?php
    include_once '../dbscripts/lang.php';
     //$footlang = new lang(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
 $footlang = new lang('fr');
?>
<footer>
        <script>

         $('.menu').stickThis({
            debugmode:true
        });
            

        </script>
         
        <script>

        $('.collapsible').click(function(){
            $coll = $(this);
            $content = $coll.next();
            $content.slideToggle(400, function () {
             //execute this after slideToggle is done
             //change text of header based on visibility of content div
                        if($coll.hasClass('expanded'))
                        {
                            $coll.on("change",function(){
                                $('.plusMinus').text('-');
                            });
                            $coll.toggleClass('collapsed expanded');
                        }
                        else
                        {
                            $coll.on("change",function(){
                                $('.plusMinus').text('+');
                            });
                            $coll.toggleClass('expanded collapsed');
                        } 
            });
        });

        </script>

       <!--  <a class="top" href="#">Back to top</a>
        <script>
        $('a.top').click(function() {
            /* Act on the event */
            $(document.body).animate({scrollTop: 0}, 500);
            return false;
        });
        </script>-->
            <h2 class="hidden">Our footer</h2>
            

            <section class="wrapper">
                <article class="column midlist">
                    <h4><?php echo $footlang->xlate('foot-a');?> </h4>
                    
                    <h4><?php echo $footlang->xlate('foot-b');?></h4>
                    <h4>Email : <a href="mailto:<?php echo $footlang->xlate('foot-c');?>"><?php echo $footlang->xlate('foot-c');?></a></h4>

                    <h4><?php echo $footlang->xlate('foot-d');?> : <a href="tel:+20 112 164 6225">+20 112 164 6225</a></h4>
                      
                </article>

                 <article class="column midlist">
                    <h4><?php echo $footlang->xlate('foot-e');?></h4>
                    <ul>
                        <li><a href="javascript:void(0)">Ad-Douroûs An-Nahwiyya</a></li>
                        <li><a href="javascript:void(0)">At-Tatbîq An-Nahwî</a></li>
                        <li><a href="javascript:void(0)">Al-Ajourroûmiyya</a></li>
                        <li><a href="javascript:void(0)">At-Tatbîq As-Sarfî</a></li>
                        <li><a href="javascript:void(0)">Nazhm `Ouqoûd Al-Joumân</a></li>
                    </ul>
                </article>

                <article class="column midlist">
                     <h4><?php echo $footlang->xlate('foot-f');?></h4>
                     <?php include 'newsletter.php'; ?> 
                </article>

                <article class="column midlist">
                    <h4>Merkez Al Isbaah</h4>
                    <ul>
                        <?php include 'nav.php'; ?>
                    </ul>
                </article>

                <article class="column midlist" id="address">
                  <h4><?php echo $footlang->xlate('foot-g');?></h4>
                   <h2><?php echo $footlang->xlate('foot-h');?></h2>
                   <h2>Location Mandara </h2> 
                   <h2><?php echo $footlang->xlate('foot-i');?></h2>

                   <div class="map-small">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d939.8041628722003!2d30.022486972411844!3d31.270206419344635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f5d086fd61a977%3A0xed795d5847af6d2c!2sAl+Thalathini%2C+Qism+El-Montaza%2C+Alexandria+Governorate%2C+Egypt!5e1!3m2!1sen!2sca!4v1449706747154" allowfullscreen></iframe>
                   </div>                    
                </article>
                
            </section>


            <section id="copyright">
                <h3 class="hidden">Copyright notice</h3>
                <div class="wrapper">
                    <ul class="social">
                         <li class="facebook" title="Facebook">
                            <a href="https://www.facebook.com/pages/Markaz-Al-Isbaah/261221930644812" target="_blank">
                                <i class="fa fa-facebook">
                                </i>
                            </a>
                        </li>
                        <li class="twitter" title="Twitter">
                            <a href="https://twitter.com/AlIsbaahNet?ref_src=twsrc%5Etfw" target="_blank">
                                <i class="fa fa-twitter">
                                </i>
                            </a>
                        </li>
                        <li class="linkedin" title="LinkedIn">
                            <a href="https://www.linkedin.com/" target="_blank">
                                <i class="fa fa-linkedin">
                                </i>
                            </a>
                        </li>
                        <li class="youtube" title="YouTube">
                            <a href="https://youtube.com" target="_blank">
                                <i class="fa fa-youtube">
                                </i>
                            </a>
                        </li>
                        
                    </ul>

                    &copy;<?php echo $footlang->xlate('foot-j');?>  <a href="http://www.cleanereview.ca">Merkez Al Isbaah</a>. <?php echo $footlang->xlate('foot-k');?>

                    <?php echo $footlang->xlate('foot-l');?>  <a href="http://www.9alamdevelopments.com" target="_blank">9alam Dev</a>
                    

                </div>
            </section>     
        </footer>
    </body>
</html>