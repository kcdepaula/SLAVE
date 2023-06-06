<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include_once 'classes/class.product.php';
include_once 'classes/class.order.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
$product = new Product();
$order = new order();

if(!$user->get_session()){
	header("location: login.php");
}
$login_id = $user->get_user_id($_SESSION['user_email']);
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <title>SLAVE</title>
        <link rel="stylesheet" href="css/custom.css" media="screen">
        <link rel="stylesheet" href="css/custom-site.css" media="screen">
                <script class="u-script" type="text/javascript" src="jscript/jquery.js" defer=""></script>
        <script class="u-script" type="text/javascript" src="jscript/custom.js" defer=""></script>
       
        <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
        <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700">
       
        <meta name="theme-color" content="#478ac9">
        <meta property="og:title" content="SLAVE">
        <meta property="og:type" content="website">
    </head>

    <body data-home-page="index.php" data-home-page-title="SLAVE" class="u-body u-xl-mode" data-lang="en">
        <header class="u-clearfix u-custom-color-1 u-header u-sticky-c2a2 u-header" id="sec-5aa7">
            <div class="u-clearfix u-sheet u-sheet-1">
                <a  class="u-image u-logo u-image-1" data-image-width="182" data-image-height="149">
                    <img src="img/slave.jpg" class="u-logo-image u-logo-image-1">
                </a>
                <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
                    <div class="menu-collapse u-custom-font u-font-oswald" style="font-size: 1rem; letter-spacing: 0px; text-transform: uppercase; font-weight: 700;">
                        <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link" href="#" style="padding: 0px; font-size: calc(1em + 0.000244141px);">
                            <svg class="u-svg-link" viewBox="0 0 24 24">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-17a3"></use>
                            </svg>
                            <svg class="u-svg-content" version="1.1" id="svg-17a3" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <rect y="1" width="16" height="2"></rect>
                                    <rect y="7" width="16" height="2"></rect>
                                    <rect y="13" width="16" height="2"></rect>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div id="menu">
      <span class="move-right"> <strong> Hello! <?php echo $user->get_user_firstname($login_id).' '.$user->get_user_lastname($login_id);?>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; </strong></span> 
  </div> <br> <br>
                    <div class="u-custom-menu u-nav-container">
                        <ul class="u-custom-font u-font-oswald u-nav u-spacing-30 u-unstyled u-nav-1">
                            <li class="u-nav-item">
                                <a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="logout.php" style="padding: 10px 0px;">Log Out</a>
                            </li>
                        </ul>
                    </div>
                    <div class="u-custom-menu u-nav-container-collapse">
                        <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                            <div class="u-inner-container-layout u-sidenav-overflow">
                                <div class="u-menu-close"></div>
                                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                    <li class="u-nav-item">
                                        <a class="u-button-style u-nav-link" href="logout.php">Log Out</a>
                                
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                    </div>
                </nav>
                <nav class="u-menu u-menu-one-level u-offcanvas u-menu-2">
                    <div class="menu-collapse u-custom-font u-font-oswald" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
                        <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link" href="#" style="padding: 0px; font-size: calc(1em + 0.00195313px);">
                            <svg class="u-svg-link" viewBox="0 0 24 24">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-dfda"></use>
                            </svg>
                            <svg class="u-svg-content" version="1.1" id="svg-dfda" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <rect y="1" width="16" height="2"></rect>
                                    <rect y="7" width="16" height="2"></rect>
                                    <rect y="13" width="16" height="2"></rect>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="u-custom-menu u-nav-container">
                        <ul class="u-custom-font u-font-oswald u-nav u-spacing-30 u-unstyled u-nav-3">
                            <li class="u-nav-item">
                                <a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="index.php" style="padding: 10px 46px;">Dashboard</a>
                            </li>
                            <li class="u-nav-item">
                                <a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="index.php?subpage=productview&action=view" style="padding: 10px 46px;">Products</a>
                            </li>
                            <li class="u-nav-item">
                                <a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="index.php?subpage=orderview" style="padding: 10px 46px;">Orders</a>
                            </li>
                            <li class="u-nav-item">
                                <a class="u-border-2 u-border-active-grey-90 u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90" href="index.php?page=settings&subpage=view" style="padding: 10px 47px 10px 46px;"> User Settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="u-custom-menu u-nav-container-collapse">
                        <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                            <div class="u-inner-container-layout u-sidenav-overflow">
                                <div class="u-menu-close"></div>
                                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-4">
                                    <li class="u-nav-item">
                                        <a class="u-button-style u-nav-link" href="index.php">Dashboard</a>
                                    </li>
                                    <li class="u-nav-item">
                                        <a class="u-button-style u-nav-link" href="index.php?subpage=productview&action=view">Products</a>
                                    </li>
                                    <li class="u-nav-item">
                                        <a class="u-button-style u-nav-link" href="index.php?subpage=orderview&action=view">Orders</a>
                                    </li>
                                    <li>
                                    <a href="index.php?page=settings$subpage=view">User Settings</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                    </div>
                </nav>
            </div>
            
        </header>

  <div id="content">
    <?php
       switch($subpage){
        case 'view':
            require_once 'users-module/index.php';
        break; 
        case 'users':
            require_once 'users-module/index.php';
        break; 
        case 'productview':
            require_once 'product-crud/index.php';
        break; 
        case 'orderview':
             require_once 'order-crud/index.php';
        break; 
        default:
            require_once 'main.php';
        break;

    }
    ?>
  </div>


  <script>
     function hide()
     {
       // document.getElementById('sec-5aa7').style.display = 'none'; 
     }
 
 </script>

</body>
</html>