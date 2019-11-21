jQuery(document).ready(function($) {
  $("form[name='mc-embedded-subscribe-form']").on("submit", function(e) {
    fbq('track', 'CompleteRegistration', {
      value: $("#mce-EMAIL").val(),
    });
  });
});