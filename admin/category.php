    <!-- harder include Here -->
    <?php include('adminheader.php') ?>
    <?php require "../connection.php";?>


                <!-- Body Content Start -->
            <div class="col-sm-9 mt-3">
                <div class="row mx-5 text-center">
                <!-- Book Request Table Start -->
                <div class="col-sm-12 mt-3 text-center">
                    <!-- Table Start -->
                    <p class="bg-dark text-white p-2">Category</p>
                    <a href="addcategory.php"><button class="btn btn-primary mb-3">Add New Category</button></a>
                    <table class="table">
                        <thead>
                            <tr><th scope="col">Category No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Total No. of Books</th>
                                <th scope="col">Available Copy</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $read_query=mysqli_query($conn,"Select * from category");
                            while($row=mysqli_fetch_array($read_query))
                        { ?>
                            <tr>
                                <th scope="row"><?php echo $row["category_no"];?></th>
                                <th scope="row"><?php echo $row["category_name"];?></th>
                                <td><?php echo $row["total_book"];?></td>
                                <td><?php echo $row["available_book"];?></td>
                                <td>
                                    <button type="submit" class="btn btn-warning" name="Delete"><i class="fa-solid fa-edit"></i></button>
                                    <button type="submit" class="btn btn-danger " name="Delete"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <!-- Table End -->
                </div>
                <!-- Book Request  Table End -->



    <!-- Footer include Here -->
    <?php include('adminfooter.php') ?>