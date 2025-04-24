    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container  mt-5">
            <div class="row gy-4">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <h4>Vibrancy Path</h4>
                    <p>Live Your Soul's Purpose With Passion and Power.</p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <h4>Quick Link</h4>
                    <ul class="list-unstyled"> 
                        <li><i class="fa-solid fa-arrow-right-long"></i></i><a href="{{ route('customer.about') }}">About</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="{{ route('customer.coaching') }}">Coaching</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#courses">Courses</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="{{ route('customer.store') }}">Store</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="{{ route('customer.privacypolicy') }}">Privacy Policy</a>
                        </li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#terms&conditions">Terms &
                                Conditions</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <h4>Products</h4>
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#">Charts</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#">eBooks</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#">Vibrancy Essences</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#">Webinars</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <h4>Have a question?</h4>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt" title="Address"></i> The Vibrancy Path 250
                            Lakeland Lane, Faber, VA 22938</li>
                        <li><i class="fas fa-phone" title="Phone"></i> +434-361-2042</li>
                        <li><i class="fas fa-envelope" title="Email"></i> info@thevibrancypath.com<br>
                            support@thevibrancypath.com
                        </li>
                    </ul>
                </div>
            </div>
            <div class="copyright mt-3 text-center">
                <p>Copyright ©2024 All rights reserved | Design & Develop
                    <i class="ri-heart-line"></i> By
                    <a href="sanpurple">Sanpurple Inc.</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
    <script src="{{ asset('assets/js/frontendcustom.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
   
</body>

</html>