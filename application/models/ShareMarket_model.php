<?php
class ShareMarket_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();	
		} 

   public function insertdata($model)
	{
		return $this->db->insert('share_master',$model);
			//return $sql->result();
	} 

	
	public function getallstate()
      {     

        $this->db->select("share_master.shareId,share_master.FkStockId,share_master.CurrentPrice,share_master.Date,share_master.Quantity,share_master.Leverage,share_master.Amount,share_master.ToAmount,share_master.PurchaseStock,share_master.Profit,share_master.ProfitLossAmt,stock_master.StockNm");

          $this->db->from('share_master');

          $this->db->join('stock_master','share_master.FkStockId =stock_master.StockID','left');
          $this->db->join('levrage_master','share_master.Leverage =levrage_master.Lid','left');
          $this->db->order_by('share_master.shareId','DESC');
		      $this->db->where('share_master.is_active','1');  
		//   $this->db->order_by('ShareId', 'DESC');        
           $query = $this->db->get();
           return $query->result();
     } 

     public function getStockName()
     {      
      
      $this->db->select('stock_master.*');
      $this->db->from('stock_master');
      $this->db->where('stock_master.is_active','1');
      $query = $this->db->get();
      return $query->result();
             
     }

     public function getLeverage()
     {      
      
      $this->db->select('levrage_master.*');
      $this->db->from('levrage_master');
      $query = $this->db->get();
      return $query->result();
             
     }

	 public function insertStockdata($model)
	 {
		return $this->db->insert('stock_master',$model);
	 }

    // -----for update---
            
    public function getbyid($id)
		{
		  $this->db->select('share_master.shareId,share_master.FkStockId,share_master.CurrentPrice,share_master.Date,share_master.Quantity,share_master.Leverage,share_master.Amount,share_master.ToAmount,share_master.PurchaseStock,share_master.NewDate,share_master.NewPrice,share_master.Profit,share_master.ProfitLossAmt,share_master.SecInvestment,share_master.AveragePrice,share_master.SecInveTotal,share_master.SecQtyStock,share_master.TotalStock,share_master.TotalInvestment,share_master.ExpLoss,share_master.ExpLossAmt');

      // $this->db->join('stock_master','share_master.FkStockId =stock_master.StockID','left');
      
      $this->db->where('shareId',$id);
      $query = $this->db->get('share_master');
			return $query->result();
		}

    
		
    public function update($model)
    {
       return $sql = $this->db->where('shareId',$model['shareId'])->update('share_master',$model); 
    } 
    

    /***********   Dropdown Selection Data Load with Ajax and PHP For Table  ************/

    public function getstockdata($FkStockId)
		{
		  $this->db->select('share_master.shareId,share_master.FkStockId,share_master.CurrentPrice,share_master.Date,share_master.Quantity,share_master.Leverage,share_master.Amount,share_master.ToAmount,share_master.PurchaseStock,share_master.NewPrice,share_master.Profit,share_master.ProfitLossAmt,stock_master.StockNm');
      
      $this->db->join('stock_master','share_master.FkStockId =stock_master.StockID','left');
      $this->db->where('FkStockId',$FkStockId);
      $query = $this->db->get('share_master');
			return $query->result();
		}

    public function getPrice($FkStockId)
		{
		  $this->db->select('share_master.CurrentPrice');
      $this->db->where('FkStockId',$FkStockId);
      $query = $this->db->get('share_master');
			return $query->result();
		}
    


    /***********   Use Ajax For without referashing dropdown save and fatch  ************/
    public function dropdownstock()
    {

      $this->db->select('stock_master.StockID,stock_master.StockNm');
      $this->db->from('stock_master');
      $query=$this->db->get();
      return $query->result();
    }
    
  }
?>

