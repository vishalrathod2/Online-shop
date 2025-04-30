<div class="header-nav animate-dropdown" style="padding: 15px 0;">
    <div class="container" style="max-width: 1200px; margin: auto;">
        <div class="yamm navbar navbar-default" role="navigation" style="border: none;">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button" style="border: none; background: transparent;">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar" style="background-color: #ffffff;"></span>
                    <span class="icon-bar" style="background-color: #ffffff;"></span>
                    <span class="icon-bar" style="background-color: #ffffff;"></span>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse" style="background-color: #000000; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <div class="nav-outer">
                        <ul class="nav navbar-nav" style="list-style: none; padding: 0; margin: 0;">
                            <li class="dropdown yamm-fw" style="margin-right: 20px;">
                                <a href="index.php" data-hover="dropdown" class="dropdown-toggle" style="color: #ffffff; font-weight: bold; padding: 10px 15px; text-decoration: none;">Home</a>
                            </li>
                            <?php $sql=mysqli_query($con,"select id,categoryName from category limit 6");
                            while($row=mysqli_fetch_array($sql)) { ?>
                                <li class="dropdown yamm" style="margin-right: 20px;">
                                    <a href="category.php?cid=<?php echo $row['id'];?>" style="color: #ffffff; text-decoration: none; padding: 10px 15px; display: block; transition: background-color 0.3s;"> <?php echo $row['categoryName'];?></a>
                                </li>
                            <?php } ?>
                        </ul><!-- /.navbar-nav -->
                        <div class="clearfix"></div>				
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
