<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up PHP</title>
    </head>
    <body>
        <?php
        $userprofilepagefile=fopen($_POST["lowercase_username"].".html", "r+");
        $userprofiledatajson=file_get_contents($_POST["lowercase_username"]."_profile_data.json");
        $userprofiledata=json_decode($userprofiledatajson, true);
            
        $userprofiledata["publicData"]="{username: ".$_POST["username"].", password: ".$_POST["password"].", userDescription: ".$_POST["user_description"].", stats: {followers: 0, likes: 0, dislikes, 0, friends: 0, reputation: 0}";
        $userprofiledata["privateData"]="{avatarImgURL: ".$_POST["avatar_img_url"].", settings: {followingAllowed: ".$_POST["following_allowed"].", likingOrDislikingAllowed: ".$_POST["liking_or_diskling_allowed"].", postTaggingAllowed: ".$_POST["post_tagging_allowed"].", freindRequestingAllowed: ".$_POST["freind_requesting_allowed"].", directPostSharingAllowed: ".$_POST["direct_post_sharing_allowed"].", profilePageVeiwingAllowed: ".$_POST["profile_page_veiwing_allowed"]."}";
            
        $newuserprofiledatajson=json_encode($userprofiledata);

        file_put_contents($_POST["lowercase_username"]."_profile_data.json", $newuserprofiledatajson);
        fwrite($userprofilepagefile, "<!DOCTYPE html>
        <html>
            <head>
                <meta name=\"veiwport\" content=\"width=device-width, initial-scale=1\">
                <link rel=\"stylesheet\" href=\"style.css\">
                <title>".$_POST["username"]."'s Profile Page at OkoyeShare.com!</title>
            </head>
            <body>
                <div class=\"navbar\">
                    <a class=\"active\" href=\"index.html\">Home</a>
                    <a href=\"about.html\">About</a>
                    <a href=\"contact.html\">Contact</a>
                    <a href=\"posts.html\">Posts</a>
                    <a href=\"share.html\">Share</a>
                </div>
                <h1>".$_POST["username"]."</h1>
                <img width=\"200\" height=\"200\" src=\"images/okoyeshare_logo.png\" alt=\"OkoyeShare Logo\">
                <section class=\"details\">
                    <h2>Details</h2>
                    <hr class=\"horizontal_line\">
                    <div class=\"section_left_side section_side\">
                        <h3>".$_POST["username"]."</h3>
                        <p>".$_POST["user_description"]."</p>
                        <h3>Stats</h3>
                        <dl>
                            <dt>Followers</dt>
                            <dd>0</dd>
                            <dt>Likes</dt>
                            <dd>0</dd>
                            <dt>Dislikes</dt>
                            <dd>0</dd>
                            <dt>Reputation</dt>
                            <dd>0</dd>
                            <dt>Friends</dt>
                            <dd>0</dd>
                        </dl>
                    </div>
                </section>
                <section>
                    <h2>Friend Requests</h2>
                    <div class=\"friend_request_containers\">
                    </div>
                </section>
                <section>
                    <h2>Direct Posts</h2>
                    <div class=\"direct_post_containers\">
                    </div>
                <section>
                <footer>
                    <p>The website logo was made at <cite>https://www.freelogodesign.org</cite>.</p>
                    <div class=\"script\">
                        <script src=\"login.js\"></script>
                    </div>
                </footer>
            </body>
        </html>");
        ?>
    </body>
    <div class="script">
        <script>
            if(opener.location.href=='index.html'){
                setTimeout(location=<?php echo "'".$_POST["lowercase_username"]."'" ?>, 150);
            }else{
                location='404_not_found.html';
            }
        <script>
    </div>
</html>
