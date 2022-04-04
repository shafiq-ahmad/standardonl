<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">

		<div id="content" class="innerPage">
        	<h2>Standard Online Jobs Contact Details!</h2> 
            <dl id="francisePg">
            	<dd class="left-cell" >
                            	<div class="franchCont">
                                	<p>StandardOnlineJob.com Welcome your interest to become Franchiser.</p>
                                	<p>Only One Franchise will be registered in a city however if population of city is more than Five Millions another Franchise may be established (Conditions Apply).  Franchise will be given on the good reputation and working experience of outsourcing projects. Standard Online Jobs also conduct training sessions in UK /  Spain / Canada and Singapore. Franchisers may join the sessions to enhance their skills regarding the challenging Business market and the innovation in E-Comm.</p>
                                	<ul>
                                    	<dt>Franchise Registration</dt><br />
                                        <li>Setup Time:-  72 hrs</li>
                                        
                                        
   															<br />
                                        <dt>Benefits</dt><br />
                                        <li>Franchise Commission:- 30% to 35%</li>
                                        <li>Sub franchise Commission:- 15% to 20%</li>
                                        <li>Commission from Client Earning:- 5%</li>
                                        <li>Franchise Account</li>
                                        <li>Extra Incentives, Reward and International tours (On Performance)</li>
                                        <br />
                                        For Franchise Inquiries
                                        Email : franchises@standardonlinejob.com
                                    </ul>	
                                </div>
                                
                <dd class="left-cell" >
                	<div class="thumbsTop">
                    	<img src="images/flages/countries/thumbs/england-108x70.jpg"/>
                        <strong>UNITED KINGDOM MAIN OFFICE</strong>
                    </div>
                    <ul>
                        <li>G.Manager:  Ashlay Johnson</li>
                        <li>For the Business Queries Please Contact:</li>
                        <li><a href="mailto:'GM@standardonlinejob.com'">GM@standardonlinejob.com</a> and <a href="mailto:'ashlay@standardonlinejob.com'">ashlay@standardonlinejob.com</a></li>
                        <li>Address: 23/p-288 Berkeley Square, Mayfair</li>
                        <li>City / Region: London</li>
                        <li>Zip Code: (B19 8RS)</li>
                        <li>Country: United Kingdom</li>
                        <li>Website: <a href="http://www.standardonlinejob.com" target="_blank">http://www.standardonlinejob.com</a></li>
                    </ul>
                </dd>
                <dd class="left-cell" >
                	<div class="thumbsTop">
                    	<img />
                        <strong>CLIENTS SUPPORT CENTRE</strong>
                    </div>
                    <ul>
                        <li>For General Queries:<br />  <a href="mailto:'support@standardonlinejob.com'">support@standardonlinejob.com</a></li>
                        <li>For Report Department:<br /> <a href="mailto:'reports@standardonlinejob.com'">reports@standardonlinejob.com</a></li>
                        <li>For Payment Inquiries:<br /> <a href="mailto:'payment@standardonlinejob.com'">payment@standardonlinejob.com</a></li>
                        <li>For Link Exchange:<br /> <a href="mailto:'links@standardonlinejob.com'">links@standardonlinejob.com</a></li> 
                    </ul>
                </dd>		

                <dt>COUNTRY BASED FRANCHISE OFFICES</dt>		
		

			<div id="message">
				<?php
					global $message;
					echo $message;
				?>
			</div>
			<div id="content-wrapper">
					<div class="table">
					<?php $counter=0; $class = ''; ?>
					<?php foreach ($rows as $row): ?>
						<?php 
							$counter++;
							if(($counter % 2) == 1 ){$class = 'left-cell';}else{$class = 'right-cell';}
							$link = 'index.php?option=onlinejobs&view=franchises&ItemID=' . $row['id']; 
							$result=getElementById('countries',$row['country']);
							$country=$result[0]['name'];
							?>
						
                <dd class="<?php echo $class; ?>" >
                	<div class="thumbsTop">
                    	<img src="images/flages/countries/thumbs/<?php echo strtolower($country); ?>-108x70.jpg"/>
                        <strong><?php echo $row['name']; ?><br /><?php echo $country; ?></strong>
                    </div>
					<ul> 
                        <li><strong>Owner Name:  <?php echo $row['name']; ?></strong></li>
                        <li>Address: <?php echo $row['address']; ?></li>
                        <li>City / Region: <?php echo $row['city']; ?></li>
                        <li>Zip Code: <?php echo $row['zip_code']; ?></li>
                        <li>Phone No: <?php echo $row['phone']; ?></li>
                        <li>Country: <?php echo $country; ?></li>
                        <li>Website: <a href="<?php echo $row['web_site']; ?>" target="_blank"><?php echo $row['web_site']; ?></a></li>
                        <li>Email: <a href="mailto:'<?php echo $row['e_mail']; ?>'"><?php echo $row['e_mail']; ?></a></li>
                    </ul>
						
							
                </dd>	
						
					<?php if(($counter % 2) == 0 ){ echo'<div style="clear:both;" ></div>';} ?>
					<?php endforeach; ?>
				</div>
				
				<div id="pagination" style="">
					<?php
					if($pagination->total_pages() > 1) {
						
					if($pagination->has_previous_page()) { 
						echo "<a href=\"index.php??option=onlinejobs&view=franchises&page=";
						echo $pagination->previous_page();
						echo "\">&laquo; Previous</a> "; 
					}

					for($i=1; $i <= $pagination->total_pages(); $i++) {
						if($i == $page) {
							echo " <span class=\"selected\">{$i}</span> ";
						} else {
							echo " <a href=\"index.php?option=onlinejobs&view=franchises&page={$i}\">{$i}</a> "; 
						}
					}

						if($pagination->has_next_page()) { 
							echo " <a href=\"index.php?option=onlinejobs&view=franchises&page=";
							echo $pagination->next_page();
							echo "\">Next &raquo;</a> "; 
					}
						
					}

					?>
					<div class="cleaner"></div>
				</div>
				
			</div>
        </div>

	</div>
