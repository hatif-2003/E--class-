<div>
<!-- resources/views/components/footer.blade.php -->
<footer class="footer bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <!-- Brand Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h4 class="footer-logo mb-3">
                    <a href="" class="text-white text-decoration-none">
                        Coaching Connect
                    </a>
                </h4>
                <p class="text-muted">
                    Empowering your learning journey with world-class courses and expert instructors.
                </p>
                <div class="social-icons mt-3">
                    <a href="https://facebook.com" class="text-white me-3" target="_blank" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com" class="text-white me-3" target="_blank" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://instagram.com" class="text-white me-3" target="_blank" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://linkedin.com" class="text-white" target="_blank" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="text-white mb-3">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="" class="text-muted text-decoration-none hover-link">Home</a></li>
                    <li><a href="{{ route('public.about') }}" class="text-muted text-decoration-none hover-link">About Us</a></li>
                    <li><a href="" class="text-muted text-decoration-none hover-link">Courses</a></li>
                    <li><a href="" class="text-muted text-decoration-none hover-link">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-white mb-3">Contact Us</h5>
                <ul class="list-unstyled text-muted">
                    <li><i class="fas fa-map-marker-alt me-2"></i> 123 Learning Ave, Education City</li>
                    <li><i class="fas fa-phone-alt me-2"></i> +1 (123) 456-7890</li>
                    <li><i class="fas fa-envelope me-2"></i> <a href="mailto:support@coachingconnect.com" class="text-muted text-decoration-none hover-link">support@coachingconnect.com</a></li>
                </ul>
            </div>

            <!-- Newsletter Signup -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-white mb-3">Stay Updated</h5>
                <p class="text-muted">Subscribe to our newsletter for the latest updates and offers.</p>
                <form action="" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" class="form-control rounded-start" placeholder="Your Email" required>
                        <button type="submit" class="btn btn-primary rounded-end">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="row mt-4">
            <div class="col-12 text-center border-top border-secondary pt-3">
                <p class="text-muted mb-0">
                    &copy; {{ date('Y') }} Coaching Connect. All rights reserved.
                    <span class="ms-2">
                        <a href="" class="text-muted text-decoration-none hover-link">Privacy Policy</a> |
                        <a href="" class="text-muted text-decoration-none hover-link">Terms of Service</a>
                    </span>
                </p>
            </div>
        </div>
    </div>
</footer>

</div>