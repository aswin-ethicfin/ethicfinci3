<?php include('header.php');?>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Stock Report</h6>
            </div>	  
        </div>
        <div class="card-body px-0 pb-2">
          <form type="get" autocomplete="off">
            <div class="row">
              <div class="col-1 col-sm-1"></div>
              <div class="col-3 col-sm-3"></div>
              <div class="col-3 col-sm-3"></div>
              <div class="col-3 col-sm-3">
                <div class="input-group input-group-dynamic">
                    <input name="q" value="" placeholder="Search" class="multisteps-form__input form-control" type="text"  />
                </div>
              </div>
              <div class="col-2 col-sm-2">
                  <button class="btn bg-gradient-primary btn-sm ms-auto mb-0"  title="filter">Search</button>
              </div>
            </div>
          </form>			
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Sl</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Purchase Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Party</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Bill No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">GST No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">State</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">State Code</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">City</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Item Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Qty</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Unit</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Rate</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">HSN Code</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Taxeble Value</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">CGST%</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">CGST</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">SGST%</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">SGST</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">IGST%</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">IGST</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Cess%</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Cess</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">CompCess</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Total</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Selling Price</th>
                    <!-- <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder">Category</th>                       -->
                    <!-- <th width="15%"></th> -->
                  </tr>
                </thead>
                <tbody>
                  <tr >
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td> 
                    <!-- <td class="text-start"></td> -->
                  </tr>
                </tbody>
              </table>
            </div>
        </div>               
          <div class="card-footer clearfix">
            <div class="pagination  text-center">
              <div style='margin-top: 10px;'></div>
            </div>
          </div>
      </div>
    </div>
  </div>
<?php include('footer.php')?>