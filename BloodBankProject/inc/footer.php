        
    <div class="footer-bottom">
        <div class="container">
            <?php 

                 $getSocial = $bp->getSocial();
                 if( $getSocial ){
                    while( $result = $getSocial->fetch_assoc() ){
                            
            ?>
            <p><?php echo $result['copyright']; ?> <a href="http://impijush.com">Pijush Karmakar</a></p>

        <?php } } ?>

        </div>
    </div>


    <!--start-smooth-scrolling-->
    <script type="text/javascript">
        $(document).ready(function() {
            
					var defaults = {
			  			containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear' 
			 		};
					

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });

    </script>
    <!--end-smooth-scrolling-->
    <a href="#house" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


</body>

</html>

<?php ob_end_flush(); ?>
