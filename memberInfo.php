<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta content='width=1168px' name='viewport' />
    <link rel="stylesheet" href="./css/header/header.css">
    <link rel="stylesheet" href="./css/mainLeft/mainLeft.css">
    <link rel="stylesheet" href="./css/addMember/addMember.css">



    <title>welcome to seed

    </title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .header text {
        font-size: 22px;
        font-weight: bold;
        color: #61D3B1;
        letter-spacing: 0.88px;
    }
    </style>

</head>

<body>
    <!-- menu_left -->

    <!-- menu_left  end -->
    <div>
        <div class='header'>
            <div class="logo"></div>
            <text>SEED</text>
            <div class="headerRight">
                <div class="search"></div>
                <div class="profile"></div>
            </div>

        </div>
        <div class="main">
            <div class="mainLeft">
                <ul class="nav">
                    <a href="index.php
                    ">
                        <li><img src="./image/home.png"><span>首頁</span></li>
                    </a>
                    <!-- <li><img src="./image/menu.png"><span>參與空間</span></li>
                    <li><img src="./image/navapps.png"><span>應用程序</span></li>
                    <li><img src="./image/person.png"><span>個人空間</span></li> -->
                    <a href="planSetting.php?page=1">
                        <li class="account"><img src="./image/planSetting.png"><span>保費計劃</span></li>
                    </a>
                    <li class="logout"><img src="./image/Logout.png"><span>登出</span></li>

                </ul>
            </div>
            <div class="mainRight">
                <form action="cal.php/saveEditMember" method="post" id="memberForm" autocomplete="off">
                    <input type="hidden" name="memberNum" id="memberNum">
                    <div class="tablist">






                        <div class="formContainer">
                            <div class="formHeader">

                                <div class="formTitle">基本資料</div>
                                <div class="formRight">
                                    <button class="cancelBtn"></button>
                                    <button class="saveBtn"><input type="submit" value='' /></button>

                                    <!-- <button class="chatBtn"><img src="./image/chatbot.png"></button> -->

                                </div>
                            </div>



                            <div class="memberForm display" name="基本資料">


                                <div class="memberName question">

                                    <span class="questionTitle">
                                        會員名稱：
                                    </span>
                                    <div class="questionInput">
                                        <input type="text" name="username" required="required" class="username">
                                    </div>


                                </div>
                                <div class="loginEmail question">

                                    <span class="questionTitle">
                                        登入郵箱：
                                    </span>
                                    <div class="questionInput">
                                        <input type="text" name="email" required="required" class="email">
                                    </div>


                                </div>
                                <div class="question">

                                    <span class="questionTitle">
                                        公司：
                                    </span>
                                    <div class="questionInput">
                                        <input type="text" name="company" required="required" class="company">
                                    </div>


                                </div>
                                <div class="question">

                                    <span class="questionTitle">
                                        組別：
                                    </span>
                                    <div class="questionInput">
                                        <input type="text" name="team" required="required" class="team">
                                    </div>


                                </div>
                                <div class="question">

                                    <span class="questionTitle">
                                        加入日期：
                                    </span>
                                    <div class="questionInput">
                                        <input type="date" name="addDate" required="required" class="addDate">

                                    </div>


                                </div>
                                <div class="question">

                                    <span class="questionTitle">
                                        到期日：
                                    </span>
                                    <div class="questionInput">
                                        <input type="date" name="endDate" required="required" class="endDate">
                                    </div>


                                </div>
                                <div class="question">

                                    <span class="questionTitle">
                                        身份：
                                    </span>
                                    <div class="questionInput ratio">
                                        <input type="radio" id="leader" name="auth" value="leader" class="auth leader">
                                        <label for="leader">Leader</label><br>
                                        <input type="radio" id="member" name="auth" value="member" class="auth member">
                                        <label for="member">Member</label><br>
                                    </div>


                                </div>
                                <div class="question ">

                                    <span class="questionTitle" style="margin-top: -40px; ">
                                        備註：
                                    </span>
                                    <div class="questionInput">
                                        <input type="text" name="remark" class="remark" style="height:77px">
                                    </div>


                                </div>



                </form>




            </div>
        </div>
    </div>


</body>
<script src=" config.js"></script>
<script>
let memberNum = document.getElementById("memberNum");
let form = document.getElementById('memberForm');
let formData = new FormData(form);
let username = document.querySelector('.username');
let email = document.querySelector(".email");
let company = document.querySelector(".company");
let team = document.querySelector(".team");
let addDate = document.querySelector(".addDate")
let endDate = document.querySelector(".endDate")
let auth = document.getElementsByClassName('auth')
let remark = document.querySelector(".remark")

let urlParams = new URLSearchParams(window.location.search);
let currentMember = urlParams.get('memberNum');
memberNum.value = currentMember;
console.log(memberNum.value);
var url = new URL(config.apiUrl + '/getMemberInfo');
url.searchParams.append('memberNum', currentMember);
fetch(url, {
        headers: {
            'Content-Type': 'application/json'
        }
    })

    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.success) {
            var memberData = data.data[
                0]; // Access the first object in the data array
            username.value = memberData.userName;
            email.value = memberData.email;
            endDate.value = memberData.end_time.split(" ")[0];
            addDate.value = memberData.creat_time.split(" ")[0];
            company.value = memberData.company;
            team.value = memberData.team;
            remark.value = memberData.remark;
            for (let i = 0; i < auth.length; i++) {
                if (auth[i].classList.contains(memberData.auth)) {
                    auth[i].checked = 'checked';
                }
            }


            //console.log(clientData);


        } else {
            console.log('No results found');
        }
    })
    .catch(error => {
        console.error('An error occurred:', error);
    });


var objXMLHttpRequest = new XMLHttpRequest();
objXMLHttpRequest.onreadystatechange = function() {
    if (objXMLHttpRequest.readyState === 4) {
        if (objXMLHttpRequest.status === 200) {
            // var response = JSON.parse(objXMLHttpRequest.responseText);
            // console.log(response);
            // alert(reponse.message)
            // header("Location: http://localhost/seed/account.php?page=1");
        } else {
            alert('Error Code: ' + objXMLHttpRequest.status);
            alert('Error Message: ' + objXMLHttpRequest.statusText);
        }
    }
};

objXMLHttpRequest.open('POST', 'cal.php/saveEditMember');
objXMLHttpRequest.send(formData);
</script>

</html>