<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" type="image/x-icon" href="/image/favicon.ico">
    <meta content='width=1168px' name='viewport' />

    <title>welcome to seed

    </title>
</head>



<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {

    font-family: Helvetica Neue;
    font-style: normal;
    font-weight: lighter;
    padding: 0;
}

h1 {
    color: #61D3B1
}

.boxTitle {
    font-size: 40px;

}

.loginBox {
    width: 668px;
    height: 500px;
    background-color: #ffffff;
    text-align: center;
    border-radius: 20px;
    box-shadow: inset 0px 1px 8px #00000029, 2px 3px 4px #00000029;
    margin: 0 auto;
    position: relative;
    top: 50%;
    transform: translateY(30%);
    padding-inline: 66px;
    padding-top: 40px;
}

.account {

    display: flex;
    margin-top: 68px;
    border-bottom: 2px solid#707070;
    width: 100%;
    height: 45px;
    align-items: center;

}

.password {

    display: flex;
    margin-top: 68px;
    border-bottom: 2px solid#707070;
    width: 100%;
    height: 45px;
    align-items: center;
    position: relative;

}

.inputName {
    font-size: 24px;
    padding-left: 10px;

}

.inputStyle {
    outline: none;
    width: 144%;
    border: none;
    height: 100%;
    font-size: 24px;
    text-align: center;




}

.remember {
    margin-top: 16px;
    justify-content: flex-start;
    align-items: center;
    display: flex;
    padding-left: 5px;

}

.remember p {
    font-size: 18px;
}

.checkbox {
    transform: scale(2);
    margin-right: 14px;
}

.loginBtn {
    width: 520px;
    height: 54px;
    padding: 10px 20px;
    border-radius: 10px;
    opacity: 1;
    font-size: 25px;
    text-align: center;
    background: transparent linear-gradient(180deg, #23988AE6 0%, #1F8377E6 100%) 0% 0% no-repeat padding-box;
    color: #ffffff;
    text-align: center;
    margin: 5px auto 0;
    margin-top: 60px;
}

a {
    color: #ffffff;
    text-decoration: none;
}

.getPw {
    position: absolute;
    right: 0px;
    width: 25%;
    height: 100%;
    font-size: 25px;
    color: #61D3B1;
    background: none;
    border: none;
    cursor: pointer;

}
</style>

<body style="height: 100%; width: 100%;">

    <div class="loginBox">
        <form id="loginform" method="POST" autocomplete="off">
            <div>
                <!-- <img src="__PUBLIC__/image/favicon.ico"> -->
                <h1>SEED</h1>
            </div>


            <div class="account">
                <p class="inputName">帳號:</p>
                <p><input type="text" class="inputStyle email" name="userName" /></p>
            </div>

            <div class="password">
                <p class="inputName">密碼:</p>
                <p><input type="password" class="inputStyle" name="password" />

                </p>
                <div class="getPw">獲取密碼</div>
            </div>


            <!-- <div>
				<p  class="inputName" style="" >Verification code</p>
				<p><input type="text" class="inputStyle"  name="vcode"  style="" /></p>
			</div> -->

            <div class="text-center">
                <!-- <a href="./index.php"> -->
                <div id="login" type="submit" class="loginBtn">
                    登入
                </div>
                <!-- </a> -->
            </div>


        </form>

    </div>

</body>
<script>
var email = document.querySelector('.email');
var getPw = document.querySelector('.getPw');
getPw.addEventListener('click', function() {
    var loginEmail = email.value;

    if (loginEmail) {
        var formData = new FormData();
        formData.append('userName', loginEmail);

        var objXMLHttpRequest = new XMLHttpRequest();
        objXMLHttpRequest.onreadystatechange = function() {
            if (objXMLHttpRequest.readyState === 4) {
                if (objXMLHttpRequest.status === 200) {
                    var response = JSON.parse(objXMLHttpRequest.responseText);
                    alert('已傳送密碼至郵箱');
                    // Handle the response here
                } else {
                    alert('Error Code: ' + objXMLHttpRequest.status);
                    alert('Error Message: ' + objXMLHttpRequest.statusText);
                }
            }
        };

        objXMLHttpRequest.open('POST', 'cal.php/getPw');
        objXMLHttpRequest.send(formData);
    }
});
var loginBtn = document.querySelector('.loginBtn');

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}
loginBtn.addEventListener('click', function() {
    var form = document.getElementById('loginform');

    var formData = new FormData(form);

    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4) {
            if (objXMLHttpRequest.status === 200) {
                var response = JSON.parse(objXMLHttpRequest.responseText);
                console.log(response);
                if (response.success) {

                    objXMLHttpRequest.open('POST', 'cal.php/changePw');
                    objXMLHttpRequest.send(formData);
                    //setcookiebefore it jump 
                    setCookie("username", response.username, 1);
                    setCookie("company", response.company, 1);
                    setCookie("team", response.team, 1);
                    setCookie("auth", response.auth, 1);



                    window.location.href = 'http://localhost/seed/index.php';

                }
            }


        } else {
            // alert('Error Code: ' + objXMLHttpRequest.status);
            // alert('Error Message: ' + objXMLHttpRequest.statusText);
            alert(response.message);
        }
    }


    objXMLHttpRequest.open('POST', 'cal.php/postlogin'); // Specify the login endpoint
    objXMLHttpRequest.send(formData);
});
</script>

</html>