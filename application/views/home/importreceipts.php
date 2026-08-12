

<div class="container-fluid py-4">     
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"><?=$pagetitle?></h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2 ps-5 pe-5">
                    <div class="card-content">
                        <?php $message='';?>
                        <div class="form-group">
                            <label for="position-bottom-left">Invoices File</label>
                            <input type="file" name="file" id="file" accept=".xls, .xlsx" class="form-control col-md-7 col-xs-12">
                            <!--<div id="response" class="<?php if(!empty($message)) { echo $message . ' display-block'; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>-->
                            <br><br><br>
                            <button type="button" class="btn btn-success" onclick="showproducts('1')" id="upload_button">Upload</button>
                            <a href="<?=base_url()?>templates/receipt_template1.xlsx" download="">
                                <span title="Excel sheet format" class="btn btn-primary">Download Receipt Format</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $ref=1;?>
		









		
		<script>
		
		
		$(document).ready(function() {
    $('#file').change(function() {
        var file_data = $(this).prop('files')[0]; 
        if(file_data) {
            var fileName = file_data.name;
            var fileExtension = fileName.split('.').pop().toLowerCase();
            if(fileExtension !== 'xls' && fileExtension !== 'xlsx') {
                alert('Please select a valid Excel file (.xls or .xlsx).');
                $('#file').val('');
            }
        }
    });
});
   function showproducts(s) {
	     var file_data = $('#file').prop('files')[0]; 
	
	  if(file_data) 
		{
 var fileName = file_data.name;
        var fileExtension = fileName.split('.').pop().toLowerCase();
        if(fileExtension === 'xls' || fileExtension === 'xlsx') {
      $('#upload_button').html("Loading..");
    var form_data = new FormData();                  
    form_data.append('file', file_data);          
    form_data.append('s', s);      
    console.log(form_data);    
    $.ajax({
       url: "<?= base_url() ?>home/importreciptformat", 
        dataType: 'text', 
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(data){
  var data = JSON.parse(data);
                if(data.message === "success") {
                    createTable(data.data);
                }else {
					if(data.data && data.data.warningmessage) {
						$('#product_table').html(data.data.warningmessage);
                    }else if(data.data.message==='sum_error'){
                      $('#product_table').html('Credit and Debit Sum do not match !!!'); 
                    } else {
                       $('#product_table').html('An unknown error occurred.'); 
                    }
					var btn=document.getElementById('cnfbtn');
					 btn.textContent = "Close";
	btn.onclick = function() {
            var modal = bootstrap.Modal.getInstance(document.getElementById('importinvoicemodal'));
            modal.hide();
          };
					 
                }
 
     $('#importinvoicemodal').modal('show'); 
      $('#upload_button').html("Upload");
        }
     });
	 
	 
	  } else {
            alert('Please select a valid Excel file (.xls or .xlsx).');
            $('#file').val('');
        }
	 
    } else {
		alert('Please Choose file');
	}	
    }


	

function showproducts2(s) {
  var file_data = $('#file').prop('files')[0]; 

  if (file_data) {
    var fileName = file_data.name;
    var fileExtension = fileName.split('.').pop().toLowerCase();

    if (fileExtension === 'xls' || fileExtension === 'xlsx') {
      var btn = document.getElementById("cnfbtn");
      btn.textContent = "Close";

      $('#upload_button').html("Loading..");

      var form_data = new FormData();
      form_data.append('file', file_data);
      form_data.append('s', s);

      $.ajax({
        url: "<?= base_url() ?>home/confirmimportreciptformat",
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(data) {
          var data = JSON.parse(data);
          if (data.success === "success") {
            createTable(data.data);
            $('#product_table').html(data.data.message);
          } else {
            $('#product_table').html(data.data.message);
          }

          $('#file').val('');
          $('#upload_button').html("Upload");

          // Change the button's action to hide the modal
          btn.onclick = function() {
            var modal = bootstrap.Modal.getInstance(document.getElementById('importinvoicemodal'));
            modal.hide();
          };
        }
      });
    } else {
      alert('Please select a valid Excel file (.xls or .xlsx).');
      $('#file').val(''); // Clear the file input field
    }
  } else {
    alert('Please Choose file');
  } 
}








function createTable(data) {
	
    var table = '<p></p>';
    
    var invoiceCounts = (data.distinct_reference_count) ;
    table+= 'TOTAL NO:OF RECEIPTS FOUND IS '+''+invoiceCounts;
    // var invoiceTotals = data.invoice_totals;
    // var invoiceCustomers = data.invoice_customers;
    
    // for(var invoiceId in invoiceCounts) {
    //     table += '<tr>';
    //     table += '<td>' + invoiceId + '</td>';
    //     table += '<td>' + invoiceCustomers[invoiceId] + '</td>';
		
    //     table += '<td class="text-center">' + invoiceCounts[invoiceId] + '</td>';
    //     table += '<td class="text-end">' + invoiceTotals[invoiceId].vat_sum + '</td>';
    //     table += '<td class="text-end">' + invoiceTotals[invoiceId].total + '</td>';
    //     table += '</tr>';
    // }
    
    //table += '</tbody></table>';
    
    $('#product_table').html(table);
}





















	 
		</script>	
		
		
		
		
	    
<!-- Modal -->
<div class="modal " id="importinvoicemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Upload Receipts</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<span id="product_table"></span>


 </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-light btn-sm" data-bs-dismiss="modal">Cancel</button>
      <button onclick="showproducts2('1')" id="cnfbtn" class="btn bg-gradient-primary  btn-sm" >Confirm</button>
      </div> 
    </div>
  </div>
</div>