<style>
input[type="file"] {
    display: none;
}

</style>
<form method="POST" class="create-post" enctype="multipart/form-data">
    <div class="profile-photo">
        <a href="profile.php"><img class="rounded-circle " src="<?php 
        $ROW_USER = $user->get_user($user_details['userid']);
        echo $ROW_USER['profile_image']; ?>" alt="... "></a>
    </div>
    <input name="post" type="text" placeholder="What's on your mind, <?php echo $user_details['firstname']; ?> ?" id="create-post">
    <label for="file-upload" class="custom-file-upload">
    <i class="uil uil-image-upload" style="font-size: 30px";> </i>
    </label>
    <input  id="file-upload" type="file"/>

    <div class="create">
        <label for="submit_post">
            <input class="btn btn-primary" type="submit" value="Post" type="text">
        </label>
    </div>
</form>