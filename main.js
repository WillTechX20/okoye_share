var signUpForm=document.querySelector('.sign_up_form');

function signUpFormOnSubmit(eventVar){
    eventVar.preventDefault();

    var signUpFormData=new FormData(signUpForm);

    var usernameStr=signUpFormData.get('username');
    var passwordStr=signUpFormData.get('password');
    var avatarImgFileReader=new FileReader();
    var newXMLHttpRequest=new XMLHttpRequest();
    var lowercaseUsernameStr=usernameStr.toLowerCase().replace(' ', '');

    newXMLHttpRequest.onload=function(){
        var i=this.responseXML.title;
                    
        if(i=='404 Not Found - OkoyeShare.com'){
            console.clear();
            document.cookie="username="+usernameStr+'; path=/';
            document.cookie="password="+passwordStr+'; path=/';
            signUpForm.removeEventListener('submit', signUpFormOnSubmit);
            signUpForm.method='post';
            signUpForm.action='sign_up.php?username='+usernameStr+'&=password='+passwordStr+'&lowercase_username='+lowercaseUsernameStr+'&user_description='+userDescriptionStr+
            '&avatar_img_url='+avatarImgFileReader.readAsDataURL(avatarImgFile)+'&following_allowed='+followingAllowedBoolean+
            '&liking_or_disliking_allowed='+likingOrDislikingAllowedBoolean+'&post_tagging_allowed='+postTaggingAllowedBoolean+
            'friend_requesting_allowed='+friendRequestingAllowedBoolean+'&direct_post_sharing_allowed='+directPostSharingAllowedBoolean;
            signUpForm.submit();
        }else{
            alert('The inputted username "'+usernameStr+'" was either too similar to or exactly the same as the existing username "'+i.replace("'s Profile Page at OkoyeShare.com!", '')+'".');
        }
    };
    
    newXMLHttpRequest.open('POST', lowercaseUsernameStr+'.html');
    newXMLHttpRequest.responseType='document';
    newXMLHttpRequest.send();
}

signUpForm.addEventListener('submit', signUpFormOnSubmit);

