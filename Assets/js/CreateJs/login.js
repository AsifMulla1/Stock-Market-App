a=false;
$(document).ready(function(){
$("#btn_login").click(function(){
    // alert('hi');
if(a==false){
  loginform();
 }
  });
});

function loginform()
{


    var flag = 0;
    var username=$('#username').val(); 
    var password=$('#password').val(); 
    // alert("hi");
    if(username == ''){
      document.getElementById("erroruname").innerHTML ="Enter Username.";
      flag = 1;
      }
      if(password == ''){
        document.getElementById("errorpassword").innerHTML ="Enter Password.";
        flag = 1;
      }
      myFunction();
      if(flag == 0){
        //alert('hi');

        $.ajax({

          url: base_path+"Login/login_validation",
          method: "POST",
          data:$('#Form').serialize(),
          dataType:'json',
          beforeSend:function(){
            $('#btn_login').prop('disabled',true);
            $('#btn_login').css('color','#000');
            $('#btn_login').hover(
              function(){
                //Mouse over,apply styles
                $(this).css({
                  'color':'#fff'
                });
              },
              function(){
                //Mouse out, revert styles to the initial state
                $(this).css({
                  'color':'#424040bf'
                });
              }
            );
            $('#btn_login').html('Log In');
          },
          success:function(result) {
            $('#btn_login').prop('disabled',false);
            $('#btn_login').css('color','#000');
            console.log(result);
            //console.log(typeof(parseInt(result)));

            if(parseInt(result)==1){
              $('#btn_login').prop('disabled',true);
              $('#btn_login').html('Login successful');

              // setTimeout(function(){
                window.location.href = base_path + "ShareMarket/create";
              // },1500);

              // window.location.href = base_path+"Contact";

            }else if(parseInt(result)==2){
              document.getElementById("errorLogin").innerHTML="Invalid username & password !";

            }
              else{
              document.getElementById("errorLogin").innerHTML="Somthing went wrong!";

            }
          }
        });
      }
    }
    function myFunction(){
      var a=document.createElement("erroruname");
      var b=document.createElement("errorpassword");
      var c=document.createElement("errorLogin");

      setTimeout(function(){a.innerHTML=""},3000);
      setTimeout(function(){b.innerHTML=""},3000);
      setTimeout(function(){c.innerHTML=""},3000);




    }



