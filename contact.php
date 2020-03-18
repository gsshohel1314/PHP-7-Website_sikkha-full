<?php
    require_once('webFunctions/function.php');
    getHeader();
 ?>
    <!-- slider-start -->
    <div class="slider-area">
        <div class="page-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(img/bg/others_bg.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Contact Us</h1>
                                <nav class="text-center" aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-end -->
    <!-- courses start -->
    <div class="advisors-area gray-bg pt-95 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 offset-md-1 ml-md-auto">
                    <div class="contact-info-text">
                        <div class="section-title mb-20">
                            <div class="section-title-heading mb-10">
                                <h1>Contact Info</h1>
                            </div>
                            <div class="section-title-para">
                                <p>Lorem ipsum dolor sit amet, consecte adipisicing elit sed do eiusmod tempor incididunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="contact-info mb-50 wow fadeInRight" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                        <ul>
                            <li>
                                <div class="contact-icon">
                                    <i class="ti-headphone"></i>
                                </div>
                                <div class="contact-text">
                                    <h5>Call Us</h5>
                                    <span>+0123456789</span>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon">
                                    <i class="ti-email"></i>
                                </div>
                                <div class="contact-text">
                                    <h5>Email Us</h5>
                                    <span>support@gmail.com</span>
                                </div>
                            </li>
                            <li>
                                <div class="contact-icon">
                                    <i class="ti-location-pin"></i>
                                </div>
                                <div class="contact-text">
                                    <h5>Location</h5>
                                    <span>123 Business Avenue, Hoston, USA</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-10 offset-md-1 ml-md-auto">
                    <div class="events-details-form faq-area-form mb-30 p-0">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="events-form-title mb-25">
                                      <?php
                                        if(isset($_POST['submit'])){
                                          $name=htmlentities($_POST['name'],ENT_QUOTES);
                                          $phone=htmlentities($_POST['phone'],ENT_QUOTES);
                                          $email=htmlentities($_POST['email'],ENT_QUOTES);
                                          $subject=htmlentities($_POST['subject'],ENT_QUOTES);
                                          $message=htmlentities($_POST['message'],ENT_QUOTES);
                                          $insert="INSERT INTO adm_contact(con_name,con_phone,con_email,con_subject,con_message)
                                          VALUES('$name','$phone','$email','$subject','$message')";
                                          if(mysqli_query($con,$insert)){
                                            echo "Your contact information send successful.";
                                          }else{
                                            echo "Failed!Try again.";
                                          }
                                        }
                                       ?>
                                        <h2>Do You Have Any Questions</h2>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input placeholder="Name :" type="text" name="name">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input placeholder="Phone :" type="text" name="phone">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input placeholder="Email :" type="text"name="email">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input placeholder="Subject :" type="text"name="subject">
                                </div>
                                <div class="col-xl-12">
                                    <textarea cols="30" rows="10" placeholder="Message :" name="message"></textarea>
                                </div>
                                <div class="col-xl-12">
                                    <div class="faq-form-btn events-form-btn">
                                        <button type="submit" name="submit" class="btn m-0">Submit Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- courses end -->
    <!-- map start -->
    <div class="map-area" style="background-image: url(img/map/contact_us_map.jpg); height: 700px;">

    </div>
    <!-- map end -->
    <?php
      getFooter();
     ?>
