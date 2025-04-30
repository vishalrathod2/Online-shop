<?php 
//session_start();

?>
<div class="top-bar animate-dropdown" style="background-color: #f8f9fa; padding: 10px 0;">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled" style="display: flex; align-items: center; margin: 0; padding: 0;">
					<li style="margin-right: 20px;"><a href="index.php" style="font-size: 18px; font-weight: bold; color: #333;"><h5>INVISIBLE FOOTWEAR</h5></a></li>

					<?php if(strlen($_SESSION['login'])) { ?>
						<li style="margin-right: 20px;"><a href="#" style="color: #333;"><i class="icon fa fa-user"></i><?php echo htmlentities($_SESSION['username']);?></a></li>
					<?php } ?>

					<li style="margin-right: 20px;"><a href="my-wishlist.php" style="color: #333;"><i class="icon fa fa-heart"></i>Wishlist</a></li>
					<li style="margin-right: 20px;"><a href="contact.php" style="color: #333;"><i class="icon fa fa-phone"></i>Contact Us</a></li>
					<li style="margin-right: 20px;"><a href="aboutus.php" style="color: #333;"><i class="icon fa fa-info-circle"></i> About Us</a></li>

					<?php if(strlen($_SESSION['login']) == 0) { ?>
						<li style="margin-right: 20px;"><a href="login.php" style="color: #333;"><i class="icon fa fa-sign-in"></i>Login</a></li>
					<?php } else { ?>
						<li style="margin-right: 20px;"><a href="logout.php" style="color: #333;"><i class="icon fa fa-sign-out"></i>Logout</a></li>
					<?php } ?>

					<li>
						<div class="search-area">
							<form name="search" method="post" action="search-result.php" style="margin: 0;">
								<div class="control-group" style="display: flex;">

									<input class="search-field" 
									       placeholder="Search here..." 
									       name="product" 
									       required="required" 
									       style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; flex: 1; margin-right: 5px;" />

									<button class="search-button" 
									        type="submit" 
									        name="search" 
									        style="padding: 8px 15px; border: none; border-radius: 5px; background-color: #4169E1; color: white; cursor: pointer;">
										<i class="fa fa-search" aria-hidden="true"></i>
									</button>    
								</div>
							</form>
						</div>
					</li>
				</ul>
			</div><!-- /.cnt-account -->

			<div class="cnt-block">
				<ul class="list-unstyled list-inline">
					<li class="dropdown dropdown-small">
						<div class="animate-dropdown top-cart-row">
							<?php
							if(!empty($_SESSION['cart'])) {
							?>
							<div class="dropdown dropdown-cart">
								<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown" style="color: #333;">
									<div class="items-cart-inner">
										<div class="total-price-basket">
											<span class="lbl">cart -</span>
											<span class="total-price">
												<span class="sign">Rs.</span>
												<span class="value"><?php echo $_SESSION['tp']; ?></span>
											</span>
										</div>
										<div class="basket">
											<i class="glyphicon glyphicon-shopping-cart"></i>
										</div>
										<div class="basket-item-count"><span class="count"><?php echo $_SESSION['qnty'];?></span></div>
									</div>
								</a>
								<ul class="dropdown-menu">
									<?php
									$sql = "SELECT * FROM products WHERE id IN(";
									foreach($_SESSION['cart'] as $id => $value) {
										$sql .= $id . ",";
									}
									$sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
									$query = mysqli_query($con, $sql);
									$totalprice = 0;
									$totalqunty = 0;
									if(!empty($query)) {
										while($row = mysqli_fetch_array($query)) {
											$quantity = $_SESSION['cart'][$row['id']]['quantity'];
											$subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'] + $row['shippingCharge'];
											$totalprice += $subtotal;
											$_SESSION['qnty'] = $totalqunty += $quantity;
									?>
									<li>
										<div class="cart-item product-summary">
											<div class="row">
												<div class="col-xs-4">
													<div class="image">
														<a href="product-details.php?pid=<?php echo $row['id'];?>"><img src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" width="35" height="50" alt=""></a>
													</div>
												</div>
												<div class="col-xs-7">
													<h3 class="name"><a href="product-details.php?pid=<?php echo $row['id'];?>"><?php echo $row['productName']; ?></a></h3>
													<div class="price">Rs.<?php echo ($row['productPrice'] + $row['shippingCharge']); ?> * <?php echo $_SESSION['cart'][$row['id']]['quantity']; ?></div>
												</div>
											</div>
										</div><!-- /.cart-item -->
									<?php } } ?>
									<div class="clearfix"></div>
									<hr>
									<div class="clearfix cart-total">
										<div class="pull-right">
											<span class="text">Total :</span><span class='price'>Rs.<?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>
										</div>
										<div class="clearfix"></div>
										<a href="my-cart.php" class="btn btn-upper btn-primary btn-block m-t-20">My Cart</a>	
									</div><!-- /.cart-total-->
								</li>
								</ul><!-- /.dropdown-menu-->
							</div><!-- /.dropdown-cart -->
							<?php } else { ?>
							<div class="dropdown dropdown-cart">
								<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown" style="color: #333;">
									<div class="items-cart-inner">
										<div class="total-price-basket">
											<span class="lbl">cart -</span>
											<span class="total-price">
												<span class="sign">Rs.</span>
												<span class="value">00.00</span>
											</span>
										</div>
										<div class="basket">
											<i class="glyphicon glyphicon-shopping-cart"></i>
										</div>
										<div class="basket-item-count"><span class="count">0</span></div>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<div class="cart-item product-summary">
											<div class="row">
												<div class="col-xs-12">
													Not Added Product.
												</div>
											</div>
										</div><!-- /.cart-item -->
										<hr>
										<div class="clearfix cart-total">
											<div class="clearfix"></div>
											<a href="index.php" class="btn btn-upper btn-primary btn-block m-t-20">Continue Shopping</a>	
										</div><!-- /.cart-total-->
									</li>
								</ul><!-- /.dropdown-menu-->
							</div>
							<?php } ?>
						</div>
					</li>
				</ul>
			</div>
			
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->
