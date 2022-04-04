<?php

define('_MEXEC', 1);
define('_ADMIN', 'client');
define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', dirname(__FILE__) );

global $message;
$message='';
// Call Framework
require_once 'includes/defines.php';

require_once 'includes/framework.php';

// Template

//  return htmlentities($output);
//$string = eval(file_get_contents("file.php"));
//$Vdata = file_get_contents('path/to/YOUR/FILE.php');
//if (file_exists(dirname(__FILE__) . '/defines.php')) {


require_once 'templates/system/header.php';

?>
	<div id="navPnlBg"><div id="navPnlRgt"><div id="navPnlCont">
    	<div id="access" role="navigation">
        	<div class="skip-link hide">
                <a href="#content" title="Skip to content">Skip to content</a>
            </div>
            <div class="menu">


		<?php
			require_once 'modules/menu/menu.php';
		?>			
			
			
			
             </div> 


        </div>
        <div id="languageSelector">
        	<form action="#">
            	<select>
                	<option>English</option>
                </select>
            </form>
        </div>
    </div></div></div>


<?php
	include_once 'modules/slider/slider.php';
	//require_once 'components/' . $v_option . '/' . $v_option . '.php';
?>


    <div id="bodyArea"><!--Start body-->
    <div id="container">
        <div id="sidebar"><!--Start Sidebar-->
		
        	<div class="sideBox">				
				<div id="login" class="sideBox" ><dl class="sideBoxTop"><dd class="sideBoxCont">
						<?php
							if(!$login){
								require_once ROOT_PATH . '/modules/login/login.php';
							}else{
								require_once ROOT_PATH . '/modules/member/member.php';
							}							
							?>
					</dd></dl>
				</div>
				
			</div>
				
			<div class="sideBox">
				<?php include_once 'modules/payments/payments.php'; ?>
			</div>
            
            <div class="sideBox">
				<?php include_once 'modules/news/news.php'; ?>
			</div>
            
            
        </div><!--End Sidebar-->  



	<div id="content">
		<div id="content"><!--Start Content-->

<?php require_once 'components/' . $v_option . '/' . $v_option . '.php'; ?>

		</div><!--End Content-->  
	</div>
		
	
    </div>
    </div><!--End body-->
<?php
	require_once 'templates/system/footer.php';
?>



