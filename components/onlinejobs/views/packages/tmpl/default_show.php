<?php
defined('_MEXEC') or die ('Restricted Access');

?>

	<div id="main-wrapper">
		<div class="ic"></div>
		<?php
			if(empty($rows)){redirect("index.php?option=onlinejobs&view=packages");}
		?>
		<div id="content">
			<center><h1><span><?php echo $rows[0]['title']; ?> - [Package]</span></h1><center>
			<center><span style="display:block;font-size:16px;font-weight:bold;margin:10px 0; color:#EE7F01;" >Duration: <?php echo $rows[0]['duration']; ?></span><center>
			<div id="message">
				<?php
					global $message;
					echo $message;
				?>
			</div>
			<div id="content-wrapper">
				<div class="table">
						<?php 
							$link = 'index.php?option=onlinejobs&view=packages'; 
						?>
							<div class="image">
								<center><img src="images/onlinejobs/packages/<?php echo $rows[0]['image']; ?>" alt="<?php echo $rows[0]['image']; ?>" title="<?php echo $rows[0]['title']; ?>" /></center>
							</div>
							<div class="details-p">
								<p class="long-text"><?php echo $rows[0]['description'];; ?></p>
							</div>
					<div class="cleaner"></div>
				</div>
				

				
			</div>
        </div>

	</div>

			<?php 
				if($detail_row){
				
			?>
	            <table align="center" border="1" width="600" bordercolorlight="#000000">
                  <tr>
                    <td width="600" align="center" border="1" valign="middle" colspan="7">
                      <p align="center"><span class="text"><b>
                      <span style="font-size:10.0pt;font-family:Century Gothic;color:navy">
                Package Details</span></b></span></td>
                  </tr>

                  <tr>
                    <td width="67" align="center" valign="middle"><b><font size="2" face="Century Gothic">Packages</font></b></td>
                    <td width="80" align="center"><b><font size="2" face="Century Gothic">Work</font></b></td>
                    <td width="88" align="center"><b>
                    <font size="2" face="Century Gothic">Payment Compilation</font></b></td>
                    <td width="65" align="center"><b><font size="2" face="Century Gothic">Package Cost</font></b></td>
                    <td width="85" align="center"><b><font size="2" face="Century Gothic">Fee</font></b></td>
                    <td width="100" align="center"><b><font size="2" face="Century Gothic">Max. Earning</font></b></td>
                  </tr>

			<?php 
				foreach ($detail_row as $row): 
				
			?>
                  <tr>
                    <td width="77" align="center" valign="middle"><font size="2" face="Century Gothic"><b><?php echo $row['package_name']; ?></b></font></td>
                    <td width="90" align="center"><font size="2" face="Century Gothic"><?php echo $row['work']; ?></font></td>
                    <td width="98" align="center"><font size="2" face="Century Gothic"><?php echo $row['compilation']; ?></font></td>
                    <td width="76" align="center"><font size="2" face="Century Gothic"><font color="#FF0000"> $</font><?php echo $row['cost']; ?></font></td>
                    <td width="92" align="center"><font size="2" face="Century Gothic"><font color="#FF0000">$</font><?php echo $row['fee']; ?></font><font face="Century Gothic">&nbsp;</font></td>
                    <td width="118" align="center"><font face="Century Gothic"><font color="#FF0000" size="2"> $</font><font size="2"><?php echo $row['max_earning']; ?></font></font></td>
                  </tr>
			<?php 
				endforeach;
			?>
			
                </table>
 			<?php 
				}
			?>
			           
            