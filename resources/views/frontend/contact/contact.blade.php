@extends('frontend.master')
@section('title')
    Contact    
@endsection

@section('body_section')

<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Contact Us</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="{{ route('product-shop') }}">Shop</a></li>
                    <li><a href="{{ route('contact') }}"> Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section id="contact-us" class="contact-us section">
    <div class="container">
    <div class="contact-head">
    <div class="row">
    <div class="col-12">
    <div class="section-title">
    <h2>Contact Us</h2>
    <p>There are many variations of passages of Lorem
    Ipsum available, but the majority have suffered alteration in some form.</p>
    </div>
    </div>
    </div>
    <div class="contact-info">
    <div class="row">
    <div class="col-lg-4 col-md-12 col-12">
    <div class="single-info-head">
    
    <div class="single-info">
    <i class="lni lni-map"></i>
    <h3>Address</h3>
    <ul>
    <li>44 Shirley Ave. West Chicago,<br> IL 60185, USA.</li>
    </ul>
    </div>
    
    
    <div class="single-info">
    <i class="lni lni-phone"></i>
    <h3>Call us on</h3>
    <ul>
    <li><a href="tel:+18005554400">+1 800 555 44 00 (Toll free)</a></li>
    <li><a href="tel:+321556667890">+321 55 666 7890</a></li>
    </ul>
    </div>
    
    
    <div class="single-info">
    <i class="lni lni-envelope"></i>
    <h3>Mail at</h3>
    <ul>
    <li><a href="https://demo.graygrids.com/cdn-cgi/l/email-protection#81f2f4f1f1eef3f5c1f2e9eef1e6f3e8e5f2afe2eeec"><span class="__cf_email__" data-cfemail="483b3d3838273a3c083b2027382f3a212c3b662b2725">[email&#160;protected]</span></a>
    </li>
    <li><a href="https://demo.graygrids.com/cdn-cgi/l/email-protection#3b585a495e5e497b4853544b5c49525f4815585456"><span class="__cf_email__" data-cfemail="3b585a495e5e497b4853544b5c49525f4815585456">[email&#160;protected]</span></a></li>
    </ul>
    </div>
    
    </div>
    </div>
    <div class="col-lg-8 col-md-12 col-12">
    <div class="contact-form-head">
    <div class="form-main">
    <form class="form" method="post" action="https://demo.graygrids.com/themes/shopgrids/assets/mail/mail.php">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-12">
    <div class="form-group">
    <input name="name" type="text" placeholder="Your Name" required="required">
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
    <div class="form-group">
    <input name="subject" type="text" placeholder="Your Subject" required="required">
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
    <div class="form-group">
    <input name="email" type="email" placeholder="Your Email" required="required">
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
    <div class="form-group">
    <input name="phone" type="text" placeholder="Your Phone" required="required">
    </div>
    </div>
    <div class="col-12">
    <div class="form-group message">
    <textarea name="message" placeholder="Your Message"></textarea>
    </div>
    </div>
    <div class="col-12">
    <div class="form-group button">
    <button type="submit" class="btn ">Submit Message</button>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    
    
    <footer class="footer">
    
    <div class="footer-top">
    <div class="container">
    <div class="inner-content">
    <div class="row">
    <div class="col-lg-3 col-md-4 col-12">
    <div class="footer-logo">
    <a href="index.html">
    <img src="assets/images/logo/white-logo.svg" alt="#">
    </a>
    </div>
    </div>
    <div class="col-lg-9 col-md-8 col-12">
    <div class="footer-newsletter">
    <h4 class="title">
    Subscribe to our Newsletter
    <span>Get all the latest information, Sales and Offers.</span>
    </h4>
    <div class="newsletter-form-head">
    <form action="#" method="get" target="_blank" class="newsletter-form">
    <input name="EMAIL" placeholder="Email address here..." type="email">
    <div class="button">
    <button class="btn">Subscribe<span class="dir-part"></span></button>
    </div>
    </form>
    </div>
     </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    
    <div class="footer-middle">
    <div class="container">
    <div class="bottom-inner">
    <div class="row">
    <div class="col-lg-3 col-md-6 col-12">
    
    <div class="single-footer f-contact">
    <h3>Get In Touch With Us</h3>
    <p class="phone">Phone: +1 (900) 33 169 7720</p>
    <ul>
    <li><span>Monday-Friday: </span> 9.00 am - 8.00 pm</li>
    <li><span>Saturday: </span> 10.00 am - 6.00 pm</li>
    </ul>
    <p class="mail">
    <a href="https://demo.graygrids.com/cdn-cgi/l/email-protection#35464045455a474175465d5a4552475c51461b565a58"><span class="__cf_email__" data-cfemail="1a696f6a6a75686e5a6972756a7d68737e6934797577">[email&#160;protected]</span></a>
    </p>
    </div>
    
    </div>
    <div class="col-lg-3 col-md-6 col-12">
    
    <div class="single-footer our-app">
    <h3>Our Mobile App</h3>
    <ul class="app-btn">
    <li>
    <a href="javascript:void(0)">
    <i class="lni lni-apple"></i>
    <span class="small-title">Download on the</span>
    <span class="big-title">App Store</span>
    </a>
    </li>
    <li>
    <a href="javascript:void(0)">
    <i class="lni lni-play-store"></i>
    <span class="small-title">Download on the</span>
    <span class="big-title">Google Play</span>
    </a>
    </li>
    </ul>
    </div>
    
    </div>
    <div class="col-lg-3 col-md-6 col-12">
    
    <div class="single-footer f-link">
    <h3>Information</h3>
    <ul>
    <li><a href="javascript:void(0)">About Us</a></li>
    <li><a href="javascript:void(0)">Contact Us</a></li>
    <li><a href="javascript:void(0)">Downloads</a></li>
    <li><a href="javascript:void(0)">Sitemap</a></li>
    <li><a href="javascript:void(0)">FAQs Page</a></li>
    </ul>
    </div>
    
    </div>
    <div class="col-lg-3 col-md-6 col-12">
    
    <div class="single-footer f-link">
    <h3>Shop Departments</h3>
    <ul>
    <li><a href="javascript:void(0)">Computers & Accessories</a></li>
    <li><a href="javascript:void(0)">Smartphones & Tablets</a></li>
    <li><a href="javascript:void(0)">TV, Video & Audio</a></li>
    <li><a href="javascript:void(0)">Cameras, Photo & Video</a></li>
    <li><a href="javascript:void(0)">Headphones</a></li>
    </ul>
    </div>
    
    </div>
    </div>
    </div>
    </div>
    </div>
    
@endsection