//Login Validation
var objManager = [
  {
    username: "Manager",
    password: "manager01"
  }
]

var objTester = [
  {
    username: "Tester",
    password: "tester01"
  }
]

var objPatient = [
  {
    username: "Patient",
    password: "patient01"
  }
]

function getInfo(){
  var usernameLogin = document.getElementById("usernameLogin").value
  var passwordLogin = document.getElementById("passwordLogin").value

  if (usernameLogin==""){
    alert("Please enter username");
    $("usernameLogin").focus();
    return false;
  }

  if (passwordLogin==""){
    alert("Please enter password");
    $("passwordLogin").focus();
    return false;
  }

  for (i = 0; i < objManager.length; i++){
    if(usernameLogin == objManager[i].username && passwordLogin == objManager[i].password){
      window.location.replace("TCOhomepage.html")
    }
    //else {
      //alert("Username or password incorrect");
    //}
  }

  for (i = 0; i < objTester.length; i++){
    if(usernameLogin == objTester[i].username && passwordLogin == objTester[i].password){
      window.location.replace("recordNewTest.html")
    }
    //else {
    //  alert('Username or password incorrect');
    //  window.location.replace("loginNew.html")
  //  }
  }

  for (i = 0; i < objPatient.length; i++){
    if(usernameLogin == objPatient[i].username && passwordLogin == objPatient[i].password){
      window.location.replace("patientHomepage.html")
    }
    //else {
      //alert('Username or password incorrect');
    //  window.location.replace("loginNew.html")
    //}
  }
}

//Validation
function verifyForm(){
      var username = document.getElementById('patientUname').value;
      var password = document.getElementById('patientPassword').value;
      var fullname = document.getElementById('patientName').value;

      if (username==""){
        alert("Username cannot be blank.");
        $("patientUname").focus();
        return false;
      }

      if (password==""){
        alert("Password cannot be blank.");
        $("patientPassword").focus();
        return false;
      }

      if (fullname==""){
        alert("Fullname cannot be blank.");
        $("patientName").focus();
        return false;
      }



  }

//Validation for register test Center
function verifyTC(){
  var name = document.getElementById('tcName').value;

  if (name==""){
    alert("Please enter a name to register test center.");
    $("patientName").focus();
    return false;
  }
}

//Validation for recording a new testers
function verifyTester(){
  var testerUsername = document.getElementById('testerUname').value;
  var testerPassword = document.getElementById('testerPassword').value;
  var testerName = document.getElementById('testerName').value;

  if (testerUsername==""){
    alert("Please create tester's username.");
    $("testerUname").focus();
    return false;
  }

  if (testerPassword==""){
    alert("Please create tester's password.");
    $("testerPassword").focus();
    return false;
  }

  if (testerName==""){
    alert("Please enter tester's fullname.");
    $("testerName").focus();
    return false;
  }
}

//Function to validate test kit Stock
function verifyTestKit(){
  var testkitName = document.getElementById('testkitName').value;
  var testkitStock = document.getElementById('stock').value;

  if (testkitName==""){
    alert("Please enter Test Kit name.");
    $("testkitName").focus();
    return false;
  }

  if (testkitStock==""){
    alert("Please enter the amount of stock.");
    $("stock").focus();
    return false;
  }

  if (testkitStock < 0){
    alert("Test Kit stock amount should be more than 0.");
    $("stock").focus();
    return false;
  }
}

//Function to verify Test Kit from table
function verifyTestKitEdit(){
  var testkitStockEdit = document.getElementById('stockEdit').value;

  if (testkitStockEdit < 0){
    alert("Test Kit stock amount should be more than 0.");
    $("stockEdit").focus();
    return false;
  }
}
//Function to filter table
  $( document ).ready(function() {
    $('.dropdown').each(function (key, dropdown) {
        var $dropdown = $(dropdown);
        $dropdown.find('.dropdown-menu a').on('click', function () {
            $dropdown.find('button').text($(this).text()).append(' <span class="caret"></span>');
        });
    });
});

$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#searchingTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

(function($) {
  "use strict";

  // Preloader (if the #preloader div exists)
  $(window).on('load', function() {
    if ($('#preloader').length) {
      $('#preloader').delay(100).fadeOut('slow', function() {
        $(this).remove();
      });
    }
  });

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });

  // Header scroll class
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
      $('#topbar').addClass('topbar-scrolled ');
    } else {
      $('#header').removeClass('header-scrolled');
      $('#topbar').removeClass('topbar-scrolled ');
    }
  });

  if ($(window).scrollTop() > 100) {
    $('#header').addClass('header-scrolled');
    $('#topbar').addClass('topbar-scrolled');
  }

  // Smooth scroll for the navigation and links with .scrollto classes
  var scrolltoOffset = $('#header').outerHeight() - 1;
  $(document).on('click', '.main-nav a, .mobile-nav a, .scrollto', function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        e.preventDefault();

        var scrollto = target.offset().top - scrolltoOffset;

        if ($(this).attr("href") == '#header') {
          scrollto = 0;
        }

        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.main-nav, .mobile-nav').length) {
          $('.main-nav .active, .mobile-nav .active').removeClass('active');
          $(this).closest('li').addClass('active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('.mobile-nav-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Activate smooth scroll on page load with hash links in the url
  $(document).ready(function() {
    if (window.location.hash) {
      var initial_nav = window.location.hash;
      if ($(initial_nav).length) {
        var scrollto = $(initial_nav).offset().top - scrolltoOffset;
        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');
      }
    }
  });

  // Mobile Navigation
  if ($('.main-nav').length) {
    var $mobile_nav = $('.main-nav').clone().prop({
      class: 'mobile-nav d-lg-none'
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="fa fa-bars"></i></button>');
    $('body').append('<div class="mobile-nav-overly"></div>');

    $(document).on('click', '.mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('.mobile-nav-toggle i').toggleClass('fa-times fa-bars');
      $('.mobile-nav-overly').toggle();
    });

    $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
      e.preventDefault();
      $(this).next().slideToggle(300);
      $(this).parent().toggleClass('active');
    });

    $(document).click(function(e) {
      var container = $(".mobile-nav, .mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('.mobile-nav-overly').fadeOut();
        }
      }
    });
  } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
    $(".mobile-nav, .mobile-nav-toggle").hide();
  }

  // Navigation active state on scroll
  var nav_sections = $('section');
  var main_nav = $('.main-nav, .mobile-nav');
  var main_nav_height = $('#header').outerHeight();

  $(window).on('scroll', function() {
    var cur_pos = $(this).scrollTop() + 200;

    nav_sections.each(function() {
      var top = $(this).offset().top - main_nav_height,
        bottom = top + $(this).outerHeight();

      if (cur_pos >= top && cur_pos <= bottom) {
        main_nav.find('li').removeClass('active');
        main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
      }

      if (cur_pos < 300) {
        $(".nav-menu ul:first li:first").addClass('active');
      }

    });
  });

  // jQuery counterUp (used in Whu Us section)
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 1000
  });

  // Porfolio isotope and filter
  $(window).on('load', function() {
    var portfolioIsotope = $('.portfolio-container').isotope({
      itemSelector: '.portfolio-item'
    });
    $('#portfolio-flters li').on('click', function() {
      $("#portfolio-flters li").removeClass('filter-active');
      $(this).addClass('filter-active');

      portfolioIsotope.isotope({
        filter: $(this).data('filter')
      });
      aos_init();
    });
  });

  // Initiate venobox (lightbox feature used in portofilo)
  $(document).ready(function() {
    $('.venobox').venobox({
      'share': false
    });
  });

  // Testimonials carousel (uses the Owl Carousel library)
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1
  });

  // Clients carousel (uses the Owl Carousel library)
  $(".clients-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 2
      },
      768: {
        items: 4
      },
      900: {
        items: 6
      }
    }
  });

  // Portfolio details carousel
  $(".portfolio-details-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1
  });

  // Init AOS
  function aos_init() {
    AOS.init({
      duration: 1000,
      once: true
    });
  }
  $(window).on('load', function() {
    aos_init();
  });

})(jQuery);
