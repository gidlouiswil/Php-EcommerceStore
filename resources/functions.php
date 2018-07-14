<?php
 /* Helper functions */

function last_id()
{
    global $connection;
    return mysqli_insert_id($connection);  
}

function set_message($message)
{
    if(!empty($message))
    {
          $_SESSION['message'] = $message; 
    }
    else
    {
        $message = "";
    }
}

function display_message()
{
    if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location)
{
    header("Location: $location ");
}

function query($sql)
{
    global $connection;
    
    return mysqli_query($connection, $sql);
}

function confirm($result)
{
    global $connection;
    
    if(!$result)
    {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}

function escape_string($string)
{
    global $connection;
    
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

/* ============== Frontend functions ============== */
/* get products */
function get_products()
{
    $query = query("SELECT * FROM products");
    confirm($query);
    
    $rows = mysqli_num_rows($query);
    
    if(isset($_GET['page']))
    {
        $page = preg_replace('#[^0-9]#', '', $_GET['page']);
        
    }
    else
    {
        $page = 1;
    }
    
    $per_page = 6;
    
    $last_page = ceil($rows / $per_page);
    
    if($page < 1)
    {
        $page = 1;
    }
    elseif($page > $last_page)
    {
        $page = $last_page;
    }
    
    $middle_numbers = '';
    $sub_1 = $page - 1;
    $sub_2 = $page - 2;
    $add_1 = $page + 1;
    $add_2 = $page + 2;
    
    if($page == 1)
    {
        $middle_numbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
        
        $middle_numbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$add_1.'">' .$add_1. '</a></li>';
        
    }
    elseif($page == $last_page)
    { 
        $middle_numbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$sub_1.'">' .$sub_1. '</a></li>';
        
        $middle_numbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
        
    }
    elseif($page > 2 && $page < ($last_page - 1))
    { 
        $middle_numbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$sub_2.'">' .$sub_2. '</a></li>';
         
        $middle_numbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$sub_1.'">' .$sub_1. '</a></li>';
         
        $middle_numbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
         
        $middle_numbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$add_1.'">' .$add_1. '</a></li>';
         
        $middle_numbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$add_2.'">' .$add_2. '</a></li>';
        
    }
    elseif($page > 1 && $page < $last_page)
    {
        $middle_numbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$sub_1.'">' .$sub_1. '</a></li>';
        
        $middle_numbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
        
        $middle_numbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$add_1.'">' .$add_1. '</a></li>';
    }
    
    $limit = 'LIMIT ' . ($page - 1) * $per_page . ',' . $per_page;
    
    $query_2 = query("SELECT * FROM products {$limit}");
    confirm($query_2);
    
    $output_pagination = "";
    
    if($page != 1)
    {
        $previous = $page - 1;
        $output_pagination = '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$previous.'">Back</a></li>';
    }
    
    $output_pagination .= $middle_numbers;
    
    if($page != $last_page)
    {
        $next = $page + 1;
        $output_pagination .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$next.'">Next</a></li>';
    }
    
    
    while($row = fetch_array($query_2))
    {
        $product = <<< DELIMETER
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
            <a href="item.php?id={$row['product_id']}">
                <img style="height:90px" src="{$row['product_image']}" alt="">
            </a>
                <div class="caption">
                    <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                    <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                    </h4>
                    <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                    <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}">Add to cart</a>
                </div>           
            </div>
        </div>
DELIMETER;
        
        echo $product;   
    }
    
    echo "<div class='text-center' style='clear: both'><ul class='pagination'>{$output_pagination}</ul></div>"; 
    
    
}

function get_categories()
{
    $query = query("SELECT * FROM categories");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $category_link = <<< DELIMETER
            <a href='category.php?id={$row['category_id']}' class='list-group-item'>
                {$row['category_title']}
            </a>             
DELIMETER;
        
        echo $category_link;  
    }
}

function get_products_in_category_page()
{
    $query = query("SELECT * FROM products where product_category_id=" . escape_string($_GET['id']));
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $product = <<< DELIMETER
        <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['product_image']}" alt="">
                    <div>
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMETER;
        
        echo $product;   
    }
}

function get_category_name()
{
    $query = query("SELECT * FROM categories where category_id=" . escape_string($_GET['id']));
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $category = <<< DELIMETER
        <h1>{$row['category_title']}</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
DELIMETER;
        
        echo $category;   
    }
}

function get_products_in_shop_page()
{
    $query = query("SELECT * FROM products");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $product = <<< DELIMETER
        <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['product_image']}" alt="">
                    <div>
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMETER;
        
        echo $product;   
    }
}

function login_user()
{
    if(isset($_POST['submit']))
    {
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);
        
        $query = query("SELECT * FROM users WHERE user_name = '{$username}' AND user_password = '{$password}'");
        
        confirm($query);
        
        if(mysqli_num_rows($query) == 0)
        {
            set_message("Your password or username are wrong");
            redirect("login.php");
        }
        else
        {
            $_SESSION['username'] = $username;
            redirect("admin");
        }
    }
}

function send_message()
{
    
    if(isset($_POST['submit']))
    {
        
        $from_name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $to = "fromltow@gmail.com";
        
        $headers = "From: {$from_name} {$email}";
        
        $result = mail($to, $phone, $message, $headers);
        
        if(!$result)
        {
            set_message("Sorry we could not send your message.");
        }
        else
        {
            set_message("Your message has been sent.");
        }
        
        
    }
}

/* ============== Backend functions ============== */

function display_orders()
{
    $query = query("SELECT * FROM orders");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $orders = <<< DELIMITER
        <tr>
            <td>{$row['order_id']}</td>
            <td>{$row['order_amount']}</td>
            <td>{$row['order_transaction']}</td>
            <td>{$row['order_currency']}</td>
            <td>{$row['order_status']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/backend/delete_order.php?id={$row['order_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
DELIMITER;
        
        echo $orders;
    }
}

/* ============== Categories in admin ============== */

function show_categories_in_admin()
{
    $query = "SELECT * FROM categories";
    $category_query = query($query);
    confirm($category_query);
    
    while($row = fetch_array($category_query))
    {
        $category_id = $row['category_id'];
        $category_title = $row['category_title'];
        
        $category = <<< DELIMITER
        <tr>
            <td>{$category_id}</td>
            <td>{$category_title}</td>
            <td>
            <a class="btn btn-danger" href="../../resources/templates/backend/delete_category.php?id={$row['category_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
DELIMITER;
        
        echo $category;
    }
}

function add_category()
{
    if(isset($_POST['add_category']))
    {
        $category_title = escape_string($_POST['category_title']);
        
        if(empty($category_title) || $category_title == " ")
        {
            echo "<p class='bg-danger'>THIS CANNOT BE EMPTY.</p>";
        }
        else
        {
            $insert_category = query("INSERT INTO categories(category_title) VALUES('{$category_title}')");
            confirm($insert_category);
            set_message("Category Added");
        }
        
    }
}

/* ============== admin users ============== */
function display_users()
{
    $query = "SELECT * FROM users";
    $user_query = query($query);
    confirm($user_query);
    
    while($row = fetch_array($user_query))
    {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
        
        $category = <<< DELIMITER
        <tr>
            <td>{$user_id}</td>
            <td>{$user_name}</td>
            <td>{$user_email}</td>
            <td>
            <a class="btn btn-danger" href="../../resources/templates/backend/delete_user.php?id={$row['user_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
DELIMITER;
        
        echo $category;
    }
}

function add_user()
{
    if(isset($_POST['add_user']))
    {
        $username = escape_string($_POST['username']);
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['password']);
//        $user_photo = escape_string($_FILES['file']['name']);
//        $photo_temp = escape_string($_FILES['file']['tmp_name']);
//        
//        move_uploaded_file($photo_temp, UPLOAD_DIRECTORY . DS . $user_photo);
        
       /* $query = query("INSERT INTO users(user_name, user_email, user_password, user_photo) VALUES({$username}, {$email}, {$password}, {$user_photo})");*/
        
        $query = query("INSERT INTO users(user_name, user_email, user_password) VALUES('{$username}', '{$email}', '{$password}')");
        confirm($query);
        set_message("USER CREATED");
        redirect("index.php?users");
    }
}

/* ============== admin products ============== */
function add_product()
{
    if(isset($_POST['publish']))
    {
        $product_title = escape_string($_POST['product_title']);
        $product_category_id = $_POST['product_category'];
        $product_price = $_POST['product_price'];
        $product_quantity = 1;
        $product_description = escape_string($_POST['product_description']);
        
        $product_short_desc = "";
        $product_brand = escape_string($_POST['product_brand']);
        $product_tags = escape_string($_POST['product_tags']);
        $product_image = escape_string($_FILES['file']['name']);
        
        move_uploaded_file($photo_temp, UPLOAD_DIRECTORY . DS . $product_image);
        
        $query = query("INSERT INTO products(product_title, product_category_id, product_price, product_quantity, product_description, product_short_desc, product_image) VALUES('{$product_title}', '{$product_category_id}', '{$product_price}', '{$product_quantity}', '{$product_description}', '{$product_short_desc}', '{$product_image}')");
        
        confirm($query);
        set_message("PRODUCT CREATED");
        redirect("index.php?products");
    }
}

function show_products_in_admin()
{
    $query = "SELECT products.product_id, 
    products.product_title, categories.category_title, products.product_price, products.product_quantity  FROM products INNER JOIN categories ON products.product_category_id = categories.category_id";
    $product_query = query($query);
    confirm($product_query);
    
    while($row = fetch_array($product_query))
    {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_category = $row['category_title'];
        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];
        
        $product = <<< DELIMITER
        <tr>
            <td>{$product_id}</td>
            <td>{$product_title}</td>
            <td>{$product_category}</td>
            <td>{$product_price}</td>
            <td>{$product_quantity}</td>
            <td>
            <a class="btn btn-danger" href="../../resources/templates/backend/delete_product.php?id={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
DELIMITER;
        
        echo $product;
    }
}

function display_categories_in_admin_add_user_form()
{
    $query = "SELECT * FROM categories";
    $category_query = query($query);
    confirm($category_query);
    
    while($row = fetch_array($category_query))
    {
        $category_id = $row['category_id'];
        $category_title = $row['category_title'];
        
        $category = <<< DELIMITER
        <option value="{$row['category_id']}">{$row['category_title']}</option>
DELIMITER;
        
        echo $category;
    }
}

/* ============== admin reports ============== */

function show_reports_in_admin()
{
    $query = "SELECT * FROM reports";
    $report_query = query($query);
    confirm($report_query);
    
    while($row = fetch_array($report_query))
    {
        $report = <<< DELIMITER
        <tr>
            <td>{$row['report_id']}</td>
            <td>{$row['product_id']}</td>
            <td>{$row['order_id']}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_title']}</td>
            <td>{$row['product_quantity']}</td>
            <td>
            <a class="btn btn-danger" href="../../resources/templates/backend/delete_report.php?id={$row['report_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
DELIMITER;
        
        echo $report;
    }
}


/* ============== Slide functions ============== */
function display_image($image_name)
{
    return "../resources/uploads/" . $image_name; 
}


function add_slides()
{
    if(isset($_POST['add_slide']))
    {
        $slide_title =  escape_string($_POST['slide_title']);
        $slide_image =  escape_string($_FILES['file']['name']);
        $slide_image_location =  escape_string($_FILES['file']['tmp_name']);
        
        if(empty($slide_title) || empty($slide_image))
        {
            echo "<p class='bg-danger'>This field cannot be empty</p>";
        }
        else
        {
            move_uploaded_file($slide_image_location, UPLOAD_DIRECTORY . DS . $slide_image);
            
            $query = query("INSERT INTO slides(slide_title, slide_image) VALUES('{$slide_title}', '{$slide_image}')");
            
            confirm($query);
            set_message("Slide added.");
        }
    }  
}

function get_current_slide_in_admin()
{
    $query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $slide_image = display_image($row['slide_image']);
        $slide_active_admin = <<<DELIMITER
        <img class="img-responsive" src="../../resources/{$slide_image}" alt="">
DELIMITER;
        
        echo $slide_active_admin;   
    }  
}

function get_active_slide()
{
    $query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $slide_image = display_image($row['slide_image']);
        $slide_active = <<<DELIMITER
         <div class="item active">
            <img class="slide-image" src="{$slide_image}" alt="">
        </div>
DELIMITER;
        
        echo $slide_active;   
    }
}

function get_slides()
{
    $query = query("SELECT * FROM slides");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $slide_image = display_image($row['slide_image']);
        $slides = <<<DELIMITER
         <div class="item">
            <img class="slide-image" src="{$slide_image}" alt="">
        </div>
DELIMITER;
        
        echo $slides;   
    }
}

function get_slide_thumbnails()
{
    $query = query("SELECT * FROM slides ORDER BY slide_id ASC ");
    confirm($query);
    
    while($row = fetch_array($query))
    {
        $slide_image = display_image($row['slide_image']);
        $slide_thumbnail_admin = <<<DELIMITER
        <div class="col-xs-6 col-md-3 image_container">
        <a href="index.php?delete_slide_id={$row['slide_id']}">
        <img class="img-responsive slide_image" src="../../resources/{$slide_image}" alt="">
        </a>
        <div class="caption">
        <p>{$row['slide_title']}</p>
        </div>
    </div>
DELIMITER;
        
        echo $slide_thumbnail_admin;   
    }  
}

?>