<?php
defined('_MEXEC') or die ('Restricted Access');

?>
  <script>
  $(document).ready(function(){
    $("#contactForm").validate();
  });
  </script>
  
	<div id="main-wrapper">
		<div class="ic"></div>
		<div id="content" class="innerPage">
		
			<div id="message">
				<?php
					global $message;
					echo $message;
				?>
			</div>
			<div id="content-wrapper">
        	<h2>Contact us</h2>
            <dl class="contAddress">
            	<dd class="officeAdd">
                	<strong>------- Corporate Office -------</strong>
                    <h3 class="officename">Standard Online Services</h3>
                    <p>23/p-288 Berkeley Square, Mayfair<br /> London, United Kingdom<br />
                    Support Inquiries: <br /><a href="mailto:'support@nexusservicescompany.net'">support@standardonlinejobs.net</a><br />
                    Sales Inquiries:<br /> <a href="mailto:'sales@nexusservicescompany.net'">sales@standardonlinejobs.net</a><br />                    
                    Advertising Inquiries:<br /> <a href="mailto:'info@nexusservicescompany.cnet'">info@standardonlinejobs.net</a></p> 
                </dd>
                <dd class="officeGmap">
                	<iframe width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=W1J+6BD,+United+Kingdom&amp;aq=0&amp;oq=W1J+6BD&amp;ie=UTF8&amp;hq=&amp;hnear=W1J+6BD,+United+Kingdom&amp;t=m&amp;ll=51.509864,-0.144625&amp;spn=0.013355,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe></dd>
            </dl>
			
            <h2><em>Leave Your Message</em></h2>
           <form id="contactForm" method="post" action="index.php?option=onlinejobs&view=contact" class="regiForm">
                <dl class="eachInptBx">
                    <dd class="labelTxt"><label>Name</label></dd>
                    <dd class="intputPnl"><input id="from-name" type="text" class="typeText required" name="name"  /></dd>
                </dl>
                <dl class="eachInptBx">
                    <dd class="labelTxt"><label>E-mail</label></dd>
                    <dd class="intputPnl"><input id="from-email" type="text" class="email inputbox required typeText" name="email" /></dd>
                </dl> 
                <dl class="eachInptBx">
                    <dd class="labelTxt"><label>Websile</label></dd>
                    <dd class="intputPnl"><input type="text" class="typeText" name="website" /></dd>
                </dl>
                <dl class="eachInptBx">
                    <dd class="labelTxt"><label>Phone</label></dd>
                    <dd class="intputPnl"><input type="text" class="typeText" name="phone" /></dd>
                </dl>  
                <dl class="eachInptBx">
                    <dd class="labelTxt"><label>Subject</label></dd>
                    <dd class="intputPnl"><input type="text" class="typeText" name="subject" /></dd>
                </dl>  
                <dl class="eachInptBx">
                    <dd class="labelTxt"><label>Message</label></dd>
                    <dd class="intputPnl"><textarea id="from-question" class="typeTextArea textbox required" name="question" rows="10" cols="50"></textarea></dd>
                </dl> 
                <dl class="eachInptBx"> 
					<input type="hidden" id="msg-type" class="inputbox" name="message_type" value="question" />
                    <dd class="intputPnl"><input type="submit" name="post_question" class="contusSubBtn" value="" /></dd>
                </dl> 
            </form>	
					</div>

				
			</div>
        </div>

