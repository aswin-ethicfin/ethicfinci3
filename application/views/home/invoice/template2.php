<link rel="stylesheet" href="<?= base_url('application/views/home/invoice/ethicfin-2024.css') ?>">
<div class="tm_container">
  <div class="tm_invoice_wrap">
    <div class="tm_invoice tm_style1" id="tm_download_section">
      <div class="tm_invoice_in">
        <div class="tm_invoice_head tm_align_center tm_mb10">
          <div class="tm_invoice_left">
            <div class="tm_logo"><img src="assets/img/header.jpg" alt="Logo"></div>
          </div>

        </div>
        <div class="tm_invoice_info tm_mb20">
          <div class="tm_primary_color tm_f25 tm_text_uppercase">TAX INVOICE / فاتورة ضريبية</div>
          <div class="tm_invoice_seperator tm_gray_bg"></div>

        </div>
        <div class="tm_invoice_head tm_mb10">
          <div class="tm_invoice_left">
            <p class="tm_mb2"><b class="tm_primary_color">BUYER DETAILS:</b></p>
            <p>
              AaBee Tourism آبي للسياحة <br>
              Block 2
              Main Sreet Kozhikode Calicut <br>
              بلوك 2
              شارع رئيسي كوزيكود كاليكوت <br>
              Phone: 7898099876<br>
              VAT No : IE1234899T
            </p>
          </div>
          <div class="tm_invoice_right tm_text_right">
            <table class="my_tbl">
              <tr>
                <td style="border: none;">Invoice No</td>
                <td>INV0702</td>
                <td>رقم الفاتورة</td>
              </tr>
              <tr>
                <td style="border: none;">Invoice Date</td>
                <td>14-Feb-2023</td>
                <td>تاريخ الفاتورة</td>
              </tr>
              <tr>
                <td style="border: none;">DN No</td>
                <td>
                </td>
                <td>رقم الاقتباس</td>
              </tr>
              <tr>
                <td style="border: none;">DN Date</td>
                <td>
                </td>
                <td>اشاره العملاء</td>
              </tr>
              <tr>
                <td style="border: none;">Mode of Pay</td>
                <td>
                </td>
                <td>طريقة الدفع</td>
              </tr>
              <tr>
                <td style="border: none;">PO No</td>
                <td>
                </td>
                <td>رقم الطلب الشراء</td>
              </tr>
              <tr>
                <td style="border: none;">PO Date</td>
                <td>14-Sep-2023</td>
                <td>تاريخ امر الشراء</td>
              </tr>
              <tr>
                <td style="border: none;">Period</td>
                <td>
                </td>
                <td>الفترة</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="tm_table tm_style1 tm_mb0">
          <div class="tm_round_border">
            <div class="tm_table_responsive">
              <table>
                <thead>

                  <tr>
                    <?= (in_array(1, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">S.N</th>' : '' ?>
                    <?= (in_array(2, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Item</th>' : '' ?>
                    <?= (in_array(4, $templates)) ? ' <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">HSN Code</th>' : '' ?>

                    <?= (in_array(35, $templates)) ? '<th class="tm_width_5 tm_semi_bold tm_primary_color tm_gray_bg">Description</th>' : '' ?>

                    <?= (in_array(39, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">MRP</th>' : '' ?>

                    <?= (in_array(37, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Price</th>' : '' ?>

                    <?= (in_array(38, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">QTY</th>' : '' ?>
                    <?= (in_array(36, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">UNIT</th>' : '' ?>
                    <?= (in_array(5, $templates)) ? ' <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Discount %</th>' : '' ?>
                    <?= (in_array(6, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Dicount Amount</th>' : '' ?>
                    <?= (in_array(7, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">VAT%</th>' : '' ?>
                    <?= (in_array(8, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">VAT Amount</th>' : '' ?>
                    <?= (in_array(9, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">IGST%</th>' : '' ?>
                    <?= (in_array(10, $templates)) ? ' <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">IGST Amount</th>' : '' ?>
                    <?= (in_array(11, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">CGST%</th>' : '' ?>
                    <?= (in_array(12, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">CGST Amount</th>' : '' ?>
                    <?= (in_array(13, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">SGST%</th>' : '' ?>
                    <?= (in_array(14, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">SGST Amount</th>' : '' ?>
                    <?= (in_array(15, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">CESS%</th>' : '' ?>
                    <?= (in_array(16, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">CESS Amount</th>' : '' ?>

                    <?= (in_array(33, $templates)) ? '<th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Taxable</th>' : '' ?>
                    <?= (in_array(34, $templates)) ? '<th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg tm_text_right">Total Price
                    </th>' : '' ?>
                  </tr>
                </thead>
                <tbody>
                  <?php $tot = 0;
                  $i = 1;
                  $amt = 0;
                  $txamt = 0;
                  $disc_amt = 0;
                  $t = 0;
                  $s = 0;
                  $c = 0;
                  $cess = 0;
                  $g = 0;
                  $sl = 1;
                  $i = 1;
                  foreach ($items as $item) { ?>
                    <tr>
                      <?= (in_array(1, $templates)) ? '<td class="tm_width_1">' . $i . '</td>' : '' ?>
                      <?= (in_array(2, $templates)) ? '<td class="tm_width_5">' . $item['item_name'] . '</td>' : '' ?>


                      <?= (in_array(4, $templates)) ? '<td class="tm_width_1">' . $item['hsn_code'] . '</td>' : '' ?>
                      <?= (in_array(35, $templates)) ? '<td class="tm_width_1">' . $item['description'] . '</td>' : '' ?>
                      <?= (in_array(39, $templates)) ? '<td class="tm_width_1">' . $item['mrp'] . '</td>' : '' ?>
                      <?= (in_array(37, $templates)) ? '<td class="tm_width_1">' . $item['price'] . '</td>' : '' ?>
                      <?= (in_array(38, $templates)) ? '<td class="tm_width_1 tm_text_right">' . $item['quantity'] . '</td>' : '' ?>

                      <?= (in_array(36, $templates)) ? '<td class="tm_width_1">' . $item['unit'] . '</td>' : '' ?>

                      <?= (in_array(5, $templates)) ? '<td class="tm_width_1">' . $item['disc_perc'] . '</td>' : '' ?>
                      <?= (in_array(6, $templates)) ? '<td class="tm_width_1">' . $item['disc_amt'] . '</td>' : '' ?>
                      <?= (in_array(7, $templates)) ? '<td class="tm_width_1">' . $item['vat_amt'] . '</td>' : '' ?>
                      <?= (in_array(7, $templates)) ? '<td class="tm_width_1 tm_text_right">' . $item['vat_perc'] . '</td>' : '' ?>

                      <?= (in_array(9, $templates)) ? '<td class="tm_width_1">' . $item['igst_perc'] . '</td>' : '' ?>
                      <?= (in_array(10, $templates)) ? '<td class="tm_width_1">' . $item['igst_amnt'] . '</td>' : '' ?>
                      <?= (in_array(11, $templates)) ? '<td class="tm_width_1">' . $item['cgst_perc'] . '</td>' : '' ?>
                      <?= (in_array(12, $templates)) ? '<td class="tm_width_1">' . $item['cgst_amnt'] . '</td>' : '' ?>
                      <?= (in_array(13, $templates)) ? '<td class="tm_width_1">' . $item['sgst_perc'] . '</td>' : '' ?>
                      <?= (in_array(14, $templates)) ? '<td class="tm_width_1">' . $item['sgst_amt'] . '</td>' : '' ?>
                      <?= (in_array(15, $templates)) ? '<td class="tm_width_1">' . $item['cess_perc'] . '</td>' : '' ?>
                      <?= (in_array(16, $templates)) ? '<td class="tm_width_1">' . $item['cess_amnt'] . '</td>' : '' ?>
                      <?= (in_array(33, $templates)) ? '<td class="tm_width_1">' . $item['price'] * $item['quantity'] . '</td>' : '' ?>
                      <?= (in_array(34, $templates)) ? '<td class="tm_width_1 tm_text_right"> ' . $item['total_price'] . ' </td>' : '' ?>

                    </tr>
                    <?php $i++;
                    $tot = $tot + $item['taxable'];
                    $disc_amt = $disc_amt + $item['disc_amt'];
                    $amt = $amt + $item['price'] * $item['quantity'];
                    $txamt = $txamt + ($item['price'] * $item['quantity'] * $details['vat'] / 100);
                  } ?>


                </tbody>
              </table>
            </div>
          </div>
          <div class="tm_invoice_footer">
            <div class="tm_left_footer">

              <p class="tm_mb2"><b class="tm_primary_color">Bank Details</b></p>

              <p class="tm_m0" style="line-height: 28px;">
                Account Name / إسم الحساب : Abdullah Ahmed Al-Mansour<br>
                Bank Name / اسم البنك : Saudi British Bank<br>
                Account Number / رقم حساب : 12345678901234
                <br>IBAN No / رقم الآيبان : SA0380000000608010167519
              </p>
            </div>
            <div class="tm_right_footer">
              <table>
                <tbody>
                  <tr>
                    <td class="tm_width_4 tm_primary_color tm_border_none tm_bold">Total Amount</td>
                    <td class="tm_width_2 tm_primary_color tm_text_right tm_border_none tm_bold"> <?= $amt ?></td>
                  </tr>
                  <tr>
                    <td class="tm_width_4 tm_primary_color tm_border_none tm_pt0">Discount</td>
                    <td class="tm_width_2 tm_primary_color tm_text_right tm_border_none tm_pt0"> <?= $disc_amt ?></td>
                  </tr>
                  <tr>
                    <td class="tm_width_4 tm_primary_color tm_border_none tm_pt0">Net Amount</td>
                    <td class="tm_width_2 tm_primary_color tm_text_right tm_border_none tm_pt0"><?= $amt ?></td>
                  </tr>
                  <tr>
                    <td class="tm_width_4 tm_primary_color tm_border_none tm_pt0">VAT <span
                        class="tm_ternary_color"></span>
                    </td>
                    <td class="tm_width_2 tm_primary_color tm_text_right tm_border_none tm_pt0"> 5.00</td>
                  </tr>
                  <tr class="tm_border_top tm_border_bottom_0">
                    <td class="tm_width_4 tm_border_top_0 tm_bold tm_f16 tm_primary_color">Grand Total</td>
                    <td class="tm_width_2 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right"> <?= $tot ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>
        <div class="tm_invoice_head tm_mb10">
          <div class="tm_padd_5 tm_round_border tm_mb0" style="display: inline-block;width: 12%;">
            <img src="assets/img/qr.png">
          </div>
          <div class="tm_padd_0" style="margin-left: 0%;display: inline-block;width: 88%">
            <table class="tm_mt25">
              <tbody>
                <tr class="tm_border_bottom">
                  <td>Amount in Words : <b>One hundred five US dollars</b>
                  </td>
                </tr>

              </tbody>
            </table>

          </div>

        </div>


        <div class="tm_padd_15_20 tm_round_border tm_mb5" style="margin-left: 0%;display: inline-block;width: 100%">
          <p class="tm_mb5"><b class="tm_primary_color">Terms & Conditions:</b></p>
          <ul class="tm_m0 tm_note_list">
            <li>All claims relating to quantity or shipping errors shall be waived by Buyer unless made in
              writing to Seller within thirty (30) days after delivery of goods to the address stated.</li>

          </ul>
        </div><!-- .tm_note -->
        <div class="tm_padd_15_20 tm_round_border">
          <a href="#">hellow@yourdomain.com</a>
          <a href="#" style="float: right;">www.yourdomain.com</a>
        </div><!-- .tm_note -->
      </div>
    </div>
    <div class="tm_invoice_btns tm_hide_print">
      <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
        <span class="tm_btn_icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path
              d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
              fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
            <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor"
              stroke-linejoin="round" stroke-width="32" />
            <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
              stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
            <circle cx="392" cy="184" r="24" fill='currentColor' />
          </svg>
        </span>
        <span class="tm_btn_text">Print</span>
      </a>
      <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
        <span class="tm_btn_icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path
              d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03"
              fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
          </svg>
        </span>
        <span class="tm_btn_text">Download</span>
      </button>
    </div>
  </div>
</div>