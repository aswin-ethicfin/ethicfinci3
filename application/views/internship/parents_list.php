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
                        <h2>Parent List</h2>
                            <table style= "width: 100%; border-collapse: collapse; margin-top: 20px;">
                                <thead>
                                    <tr>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">sl.No</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Parent</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Child</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Relationship</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Contact</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Address</th>
                                        <th style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd; background-color: #f4f4f4; font-weight: bold; color: #333;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example of a parents entry -->
                                    <?php 
                                    $i = 1;
                                    foreach($parent_details as $parent){?>
                                    <tr>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"><?= $i ?></td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"><?= $parent['parent_name']?></td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"><?= $parent['child_name']?></td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"><?= ($parent['relation']==1) ? 'Father' : (($parent['relation']==2) ? 'Mother' : 'Other') ?></td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"><?= $parent['contact_number']?></td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;"><?= $parent['address']?></td>
                                        <td style="padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">
                                        <a href="<?= base_url('home/update_parent?id=' .$parent['id']) ?>" style="text-decoration: none; color: blue;">Edit</a> | 
                                            <a href="delete_parent.php?id=<?= $parent['id'] ?>" style="text-decoration: none; color: red;" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                                        </td>
                                    </tr>
                                    <?php 
                                    $i += 1;
                                    } ?>
                                    <!-- <tr>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">John Doe</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">Noel</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">2653486</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">abcd</td>
                                    </tr>
                                    <tr>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">John Doe</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">Noel</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">2653486</td>
                                        <td style= "padding: 12px; text-align: left; font-size: 16px; border: 1px solid #ddd;">abcd</td>
                                    </tr> -->
                                </tbody>
                            </table>

                        </div>  
                    </div>
                </div>
