/*
 * AJAX Contact Form Component
 * ---------------------------
 * Works with PHPMailer and PHPFormValidator.
 */

var ContactForm = {
	init: function() {
		this.form = $('#contactForm');
		this.submitButton = this.form.find('button[type="submit"]');
    this.errorAlert = $('#errorAlert');
    this.successMessage = $('#successMessage');

		$.proxy(this.bindEvents(), this);
	},

	bindEvents: function() {
		this.form.submit($.proxy(this.submitForm, this));
	},

	submitForm: function(event) {
		event.preventDefault();

		this.form.find('input, textarea').css('border', 'none');
		this.submitButton.prop('disabled', 'disabled');
		this.submitButton.text('Sending...');

		var data = new FormData(event.currentTarget);

		$.ajax({
			url: 'contact/contact-submit.php',
			data: data,
			processData: false,
			contentType: false,
			type: 'POST',
			success: $.proxy(this.handleResponse, this),
			failure: $.proxy(this.serverError, this)
		});
	},

	handleResponse: function(data, status, xhr) {
		if (data.errors)
		{
			var allErrors = '';

			for (error in data.errors)
			{
				console.log(error + ' : ' + data.errors[error]);

				this.form.find('input[name="' + error + '"], textarea[name="' + error + '"]').css('border', '1px inset #dd0031');

				// Puts all errors in an array, useful for displaying
				// error messages all in one place.
				allErrors += data.errors[error] + ' ';
				this.errorAlert.text(allErrors).addClass('has-errors');

				setTimeout($.proxy(function() {
					this.errorAlert.removeClass('has-errors');
				}, this), 4000);
			}

			this.submitButton.text('Please Fix');
			return this.submitButton.prop('disabled', '');
		}

		this.form[0].reset();
		this.submitButton.text('Thanks!');
		this.submitButton.prop('disabled', '');
		return this.successMessage.addClass('show');
	},

	serverError: function() {
    this.submitButton.prop('disabled', '');
    this.submitButton.css('background', '#dd0031');
		return this.submitButton.text('!');
	}
};


$(function() {
  // Initialize input masking for phone number.
  Inputmask({'mask': '(999) 999-9999', 'showMaskOnHover': false}).mask('input[name="contact-phone"]');

  // Initialize ContactForm
  ContactForm.init();
});
