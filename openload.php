<?php
            if(isset($_POST['file']))
			{
			$file=$_POST['file'];
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://api.openload.co/1/file/dlticket?file=$file&login=3ea655f9eae88992&key=2tbftu-o");
			// Set so curl_exec returns the result instead of outputting it.
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Get the response and close the channel.
			$response = curl_exec($ch);
			$json=json_decode($response);
				
			$ticket=$json->result->ticket;
			$captcha_url=$json->result->captcha_url;
			
			curl_close($ch);
			}
			echo "<img src=$captcha_url>";   
			  
			?>

			<form action="#" method="POST">
				<input type="text" name="captcha">
				<input type="submit" name="submit" value="Submit">
				<br>
				

			<?php
			echo "<input type=hidden value=$ticket name=ticket>";
			echo "<input type=hidden value=$file name=file>";
         		?>
			</form>
<?php
				if(isset($_POST['captcha']))
				{
				$captcha=$_POST['captcha'];
                $file=$_POST['file'];
				$ticket=$_POST['ticket'];

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "https://api.openload.co/1/file/dl?file=$file&ticket=$ticket&captcha_response=$captcha");
				// Set so curl_exec returns the result instead of outputting it.
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				// Get the response and close the channel.
				$response = curl_exec($ch);
				$json=json_decode($response);
								$url=$json->result->url;
								echo "<a href='".$url."'>$url</a>";
								
				echo "<br>";
				

				curl_close($ch);
				}
                                
                              
				?>
