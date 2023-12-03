
<?php
require("connection/connection.php");
session_start();
?>

<?php 
include 'header/header.php';
?>   
    
  <div class="top-buffer">

    <div class="text_container " style="width:2500px;">
        <div class="items">
            <h2>
                <a href="index.php" class="text-decoration"> </a>

            </h2>
        
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addproduct1">
            <i class="bi bi-plus"></i>Add Product
            </button>
        </div>
    </div>

    <?php
        if(isset($_GET['alert']))
        {
            if($_GET['alert']=='img_upload1')
            {
                echo<<<alert
                    <div class="danger" role="alert">
                        <strong>Image upload failed! Not Working</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
            
            if($_GET['alert']=='add_failed1')
            {
                echo<<<alert
                    <div class="danger" role="alert">
                        <strong>Cannot Add Product! Not Working</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
            
            
        }
        else if(isset($_GET['success']))
        {
            
            
            if($_GET['success']=='added1')
            {
                echo<<<alert
                    <div class="success" role="alert">
                        <strong>Product Added!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
            
        
        }


    ?>
    <div class="container_1">
            <table class="table_hover">
                <thead class="text_light">
                    <tr>
                    <th width="20%" scope="col" class="rounded-start">Sr. No.</th>
                    <th width="25%"scope="col">Image</th>
                    <th width="20%" scope="col">Name</th>
                    <th width="20%" scope="col">Price</th>
                    <th width="45%" scope="col" class="rounded-end">Description</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php
                        $query= "SELECT * FROM `products`";
                        $result=mysqli_query($conn,$query);
                        $i=1;
                        $fetch_src=FETCH_SRC;

                        while($fetch=mysqli_fetch_assoc($result))
                        {
                            echo<<<product
                                <tr class="align-middle">
                                    <th scope="row">$i</th>
                                    <td><img src="$fetch_src$fetch[image]" width="100px"></td>
                                    <td>$fetch[name]</td>
                                    <td>$$fetch[price]</td>
                                    <td>$fetch[description]</td>
                                </tr>
                            product;
                            $i++;
                        }
                    ?>
                    
                </tbody>
        </table>

    </div>

    <div class="modal_fade" id="addproduct1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal_dialog">
        <form action="crud.php" method="POST" enctype="multipart/form-data">
            <div class="modal_content">
            <div class="modal_header">
                <h1 class="modal_title" >Add Product</h1>
                
            </div>
            <div class="modal_body">
                    <div class="group ">
                        <span class="input_group" >Name</span>
                        <input type="text" class="control"name="name" required>
                    </div>
                    <div class="group">
                        <span class="input_group">Price</span>
                        <input type="number" class="control"name="price"  min=1 required>
                    </div>
                    <div class="input-group">
                        <span class="input_group">Description</span>
                        <textarea class="control" name="desc" required></textarea>
                    </div>
            </div>
            <div class="group">
                    <label class="input_group" >Image</label>
                    <input type="file" class="control" name="image" accept=".jpg,.png,.svg" required>
            </div>
            <div class="modal_footer">
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" name="addproduct1">Add</button>
            </div>
            </div>
        </form>
    </div>
</div>
                    </div>
<?php 
include 'footer/footer.php';
?>   
