		<!--================ Start Newsletter Area =================-->
		<!-- added git rep ci/cd -->
        <section class="newsletter_area">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-12">
					<div class="subscription_box text-center">
						<h2 class="text-uppercase text-white">get update from anywhere</h2>
						<p class="text-white">
							
						</p>
						<div class="subcribe-form">
							<form  action="" class="subscription relative">
								<input  placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"  type="email" name="email" value="">
								<button type="submit" class="primary-btn hover d-inline">Get Started</button>
							
							</form>
							<div class="info"></div>
						</div>

						

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Newsletter Area =================-->
    
    <!--================Footer Area =================-->
	<footer class="footer_area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="footer_top flex-column">
						<div class="footer_logo">
							<a href="#">
								<img src="img/logo.png" alt="">
							</a>
							<h4>Follow Me</h4>
						</div>
						<div class="footer_social">
							<a href="https://wa.me/918519896519" target="_blank"><i class="fa fa-whatsapp"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-instagram"></i></a>
							<a href="#"><i class="fa fa-facebook"></i></a>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</footer>
	<!--================End Footer Area =================-->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="vendors/isotope/isotope-min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="js/noframework.waypoints.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/theme.js"></script>
	<script>			// new settler
document.querySelector('.subscription').addEventListener('submit', function (e) {
    e.preventDefault(); 
	const infoDiv = document.querySelector('.info');
    const form = e.target;
    const email = form.querySelector('[name="email"]').value;

    infoDiv.innerHTML = '<p>Sending...</p><div class="spinner"></div>';

    fetch('subscribe.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            infoDiv.innerHTML = '<p class="success">submitted successful!. we will contact you soon</p>';
			email.value = '';
        } else {
            infoDiv.innerHTML = '<p class="error">Failed to subscribe. Please try again.</p>';
        }
    })
    .catch(() => {
        infoDiv.innerHTML = '<p class="error">An error occurred. Please try again.</p>';
    });
});
	</script>
</body>

</html>