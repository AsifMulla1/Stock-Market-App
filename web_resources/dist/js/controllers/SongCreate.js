var a=false;
$(document).ready(function(){
$("#btn_save").click(function(){
    // alert("hi");
  if(a==false){
    
    saveperform();
   }
  }); 
});


 function saveperform() 
{ 
    var songName=$('#songName').val();
    var artist=$('#artist').val();
    var language=$('#language').val();
    var getaudio=$('#getaudio').val();
    var getphoto=$('#getphoto').val();
   

    
    var songId=$('#songId').val();


    if(songName==""|| artist==""||language==""||language==0||getaudio==""||getaudio==null||getphoto==""||getphoto==null) 
    {
      // alert("requird");
        swal({
        title:"",
        text:"Please Enter Required Fields",
        type:"error",           
    });   
  }

    else
    {
    	if(songId>0 )
    	{
            a=true;

            var form = $("#Form").closest("form");
            var formData = new FormData(form[0]);
    	
    		$.ajax({
        url:base_path+"Addnewsong/updateSong",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        // data: $('#Form').serialize(),
         beforeSend: function(){
               $('#btn_save').prop('disabled', true);
               $('#btn_save').html('Loading');
          }, 
        success: function(data) {
          console.log(data);
           $('#btn_save').prop('disabled', false);
           $('#btn_save').html('Save');
             
            swal({
            title:"",
            text:"Data Updated Successfully",
            type:"success",
            showCancelButton: true, 
            showConfirmButton: false,
            timer:2000
        }); a=false;
            window.location.href = base_path+"Addnewsong";
          }
      });
    	}
        else
    	{a=true;

        
      var form = $("#Form").closest("form");
      var formData = new FormData(form[0]);
    		
    		$.ajax({
        url:base_path+"Addnewsong/insertSong",
        type: "POST",

        data: formData,
        processData: false,
        contentType: false,

        // data: $('#Form').serialize(),
         beforeSend: function(){
               $('#btn_save').prop('disabled', true);
               $('#btn_save').html('Loading');
          }, 
        success: function(data) {

            $('#btn_save').prop('disabled', false);
           $('#btn_save').html('Save');
             $("#Form").trigger("reset");
             document.getElementById("profile-img-tag1").src = "";

             // alert("hi");
          swal({
            title:"",
            text:"Data Submitted Successfully",
            type:"success",
            showCancelButton: false, 
            showConfirmButton: false,
             width: '1000px',
            timer:1000
        });
           
           a=false;

                }
      });
    	}
      }
 }
