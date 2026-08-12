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
    <title>Teacher Form</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px; background-color: #eaeaea;">

    <div style="width: 50%; margin: 0 auto; background-color: #f4f4f4; padding: 20px; border-radius: 10px;">
        <h2 style="text-align: center;">Teacher Information Form</h2>
        <form action="<?= base_url('home/teacher_form_submit') ?>" method="POST">
        <div class="row">
            <div style="margin-bottom: 15px;" class="col-md-6">
                <label for="name" style="font-weight: bold; display: block; margin-bottom: 5px;">Full Name:</label>
                <input type="text" id="name" name="name" required style="width: 100%; padding: 8px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;" class="col-md-6">
                <label for="dob" style="font-weight: bold; display: block; margin-bottom: 5px;">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required style="width: 100%; padding: 8px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;" class="col-md-6">
                <label for="email" style="font-weight: bold; display: block; margin-bottom: 5px;">Email:</label>
                <input type="email" id="email" name="email" required style="width: 100%; padding: 8px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;" class="col-md-6">
                <label for="subject" style="font-weight: bold; display: block; margin-bottom: 5px;">Subject Specialization:</label>
                <select id="subject" name="subject" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                        <option value="0">Select Subject</option>                        
                                        <option value="1">Maths</option>
                                        <option value="2">Science</option>
                                        <option value="3">Malayalam</option>
                                        <option value="4">English</option>
                                        <option value="5">Hindi</option>
                                        <option value="6">IT</option>
                                    </select>
            </div>

            <div style="margin-bottom: 15px;" class="col-md-6">
                <label for="experience" style="font-weight: bold; display: block; margin-bottom: 5px;">Years of Experience:</label>
                <input type="number" id="experience" name="experience" required style="width: 100%; padding: 8px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;" class="col-md-6">
                <label for="phone" style="font-weight: bold; display: block; margin-bottom: 5px;">Contact Number:</label>
                <input type="text" id="phone" name="phone" required style="width: 100%; padding: 8px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px;">
            </div>


            <div style="margin-bottom: 15px;" class="col-md-12">
                <label for="bio" style="font-weight: bold; display: block; margin-bottom: 5px;">Short Biography:</label>
                <textarea id="bio" name="bio" rows="4" required style="width: 100%; padding: 8px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px;"></textarea>
            </div>

            <div>
                <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; width: 100%; font-size: 16px;">Submit</button>
            </div>
            
        </form>
    </div>

</body>
</html>
