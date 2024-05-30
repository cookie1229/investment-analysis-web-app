<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content='width=1168px' name='viewport' />

    <link rel="stylesheet" href="http://localhost/seed/css/header/header.css">

    <link rel="stylesheet" href="http://localhost/seed/css/mainLeft/mainLeft.css">

    <link rel="stylesheet" href="http://localhost/seed/css/account/account.css">

    <title>welcome to seed

    </title>
</head>

<body>
    <div>
        <div class='header'>
            <div class="logo"></div>
            <text style="font-size: 20px; color: black; font-weight:200;">會員名單</text>
            <div class="headerRight">
                <div class="profile"></div>
            </div>

        </div>
        <div class="main">
            <div class="mainLeft">
                <ul class="nav">
                    <a href="index.php">
                        <li><img src="http://localhost/seed/image/home.png"><span>首頁</span></li>
                    </a>
                    <li><img src="http://localhost/seed/image/menu.png"><span>參與空間</span></li>
                    <li><img src="http://localhost/seed/image/navapps.png"><span>應用程序</span></li>
                    <li><img src="http://localhost/seed/image/person.png"><span>個人空間</span></li>
                </ul>
            </div>
            <div class="mainRight">
                <div class="acctManage">
                    <div class="manageLeft">
                        <div class="search">
                            <div class="searchIcon"></div>
                            <input type="text" placeholder="請輸入名稱搜尋" class="searchInput">
                        </div>
                    </div>
                    <a href="./addMember.html">
                        <div class="addButton">

                            <img src="http://localhost/seed/image/addicon.png">
                        </div>
                    </a>

                </div>





                <div class="tablecontainer">
                    <table class="acctTable">
                        <thead>
                            <tr>

                                <th style="width:100px">會員名稱</th>
                                <th style="width:103px">登入名稱</th>
                                <th style="width:133px">公司</th>
                                <th style="width:133px">組別</th>
                                <th style="width:96px">權限</th>
                                <th style="width:133px">加入日期</th>
                                <th style="width:133px">到期日</th>

                                <th style="width:90px"></th>
                            </tr>
                        </thead>
                        <tbody class="memberInfoForm">
                            <tr class="memberInfo">


                                <td>
                                    <div class="memberName">1</div>
                                </td>
                                <td>
                                    <div class="loginName">1</div>
                                </td>
                                <td>
                                    <div class="company">

                                    </div>
                                </td>
                                <td>
                                    <div class="team">
                                        1
                                    </div>
                                </td>
                                <td>
                                    <div class="auth">
                                        1
                                    </div>
                                <td>
                                    <div class="addDate">1</div>
                                </td>
                                <td>
                                    <div class="endDate"></div>
                                </td>

                                <td class="edit">

                                    <button type="button" class="edit_btn"><img
                                            src="http://localhost/seed/image/editAcct.png"
                                            style="width: 36px; height: 36px;"></button></button>
                                    <button type="button" class="del_btn"><img
                                            src="http://localhost/seed/image/delete.png"></button>

                                </td>
                            </tr>


                        </tbody>
                    </table>

                </div>


            </div>
            <div class="pageListContainer">
                <ul class="pageList">
                    <a href="http://localhost/seed/account.php?page=1" class="page">
                        <li class="number">1</li>
                    </a>
                </ul>
            </div>



        </div>
</body>
<script>
//console.log('123');
var memberInfo = document.querySelector('.memberInfo')
var memberInfoForm = document.querySelector('.memberInfoForm')
var memberName = document.querySelector('.memberName');
var loginName = document.querySelector('.loginName');
var company = document.querySelector('.company');
var team = document.querySelector('.team');
var auth = document.querySelector('.auth');
var addDate = document.querySelector('.addDate');
var endDate = document.querySelector('.endDate');
var pageList = document.querySelector('.pageList');
var pageNav = pageList.querySelector('.page').cloneNode(true);
var number = pageNav.querySelector('.number');
let pagenumber = 1;
var cloneRow = memberInfo.cloneNode(true);
var urlParams = new URLSearchParams(window.location.search);
var currentPage = urlParams.get('page');
console.log(currentPage);
var nav = document.querySelector('.nav')
nav.addEventListener('click', function() {
    nav.classList.toggle("show")
})


function getAllMembers() {
    // console.log('234');

    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4) {
            if (objXMLHttpRequest.status === 200) {

                var response = JSON.parse(objXMLHttpRequest.responseText);
                console.log(response);
                if (response.data[0].userName !==
                    null) {
                    memberName.innerHTML = response.data[0].userName

                } else {
                    memberName.innerHTML = response.data[0].email.split('@')[0]
                }

                company.innerHTML = response.data[0].company
                loginName.innerHTML = response.data[0].email
                team.innerHTML = response.data[0].team
                auth.innerHTML = response.data[0].auth
                addDate.innerHTML = response.data[0].creat_time.split(" ")[0]
                if (response.data[0].end_time !== null) {
                    endDate.innerHTML = response.data[0].end_time.split(" ")[0]
                }
                memberInfo.querySelector('.edit_btn').addEventListener('click', function() {
                    var memberNum = response.data[0].uid;
                    editMember(memberNum);
                });

                memberInfo.querySelector('.del_btn').addEventListener('click', function() {
                    var memberNum = response.data[0].uid;
                    var memberDelete = confirm("Are you sure you want to delete?");
                    if (memberDelete) {
                        delMember(memberNum);
                    } else {
                        return;
                    }


                });

                for (var i = 1; i < response.data.length; i++) {
                    var newRow = cloneRow.cloneNode(true);

                    newRow.querySelector('.memberName').innerHTML = response.data[i].email.split('@')[0];
                    newRow.querySelector('.company').innerHTML = response.data[i].company;
                    newRow.querySelector('.loginName').innerHTML = response.data[i].email;
                    newRow.querySelector('.team').innerHTML = response.data[i].team;
                    newRow.querySelector('.auth').innerHTML = response.data[i].auth;
                    newRow.querySelector('.addDate').innerHTML = response.data[i].creat_time.split(" ")[0]
                    if (response.data[i].end_time !== null) {
                        newRow.querySelector('.endDate').innerHTML = response.data[i].end_time.split(" ")[0]
                    }
                    (function(index) {
                        newRow.querySelector('.edit_btn').addEventListener('click', function() {
                            var memberNum = response.data[index].uid;
                            editMember(memberNum);
                        });
                    })(i);

                    (function(index) {
                        newRow.querySelector('.del_btn').addEventListener('click', function() {
                            var memberNum = response.data[index].uid;
                            var confirmDelete = confirm("Are you sure you want to delete?");
                            if (confirmDelete) {
                                delMember(memberNum);
                            } else {
                                return;
                            }
                        });
                    })(i);


                    memberInfoForm.appendChild(newRow);
                }



                pagenumber = Math.ceil(response.number.length / 9);


                for (let i = 2; i <= pagenumber; i++) {
                    var newNav = pageNav.cloneNode(true);
                    var newNumber = newNav.querySelector(".number");
                    newNumber.innerHTML = i;
                    newNav.href = "http://localhost/seed/account.php?page=" + i;


                    pageList.appendChild(newNav);
                }

                var bookmark = document.getElementsByClassName("page");
                //console.log(bookmark);
                var bookmarknumber = document.getElementsByClassName("number")
                // console.log(bookmarknumber);


                for (let i = 0; i < bookmark.length; i++) {
                    //let bookmarknumber = bookmark[i].querySelector("li")
                    if (bookmark[i].href === window.location.href) {
                        bookmarknumber[i].classList.add("active");
                    }

                }
            } else {
                alert('Error Code: ' + objXMLHttpRequest.status);
                alert('Error Message: ' + objXMLHttpRequest.statusText);
            }
        }
    };

    objXMLHttpRequest.open('POST', 'cal.php/getAllMembers');

    objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    objXMLHttpRequest.send('page=' + currentPage);

    function delMember(memberNum) {
        var objXMLHttpRequest = new XMLHttpRequest();
        objXMLHttpRequest.onreadystatechange = function() {
            if (objXMLHttpRequest.readyState === 4 && objXMLHttpRequest.status === 200) {
                var response = JSON.parse(objXMLHttpRequest.responseText);
                if (response.success) {
                    alert('Member deleted');
                    window.location.href = "http://localhost/seed/account.php?page=1";
                    // You can remove the deleted record from the UI here
                } else {
                    alert('Failed to delete member');
                    // Handle failure, display an error message, etc.
                }
            }
        };

        objXMLHttpRequest.open('POST', 'cal.php/delMember');
        objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        objXMLHttpRequest.send('memberNum=' + memberNum);
    }

    function editMember(memberNum) {
        window.location.href = `http://localhost/seed/memberInfo.php?memberNum=${memberNum}`;
    }



};



getAllMembers()

function getAllMemberPage() {
    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4 && objXMLHttpRequest.status === 200) {
            var response1 = JSON.parse(objXMLHttpRequest.responseText);
            console.log(response1);
            if (response1 > 0) {
                pagenumber = Math.ceil(response1.number.length / 9);
                console.log(pagenumber);
                for (let i = 2; i <= pagenumber; i++) {
                    var newNav = pageNav.cloneNode(true);
                    var newNumber = newNav.querySelector(".number");
                    newNumber.innerHTML = i;
                    newNav.href = "http://localhost/seed/customerList.php?page=" + i;


                    pageList.appendChild(newNav);
                }

                var bookmark = document.getElementsByClassName("page");
                //console.log(bookmark);
                var bookmarknumber = document.getElementsByClassName("number")
                // console.log(bookmarknumber);


                for (let i = 0; i < bookmark.length; i++) {
                    //let bookmarknumber = bookmark[i].querySelector("li")
                    if (bookmark[i].href === window.location.href) {
                        bookmarknumber[i].classList.add("active");
                    }

                }
            }
        }
    };
    objXMLHttpRequest.open('POST', 'cal.php/getAllMemberPage');
    objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    objXMLHttpRequest.send();



}
//getAllMemberPage()
</script>

</html>