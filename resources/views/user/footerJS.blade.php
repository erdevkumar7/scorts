<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
</script>

<script>
    $(document).ready(function() {
        $("#card-carousel").owlCarousel({
            loop: true,
            items: 5,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                    dots: true,
                },
                600: {
                    items: 1,
                    nav: false,
                    dots: true,
                },
                1000: {
                    items: 5,
                    nav: true,
                    dots: true,
                },
            },
        });
    });
</script>


<script>
    jQuery(document).ready(function($) {
        var owl = $("#owl-demo-2");
        owl.owlCarousel({
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            items: 3,
            loop: true,

            responsive: {
                0: {
                    items: 1
                    // nav: true
                },
                480: {
                    items: 2,
                    nav: false
                },
                768: {
                    items: 3,
                    // nav: true,
                    loop: false
                },
                992: {
                    items: 4,
                    // nav: true,
                    loop: false
                }
            },
            responsiveRefreshRate: 200,
            responsiveBaseElement: window,
            fallbackEasing: "swing",
            info: false,
            nestedItemSelector: false,
            itemElement: "div",
            stageElement: "div",
            refreshClass: "owl-refresh",
            loadedClass: "owl-loaded",
            loadingClass: "owl-loading",
            rtlClass: "owl-rtl",
            responsiveClass: "owl-responsive",
            dragClass: "owl-drag",
            itemClass: "owl-item",
            stageClass: "owl-stage",
            stageOuterClass: "owl-stage-outer",
            grabClass: "owl-grab",
            autoHeight: false,
            lazyLoad: false
        });

        $(".next").click(function() {
            owl.trigger("owl.next");
        });
        $(".prev").click(function() {
            owl.trigger("owl.prev");
        });
    });
</script>


<script>
    $('.carousel-main').owlCarousel({
        items: 6,
        loop: true,
        autoplay: true,
        autoplayTimeout: 1500,
        margin: 10,
        nav: true,
        dots: false,
        navText: ['<span class="fas fa-chevron-left fa-2x"></span>',
            '<span class="fas fa-chevron-right fa-2x"></span>'
        ],

        responsive: {
            0: {
                items: 1
                // nav: true
            },
            480: {
                items: 2,
                nav: false
            },
            768: {
                items: 3,
                // nav: true,
                loop: false
            },
            992: {
                items: 6,
                // nav: true,
                loop: false
            }
        },
    })
</script>


<script>
    $('.carousel-main-two').owlCarousel({
        items: 4,
        loop: true,
        autoplay: true,
        autoplayTimeout: 1500,
        margin: 10,
        nav: true,
        dots: false,
        navText: ['<span class="fas fa-chevron-left fa-2x"></span>',
            '<span class="fas fa-chevron-right fa-2x"></span>'
        ],

        responsive: {
            0: {
                items: 1
                // nav: true
            },
            480: {
                items: 2,
                nav: false
            },
            768: {
                items: 3,
                // nav: true,
                loop: false
            },
            992: {
                items: 4,
                // nav: true,
                loop: false
            }
        },

    })
</script>
{{-- <script src="script.js"></script> --}}
<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    // select2
    $(document).ready(function() {
        $('#services').select2({
            placeholder: "Select Services"
        });

        $('#language_spoken').select2({
            placeholder: "Select Language"
        });

        $('#availability').select2({
            placeholder: "Select Availability"
        });

        $('#currencies_accepted').select2({
            placeholder: "Select Currencies"
        });

        $('#payment_method').select2({
            placeholder: "Select Payment Methods"
        });
    });
</script>

<script>
    // removeError
    function removeError(id) {
        var errElement = document.getElementById(id);
        if (errElement) {
            errElement.style.display = 'none'
        }
    }
    //handleLogOut
    function handleLogOut(user) {
        if (user === 'user') {
            event.preventDefault();
            document.getElementById('user-logout-form').submit();
        } else if (user === 'escort') {
            event.preventDefault();
            document.getElementById('escort-logout-form').submit();
        } else if (user === 'agency') {
            event.preventDefault();
            document.getElementById('agency-logout-form').submit();
        }
    }
</script>
{{-- toaster message script --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    // Configure Toastr options
    toastr.options = {
        "closeButton": true, // Enable close button
        "progressBar": true, // Optional: show a progress bar
        "timeOut": "3000", // Optional: duration in milliseconds
        "extendedTimeOut": "1000", // Optional: additional time after mouse over
        "positionClass": "toast-top-right" // Optional: set position
    };

    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif
</script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#agencies_escort').DataTable({
            // Optional configurations
            "paging": true, // Enable pagination
            "searching": true, // Enable search
            "ordering": true, // Enable sorting
            "info": true, // Show table information
            "autoWidth": false // Auto adjust column width
        });
    });
</script>


<!-- google  reCAPTCHA !-->
{{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function removeRecaptchaError() {
        const recaptchaErrorElement = document.getElementById('g_recaptcha_id');
        if (recaptchaErrorElement) {
            recaptchaErrorElement.style.display = 'none';
        }
    }
</script>

<!-- Script to disable button after form submit -->
<!-- for this add Button id="loginSignup_btn" -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('loginRegisterForm').addEventListener('submit', function(e) {
            // Disable the default form submission temporarily
            e.preventDefault();

            // Disable the submit button
            var submitButton = document.getElementById('loginSignup_btn');
            submitButton.disabled = true;
            submitButton.innerText = 'Wait...';
            submitButton.classList.add('loginSignup_btn_disabled'); // Add your class
            // After disabling the button, submit the form
            this.submit();
        });
    });
</script>
