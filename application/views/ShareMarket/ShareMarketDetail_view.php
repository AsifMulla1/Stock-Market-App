<style>
    @media only screen and (max-width: 320px) {
  .btnn{
    top: 95px;
    margin-left: -35px;
  }
  /* .main_heading{
    display:none;
  } */
  .card-body {
    flex: 1 1 auto;
    padding: 10px!important;
    margin-top: 50px;
}

  
}
</style>
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
               
                
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                
                    <div class="col-md-12">
                        <div class="card">
                            <div class="breadcrumb " >
                                <h1  style="font-family: 'Work Sans', sans-serif;">Shares Details</h1>
                            </div>
                            <div class="card-body" >
                           
                            <button class="btn btn-secondary"><a href="<?=base_url() ?>ShareMarket/create" class="text-white text-decoration-none"><i class="fa-solid fa-plus text-white"></i>&nbsp;Add New</a></button>
                                <div class="table-responsive">
                                    <table class="display table dataTable no-footer" id="example" style="width:100%">
                                        <thead class="table-head-style">
                                            <tr>
                                                <th>Output</th>
                                                <th>shareId</th>
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
                                                
                                                
                                               
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                          

                                         <?php 
                                            $i=0;
                                            foreach($alldata as $rw=>$value){

                                               $Purchase= $value->PurchaseStock;
                                               if ($Purchase == 1) {
                                                $pur = '<button type="button" class="btn btn-primary">Buy</button>';
                                               }
                                               else if($Purchase == 2){
                                                $pur = '<button type="button" class="btn btn-success text-white">Sell</button>';
                                               }
                                               else{
                                                $pur = '<button type="button" class="btn btn-warning text-white">Null</button>';
                                               }
                                               
                                               
                                               
                                         echo "<tr>";

                                            
                                            echo  '<td> <a href="'.base_url().'ShareMarket/update/'.$value->shareId.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-regular fa-pen-to-square"></i></a> 
                                                 </td>';
                                            
                                            echo "<td>".$value->shareId."</td>";
                                            echo "<td>".$value->StockNm."</td>";
                                            echo "<td>".$value->CurrentPrice."</td>";
                                            echo "<td>".$value->Date."</td>";
                                            echo "<td>".$value->Quantity."</td>";
                                            echo "<td>".$value->Leverage."</td>";
                                            echo "<td>".$value->Amount."</td>";
                                            echo "<td>".$value->ToAmount."</td>";
                                            echo "<td>".$pur."</td>";
                                            echo "<td>".$value->Profit."</td>";
                                            echo "<td>".$value->ProfitLossAmt."</td>";
                                           
                                            
                                                                                   
                                           
                                            $i++;
                                        
                                            echo "</tr>";                        
                                        }
                                        ?> 
                             
                                
                                          
                                        </tbody>
                                        
                                    </table>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
</div>
                  

<script  src="<?php echo base_url(); ?>web_resources/dist/js/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function() {
   

    $('#example').dataTable( {} );
 
    
} );
</script>
                   
                       
               
            