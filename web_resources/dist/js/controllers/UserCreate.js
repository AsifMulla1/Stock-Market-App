var a=false;
$(document).ready(function(){
$("#btn_save").click(function(){
  if(a==false){
    
    saveperform();
   }
  }); 
});


 function saveperform() 
{ 
    var username=$('#username').val();
    var user_type=$('#user_type').val();
    var reg_date=$('#reg_date').val();
    var exp_date=$('#exp_date').val();
    var gender=$('#gender').val();
    var mob_no=$('#mob_no').val();
    var password=$('#password').val();
    var country=$('#country').val();
    var state=$('#state').val();
    var district=$('#district').val();
    var village=$('#village').val();
    var pincode=$('#pincode').val();
    var reference=$('#reference').val();
    var package_type=$('#package_type').val();
    var package_amount=$('#package_amount').val();
    var discount_type=$('#discount_type').val();
    var discount_amount=$('#discount_amount').val();
    var total_amount=$('#total_amount').val();
    var address=$('#address').val();
    var photo=$('#photo').val();
   
    

    


    if(username==""|| user_type==""|| reg_date==""||  exp_date==""||  gender==""||  mob_no==""|| password==""|| country==""||  state==""||  district==""|| village==""||  pincode==""|| reference==""|| package_type==""|| package_amount==""||  discount_type==""||  discount_amount==""|| total_amount==""||  address==""|| photo=="") 
    {
      alert("requird");
        swal({
        title:"",
        text:"Please Enter Required Fields",
        type:"error",           
    });   
  }

    // else
    // {
    // 	if(userId>0)
    	// {
      //       a=true;
    	
    		// $.ajax({
      //   url:base_path+"Country/updateCountry",
      //   type: "POST",
      //   data: $('#Form').serialize(),
      //    beforeSend: function(){
      //          $('#btn_save').prop('disabled', true);
      //          $('#btn_save').html('Loading');
      //     }, 
      //   success: function(data) {
      //      $('#btn_save').prop('disabled', false);
      //      $('#btn_save').html('<img src="'+base_path+'assets/images/save.png" width="21"> Save');
             
      //       swal({
      //       title:"",
      //       text:"Data Submitted Successfully",
      //       type:"success",
      //       showCancelButton: true, 
      //       showConfirmButton: false,
      //       timer:10000
      //   }); a=false;
      //       window.location.href = base_path+"Country";
      //     }
      // });
    	// }
        else
    	{a=true;
    		
    		$.ajax({
        url:base_path+"Createuser/insertUser",
        type: "POST",
        data: $('#Form').serialize(),
         beforeSend: function(){
               $('#btn_save').prop('disabled', true);
               $('#btn_save').html('Loading');
          }, 
        success: function(data) {

            $('#btn_save').prop('disabled', false);
           $('#btn_save').html('Save');
             $("#Form").trigger("reset");

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
           $('#Form').parsley().destroy();
           $('#Form').parsley();
           a=false;

                }
      });
    	}
      }
 // }
