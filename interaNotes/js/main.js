$(document).ready(function() {
  function setHeight() {
    windowHeight = $(window).innerHeight();
    $('.container-fluid').css('min-height', windowHeight-($('footer').height() + $('nav').height() + 21));
  };
  setHeight();

  $(window).resize(function() {
    setHeight();
  });
});
