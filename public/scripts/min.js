
$(document).ready(function(){

          $(".search").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("main .card").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

              });
            });

            const search = document.getElementById('search');
            const found = document.getElementById('found');
            const searchStates  = async searchText=>{
                const types = document.querySelector('#types')['value'];
                var res;
                if (types == 'ac') {
                  res = await fetch('https://dash.faster-eg.com/api/accessories');
                }else if (types == 'bu') {
                  res = await fetch('https://dash.faster-eg.com/api/beauty');
                }else if (types == 'el') {
                  res = await fetch('https://dash.faster-eg.com/api/electronics');
                }else if (types == 'co') {
                  res = await fetch('https://dash.faster-eg.com/api/computers');
                }else if (types == 'to') {
                  res = await fetch('https://dash.faster-eg.com/api/toys');
                }else if (types == 'fo') {
                  res = await fetch('https://dash.faster-eg.com/api/foods');
                }else if (types == 'mo') {
                  res = await fetch('https://dash.faster-eg.com/api/mobiles');
                }else if (types == 'ca') {
                  res = await fetch('https://dash.faster-eg.com/api/car');
                }else if (types == 'sh') {
                  res = await fetch('https://dash.faster-eg.com/api/shoes');
                }else if (types == 'cl') {
                  res = await fetch('https://dash.faster-eg.com/api/clothes');
                }
                else if (types == 'bo') {
                  res = await fetch('https://dash.faster-eg.com/api/books');
                }
                const states = await res.json();

                let matches = states.filter(state => {
                   const regex = new RegExp(`^${searchText}`,'gi');
                   return state.name.match(regex) || state.describ.match(regex) || state.summry.match(regex) || state.price.match(regex) || state.saler.match(regex) || state.stauts.match(regex) || state.address.match(regex);
                });
                if (searchText.length === 0) {
                    matches=[];
                    found.style.display = 'none';
                }
                outputHtml(matches);
            };

            const outputHtml = matches=>{
                if (matches.length>0) {
                  found.style.display = 'block';
                  found.style.backgroundColor='white';
                  found.style.width='89%';
                  found.style.height='420px';
                  found.style.padding='20px 40px';
                  found.style.position='absolute';
                  found.style.top='118px';
                  found.style.zIndex='999999999999999';
                  found.style.overflowY='auto';
                  const types = document.querySelector('#types')['value'];
                  if (types == 'ac') {
                    const html = matches.map(match=>`
                    <ul style="list-style: none;text-align:right !important">
                      <li style="margin-bottom: 20px;">
                        <a href="/accessories/${match.id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
                      </li>
                    </ul>
                    `).join('');
                    found.innerHTML = html;
                  }else if (types == 'bu') {
                    const html = matches.map(match=>`
                    <ul style="list-style: none;text-align:right !important">
                      <li style="margin-bottom: 20px;">
                        <a href="/beauty/${match.id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
                      </li>
                    </ul>
                    `).join('');
                    found.innerHTML = html;
                  }else if (types == 'el') {
                    const html = matches.map(match=>`
                    <ul style="list-style: none;text-align:right !important">
                      <li style="margin-bottom: 20px;">
                        <a href="/electronics/${match.id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
                      </li>
                    </ul>
                    `).join('');
                    found.innerHTML = html;
                  }else if (types == 'co') {
                    const html = matches.map(match=>`
                    <ul style="list-style: none;text-align:right !important">
                      <li style="margin-bottom: 20px;">
                        <a href="/computers/${match.id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
                      </li>
                    </ul>
                    `).join('');
                    found.innerHTML = html;
                  }else if (types == 'to') {
                    const html = matches.map(match=>`
                    <ul style="list-style: none;text-align:right !important">
                      <li style="margin-bottom: 20px;">
                        <a href="/toys/${match.id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
                      </li>
                    </ul>
                    `).join('');
                    found.innerHTML = html;
                  }else if (types == 'fo') {
                    const html = matches.map(match=>`
                    <ul style="list-style: none;text-align:right !important">
                      <li style="margin-bottom: 20px;">
                        <a href="/foods/${match.id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
                      </li>
                    </ul>
                    `).join('');
                    found.innerHTML = html;
                  }else if (types == 'mo') {
                    const html = matches.map(match=>`
                    <ul style="list-style: none;text-align:right !important">
                      <li style="margin-bottom: 20px;">
                        <a href="/mobiles/${match.id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
                      </li>
                    </ul>
                    `).join('');
                    found.innerHTML = html;
                  }else if (types == 'ca') {
                    const html = matches.map(match=>`
                    <ul style="list-style: none;text-align:right !important">
                      <li style="margin-bottom: 20px;">
                        <a href="/car/${match.id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
                      </li>
                    </ul>
                    `).join('');
                    found.innerHTML = html;
                  }else if (types == 'sh') {
                    const html = matches.map(match=>`
                    <ul style="list-style: none;text-align:right !important">
                      <li style="margin-bottom: 20px;">
                        <a href="/shoes/${match.id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
                      </li>
                    </ul>
                    `).join('');
                    found.innerHTML = html;
                  }else if (types == 'cl') {
                    const html = matches.map(match=>`
                    <ul style="list-style: none;text-align:right !important">
                      <li style="margin-bottom: 20px;">
                        <a href="/clothes/${match.id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
                      </li>
                    </ul>
               `).join('');
               found.innerHTML = html;          }
                  else if (types == 'bo') {
                    const html = matches.map(match=>`
                    <ul style="list-style: none;text-align:right !important">
                      <li style="margin-bottom: 20px;">
                        <a href="/books/${match.id}" style="text-decoration: none;color: black;font-size:18px;font-weight:300">${match.summry}</a>
                      </li>
                    </ul>
               `).join('');
               found.innerHTML = html;          }

                }else{
                  found.innerHTML = '<div id="not" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);font-size:25px;font-weight:bold">ما تبحث عنه غير موجود للاسف <span id="x" style="color:red"> X</span></div>';
                    document.getElementById('x').addEventListener('click',function(){
                        document.getElementById('not').style.display = 'none';
                        found.style.display = 'none'
                        search['value'] = '';
                    });
                }
            }

            search.addEventListener('input',() => searchStates(search['value']));


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

            $.ajax({
              url: 'https://api.countapi.xyz/hit/faster-eg/visits',
              dataType: 'json',
              success: function(apiResponse) {
                  $(".num").text(apiResponse.value);
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
