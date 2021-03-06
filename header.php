<nav>
        <!------------------- NAVBAR --------------------->
        <div class="container">
            <h2 class="log">
                <a href="index.php">socialBook</a>
            </h2>
            <div class="search-bar">
                <i class="uil uil-search"></i>
                <input type="search" placeholder="Search for creators, inspirations, and projects">
            </div>
            <div class="create">
                <label class="btn btn-primary" for="create-post">Create</label>
                <div class="profile-photo">
                    <?php
                        $image = "";

                        if(file_exists($user_details['profile_image']))
                        {
                            $image = $user_details['profile_image'];
                        }
                        else if($user_details['gender'] == 'F')
                        {
                            $image = 'images/user_female.jpg'; 
                        } 
                        else if($user_details['gender'] == 'M')
                        {
                            $image = 'images/user_male.jpg';
                        }
                        else if($user_details['gender'] == 'O')
                        {
                            $image = 'images/user_other.jpg';
                        }
                                        
                    ?>
                    <a href="profile.php"><img class="rounded-circle " src="<?php echo $image; ?>" alt="... "></a>
                </div>
                <label class="btn btn-primary" for="sign-out">
                <a style="color:#fff;" href="logout.php">Sign Out</a>    
                </label>
                
            </div>
        </div>
    </nav>
