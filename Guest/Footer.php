<footer id="fh5co-footer" role="contentinfo" style="background: #fdf6f6; padding: 40px 0; border-top: 1px solid #f0e6e6;">
    <div class="container">
        <div class="row copyright">
            <div class="col-md-12 text-center">
                <p style="margin-bottom: 15px;">
                    <small class="block" style="color: #a14e54; font-size: 16px; font-weight: 500;">
                        Eterna Wedding Cards
                    </small>
                </p>
                <p style="margin-bottom: 20px;">
                    <small class="block" style="color: #666; font-size: 14px;">
                        &copy; <?php echo date('Y'); ?> Eterna Wedding Cards. All Rights Reserved.
                    </small>
                </p>
                <p style="margin-bottom: 25px;">
                    <small class="block" style="color: #888; font-size: 13px;">
                        Crafting Timeless Memories for Your Special Day
                    </small>
                </p>
                <ul class="fh5co-social-icons" style="margin-bottom: 10px;">
                    <li><a href="#" aria-label="Instagram" style="color: #a14e54;"><i class="icon-instagram"></i></a></li>
                    <li><a href="#" aria-label="Facebook" style="color: #a14e54;"><i class="icon-facebook"></i></a></li>
                    <li><a href="#" aria-label="Pinterest" style="color: #a14e54;"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#" aria-label="WhatsApp" style="color: #a14e54;"><i class="icon-whatsapp"></i></a></li>
                </ul>
                <p>
                    <small class="block" style="color: #999; font-size: 12px;">
                        Need help? <a href="contact.php" style="color: #a14e54; text-decoration: none;">Contact Us</a> | 
                       c 
                        <a href="register.php" style="color: #a14e54; text-decoration: none;">Register</a>
                    </small>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- countTo -->
<script src="js/jquery.countTo.js"></script>
<!-- Stellar -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<script src="js/simplyCountdown.js"></script>
<!-- Main -->
<script src="js/main.js"></script>

<script>
    var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
</script>

</body>
</html>