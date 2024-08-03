// a=false;
// $(document).ready(function(){
//   // stocks();
// $("#stocksaveBtn").click(function(){
// if(a==false){
//   stocksave();
  
//  }
//   });
// });

// function stocksave()
// {


//     // var StockID =$('#StockID').val();
//     var StockNm=$('#StockNm').val(); 



// if( StockNm=="") 
// {
    
//     Swal.fire({
//           title: 'Oops!',
//           text: 'Please Enter Required Fields!',
//           icon: 'error',
//           showConfirmButton : false,
//           timer: 5000,
//           timerProgressBar: true
//         })
        
// }
    
//     else
//     {      
      
//         $.ajax({
//               url:base_path+"ShareMarket/insertmodelStock",
//               type: "POST",
           
//               data: $('#stockForm').serialize(),
//               beforeSend: function(){
//               $('#stocksaveBtn').prop('disabled', true);
//               $('#stocksaveBtn').html('<i class="fa fa-spinner " style="padding-right:2%;"></i> Loading');
//               }, 
//                success: function(data) { 
//                 console.log(data);
//               $("#patientForm").trigger("reset");
              
//               $('#stocksaveBtn').html('<i class="fa fa-check-circle" style="font-size: 20px;color: #FFF;"></i>Save');
//               $('#stocksaveBtn').prop('disabled', false);
           
//              Swal.fire({
//                 title: 'Good job!',
//               text: 'Data Submitted Successfully!',
//               icon: 'success',
//               showConfirmButton : false,
//               timer: 900,
//               timerProgressBar: true
//             })
//             stocks();
           
//            a=false;
//            setTimeout(function () {
//             // window.location.reload();
//             $("#myModal").modal("hide");
//           }, 1000);
            
            
//                }
//           });      
//     }
//   }
//         // Use Ajax For without referashing dropdown save and fatch
//         function stocks(){
          
//           $.ajax({
    
//           url:base_path+"ShareMarket/dropdownshare",
//           method:'post',
//           dataType : 'json',
//           success:function(res){
            
//           console.log(res);
         
//           $('#FkStockId').empty();
//           $('#FkStockId').append('<option value="" >-Select-</option>');
//           for(var i=0;i<res.length;i++){
//            $('#FkStockId').append('<option value="'+res[i]['StockID']+'">'+res[i]['StockID']+'   '+res[i]['StockNm']+'</option>');
//            }
           
//           }
//          });
//       }

// ************** save  *************
$(document).ready(function(){
  $('#stocksaveBtn').click(function(){
    //  alert("hii");
      if($('#StockNm').val()=='')
      {
        swal({
          title:"",
          text:"Please Enter Stock",
          type:"error",
          showConfirmButton: true,
           width: '1000px',
          
      });
      }
      else
      { 
  
        $.ajax({    
          url:base_path+"ShareMarket/insertmodelStock",   
          type:'POST',
          data:{
            'StockNm':$('#StockNm').val()
  
          },
           success:function(data)
          {
            // console.log('manu',data);
          
            swal({
              title:"",
              text:"Data Submitted Successfully",
              type:"success",
              showCancelButton: false, 
              showConfirmButton: false,
               width: '1000px',
              timer:1000
          });
            $('#StockNm').val('');
            $('#myModal').modal('hide');
            // document.getElementById("StockNm").blur();
            // document.getElementById('manufactureId').focus();

            // document.getElementById('companyclose').click();
            // $('#manufactureId').select2('open');
  
  
           },
          complete:function(){
            chkFlag=1;
            Company();
        
            // document.getElementById("StockNm").blur();
            // document.getElementById('manufactureId').focus();

        
  
          }
  
        }); 
  
        
  
      }
      
    });

  

    function Company(){
      $.ajax({
        url:base_path+'ShareMarket/dropdownshare',
          method: "POST",
          dataType: 'json',
          success:function(data){
      
            console.log(data);


            const lastElement = data.slice(-1)[0];

            const lastcompanyId = lastElement.StockID;
              console.log("lastcompanyId list data",lastcompanyId);


            $('#FkStockId').empty();
             $('select[name="FkStockId"]').empty();
             $('#FkStockId').append('<option value="0">  Company List  </option>');
     
            //  $('#companyid').append('</optgroup><option value="AC" class="btn btn-info" style="margin:auto;">-- Next --</option>');

          


              $.each(data,function(index,value){
                   
                  $('#FkStockId').append('<option value="'+value['StockID']+'">'+value['StockNm']+'</option>');
               
                 
              });      
              
            $('#FkStockId').val(lastcompanyId).trigger('change');
            
       
        }
      });
     
  }




});
