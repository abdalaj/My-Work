$(function(){

    document.getElementById('full-height').style.height = window.innerHeight + "px";

    //show password
    $('.toggle-pass').on('click',function(){
        
       var x = document.getElementById('toggle-pass');

        console.log(x.type);

        if (x.type == "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
    })
})