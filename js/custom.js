/* ========================================================================= */
/*	Preloader
/* ========================================================================= */

// jQuery(window).load(function () {
//   $("#preloader").fadeOut("slow");
// });

$(document).ready(function () {
  /* ========================================================================= */
  /*	Menu item highlighting
	/* ========================================================================= */

  jQuery("#nav").singlePageNav({
    offset: jQuery("#nav").outerHeight(),
    filter: ":not(.external)",
    speed: 1200,
    currentClass: "current",
    easing: "easeInOutExpo",
    updateHash: true,
    beforeStart: function () {
      console.log("begin scrolling");
    },
    onComplete: function () {
      console.log("done scrolling");
    },
  });

  $(window).scroll(function () {
    if ($(window).scrollTop() > 400) {
      $("#navigation").css("background-color", "#fffffff2");
      $("#navigation").css("box-shadow", "0px 2px 6px rgb(25 92 37 / 21%)");
      $("#navigation a").css("color", "#000");
      $(".navbar-brand svg").css("fill", "#00a14b");
    } else {
      $(".navbar-brand svg").css("fill", "#fff");
      $("#navigation").css("background-color", "transparent");
      $("#navigation").css("box-shadow", "none");
      $("#navigation a").css("color", "#fff");
    }
  });

  /* ========================================================================= */
  /*	Fix Slider Height
	/* ========================================================================= */

  var slideHeight = $(window).height() * 0.8;

  $("#slider, .carousel.slide, .carousel-inner, .carousel-inner .item").css(
    "height",
    slideHeight
  );

  $(window).resize(function () {
    "use strict",
      $("#slider, .carousel.slide, .carousel-inner, .carousel-inner .item").css(
        "height",
        slideHeight
      );
  });

  /* ========================================================================= */
  /*	Back to Top
	/* ========================================================================= */

  $(window).scroll(function () {
    if ($(window).scrollTop() > 400) {
      $("#back-top").fadeIn(200);
    } else {
      $("#back-top").fadeOut(200);
    }
  });
  $("#back-top").click(function () {
    $("html, body").stop().animate(
      {
        scrollTop: 0,
      },
      1500,
      "easeInOutExpo"
    );
  });
});
