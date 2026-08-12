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
                        <h2>Teacher List</h2>
                            <table style= "width: 100%; border-collapse: collapse; margin-top: 20px;">
                                <thead>
                                    <tr>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Sl.No</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Name</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">DOB</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Email</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Subject</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Experience</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Phone</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Biography</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example of a parents entry -->
                                     <?php 
                                     $i = 1;
                                     foreach($teacher_details as $teacher){?>
                                    <tr>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"><?= $i ?></td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"><?= $teacher['full_name']?></td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"><?= $teacher['dob'] ?></td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"><?= $teacher['email'] ?></td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">
                                            <?php 
                                                if($teacher['subject']==1){
                                                    echo 'Maths';
                                                } elseif($teacher['subject']==2){
                                                    echo 'Science';
                                                } elseif($teacher['subject']==3){
                                                    echo 'Malayalam';
                                                }elseif($teacher['subject']==4){
                                                    echo 'English';
                                                }elseif($teacher['subject']==5){
                                                    echo 'Hindi';
                                                }else{
                                                    echo 'IT';
                                                }
                                             ?></td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"><?= $teacher['yearly_experience'] ?></td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"><?= $teacher['contact_no'] ?></td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"><?= $teacher['biography'] ?></td>
                                        <td style="padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">
                                            <a href="<?= base_url('home/edit_teacher?id=' .$teacher['id']) ?>" style="text-decoration: none; color: blue;">Edit</a> | 
                                            <a href="delete_student.php?id=<?= $teacher['id'] ?>" style="text-decoration: none; color: red;" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                                        </td>
                                    </tr>
                                    <?php 
                                    $i += 1;
                                    } 
                                    ?>
                                    <!-- <tr>
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
                                    </tr> -->
                                </tbody>
                            </table>

                        </div>  
                    </div>
                </div>
