
$(document).ready(function(){

          $(".search").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("main .card").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });


            var swiper = new Swiper('.swiper-container', {
              spaceBetween: 30,
              centeredSlides: true,
              autoplay: {
                delay: 2500,
                disableOnInteraction: false,
              },
              pagination: {
                el: '.swiper-pagination',
                clickable: true,
              },
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
            });

            $("nav ul li a").click(function(){
              $(this).addClass("active").parent().siblings().find("a").removeClass("active");

          });

          var top= $(".top");
          $(window).scroll(function(){

          if($(window).scrollTop() >= 1000){
              if(top.is(":hidden")){
             top.fadeIn();
              }
          }else{
              top.fadeOut();
          }
          });

          $(".top").click(function(event){
              event.preventDefault();
              $("html, body").animate({
                  scrollTop:0},400)
          });
          $(".mobile").click(function(){
              $(".main-menu").toggleClass("open");
          });
          $(".main-menu a").click(function(){
            $(".main-menu").toggleClass("open");
          });
            $("body").on("click","img",function(){
              var x=$(this).attr("src");
              $(".zoom").find("img").attr("src",x);
              $('.zoom').zoom();
          });
          $.ajax({
            url: 'https://dash.faster-eg.com/api/sliderimg',
            dataType: 'json',
            success: function(apiResponse) {

                $(".img1").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img1+'" style="height: 55vh !important;">');
                $(".img2").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img2+'" style="height: 55vh !important;">');
                $(".img3").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img3+'" style="height: 55vh !important;">');
                $(".img4").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img4+'" style="height: 55vh !important;">');
                $(".img5").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img5+'" style="height: 55vh !important;">');
                $(".img6").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img6+'" style="height: 55vh !important;">');
                $(".img7").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img7+'" style="height: 55vh !important;">');
                $(".img8").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img8+'" style="height: 55vh !important;">');
                $(".img9").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img9+'" style="height: 55vh !important;">');
                $(".img10").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img10+'" style="height: 55vh !important;">');


            }
        });
        $(".logo a").click(function(){
          $.ajax({
            url: 'https://dash.faster-eg.com/api/sliderimg',
            dataType: 'json',
            success: function(apiResponse) {

                $(".img1").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img1+'" style="height: 55vh !important;">');
                $(".img2").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img2+'" style="height: 55vh !important;">');
                $(".img3").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img3+'" style="height: 55vh !important;">');
                $(".img4").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img4+'" style="height: 55vh !important;">');
                $(".img5").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img5+'" style="height: 55vh !important;">');
                $(".img6").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img6+'" style="height: 55vh !important;">');
                $(".img7").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img7+'" style="height: 55vh !important;">');
                $(".img8").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img8+'" style="height: 55vh !important;">');
                $(".img9").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img9+'" style="height: 55vh !important;">');
                $(".img10").append('<img src="https://dash.faster-eg.com/images/sliderimg/'+apiResponse[0].img10+'" style="height: 55vh !important;">');


            }
          });
        });
  });

  "use strict";

  !function() {
    var t = window.driftt = window.drift = window.driftt || [];
    if (!t.init) {
      if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
      t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ],
      t.factory = function(e) {
        return function() {
          var n = Array.prototype.slice.call(arguments);
          return n.unshift(e), t.push(n), t;
        };
      }, t.methods.forEach(function(e) {
        t[e] = t.factory(e);
      }), t.load = function(t) {
        var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
        var i = document.getElementsByTagName("script")[0];
        i.parentNode.insertBefore(o, i);
      };
    }
  }();
  drift.SNIPPET_VERSION = '0.3.1';
  drift.load('h8rvm26etpp2');
