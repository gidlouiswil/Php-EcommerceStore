<?php require_once("../../configuration.php");

if(isset($_GET['id']))
{
    $query = query("DELETE FROM categories WHERE category_id = " . escape_string($_GET['id']) . " ");
    confirm($query);
    set_message("Category Deleted");
    redirect("../../../public/admin/index.php?categories");
    
}
else
{
    redirect("../../../public/admin/index.php?categories");
}















?>;

