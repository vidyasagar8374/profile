<?php include('header.php'); ?>

    <!--================ Start Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Contact Us</h2>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="contact.html">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Banner Area =================-->
    
    <!--================Contact Area =================-->
    <section class="contact_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Hyderabad</h6>
                            <p>Telangana India</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#"> (+91) 8519 89 6519</a></h6>
                            <p>Mon to Fri 9am to 6 pm</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">vidyasagar@vsdev.in</a></h6>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action=""  id="contactForm">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="primary_btn">
                                <span>Send Message</span>
                            </button>
                        </div>
                       
                    </form>
                    <div class="info text-center"></div>
                </div>
               
                
            </div>
            <!-- <div id="mapBox" class="mapBox" 
                data-lat="40.701083" 
                data-lon="-74.1522848" 
                data-zoom="13" 
                data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
                data-mlat="40.701083"
                data-mlon="-74.1522848">
            </div> -->
        </div>
    </section>
    <!--================Contact Area =================-->
    <script>
document.querySelector('.contact_form').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission


    // Select form elements
    const form = e.target;
    const infoDiv = document.querySelector('.info');
    const email = form.querySelector('[name="email"]').value.trim();
    const name = form.querySelector('[name="name"]').value.trim();
    const subject = form.querySelector('[name="subject"]').value.trim();
    const message = form.querySelector('[name="message"]').value.trim();

    if(email == '' || name == '' || subject == '' || message == '') {
        infoDiv.innerHTML = '<p class="error">Please fill in all required fields.</p>';
        return false;
    }

    // Display loading spinner or message
    infoDiv.innerHTML = '<p>Sending...</p><div class="spinner"></div>';

    // Send email using a POST request to `contact_process.php`
    fetch('contact_process.php', {
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        method: 'POST',
        body: new URLSearchParams({
            email: email,
            name: name,
            subject: subject,
            message: message
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            infoDiv.innerHTML = '<p class="success text-center">' + data.message + '</p>';
        } else {
            infoDiv.innerHTML = '<p class="error">' + data.message + '</p>';
        }
    })
    .catch(error => {
        console.error('Error:', error); // Log error for debugging
        infoDiv.innerHTML = '<p class="error">An error occurred: ' + error.message + '</p>';
    });
});
</script>

<?php include('footer.php'); ?>