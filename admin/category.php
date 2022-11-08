<h1>Categories</h1>
<a href="index.php?halaman=addcategory" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> Add Category</a>
<hr>

<?php
$all = array();
$ambil = $connect->query("SELECT*FROM kategori");
while($each = $ambil->fetch_assoc())
{
    $all[] = $each;
}

// echo "<pre>";
// print_r($all);
// echo "</pre>";


?>




<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($all as $key => $value): ?>
        <tr>
            <td><?php echo $key+1 ?></td>
            <td><?php echo $value['nama_kategori'] ?></td>
            <td>
                <a href="" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                <a href="" class="btn btn-danger"><i class="fa fa-trash-o"></i> Remove</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

