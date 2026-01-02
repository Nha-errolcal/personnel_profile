<section class="section" id="contact">
    <h2>Contact Me</h2>

    <div class="contact-wrapper">
        <!-- Contact Information -->
        <div class="contact-info">
            <div class="contact-info-card">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="contact-details">
                    <h3>Email Address</h3>
                    <p><a href="mailto:raksmey.mom@example.com">raksmey.mom@example.com</a></p>
                </div>
            </div>

            <div class="contact-info-card">
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="contact-details">
                    <h3>Phone Number</h3>
                    <p><a href="tel:+855123456789">+855 12 345 6789</a></p>
                </div>
            </div>

            <div class="contact-info-card">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="contact-details">
                    <h3>Location</h3>
                    <p>Phnom Penh, Cambodia</p>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="contact-info-card" style="flex-direction: column; align-items: flex-start;">
                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                    <div class="contact-icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <h3 style="margin: 0;">Social Media</h3>
                </div>
                <div class="social-links" style="margin: 0; justify-content: flex-start;">
                    <a href="https://linkedin.com/in/yourusername" target="_blank" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://github.com/yourusername" target="_blank" aria-label="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://facebook.com/yourusername" target="_blank" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/yourusername" target="_blank" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-wrapper">
            <h3 style="color: var(--text-dark); font-size: 1.5rem; margin-bottom: 20px;">
                Send Me a Message
            </h3>
            <form class="contact-form" action="send_message.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">
                    <i class="fas fa-paper-plane"></i> Send Message
                </button>
            </form>
        </div>
    </div>
</section>