<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content='width=1168px' name='viewport' />

    <link rel="stylesheet" href="http://localhost/seed/css/header/header.css">

    <link rel="stylesheet" href="http://localhost/seed/css/mainLeft/mainLeft.css">

    <!-- <link rel="stylesheet" href="http://localhost/seed/css/customerList/customerList.css"> -->
    <link rel="stylesheet" href="http://localhost/seed/css/planSetting/planSetting.css">

    <title>welcome to seed

    </title>
</head>

<body>
    <div>
        <div class='header'>
            <div class="logo"></div>
            <text style="font-size: 20px; color: black; font-weight:200;">保費計劃</text>
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
                    <!-- <li><img src="http://localhost/seed/image/menu.png"><span>參與空間</span></li>
                    <li><img src="http://localhost/seed/image/navapps.png"><span>應用程序</span></li>
                    <li><img src="http://localhost/seed/image/person.png"><span>個人空間</span></li> -->
                    <a href="planSetting.php?page=1">
                        <li class="account"><img src="./image/planSetting.png"><span>保費計劃</span></li>
                    </a>
                    <li class="logout"><img src="./image/Logout.png"><span>登出</span></li>

                </ul>
            </div>
            <div class="mainRight">

                <div class="uploadPlanDiv">
                    <form id="uploadForm" enctype="multipart/form-data">
                        <div class="uploadInputDiv">
                            <div class="inputRow1">
                                <div>
                                    <span>Company name</span>
                                    <input type="text" name="company"></input>
                                </div>
                                <div>
                                    <span>Plan name</span>
                                    <input type="text" name="selectedPlan"></input>
                                </div>
                            </div>
                            <div class="inputRow2">
                                <div>
                                    <span>Upload CSV</span>
                                    <input type="file" name="csvFile" id="csvFile" accept=".csv">
                                    <button type="submit" class="submit"><img
                                            src="http://localhost/seed/image/upload.png">
                                        <span>Upload</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class=" tablecontainer">
                    <table class="planTable">
                        <thead>
                            <tr>

                                <th style="width:250px">Company Name</th>
                                <th style="width:250px">Plan Name</th>
                                <th style="width:250px">Upload Date</th>
                                <th style="width:96px"></th>

                            </tr>
                        </thead>
                        <tbody class="planInfoForm">
                            <tr class="planInfo">


                                <td>
                                    <div class="companyName"></div>
                                </td>
                                <td>
                                    <div class="planName"></div>
                                </td>
                                <td>
                                    <div class="uploadDate">

                                    </div>
                                </td>


                                <td class="edit">


                                    <button type="button" class="del_btn" onclick=""><img
                                            src="http://localhost/seed/image/delete.png"></button>

                                </td>
                            </tr>


                        </tbody>
                    </table>

                </div>


            </div>
            <div class="pageListContainer">
                <ul class="pageList">
                    <a href="http://localhost/seed/planSetting.php?page=1" class="page">
                        <li class="number">1</li>
                    </a>
                </ul>
            </div>



        </div>
</body>
<script>
function getCookieValue(cookieName) {
    const name = cookieName + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(';');

    for (let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i];
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(name) === 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }

    return null;
}

var username = getCookieValue("username");
console.log(username);
var company = getCookieValue("company");
console.log(company);
var team = getCookieValue("team");
console.log(team);
var auth = getCookieValue("auth");
console.log(auth);
if (username == null) {
    window.location.href = "http://localhost/seed/login.php";
}
var planInfoForm = document.querySelector('.planInfoForm');
var planInfo = document.querySelector('.planInfo');
var pageList = document.querySelector('.pageList');
var pageNav = pageList.querySelector('.page').cloneNode(true);
var number = pageNav.querySelector('.number');


var cloneRow = planInfo.cloneNode(true);
let pagenumber = 1;

let companyName = planInfo.querySelector('.companyName');
let planName = planInfo.querySelector('.planName');
let uploadDate = planInfo.querySelector('.uploadDate');
let del_btn = planInfo.querySelector('.del_btn');

var nav = document.querySelector('.nav');
nav.addEventListener('click', function() {
    nav.classList.toggle("show");
});


function getAllPlan() {
    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4) {
            if (objXMLHttpRequest.status === 200) {
                var response = JSON.parse(objXMLHttpRequest.responseText);
                console.log(response);
                console.log(response.data);
                if (response.data.length > 0) {
                    companyName.innerHTML = response.data[0].company
                    planName.innerHTML = response.data[0].selectedPlan
                    uploadDate.innerHTML = response.data[0].upload_date
                    del_btn.addEventListener('click', function() {

                        var confirmDelete = confirm("Are you sure you want to delete?");
                        if (confirmDelete) {
                            delPlan(response.data[0].selectedPlan);
                        } else {
                            return;
                        }


                    });

                    console.log(cloneRow);
                    for (var i = 1; i < response.data.length; i++) {
                        var newRow = cloneRow.cloneNode(true);
                        newRow.querySelector('.companyName').innerHTML = response.data[i].company;
                        newRow.querySelector('.planName').innerHTML = response.data[i].selectedPlan;
                        newRow.querySelector('.uploadDate').innerHTML = response.data[i].upload_date;
                        (function(index) {
                            newRow.querySelector('.del_btn').addEventListener('click', function() {
                                var selectedPlan = response.data[index].selectedPlan;
                                var confirmDelete = confirm("Are you sure you want to delete?");
                                if (confirmDelete) {
                                    delPlan(selectedPlan);
                                } else {
                                    return;
                                }
                            });
                        })(i);

                        planInfo.parentNode.appendChild(newRow);


                    }

                    pagenumber = Math.ceil(response.number.length / 5);
                    console.log(pagenumber);


                    for (let i = 2; i <= pagenumber; i++) {
                        var newNav = pageNav.cloneNode(true);
                        var newNumber = newNav.querySelector(".number");
                        newNumber.textContent = i;
                        newNav.href = "http://localhost/seed/planSetting.php?page=" + i;


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

            } else {
                alert('Error Code: ' + objXMLHttpRequest.status);
                alert('Error Message: ' + objXMLHttpRequest.statusText);
            }
        }
    }
    var urlParams = new URLSearchParams(window.location.search);
    var currentPage = urlParams.get('page');
    objXMLHttpRequest.open('POST', 'cal.php/getAllPlanList');
    objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    objXMLHttpRequest.send('company=' + encodeURIComponent('ALL') + '&page=' + currentPage);





}

getAllPlan()
var objXMLHttpRequest = new XMLHttpRequest();
objXMLHttpRequest.onreadystatechange = function() {
    if (objXMLHttpRequest.readyState === 4 && objXMLHttpRequest.status === 200) {
        var response = (objXMLHttpRequest.responseText);
        if (response) {
            console.log(response);
            pageNumber = response / 5;
        }
    }
};

objXMLHttpRequest.open('POST', 'cal.php/getAllPlanListPage');
objXMLHttpRequest.setRequestHeader(
    'Content-type', 'application/x-www-form-urlencoded');
objXMLHttpRequest.send('company=' + encodeURIComponent('ALL'));

document.getElementById('uploadForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData();
    const fileInput = document.getElementById('csvFile');
    formData.append('file', fileInput.files[0]);

    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4) {
            if (objXMLHttpRequest.status === 200) {
                alert(objXMLHttpRequest.responseText); // 處理成功響應
            } else {
                alert('Error Code: ' + objXMLHttpRequest.status);
                alert('Error Message: ' + objXMLHttpRequest.statusText);
            }
        }
    };

    objXMLHttpRequest.open('POST', 'cal.php/savePlan', true);
    objXMLHttpRequest.send(formData);
});

function delPlan(selectedPlan) {
    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4 && objXMLHttpRequest.status === 200) {
            var response = JSON.parse(objXMLHttpRequest.responseText);
            if (response.success) {
                console.log('Record deleted');
                window.location.href = "http://localhost/seed/planSetting.php?page=1";
                // You can remove the deleted record from the UI here
            } else {
                console.log('Failed to delete record');
                // Handle failure, display an error message, etc.
            }
        }
    };

    objXMLHttpRequest.open('POST', 'cal.php/delPlan');
    objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    objXMLHttpRequest.send('selectedPlan=' + selectedPlan);
}



//console.log(pageNumber);

// function editClient(clientNum) {
//     window.location.href = `http://localhost/seed/clientForm.php?clientNum=${clientNum}`;
// }

// var nav = document.querySelector('.nav');
// nav.addEventListener('click', function() {
//     nav.classList.toggle("show");
// });



// for (let i = 1; i < array.length; i++) {
//     const element = array[i];

// }
</script>

</html>