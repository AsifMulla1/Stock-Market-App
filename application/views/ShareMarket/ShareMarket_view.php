
<link rel="stylesheet" href="<?=base_url();?>Assets/select2/select2.min.css" />  
<link rel="stylesheet" href="<?=base_url();?>Assets/select2/multiselect.css" />  


       
       
       <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                
          

                
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
               
                    <div class="col-md-12">
                   
                        <div class="card ">
                        <div class="breadcrumb mb-0" >
                            <h1 style="font-family: 'Work Sans', sans-serif;">Share Market</h1>
                        
                        </div>
                       
                                
                            <div class="card-body">
                                
                            <form role="form" id="Form" action="" method="post">
                                
                                    
                                      <div class="row ">
                                        <input class="form-control" id="shareId"  placeholder="Enter your ID" name=""
                                        value="<?php if(!empty($data)) echo $data[0]->shareId;?>" type="hidden"/>
                                        <div class="col-md-3 form-group">
                                           
                                        <label for="name">Stock Name<span style="font-weight: 600"></span> <span class="required" style="color: red">*</span></label>
                                        <select style="width:100%;" class="select2 form-control" id="FkStockId" name=""
                                        <?php echo (!empty($data[0]->Leverage))?'' : '';?>>
                    
                                            <option value="0">-Select-</option>
                                            <?php foreach($StockNmdata as $value)
                                            {
                                                $selected="";
                                                if(!empty($data[0]->FkStockId)){

                                                    if($value->StockID == $data[0]->FkStockId) {
                                                      $selected="selected=selected";
                                                    } 
                                                }  
                                                                
                                                echo '<option value="'.$value->StockID.'" '.$selected.'>'.$value->StockNm.'</option>';
                                            }
                                            ?> 


                                          
                      
                                         
                                        </select>

                                        
                                        </div>
                                        <div>
                                          <button type="button" class="btnn" id="btnhide" data-toggle="modal" data-target="#myModal" >
                                          <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                                        
                                          
                                        </button>

                                          
                                        
                                        </div>
                                       
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="col-md-2 form-group">
                                           <label for="cr">Current Price<span style="font-weight: 600"></span> <span class="required" style="color: red">*</span></label>
                                           <?php
                                              $readonly = '';
                                              if (!empty($data[0]->CurrentPrice)){
                                                $readonly= 'readonly';
                                              }
                                           ?>
                                           <input type="number" class="form-control" name="" id="CurrentPrice" oninput="Qty()"  placeholder="Enter Current Price" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->CurrentPrice; ?>" <?php echo $readonly;?> required>
                      
                                        </div>
                                        <div class="col-md-2 form-group">
                                        <label for="amnt">First Investment<span style="font-weight: 600"></span><span class="required"  style="color: red">*</span></label>
                                        <?php
                                              $readonly = '';
                                              if (!empty($data[0]->Amount)){
                                                $readonly= 'readonly';
                                              }
                                        ?>
                                        <input type="number" oninput="TLeverage()" class="form-control"  name="" id="Amount" placeholder="Enter Amount" autofocus="autofocus"  value="<?php if(!empty($data))echo $data[0]->Amount; ?>" <?php echo $readonly;?> required>
                      
                                        </div> 
                                        <div class="col-md-2 form-group">
                                           <label for="name">Leverage<span style="font-weight: 600"></span> <span class="required" style="color: red">*</span></label>
                                           <select style="width:100%;" class="select2 multiple form-control" onchange="TLeverage()"  id="Leverage" name="" <?php echo (!empty($data[0]->Leverage))?'disabled' : '';?>>
                                           <option value="0">-Select-</option>
                                           <?php foreach($Leveragedata as $value)
                                            {
                                                // $selected="";
                                                // if(!empty($data[0]->Leverage)){

                                                //     if ($value->	Lid== $data[0]->Leverage) {
                                                //         $selected="selected=selected";
                                                //     } 
                                                // }  
                                                                
                                                echo '<option value="'. $value->	Lid.'" '.$selected.'>'. $value->LeverageID.'</option>';
                                            }
                                            ?> 
                      
                                           </select>
                                        </div> 
                                        <div class="col-md-2 form-group">
                                            <label for="qnt">Quantity(Stock)<span style="font-weight: 600"></span> <span class="required" style="color: red">*</span></label>
                                           
                                            <input type="number" class="form-control"  name="" id="Quantity"  placeholder="Quantity" autofocus="autofocus" oninput="calfirstinstallment()" value="<?php if(!empty($data))echo $data[0]->Quantity; ?>" <?php echo $readonly;?> required >
                      
                                        </div> 
                                        
                                      </div>


                                    <div class="row ">
                                    <div class="col-md-3 form-group">
                                        <label for="tamnt">Total 1st Investment<span style="font-weight: 600"></span> <span class="required" style="color: red">*</span></label>
                                        <?php
                                              $readonly = '';
                                              if (!empty($data[0]->ToAmount)){
                                                $readonly= 'readonly';
                                              }
                                        ?>
                                        <input type="number" class="form-control " name="" id="ToAmount" oninput="Qty()" placeholder=" Total Amount" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->ToAmount;?>" <?php echo $readonly;?> required>
                     
                                        </div>

                                        <div class="col-md-2 form-group mb-3">
                                            <label for="date">Date<span style="font-weight: 600"></span> 
                                                <span class="required" style="color: red">*</span>
                                            </label>
                                            <?php
                                              $readonly = '';
                                              if (!empty($data[0]->Date)){
                                                $readonly= 'readonly';
                                              }
                                            ?>
                                            <input type="date" class="form-control" name="" id="Date" autofocus="autofocus"  
                                             value="<?php if(!empty($data))echo $data[0]->Date;?>" <?php echo $readonly;?> required>
                                        </div>
                                        <div class="col-md-2 form-group">
                                           <label for="name">Buy/Sell<span style="font-weight: 600"></span> <span class="required" style="color: red">*</span></label>
                                           <select style="width:100%;" class="select2 multiple form-control"   id="PurchaseStock" name="" <?php echo (!empty($data[0]->PurchaseStock))?'disabled' : '';?>>
                                             <option value="0">-Select-</option>
                                             <option value="1">Buy</option>
                                             <option value="2">Sell</option>
                                          
                      
                                            </select>
                                        </div> 

                                       
                                    </div>
                                     
                                      <div class="row" id=Firsthidden>
                                        <div class="col-md-3 form-group mb-3"   id="NewDatehidden">
                                            <label for="date">2nd Date<span style="font-weight: 600"></span> 
                                                <span class="required" style="color: red">*</span>
                                            </label>
                                            <input type="date" class="form-control" name="" id="NewDate" autofocus="autofocus"  
                                             value="<?php if(!empty($data))echo $data[0]->NewDate;?>" required>
                                        </div>

                                        <div class="col-md-2 form-group" id="NewPricehidden">
                                           <label for="cr">New Price</label>
                                           <input type="number" class="form-control " name="" id="NewPrice" oninput="Qty()"  placeholder="Enter NewPrice" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->NewPrice;?>" required>
                      
                                        </div>
                                        <div class="col-md-2 form-group" id="NewProfitLosshidden">
                                           <label for="cr">Profit/Loss(%)</label>
                                           <input type="number" class="form-control " name="" id="Profit"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->Profit;?>" required>
                      
                                        </div>
                                        <div class="col-md-2 form-group" id="NewProfitLosshidden">
                                           <label for="cr">Profit/Loss(Amt)</label>
                                           <input type="number" class="form-control " name="" id="ProfitAmt"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->ProfitLossAmt;?>" required>
                      
                                        </div>
                                      
                                      </div>

                                    <div class="row" id="Secondhidden">
                                        <div class="col-md-2 form-group">
                                           <label for="cr">2nd Investment</label>
                                           <input type="number" class="form-control " name="" id="NewAvgPrice" oninput="Qty()" placeholder="Text investment" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->SecInvestment;?>" required>
                      
                                        </div>
                                        <div class="col-md-2 form-group">
                                           <label for="cr">Average Price</label>
                                           <input type="number" class="form-control " name="" id="AvgPrice"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->AveragePrice;?>" required>
                      
                                        </div>
                                        <div class="col-md-2 form-group">
                                           <label for="cr">Total 2nd Investment</label>
                                           <input type="number" class="form-control " name="" id="TotalAvgPrice"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->SecInveTotal;?>" required>
                      
                                        </div>
                                        <div class="col-md-2 form-group">
                                           <label for="cr">2nd Quantity(Stock)</label>
                                           <input type="number" class="form-control " name="" id="NewQty"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->SecQtyStock;?>" required>
                      
                                        </div>
                                      
                                        <div class="col-md-2 form-group" >
                                           <label for="cr">Total Stock</label>
                                           <input type="number" class="form-control " name="" id="TotQty"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->TotalStock;?>" required>
                      
                                        </div>
                                        <div class="col-md-2 form-group" >
                                           <label for="cr">Total Investment</label>
                                           <input type="number" class="form-control " name="" id="TotAmount2"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->TotalInvestment;?>" required>
                      
                                        </div>
                                        
                                    </div>
                                    <div class="row" id="Thirdhidden">
                                        <div class="col-md-2 form-group" >
                                           <label for="cr">Expect Loss(%)</label>
                                           <input type="number" class="form-control " name="" id="ExpLoss"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->ExpLoss;?>" required>
                      
                                        </div>
                                        <div class="col-md-2 form-group" >
                                           <label for="cr">Expect Loss(Amt)</label>
                                           <input type="number" class="form-control " name="" id="ExpLossAmt"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->ExpLossAmt;?>" required>
                      
                                        </div>
                                       
                                    </div>
                                    <div class="row" id="Thirdhidden" style="justify-content: right;margin-top: -70px;">
                                        <div class="col-md-2 form-group" >
                                           <label for="cr">Highest Price</label>
                                           <input type="number" class="form-control"  name="" id="MaxPrice"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->ExpLoss;?>" required>
                      
                                        </div>
                                        <div class="col-md-2 form-group " >
                                           <label for="cr">Lowest Price</label>
                                           <input type="number" class="form-control "  name="" id="MinPrice"  placeholder="" autofocus="autofocus" value="<?php if(!empty($data))echo $data[0]->ExpLossAmt;?>" required>
                      
                                        </div>
                                        
                                    </div>
                                     
                                    <div class="row ">
                                        <div class="col-md-12 text-right">
                                            <button class="btn btn-primary " type="button" name="btn_save" id="btn_savee">Submit</button>
                                            <a  class="btn btn-warning text-white" href="<?=base_url()?>ShareMarket/index">Edit</a>
                                            <!-- <button class="btn btn-warning text-white" type="button" name="cancel" id="cancel">Cancel</button> -->

                                        </div> 
                                    </div>
                                   
                                </form>
                                
                                <div class="table-responsive">

                                  <table class="display table mt-5" id="example" style="width:100%">
                                    <thead class="table-head-style">
                                      <tr>
                                                <!-- <th>Output</th> -->
                                                <!-- <th>shareId</th> -->
                                                <th>StockName</th>
                                                <th>CPrice</th>
                                                <th>Date</th>
                                                <th>Qty</th>
                                                <th>Leverage</th>
                                                <th>Amt</th>
                                                <th>ToAmt</th>
                                                <th>B/S</th>
                                                <th>P/L(%)</th>
                                                <th>P/L(Amt)</th>
                                                <th>NewPrice</th>
                                                
                                               
                                                 
                                      </tr>
                                    </thead>
                                  <tbody id="tabledata">
                                    
                                    
                                        

                                  </tbody>

                                </table>
                                </div>

                            </div>
                        </div>
                    </div>
</div>



  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="display: flex; justify-content: space-between;border-bottom: 2px solid #47484b!important;">
          <h4 class="modal-title" style="font-family: 'Work Sans', sans-serif;">Stocks</h4>
          <button type="button" class="close Modal_close-icon" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form class="needs-validation" id="stockForm"  >

                 
                 
 
                    <div class="form-row">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
                        <label for="name">Stock Name<span class="required" style="color: red">*</span></label>
                        <div class="input-group">
                          <input type="text" class="form-control form-control-sm" name="" id="StockNm" placeholder="Enter Name" value="" >   
                      </div>
                      </div>
                    </div>
               
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button class="btn btn-primary " type="button" name="btn_save" id="stocksaveBtn">Save</button>
          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
          
        </div>
        
      </div>
    </div>
  </div>
                  



<script  src="<?php echo base_url();?>Assets/js/jquery.min.js"></script> 
<script src="<?php echo base_url();?>Assets/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>Assets/select2/select2.init.js"></script>          

<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>       

<script src="<?php echo base_url();?>Assets/js/CreateJs/Popup.js"></script> 

<!-- -------------------Current date in javascript--------------------- -->
<script>
    document.getElementById('#Date').valueAsDate = new Date();   
    document.getElementById('#NewDate').valueAsDate = new Date();  
</script>


<script>  


var id= document.getElementById('shareId').value;


// Update button click then show inputs data on view page
  //  if(id==""){
  //    $("#Firsthidden,#Secondhidden,#Thirdhidden").hide();
  //  } 

    
    if (id>0){
        var PurchaseStock='<?php if(!empty($data)) echo $data[0]->PurchaseStock?>';
        // alert(PurchaseStock);

        if(PurchaseStock==1){
           $('#PurchaseStock').val('1').trigger('change');
        }
        else if(PurchaseStock==2){
           $('#PurchaseStock').val('2').trigger('change');
            
        }
        else{
          $('#PurchaseStock').val('0').trigger('change');

        }
}










var a=false;

$(document).ready(function(){
 
$("#btn_savee").click(function(){
    // alert("hi");

  if(a==false){
    
    saveperform();
   }
  }); 
 
});

function calfirstinstallment(){
  var sdrf=$('#df').val();
  var dfz=$('#dtgf').val();
  var Leverafdge=$('#dfc').val();


  var totamount=parseFloat(CurrentPrice)*parseFloat(Quantity);
  $('#ToAmount').val(totamount);
  var firstamount=parseFloat(totamount)/parseFloat(Leverage);
  $('#Amount').val(firstamount);

}
 function saveperform() 
{ 
     
    
  
 
     if()  {
        Swal.fire(
            'Oops!',
            'Please Enter Required Fields!',
            'error'
        );
     }
    else
    {
        if(shareId >0)
        {
        alert(shareId );
            a=true;

            var form = $("#Form").closest("form");
            var formData = new FormData(form[0]);
        
            $.ajax({
        url:base_path+"",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        // data: $('#Form').serialize(),
         beforeSend: function(){
               $('#btn_savee').prop('disabled', true);
               $('#btn_savee').html('Loading');
          }, 
        success: function(data) {
          console.log(data);
           $('#btn_savee').prop('disabled', false);
           $('#btn_savee').html('Save');

           Swal.fire(
            'Good job!',
            'Data Updated Successfully!',
            'success'
          );
         
          // set time function and direct page going on detail view
          setTimeout(function(){
            window.location.href = base_path+"";

          }, 500);

         a=false;
        
          }
      });
        }
        else
        {
          // alert('hi');
        a=true;
            var form = $("#Form").closest("form");
            var formData = new FormData(form[0]);
            
            $.ajax({
        url:base_path+"",
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
             $("#Form").trigger("reset");

             // alert("hi");

             Swal.fire(
              'Good job!',
              'Data Submitted Successfully!',
              'success'
            );

            // set time function and direct page going on detail view
            setTimeout(function(){
              window.location.href = base_path+"";
  
            }, 500);
           
           a=false;
           
                }
      });
        }
      }
 }




</script> 

<script>
    $('#Form').bind('keydown', function(event) {
    if (event.ctrlKey || event.metaKey) {
    switch (String.fromCharCode(event.which).toLowerCase()) {
    case 's':
    event.preventDefault();
    // alert('ctrl-s');
    saveperform();
    break;

    }
    $(function(){
    $("#stateName").focus();
    });

    }
    });
</script>


<!---------------------- Calculations Mult, Divi------------------------->
<script>
        
  function TLeverage() {
    var Leverage=document.getElementById("Leverage").value;
    var Amount=document.getElementById("Amount").value;
    var CurrentPrice=document.getElementById("CurrentPrice").value;
    var Quantity=document.getElementById("Quantity").value;
    // alert('hi');
    // conceptName = $( "#Leverage option:selected" ).text();
    // alert(conceptName);
    // alert(b);
   
    var Mul =parseFloat(Leverage) * parseFloat(Amount);

    var textQty=parseFloat(CurrentPrice) *parseFloat(Quantity);
    // alert(Mul);
    // document.getElementById("Quantity").value=textQty; 
    
    document.getElementById("ToAmount").value=Mul; 

    Qty();
  }
  function TQty(){
    alert('hi');
  }
  function Qty(){
    var ToAmount=document.getElementById("ToAmount").value;
    var CurrentPrice=document.getElementById("CurrentPrice").value;
    var NewPrice=document.getElementById("NewPrice").value;
    var Quantity=document.getElementById("Quantity").value;
    var NewAvgPrice=document.getElementById("NewAvgPrice").value;
    var Leverage=document.getElementById("Leverage").value;
    
   
  /********************** Calculate Qty 1st*******************************/
    var Div= parseFloat(ToAmount) /parseFloat(CurrentPrice);
       Div=Div.toFixed(4)

  /********************** Calculate %Percentage Profit/Loss ***********************/
    var firstT= parseFloat(CurrentPrice) *parseFloat(Quantity); 
    var SecondT= parseFloat(NewPrice) *parseFloat(Quantity); 

    var total=parseFloat(SecondT) -parseFloat(firstT);
    var per=(parseFloat(total) /parseFloat(firstT))*100;
    per=per.toFixed(4)

    var ExpProfitAmt=(parseFloat(ToAmount)/parseFloat(100))*parseFloat(per);
    ExpProfitAmt=ExpProfitAmt.toFixed(4)


  /********************** Calculate Average ***************************/
    

    var TotalAvg=parseFloat(NewAvgPrice)* parseFloat(Leverage);
    TotalAvg=TotalAvg.toFixed(4)
    var Qty2=parseFloat(TotalAvg) / parseFloat(NewPrice);
    Qty2=Qty2.toFixed(4)

    var TotalQty=parseFloat(Qty2) + parseFloat(Div);
    TotalQty=TotalQty.toFixed(4)
    
   
    var TotAvg2=parseFloat(ToAmount) + parseFloat(TotalAvg);
    TotAvg2=TotAvg2.toFixed(4)
    
    

    var AveragePrice=parseFloat(TotAvg2) / parseFloat(TotalQty);
    AveragePrice=AveragePrice.toFixed(4)
    
    var ExpLoss=((parseFloat(AveragePrice) - parseFloat(NewPrice))/parseFloat(AveragePrice))*100;
    ExpLoss=ExpLoss.toFixed(4)

    var ExpLossAmt=(parseFloat(TotAvg2)/parseFloat(100))*parseFloat(ExpLoss);
    ExpLossAmt=ExpLossAmt.toFixed(4)

    
      

    document.getElementById("Quantity").value=Div; 

    // For + to - and - to + convert
    var PurchaseStock=document.getElementById("PurchaseStock").value;
    if (PurchaseStock==2){

      if (per < 0) {
        per = per * -1;
      }
      else{
        per = '-'+per;
      }

      if (ExpProfitAmt < 0) {
        ExpProfitAmt = ExpProfitAmt * -1;
      }
      else{
        ExpProfitAmt = '-'+ExpProfitAmt;
      }

    }
      
    // alert(PurchaseStock);
    document.getElementById("Profit").value=per; 



    document.getElementById("ProfitAmt").value=ExpProfitAmt; 

    document.getElementById("TotalAvgPrice").value=TotalAvg; 
    document.getElementById("NewQty").value=Qty2; 
    document.getElementById("TotQty").value=TotalQty; 
    document.getElementById("AvgPrice").value=AveragePrice; 
    document.getElementById("TotAmount2").value=TotAvg2; 
    document.getElementById("ExpLoss").value=ExpLoss; 
    document.getElementById("ExpLossAmt").value=ExpLossAmt;

    
     // if(parseInt(a) > parseInt(d)){
    //  var profit= parseInt(a)- parseInt(d);
    //  console.log(profit);
    //  document.getElementById("Profit").value=profit; 
    //  document.getElementById("Loss").value=""; 



    // }
    // else if(parseInt(a) < parseInt(d)){
    //  var Loss= parseInt(a)- parseInt(d);
    //  console.log(Loss);
    //  document.getElementById("Loss").value=Loss; 
    //  document.getElementById("Profit").value=""; 



    // }
   
    

  }
 

  
</script>






<!-- --------------- Javascript code for dropdown,Table show fatching data ------------->
<script>
  $(document).ready(function(){
    ShareMarket();
    $("#FkStockId").change(function(){
      // let a = $(this).val();
      // console.log(a);
      ShareMarket();
    });


  });

  $('#FkStockId').on('change', function(){
  $("#MinPrice").css("background-color", "#dae1f3");
  $("#MaxPrice").css("background-color", "#dae1f3");
});


  function ShareMarket(){
      var FkStockId = $("#FkStockId").val();

      
      //  alert(FkStockId);
      $.ajax({

      url : "<?php echo base_url()?>ShareMarket/load_mahasiswa",
      method:'post',
      data:{'FkStockId':FkStockId},
      // dataType:'json', 
      success:function(data){
        
       
      $("#tabledata").empty();
      $("#tabledata").html(data);
      console.log(data);

      /*************Min value and Max Valuein jquery using table colom***************/
      
      var CurrentPrice1 = $("input[name='CurrentPrice1[]']").map(function(){return $(this).val
      ();}).get();

      var NewPrice1 = $("input[name='NewPrice1[]']").map(function(){return $(this).val
      ();}).get();
              
              let minValue = Math.min(...CurrentPrice1);
              let maxValue = Math.max(...CurrentPrice1);

              let minValue1 = Math.min(...NewPrice1);
              let maxValue1 = Math.max(...NewPrice1);
              // alert(minValue)
              // alert(maxValue)

              // document.getElementById("MaxPrice").value=maxValue; 
              // document.getElementById("MinPrice").value=minValue;

              // document.getElementById("MaxPrice1").value=maxValue1; 
              // document.getElementById("MinPrice1").value=minValue1;

             //creating new array
             var custom_arr1 = [];


              //storing value in array
             custom_arr1.push(minValue);
             custom_arr1.push(maxValue);
             custom_arr1.push(minValue1);
             custom_arr1.push(maxValue1);

             let minValue3 = Math.min(...custom_arr1);
             let maxValue3 = Math.max(...custom_arr1);

             // alert(minValue2);
             document.getElementById("MinPrice").value=minValue3;
             document.getElementById("MaxPrice").value=maxValue3;
          

         
      /************* End Section Min value and Max Valuein jquery using table colom***************/


      }
    
    });
    
  }
  


  // function ShareMarket(){
  //     var FkStockId = $("#FkStockId").val();
  //     //  alert(FkStockId);
  //     $.ajax({

  //     url : "<?php echo base_url()?>ShareMarket/getPrice",
  //     method:'post',
  //     dataType:'json',
  //     data:{'FkStockId':FkStockId},
  //     // dataType:'json', 
  //     success:function(data){
        
  //     console.log("jjjh",data);
     
  //     }
  //   });
  // }

// show current price to new price
  $('#CurrentPrice').on('input',function(){
    var tt =$('#CurrentPrice').val();

    $('#NewPrice').val(tt);


  })
</script>















 



               
            