<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2 ps-5 pe-5">
                    <div class="card-content">
                        <h2 style="text-align: center; margin-bottom: 30px;">Branch Data Setting Form</h2>
                        <form action="<?= base_url('home/submit_branch') ?>" method="POST">

                            <!-- Setting Number -->
                            <div style="margin-bottom: 25px;">
                                <label for="settingNumber" style="font-size: 18px;">Setting Number:</label><br>
                                <input type="text" id="settingNumber" name="settingNumber" required style="width: 30%; padding: 14px; font-size: 18px; margin-top: 8px;">
                            </div>

                            <!-- Radio Buttons -->
                            <div style="margin-bottom: 25px;">
                                <label style="font-size: 20px; font-weight: bold;">Status:</label><br>
                                <label style="font-size: 18px; margin-right: 20px;">
                                    <input type="radio" name="status" value="Wanted" id="wantedRadio" onclick="updateSettings()" style="transform: scale(1.3); margin-right: 10px;"> Wanted
                                </label>
                                <label style="font-size: 18px;">
                                    <input type="radio" name="status" value="Unwanted" id="unwantedRadio" onclick="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Unwanted
                                </label>
                            </div>

                            <!-- Checkboxes (Setting Numbers as Values) -->
                            <div style="margin-bottom: 25px;">
                                <label style="font-size: 18px;">Field Name:</label><br>
                                <!-- Select All Checkbox in its own div -->
                                <div style="margin: 10px 0;">
                                    <label style="font-size: 16px;">
                                        <input type="checkbox" id="selectAll" onchange="toggleAllCheckboxes(this)" style="transform: scale(1.3); margin-right: 10px;" checked> Select All
                                    </label>
                                </div>

                                <!-- Checkbox Group -->
                                <div id="settingsCheckboxes" style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 10px;">
                                    <!-- Individual Checkboxes -->
                                    <label style="font-size: 16px;"><input type="checkbox" value="1" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Branch</label>
                                    <!-- <label style="font-size: 16px;"><input type="checkbox" value="2" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Contracting</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="3" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Construction</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="4" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Food</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="5" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Travel & Tourism</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="6" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Logistic</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="7" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Service</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="8" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Manpower Supply</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="9" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Manufacturing</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="10" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Education</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="11" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Health</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="12" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Maintenance</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="13" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Digital Marketing</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="14" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Transportation</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="15" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Fabrication</label>
                                    <label style="font-size: 16px;"><input type="checkbox" value="16" onchange="updateSettings()" style="transform: scale(1.3); margin-right: 10px;" checked> Rental</label> -->
                                </div>
                            </div>

                            <!-- Hidden fields to store selected setting numbers -->
                            <input type="hidden" name="show_descrids" id="show_descrids">
                            <input type="hidden" name="hidden_descrids" id="hidden_descrids">

                            <!-- Submit Button -->
                            <div style="text-align: center; margin-top: 30px;">
                                <button type="submit" style="padding: 14px 30px; background-color: #4CAF50; color: white; border: none; border-radius: 8px; font-size: 18px; cursor: pointer;">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    function updateSettings() {
        const checkboxes = document.querySelectorAll('#settingsCheckboxes input[type="checkbox"]');
        const selectAll = document.getElementById('selectAll');
        const wanted = document.getElementById('wantedRadio').checked;
        const unwanted = document.getElementById('unwantedRadio').checked;

        let selectedValues = [];
        let allChecked = true;

        checkboxes.forEach(cb => {
            if (cb.id !== 'selectAll') {
                if (cb.checked) {
                    selectedValues.push(cb.value);
                } else {
                    allChecked = false;
                }
            }
        });

        // Automatically uncheck 'Select All' if any checkbox is unchecked
        if (!allChecked) {
            selectAll.checked = false;
        } else {
            selectAll.checked = true;
        }

        if (wanted) {
            document.getElementById('show_descrids').value = selectedValues.join(',');
            document.getElementById('hidden_descrids').value = '';
        } else if (unwanted) {
            document.getElementById('hidden_descrids').value = selectedValues.join(',');
            document.getElementById('show_descrids').value = '';
        }
    }


    function toggleAllCheckboxes(selectAllCheckbox) {
        const checkboxes = document.querySelectorAll('#settingsCheckboxes input[type="checkbox"]:not(#selectAll)');
        checkboxes.forEach(cb => {
            cb.checked = selectAllCheckbox.checked;
        });
        updateSettings();
    }

    document.querySelector('form').addEventListener('submit', function(e) {
        updateSettings(); // update hidden inputs before submit
    });
</script>