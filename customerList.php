<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content='width=1168px' name='viewport' />

    <link rel="stylesheet" href="http://localhost/seed/css/header/header.css">

    <link rel="stylesheet" href="http://localhost/seed/css/mainLeft/mainLeft.css">

    <link rel="stylesheet" href="http://localhost/seed/css/customerList/customerList.css">

    <title>welcome to seed

    </title>
</head>

<body>
    <div>
        <div class='header'>
            <div class="logo"></div>
            <text style="font-size: 20px; color: black; font-weight:200;">保費融資計算系統</text>
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
                <div class="customerManage">
                    <div class="manageLeft">
                        <div class="search">
                            <div class="searchIcon"></div>
                            <input type="text" placeholder="請輸入客戶名稱" class="searchInput">
                        </div>
                        <div class="graphIcon"></div>
                    </div>
                    <a href="./form.php">
                        <div class="calButton">
                            <img src="http://localhost/seed/image/calicon.png">
                            <img src="http://localhost/seed/image/addicon.png">
                        </div>
                    </a>

                </div>

                <div class="filter"></div>
                <div class="graph"></div>
                <div class="add">
                    <span class="cal"></span>
                    <span class="addButton"></span>

                </div>

                <div class="tablecontainer">
                    <table class="customTable">
                        <thead>
                            <tr>
                                <th style="width:36px;"></th>
                                <th style="width:100px">客戶名稱</th>
                                <th style="width:103px">選擇計畫</th>
                                <th style="width:133px">現金投資金額</th>
                                <th style="width:133px">銀行開戶要求</th>
                                <th style="width:96px">客戶部分</th>
                                <th style="width:133px">銀行融資部分</th>
                                <th style="width:100px">保單總值</th>
                                <th style="width:90px">建立人</th>
                                <th style="width:90px"></th>
                            </tr>
                        </thead>
                        <tbody class="clientsInfoForm">
                            <tr class="clientsInfo">

                                <td>
                                    <div class="chatbot">
                                        <span><text>2</text></span>
                                    </div>

                                </td>
                                <td>
                                    <div class="clientName"></div>
                                </td>
                                <td>
                                    <div class="plan"></div>
                                </td>
                                <td>
                                    <div class="dollar"><span>$</span>
                                        <span class="cashInvest"><span>
                                    </div>
                                </td>
                                <td>
                                    <div class="dollar"><span>$</span>
                                        <span class="aum"><span>
                                    </div>
                                </td>
                                <td>
                                    <div class="dollar"><span>$</span>
                                        <span class="clientPortion"><span>
                                    </div>
                                <td>
                                    <div class="bankPortion"></div>
                                </td>
                                <td>
                                    <div class="totalvalue"></div>
                                </td>
                                <td>
                                    <div class="creater"></div>
                                </td>
                                <td class="edit">

                                    <button type="button" class="edit_btn"><img
                                            src="http://localhost/seed/image/edit.png"></button></button>
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
                    <a href="http://localhost/seed/customerList.php?page=1" class="page">
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
var clientsInfoForm = document.querySelector('.clientsInfoForm');
var clientsInfo = document.querySelector('.clientsInfo');
var pageList = document.querySelector('.pageList');
var pageNav = pageList.querySelector('.page').cloneNode(true);
var number = pageNav.querySelector('.number');
var search = document.querySelector('.searchInput');
console.log(search);
var searchIcon = document.querySelector(".searchIcon")

var cloneRow = clientsInfo.cloneNode(true);
let pagenumber = 1;
window.addEventListener("load", function() {
    if (auth == 'leader') {
        var objXMLHttpRequest = new XMLHttpRequest();
        objXMLHttpRequest.onreadystatechange = function() {
            if (objXMLHttpRequest.readyState === 4 && objXMLHttpRequest.status === 200) {
                var response = JSON.parse(objXMLHttpRequest.responseText);
                if (response.data.length > 0) {
                    // Handle the first row separately
                    clientsInfo.querySelector('.clientName').textContent = response.data[0].clientName;
                    clientsInfo.querySelector('.plan').textContent = response.data[0].plan;
                    clientsInfo.querySelector('.cashInvest').textContent = response.data[0].cash_investment;
                    clientsInfo.querySelector('.aum').textContent = response.data[0].aum;
                    clientsInfo.querySelector('.clientPortion').textContent = response.data[0]
                        .clientPortion;
                    clientsInfo.querySelector('.bankPortion').textContent = response.data[0].bankPortion;
                    clientsInfo.querySelector('.totalvalue').textContent = response.data[0].totalPortion;
                    clientsInfo.querySelector('.creater').textContent = response.data[0].creater.split('@')[
                        0];

                    // clientsInfo.querySelector('.edit_btn').addEventListener('click', function() {
                    //     var clientNum = response.data[0].clientNum;
                    //     editClient(clientNum);
                    // });
                    clientsInfo.querySelector('.edit_btn').addEventListener('click', function() {
                        var clientNum = response.data[0].clientNum;
                        editClient(clientNum);
                    });

                    clientsInfo.querySelector('.del_btn').addEventListener('click', function() {
                        var clientNum = response.data[0].clientNum;
                        var confirmDelete = confirm("Are you sure you want to delete?");
                        if (confirmDelete) {
                            delRecord(clientNum);
                        } else {
                            return;
                        }


                    });

                    // Handle the rest of the rows
                    for (var i = 1; i < response.data.length; i++) {
                        var newRow = cloneRow.cloneNode(true);
                        newRow.querySelector('.clientName').textContent = response.data[i].clientName;
                        newRow.querySelector('.plan').textContent = response.data[i].plan;
                        newRow.querySelector('.cashInvest').textContent = response.data[i].cash_investment;
                        newRow.querySelector('.aum').textContent = response.data[i].aum;
                        newRow.querySelector('.clientPortion').textContent = response.data[i].clientPortion;
                        newRow.querySelector('.bankPortion').textContent = response.data[i].bankPortion;
                        newRow.querySelector('.totalvalue').textContent = response.data[i].totalPortion;
                        newRow.querySelector('.creater').textContent = response.data[i].creater.split('@')[
                            0];

                        if (username == response.data[i].creater) {
                            console.log(username);
                            (function(index) {
                                newRow.querySelector('.edit_btn').addEventListener('click', function() {
                                    var clientNum = response.data[index].clientNum;
                                    editClient(clientNum);
                                });
                            })(i);

                            (function(index) {
                                newRow.querySelector('.del_btn').addEventListener('click', function() {
                                    var clientNum = response.data[index].clientNum;
                                    var confirmDelete = confirm(
                                        "Are you sure you want to delete?");
                                    if (confirmDelete) {
                                        delRecord(clientNum);
                                    } else {
                                        return;
                                    }
                                });
                            })(i);
                        } else {
                            (function(index) {
                                newRow.querySelector('.edit_btn').addEventListener('click', function() {
                                    alert('you cannot edit this case!')
                                });
                            })(i);

                            (function(index) {
                                newRow.querySelector('.del_btn').addEventListener('click', function() {
                                    var clientNum = response.data[index].clientNum;
                                    alert('you cannot delete this case!')

                                });
                            })(i);
                        }



                        clientsInfoForm.appendChild(newRow);
                    }
                }
                pagenumber = Math.ceil(response.number.length / 9);


                for (let i = 2; i <= pagenumber; i++) {
                    var newNav = pageNav.cloneNode(true);
                    var newNumber = newNav.querySelector(".number");
                    newNumber.textContent = i;
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
        };

        var urlParams = new URLSearchParams(window.location.search);
        var currentPage = urlParams.get('page');
        objXMLHttpRequest.open('POST', 'cal.php/getTeamCustomerList');
        objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        objXMLHttpRequest.send('userName=' + encodeURIComponent(username) + '&page=' + currentPage + '&team=' +
            encodeURIComponent(team));

    } else {
        var objXMLHttpRequest = new XMLHttpRequest();
        objXMLHttpRequest.onreadystatechange = function() {
            if (objXMLHttpRequest.readyState === 4 && objXMLHttpRequest.status === 200) {
                var response = JSON.parse(objXMLHttpRequest.responseText);
                if (response.data.length > 0) {
                    // Handle the first row separately
                    clientsInfo.querySelector('.clientName').textContent = response.data[0].clientName;
                    clientsInfo.querySelector('.plan').textContent = response.data[0].plan;
                    clientsInfo.querySelector('.cashInvest').textContent = response.data[0].cash_investment;
                    clientsInfo.querySelector('.aum').textContent = response.data[0].aum;
                    clientsInfo.querySelector('.clientPortion').textContent = response.data[0]
                        .clientPortion;
                    clientsInfo.querySelector('.bankPortion').textContent = response.data[0].bankPortion;
                    clientsInfo.querySelector('.totalvalue').textContent = response.data[0].totalPortion;
                    clientsInfo.querySelector('.creater').textContent = response.data[0].creater.split('@')[
                        0];

                    clientsInfo.querySelector('.edit_btn').addEventListener('click', function() {
                        var clientNum = response.data[0].clientNum;
                        editClient(clientNum);
                    });
                    clientsInfo.querySelector('.edit_btn').addEventListener('click', function() {
                        var clientNum = response.data[0].clientNum;
                        editClient(clientNum);
                    });

                    clientsInfo.querySelector('.del_btn').addEventListener('click', function() {
                        var clientNum = response.data[0].clientNum;
                        var confirmDelete = confirm("Are you sure you want to delete?");
                        if (confirmDelete) {
                            delRecord(clientNum);
                        } else {
                            return;
                        }


                    });

                    // Handle the rest of the rows
                    for (var i = 1; i < response.data.length; i++) {
                        var newRow = cloneRow.cloneNode(true);
                        newRow.querySelector('.clientName').textContent = response.data[i].clientName;
                        newRow.querySelector('.plan').textContent = response.data[i].plan;
                        newRow.querySelector('.cashInvest').textContent = response.data[i].cash_investment;
                        newRow.querySelector('.aum').textContent = response.data[i].aum;
                        newRow.querySelector('.clientPortion').textContent = response.data[i].clientPortion;
                        newRow.querySelector('.bankPortion').textContent = response.data[i].bankPortion;
                        newRow.querySelector('.totalvalue').textContent = response.data[i].totalPortion;
                        newRow.querySelector('.creater').textContent = response.data[i].creater.split('@')[
                            0];

                        (function(index) {
                            newRow.querySelector('.edit_btn').addEventListener('click', function() {
                                var clientNum = response.data[index].clientNum;
                                editClient(clientNum);
                            });
                        })(i);

                        (function(index) {
                            newRow.querySelector('.del_btn').addEventListener('click', function() {
                                var clientNum = response.data[index].clientNum;
                                var confirmDelete = confirm("Are you sure you want to delete?");
                                if (confirmDelete) {
                                    delRecord(clientNum);
                                } else {
                                    return;
                                }
                            });
                        })(i);

                        clientsInfoForm.appendChild(newRow);
                    }
                }
                pagenumber = Math.ceil(response.number.length / 9);


                for (let i = 2; i <= pagenumber; i++) {
                    var newNav = pageNav.cloneNode(true);
                    var newNumber = newNav.querySelector(".number");
                    newNumber.textContent = i;
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
        };

        var urlParams = new URLSearchParams(window.location.search);
        var currentPage = urlParams.get('page');
        objXMLHttpRequest.open('POST', 'cal.php/getCustomerList');
        objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        objXMLHttpRequest.send('userName=' + encodeURIComponent(username) + '&page=' + currentPage);
    }



    function editClient(clientNum) {
        window.location.href = `http://localhost/seed/clientForm.php?clientNum=${clientNum}`;
    }

    function delRecord(clientNum) {
        var objXMLHttpRequest = new XMLHttpRequest();
        objXMLHttpRequest.onreadystatechange = function() {
            if (objXMLHttpRequest.readyState === 4 && objXMLHttpRequest.status === 200) {
                var response = JSON.parse(objXMLHttpRequest.responseText);
                if (response.success) {
                    console.log('Record deleted');
                    window.location.href = "http://localhost/seed/customerList.php?page=1";
                    // You can remove the deleted record from the UI here
                } else {
                    console.log('Failed to delete record');
                    // Handle failure, display an error message, etc.
                }
            }
        };

        objXMLHttpRequest.open('POST', 'cal.php/delRecord');
        objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        objXMLHttpRequest.send('clientNum=' + clientNum);
    }

    var nav = document.querySelector('.nav');
    nav.addEventListener('click', function() {
        nav.classList.toggle("show");
    });

    function filterClientsInfo() {
        var searchValue = search.value.toLowerCase();
        console.log(searchValue);

        // Iterate over clientsInfo rows and hide/show based on search value
        var rows = document.querySelectorAll('.clientsInfo');
        rows.forEach(function(row) {
            var clientName = row.querySelector('.clientName').textContent.toLowerCase();
            if (clientName.includes(searchValue)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Add event listener to search icon to trigger search
    searchIcon.addEventListener('click', function() {
        filterClientsInfo();
    });


});


if (auth == 'leader') {
    console.log(team);
    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4 && objXMLHttpRequest.status === 200) {
            var response = JSON.parse(objXMLHttpRequest.responseText);
            console.log(response);
            if (response.length > 0) {
                console.log(response);
                pageNumber = response.length / 9;
            }
        }
    };

    objXMLHttpRequest.open('POST', 'cal.php/getTeamCustomerListPage');
    objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    objXMLHttpRequest.send('team=' + encodeURIComponent(team));
} else {
    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4 && objXMLHttpRequest.status === 200) {
            var response = JSON.parse(objXMLHttpRequest.responseText);
            if (response.length > 0) {
                console.log(response);
                pageNumber = response.length / 9;
            }
        }
    };
    objXMLHttpRequest.open('POST', 'cal.php/getCustomerListPage');
    objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    objXMLHttpRequest.send('userName=' + encodeURIComponent(username));

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