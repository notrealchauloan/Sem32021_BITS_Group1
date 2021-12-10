<form method="POST" class="create-post">
    <div class="profile-photo">
        <a href="profile.php"><img class="rounded-circle " src="<?php echo $image; ?>" alt="... "></a>
    </div>
    <input name="post" type="text" placeholder="What's on your mind, <?php echo $user_details['firstname']; ?> ?" id="create-post">
    
    <div class="create">
        <label for="submit_post">
            <input class="btn btn-primary" type="submit" value="Post" type="text">
        </label>
    </div>
</form>