<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<table class="table table-bordered table-hover">
    <thead style="background: #404040; color:white;">
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    <?php 
    $query_res= mysqli_query($db,"select * from users_orders where order_id='".$_POST['id']."'");
    if(!mysqli_num_rows($query_res) > 0 )
    {
        echo '<td colspan="5"><center>You have No orders Placed yet. </center></td>';
    }else{			      
            while($row=mysqli_fetch_array($query_res))
    {?>
        <tr>
            <td data-column="Item"> <?php echo $row['title']; ?></td>
            <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
            <td data-column="price">$<?php echo $row['price']; ?></td>
            <td data-column="Date"> <?php echo $row['date']; ?></td>
            <td data-column="Action"> 
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="right" title="Cancel Items">
                <a href="delete_orders.php?type=oid&order_del=<?php echo $row['o_id'];?>&order_id=<?php echo $row['order_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a></span>
            </td>
        </tr>
        <?php }} ?>
    </tbody>
</table>
<script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
</script>