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
                    <title>Student Details Form</title>
                    </head>
                    <body style="font-family: Arial, sans-serif; background-color: #f4f4f9;" >

                        <div style="width: 50%; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
                            <h2 style="text-align: center; color: #333; margin-bottom: 20px;">Students List </h2>
                            <form action="" method="post">
                                <div class="row">
                                <div style="margin-bottom: 15px;" class="col-md-6">
                                    <label for="firstName" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">First Name:</label>
                                    <input type="text" id="firstName" name="firstName" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-6">
                                    <label for="lastName" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Last Name:</label>
                                    <input type="text" id="lastName" name="lastName" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-6">
                                    <label for="dob" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Date of Birth:</label>
                                    <input type="date" id="dob" name="dob" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-6">
                                    <label for="email" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Email Address:</label>
                                    <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-6">
                                    <label for="gender" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Gender:</label>
                                    <select id="gender" name="gender" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-6">
                                    <label for="course" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Course:</label>
                                    <input type="text" id="course" name="course" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                </div>

                                <div style="margin-bottom: 15px;" class="col-md-12">
                                    <label for="address" style="display: block; font-size: 1rem; color: #555; margin-bottom: 5px;">Address:</label>
                                    <textarea id="address" name="address" rows="4" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;"></textarea>
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