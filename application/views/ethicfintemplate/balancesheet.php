<?php include('header.php');?>
<style>
  /* Add your CSS styles here */
  .hidden {
    display: none;
  }
 
</style>
<div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Balance Sheet</h6>
                    </div>	  
                </div>
                <div class="card-body px-0 pb-2">
                    <form type="get" autocomplete="off">
                        <div class="row">
                            <div class="col-1 col-sm-1"></div>
                            <div class="col-3 col-sm-3"></div>
                            <div class="col-3 col-sm-3"></div>
                        </div>
                    </form>			
                    <div class="row">
<div class="col-2 col-sm-2"></div>	<div class="col-8 col-sm-8">	
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th style="font-size: medium;"></th>
                                <th ></th>
                                <th style="font-size: small;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left font-weight-bold" colspan="3" >Assets</td>
                            </tr>
                            <tr>
                                <td >Current Assets:</td>
                                <td></td>
                                <td ></td>
                            </tr>
							<tr class="expandable">
                                <td class="px-6">Cash</td>
                                <td></td>
                                <td class="text-end px-6">0.00</td>
                               
                            </tr>
                                <tr class="hidden">
                                    <td class="px-8">Cash 1</td>
                                    <td class="text-end px-8">100</td>
                                </tr>
                                <tr class="hidden">
                                    <td class="px-8">Cash 2</td>
                                    <td class="text-end px-8">100</td>
                                </tr>
                            
                            <tr class="expandable">
                                <td class="px-6">Bank</td>
                                <td></td>
                                <td class="text-end px-6">0.00</td>
                            </tr>
                            <tr class="hidden">
                            <td class="px-8">Bank 1</td>
                                <td class="text-end px-8">ABC</td>  
                            </tr>
                            <tr class="hidden">
                            <td class="px-8">Bank 2</td>
                                <td class="text-end px-8">ABCD</td>  
                            </tr>
                           
							<tr class="expandable">
                                <td class="px-6" >Accounts Receivable </td>
                                <td ></td>
                                <td class="text-end px-6">5,807.50</td>
                            </tr>
							<tr  class="expandable">
                                <td class="px-6" >Vendor Advance</td>
                                <td ></td>
                                <td class="text-end px-6">0.00</td>
                            </tr>	
                            <tr class="expandable">
                                <td class="px-6" >Prepaid Expenses</td>
                                <td ></td>
                                <td class="text-end px-6">-</td>
                            </tr>
							<tr class="expandable">
                                <td class="px-6" >Short-term Investments</td>
                                <td ></td>
                                <td class="text-end px-6">-</td>
                            </tr>
							<tr class="expandable">
                                <td class="px-6" >Inventory </td>
                                <td ></td>
                                <td class="text-end px-6">233.00</td>
                            </tr>
							<tr class="expandable">
                                <td class="px-6" >Other Current Assets </td>
                                <td ></td>
                                <td class="text-end px-6">12.30</td>
                            </tr>
                            <tr class="expandable" style="border-bottom: 1px double #333;">
                                <td >Total Current assets</td>
                                <td ></td>
                                <td class="text-end px-4">6,052.80</td>
                            </tr>
							 <tr class="expandable">
                                <td >Fixed Assets:</td>
                                <td></td>
                                <td ></td>
                            </tr>
							<tr class="expandable" style="border-bottom: 1px double #333;">
                                <td >Total Fixed assets</td>
                                <td ></td>
                                <td class="text-end px-4">0.00</td>
                            </tr>
                            <tr class="expandable" style="border-bottom: 3px double #333;">
                                <td class="font-weight-bold">Total Assets</td>
                                <td ></td>
                                <td class="font-weight-bold text-end px-4">6,052.80</td>
                            </tr>
                            <tr class="expandable">
                                <td class="text-left font-weight-bold" colspan="3" >Liabilities</td>
                            </tr>
                            <tr class="expandable">
                                <td >Current Liabilities:</td>
                                <td ></td>
                                <td ></td>
                            </tr>
												
							<tr class="expandable">
                                <td class="px-6" >Accounts Payable </td>
                                <td ></td>
                                <td class="text-end px-6">2,355.30</td>
                            </tr>
							
							<tr class="expandable">
                                <td class="px-6" >Customer Advance</td>
                                <td ></td>
                                <td class="text-end px-6">0.00</td>
                            </tr>							
						
								
						<tr class="expandable"  style="border-bottom: 1px double #333;">
                                <td class="px-6">Total Other Current Liabilities  </td>
                                <td ></td>
                                <td class="text-end px-6">757.50</td>
                            </tr>
							<tr class="expandable">
                                <td >Long-term Liabilities:</td>
                                <td ></td>
                                <td ></td>
                            </tr>
							<tr class="expandable" style="border-bottom: 3px double #333;">
                                <td class="font-weight-bold">Total Liabilities</td>
                                <td ></td>
                                <td class="font-weight-bold text-end px-4">3,112.80</td>
                            </tr>
							<tr class="expandable">
                                <td class="text-left font-weight-bold" colspan="3" >Equity</td>
                            </tr>
							<tr  class="expandable" style="border-bottom: 1px double #333;">
                                <td class="px-6">Current Year Earning </td>
                                <td ></td>
                                <td class="text-end px-6">2,940.00</td>
                            </tr>
							<tr class="expandable" style="border-bottom: 3px double #333;">
                                <td class="font-weight-bold">Total Equity</td>
                                <td ></td>
                                <td class="font-weight-bold text-end px-4">2,940.00</td>
                            </tr>
							<tr class="expandable" style="border-bottom: 3px double #333;">
                                <td class="font-weight-bold">Total Equity & Total Liabilities</td>
                                <td ></td>
                                <td class="font-weight-bold text-end px-4">6,052.80</td>
                            </tr>
                        </tbody>
                    </table>
                    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const expandableRows = document.querySelectorAll('.expandable');

        expandableRows.forEach(row => {
            row.addEventListener('click', function() {
                let nextRow = this.nextElementSibling;
                while (nextRow && !nextRow.classList.contains('expandable')) {
                    if (nextRow.classList.contains('hidden')) {
                        nextRow.classList.remove('hidden');
                    } else {
                        nextRow.classList.add('hidden');
                    }
                    nextRow = nextRow.nextElementSibling;
                }
            });
        });
    });
</script>

                  
                </div>
				
				
				
				<br>
				<br>
				<br>
				
				
                </div>
                </div>
                <?php include('footer.php')?>