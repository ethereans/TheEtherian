jQuery(function($) {
  // Initialize input masking for phone number.
  Inputmask({'mask': '(999) 999-9999', 'showMaskOnHover': false}).mask('input[name="contact-phone"]');

  // Initialize ContactForm
  ContactForm.init();
});
