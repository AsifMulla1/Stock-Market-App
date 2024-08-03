<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShareMarket extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model('ShareMarket_model');
		
    }
	public function index()
	{
		
        $data['alldata']=$this->ShareMarket_model->getallstate();
        // echo "<pre>";
        // print_r($data);

		$this->load->view('common/header_view');
        $this->load->view('ShareMarket/ShareMarketDetail_view',$data);
		$this->load->view('common/footer_view');
	

	}
	public function create()
	{
		
        $data['StockNmdata']=$this->ShareMarket_model->getStockName();
		$data['Leveragedata']=$this->ShareMarket_model->getLeverage();
        // echo "<pre>";
        // print_r($data);

		$this->load->view("common/header_view");
		$this->load->view("ShareMarket/ShareMarket_view",$data);
		$this->load->view("common/footer_view");
	

	}

	public function insertmodelStock()
	{
		// $StockID= $this->input->post('StockID');
		$StockNm= $this->input->post('StockNm');
		

		 $fields=array(
						
			// 'StockID'=>$StockID,
			'StockNm'=>$StockNm
			
						
			//    'created_date'=>date('Y-m-d H:i:s'),
			// 	   'created_by'=>1
		   );
		   $this->ShareMarket_model->insertStockdata($fields);
	}
		
	public function insertSHARE(){
      
		// $ShareId= $this->input->post('ShareId');
		$KJ= $this->input->post('SSS');
		$JKH= $this->input->post('FFF');
		$HJG= $this->input->post('GGG'); 
		$JKI= $this->input->post('HHHH'); 
		$RR= $this->input->post('TTT'); 
		$EE= $this->input->post('JJJJ'); 
		$UU= $this->input->post('YY'); 
		$OO= $this->input->post('III'); 
		$WW= $this->input->post('UUU'); 

		 $fields=array(
						
			// 'ShareId'=>$ShareId,
			'WW'=>$OI,
			'UU'=>$ERT,
			'EE'=>$HTO,
			'OO'=>$HFR,
			'II'=>$HTYU,
			'YY'=>$BDTR,
			'RR'=>$EWS,
			'YY'=>$VGT,
			'BB'=>$OUT
						
			//    'created_date'=>date('Y-m-d H:i:s'),
			// 	   'created_by'=>1
		   );
		   $this->model->insertdata($fields);
  } 

  public function update()
  {
	  $id=$this->uri->segment(3);
	  $data['data']=$this->ShareMarket_model->getbyid($id);
	  $data['StockNmdata']=$this->ShareMarket_model->getStockName();
	  $data['Leveragedata']=$this->ShareMarket_model->getLeverage();
	  
    //    echo "<pre>";
    //   print_r($data);

	 
	  $this->load->view('common/header_view');
	  $this->load->view('ShareMarket/ShareMarket_view',$data);
	  $this->load->view('common/footer_view');
  }


  public function updateShares()
  {
	  $GTY = $this->input->post('UJY'); 
	  $ERT= $this->input->post('KHG');      
	//   $CurrentPrice= $this->input->post('CurrentPrice'); <----For readonly comment
	//   $Date= $this->input->post('Date'); 
	//   $Quantity= $this->input->post('Quantity');
	//   $Leverage= $this->input->post('Leverage');
	//   $Amount= $this->input->post('Amount'); 
	//   $ToAmount= $this->input->post('ToAmount');
	//   $PurchaseStock= $this->input->post('PurchaseStock'); 
	  $NewDate= $this->input->post('NewDate');
	  $NewPrice= $this->input->post('NewPrice'); 
	  $Profit= $this->input->post('Profit');
	  $GFT = $this->input->post('BGDS'); 
	  $DFER= $this->input->post('MJKU'); 
	  $AveragePrice= $this->input->post('AveragePrice'); 
	  $GTR= $this->input->post('MHJY'); 
	  $BGH= $this->input->post('MKU');
	  $TotalStock= $this->input->post('TotalStock');
	  $TotalInvestment= $this->input->post('TotalInvestment'); 
	  $FD= $this->input->post('SDE');
	  $DFR= $this->input->post('JHY'); 
	  
	 
	  
	 
	  $fields=array(
					'dr'=>$serdg,
					'dsrg'=>$sd,
					// 'CurrentPrice'=>$CurrentPrice,
					// 'Date'=>$Date,
					// 'Quantity'=>$Quantity,
					// 'Leverage'=>$Leverage,
					// 'Amount'=>$Amount,                     
					// 'ToAmount'=>$ToAmount,
					// 'PurchaseStock'=>$PurchaseStock,
					'drg'=>$NewsdfgDate,
					'dsf'=>$NewPrgrice,                     
					'drr'=>$Profit,
					'ft'=>$dfh,
					'tr'=>$SecInytvestment,
					'tdr'=>$AveragePryghice,
					'fth'=>$SecInveToutal,
					'gik'=>$ol,
					'TotalStock'=>$uyi,
					'kjl'=>$ylo,                     
					'ExpLoghnss'=>$ExpLoss,
					'fhg'=>$ExpLossAmt
					
					

				  );
	  $this->model->update($fields);
  }
  
  public function load_mahasiswa()
  {
	
	$FkStockId= $this->input->post('FkStockId');
    $data=	$this->ShareMarket_model->getstockdata($FkStockId);
	
       
            foreach($data as $rw=>$value){
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

            echo "<td>".$value->StockNm."</td>";
            echo "<td><input type='hidden' id='CurrentPrice[]' class='CurrentPrice' name='CurrentPrice1[]' value='".$value->CurrentPrice."'>".$value->CurrentPrice."</td>";
            echo "<td>".$value->Date."</td>";
            echo "<td>".$value->Quantity."</td>";
            echo "<td>".$value->Leverage."</td>";
            echo "<td>".$value->Amount."</td>";
            echo "<td>".$value->ToAmount."</td>";
			echo "<td>".$pur."</td>";
			echo "<td>".$value->Profit."</td>";
			echo "<td>".$value->ProfitLossAmt."</td>";
			echo "<td><input type='hidden' id='NewPrice[]' class='NewPrice' name='NewPrice1[]' value='".$value->NewPrice."'>".$value->NewPrice."</td>";
                                            
                                                                                   
                                           
       
                                        
         echo "</tr>";                        
        }

		
    
                             
  }


  /***********   Use Ajax For without referashing dropdown save and fatch  ************/
  public function dropdownshare() 
  {
	$data=$this->ShareMarket_model->dropdownstock();
	echo json_encode($data);
  }



 

}
?>