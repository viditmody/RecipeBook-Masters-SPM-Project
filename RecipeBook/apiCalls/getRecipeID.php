		<?php
			$id=$_GET['id'];
			
			$url="http://localhost:8080/recipe/rest/api/recipes/".$id."";
			//  Initiate curl
			$ch = curl_init();
			// Disable SSL verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Will return the response, if false it print the response
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Set the url
			curl_setopt($ch, CURLOPT_URL,$url);
			// Execute
			$result=curl_exec($ch);
			// Closing
			curl_close($ch);	
			// Will dump a beauty json
			$data=json_decode($result, true);
			/*echo "<pre>";
			print_r($data);*/
		?>




<div class="row">
				<header class="s-title wow fadeInLeft">
					<h1><?php echo $data['recipe']['title']; ?></h1>
				</header>
				<!--content-->
				<section class="content three-fourth">
					<div class="row">
					<!--recipe-->
						<div class="recipe">
							<!--two-third-->
							<article class="two-third wow fadeInLeft">
								<div class="image"><a href="#"><img src="<?php echo $data['recipe']['imageUrl']; ?>" width="800" height="600" alt="" /></a></div>
								<div class="intro"><p><?php echo $data['recipe']['description']; ?></p></div>
								<div class="instructions">
									<!--<ol>
										<li>Heat oven to 160C/140C fan/gas 3 and line a 12-hole muffin tin with cases. Gently melt the butter, chocolate, sugar and 100ml hot water together in a large saucepan, stirring occasionally, then set aside to cool a little while you weigh the other ingredients.</li>
										<li>Stir the eggs and vanilla into the chocolate mixture. Put the flour into a large mixing bowl, then stir in the chocolate mixture until smooth. Spoon into cases until just over three-quarters full (you may have a little mixture leftover), then set aside for 5 mins before putting on a low shelf in the oven and baking for 20-22 mins. Leave to cool.</li>
										<li>For the icing, melt the chocolate in a heatproof bowl over a pan of barely simmering water. Once melted, turn off the heat, stir in the double cream and sift in the icing sugar. When spreadable, top each cake with some and decorate with your favourite sprinkles and sweets.</li>
									</ol>-->
                                    <ol>
										<?php
                                            $direcStr = "".$data['recipe']['direction']."";
											$direcStr = nl2br($direcStr) ;
                                            $direc=explode("<br>",$direcStr);
                                            for($i=0;$i<count($direc);$i++){
                                        ?>
                                                <li>
                                                	<?php echo $direc[$i]; ?>
                                                </li>
                                        <?php
                                            }
                                        ?>
                                    </ol>
								</div>
							</article>
							<!--//two-third-->
							
							<!--one-third-->
							<article class="one-third-recipe wow fadeInDown">
								<dl class="basic">
									<dt>Cooking time</dt>
									<dd><?php echo $data['recipe']['cookingTime']; ?></dd>
									<dt>Difficulty</dt>
									<dd><?php echo $data['recipe']['difficulty']; ?></dd>
									<dt>Serves</dt>
									<dd><?php echo $data['recipe']['servingAmount']; ?> people</dd>
								</dl>
								
								<dl class="user">
									<dt>Category</dt>
									<dd><?php echo $data['recipe']['category']; ?></dd>
									<dt>Posted by</dt>
									<dd><?php echo $data['recipe']['createdBy']; ?></dd>
								</dl>
								
								<dl class="ingredients">
                                
                                	<?php
										$str = "".$data['recipe']['ingredient']."";
										$test1=explode(",",$str);
										for($i=0;$i<count($test1);$i++){
									?>
                                    		<dt></dt>
											<dd><?php echo $test1[$i]; ?></dd>
                                    <?php
										}
									?>									
								</dl>
							</article>
							<!--//one-third-->
						</div>
						<!--//recipe-->
					</div>
				</section>
				<!--//content-->
			</div>