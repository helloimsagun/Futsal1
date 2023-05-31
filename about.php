<section class="page-section" id="about" style="padding-top: 10em;">
    <div class="container text-center justify-content-center">
        <div class="activity-des">
            <h1>The Easiest Way To</h1>
            <div class="list">

                <h2>Find venues</h2>
                <h2>Invite Friends</h2>
                <h2>& Enjoy</h2>
            </div>
        </div>
        <div class="description">
            <h2>Booking Now Made A Lot Easier!</h2><br><br>
            <a href="#book"> Book Now</a>
        </div>
    </div>




    <div class="contact" id="contact">
        <div class="contact-about">
            <h3>About US</h3>
            <p>We are the easiest way to find playing spaces around you. Find venues, invite players, challenge
                teams, participate in a list of events and find playing spaces around you.</p>

        </div>
        <div class="contact-contact">
            <h3>Contact US</h3>
            <div class="log">
                <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                <p>bookfutsal@gmail.com</p>
            </div>
            <div class="log">
                <i class="fa-solid fa-phone"></i>
                <p>9815406495</p>
            </div>
            <div class="icons">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-linkedin"></i>
            </div>
        </div>
    </div>
</section>
<script>
    var navLinks = document.getElementById("navLinks");

    function showMenu() {
        navLinks.style.display = "block";
        navLinks.style.position = "fixed";
        navLinks.style.right = "0";
    }

    function hideMenu() {
        navLinks.style.display = "none";
        navLinks.style.right = "-200px";
    }
    // Check if the URL contains the bookSuccess parameter
    var urlParams = new URLSearchParams(window.location.search);
    var bookSuccess = urlParams.get('bookSuccess');

    // If bookSuccess is true, display the modal
    if (bookSuccess === 'true') {
        // Show the bookingSuccessModal
        var modal = document.getElementById("bookingSuccessModal");
        modal.style.display = "block";

        // Close the modal when the close button or modal overlay is clicked
        var closeButton = modal.querySelector(".close");
        closeButton.addEventListener("click", function() {
            modal.style.display = "none";
        });
        window.addEventListener("click", function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    }
</script>
