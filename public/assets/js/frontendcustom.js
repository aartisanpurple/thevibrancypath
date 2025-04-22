$(document).ready(function () {
    $('#contactForm').parsley(); // Initialize parsley

    $('#contactForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        let $form = $(this);
        let $button = $form.find('button[type="submit"]');

        if ($form.parsley().isValid()) {
            // Disable button to prevent multiple clicks
            $button.prop('disabled', true).text('Submitting...');

            // Optional: Submit form via AJAX or fallback to traditional post
            this.submit();
        }
    });

    $('#registerForm').parsley(); // Initialize parsley

    $('#registerForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        let $form = $(this);
        let $button = $form.find('button[type="submit"]');

        if ($form.parsley().isValid()) {
            // Disable button to prevent multiple clicks
            $button.prop('disabled', true).text('Submitting...');

            // Optional: Submit form via AJAX or fallback to traditional post
            this.submit();
        }
    });
    $('#loginForm').parsley(); // Initialize parsley

    $('#loginForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        let $form = $(this);
        let $button = $form.find('button[type="submit"]');

        if ($form.parsley().isValid()) {
            // Disable button to prevent multiple clicks
            $button.prop('disabled', true).text('Submitting...');

            // Optional: Submit form via AJAX or fallback to traditional post
            this.submit();
        }
    });
});