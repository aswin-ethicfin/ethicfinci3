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
                    <title>Edit Student Details</title>
                    </head>
                    <body style="font-family: Arial, sans-serif; background-color: #f4f4f9;" >
                        <?php $id = $this->input->get('id'); ?>
                        <div style="width: 50%; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
                            <h2 style="text-align: center; color: #333; margin-bottom: 20px;">Edit Student Details</h2>
                            <form method="post" action="<?= base_url('home/update_submit') ?>">
                                <div class="row">                                
                                    <input type="hidden" id="id" name="id" value = "<?= $id ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                <div style="margin-bottom: 15px;" class="col-md-6">
                                    <label for="firstName" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">First Name:</label>
                                    <input type="text" id="firstName" name="firstName" value = "<?= $student_details[0]['first_name'] ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-6">
                                    <label for="lastName" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Last Name:</label>
                                    <input type="text" id="lastName" name="lastName" value = "<?= $student_details[0]['last_name'] ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-6">
                                    <label for="dob" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Date of Birth:</label>
                                    <input type="date" id="dob" name="dob" value = "<?= $student_details[0]['dob'] ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-6">
                                    <label for="email" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Email Address:</label>
                                    <input type="email" id="email" name="email" value = "<?= $student_details[0]['email'] ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-6">
                                    <label for="gender" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Gender:</label>
                                    <select id="gender" name="gender" value = "<?= $student_details[0]['gender'] ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                        <option value="0">Select Gender</option>     
                                        <option value="1"<?= ($student_details[0]['gender']==1)?'Selected':''?> >Male</option>
                                        <option value="2"<?= ($student_details[0]['gender']==2)?'Selected':''?>>Female</option>
                                        <option value="3"<?= ($student_details[0]['gender']==3)?'Selected':''?>>Other</option>
                                    </select>
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-6">
                                    <label for="course" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Course:</label>
                                    <input type="text" id="course" name="course" value = "<?= $student_details[0]['course'] ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-12">
                                    <label for="address" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Address:</label>
                                    <textarea id="address" name="address" rows="4" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;"><?= $student_details[0]['address'] ?></textarea>
                                </div>
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <button type="submit" style="width: 100%; padding: 12px; background-color: #007BFF; color: white; border: none; border-radius: 5px; font-size: 1rem; cursor: pointer; transition: background-color 0.3s ease;">Submit</button>
                                </div>
                            </form>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
