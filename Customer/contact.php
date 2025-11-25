<?php
include 'header.php';
?>

<div id="fh5co-contact" class="fh5co-section-gray" style="padding: 80px 0;">
    <div class="container">
        <!-- Heading -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <br><br>
                <h2 style="font-family: 'Sacramento', cursive; font-size: 3.5em; color: #a14e54; margin-bottom: 20px;">Contact Us</h2>
                <p class="lead" style="color: #666; font-size: 1.2em;">We'd love to hear from you! Whether it's a question, feedback, or a sprinkle of wedding magic—reach out below.</p>
            </div>
        </div>

        <div class="row" style="margin-top: 50px;">
            <!-- Contact Information -->
            <div class="col-md-4">
                <div class="contact-info" style="text-align: center;">
                    <div class="info-item" style="margin-bottom: 30px;">
                        <i class="icon-location" style="font-size: 2.5em; color: #a14e54; margin-bottom: 15px;"></i>
                        <h4 style="color: #a14e54;">Our Location</h4>
                        <p style="color: #666;">123 Wedding Lane<br>Chennai, Tamil Nadu 600001</p>
                    </div>
                    
                    <div class="info-item" style="margin-bottom: 30px;">
                        <i class="icon-phone" style="font-size: 2.5em; color: #a14e54; margin-bottom: 15px;"></i>
                        <h4 style="color: #a14e54;">Call Us</h4>
                        <p style="color: #666;">+91 98765 43210<br>+91 87654 32109</p>
                    </div>
                    
                    <div class="info-item" style="margin-bottom: 30px;">
                        <i class="icon-mail" style="font-size: 2.5em; color: #a14e54; margin-bottom: 15px;"></i>
                        <h4 style="color: #a14e54;">Email Us</h4>
                        <p style="color: #666;">info@eternacards.com<br>support@eternacards.com</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-8">
                <div class="contact-form" style="background: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 5px 25px rgba(0,0,0,0.1);">
                    <form action="contactprocess.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" style="color: #555; font-weight: 500;">Your Name *</label>
                                    <input type="text" class="form-control" name="name" required 
                                           style="border: 2px solid #e9ecef; border-radius: 5px; padding: 12px; transition: all 0.3s ease;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" style="color: #555; font-weight: 500;">Your Email *</label>
                                    <input type="email" class="form-control" name="email" required 
                                           style="border: 2px solid #e9ecef; border-radius: 5px; padding: 12px; transition: all 0.3s ease;">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject" style="color: #555; font-weight: 500;">Subject *</label>
                            <input type="text" class="form-control" name="subject" required 
                                   style="border: 2px solid #e9ecef; border-radius: 5px; padding: 12px; transition: all 0.3s ease;">
                        </div>
                        
                        <div class="form-group">
                            <label for="message" style="color: #555; font-weight: 500;">Message *</label>
                            <textarea class="form-control" name="message" rows="6" required 
                                      style="border: 2px solid #e9ecef; border-radius: 5px; padding: 12px; transition: all 0.3s ease; resize: vertical;"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block" 
                                style="background: #a14e54; border: none; padding: 15px; font-size: 1.1em; border-radius: 5px; margin-top: 20px; transition: all 0.3s ease;">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>

       
       
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>