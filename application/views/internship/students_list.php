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
                        <h2>Student List</h2>
                            <table style= "width: 100%; border-collapse: collapse; margin-top: 20px;">
                                <thead>
                                    <tr>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Sl.No</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Name</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">DOB</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Email</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Gender</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Course</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Address</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example of a parents entry -->
                                    
                                    <tr>

                                    <?php $i=1; ?>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"> <?= $i++ ?> </td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">John Doe</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">08/12/2000</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">bnxvghds@gmail.com</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">Male</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">math</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">isafvrf</td>
                                    </tr>
                                    <tr>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">John Doe</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">08/12/2000</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">bnxvghds@gmail.com</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">Male</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">math</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">isafvrf</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>  
                    </div>
                </div>


                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>    
        $(document).ready(function(){
            var studentId;
            $(".dltbtn").click(function(){
                studentId = $(this).data("id");
                $("#confirmDeleteModal").modal("show");
            });
            $("#confirmDelete").click(function(){
                $.ajax({
                    url: "<?= base_url("home/deleteStudent") ?>",
                    type: "POST",
                    data: {id: studentId},
                    success: function(response){
                        alert("Student Deleted Successfully");
                        $("#confirmDeleteModal").modal("hide");
                        $(".dltbtn[data-id = '" + studentId + "']").closest("tr").remove();
                    },
                    error: function(){
                        alert("Error Deleteing The Item");
                    }
                });
            });
        });
    </script>