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
                    <title>Parent Details Form</title>
                    </head>
                    <body style="font-family: Arial, sans-serif; background-color: #f4f4f9;" >
                    <?php $id = $this->input->get('id'); ?>
                        <div style="width: 50%; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
                            <h2 style="text-align: center; color: #333; margin-bottom: 20px;">Enter Details Form</h2>
                            <form method="POST" action="<?= base_url('home/update_parent_submit') ?>">
                                <input type="hidden" id="id" name="id" value = "<?= $id ?>" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                            <div style="margin-bottom: 15px;" class="col-md-12">
                                    <label for="parent_name" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Parent's Name:</label>
                                    <input type="text" id="parent_name" name="parent_name" value=" <?= $parent_details[0]['parent_name'] ?> " required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                            </div>
                            <div style="margin-bottom: 15px;" class="col-md-12">
                                <label for="child_name" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Child's Name:</label>
                                <input type="text" id="child_name" name="child_name" value=" <?= $parent_details[0]['child_name'] ?> " required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                            </div>
                            <div style="margin-bottom: 15px;" class="col-md-6">
                                    <label for="relation" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Relationship:</label>
                                    <select id="relation" name="relation" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                        <option value="1"<?= ($parent_details[0]['relation']==1)?'Selected':''?> >Father</option>
                                        <option value="2"<?= ($parent_details[0]['relation']==2)?'Selected':''?> >Mother</option>
                                        <option value="3"<?= ($parent_details[0]['relation']==3)?'Selected':''?> >Other</option>
                                    </select>
                                </div>

                            <div style="margin-bottom: 15px;" class="col-md-12">
                                    <label for="contact_number" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Contact Number:</label>
                                    <input type="text" id="contact_number" name="contact_number" value=" <?= $parent_details[0]['contact_number'] ?> " required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                            </div>
                            <div style="margin-bottom: 15px;" class="col-md-12">
                                <label for="address" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Address:</label>
                                <input type="text" id="address" name="address" value=" <?= $parent_details[0]['address'] ?> " required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                            </div>
                            <div style="margin-bottom: 15px;">
                                    <button type="submit" style="width: 100%; padding: 12px; background-color: #007BFF; color: white; border: none; border-radius: 5px; font-size: 1rem; cursor: pointer; transition: background-color 0.3s ease;">Submit</button>
                                </div>
                            </form>
</body>
</html>
