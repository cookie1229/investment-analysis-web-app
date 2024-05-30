<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content='width=1168px' name='viewport' />
    <link rel="stylesheet" href="./css/header/header.css">
    <link rel="stylesheet" href="./css/mainLeft/mainLeft.css">
    <link rel="stylesheet" href="./css/index/index.css">
    <link rel="icon" type="image/x-icon" href="/image/favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/emoji-mart@latest/dist/browser.js"></script>

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
                    <a href="index.php">
                        <li><img src="./image/home.png"><span>首頁</span></li>
                    </a>
                    <li><img src="./image/menu.png"><span>參與空間</span></li>
                    <li><img src="./image/navapps.png"><span>應用程序</span></li>
                    <a href="account.php?page=1">
                        <li class="account"><img src="./image/person.png"><span>個人空間</span></li>
                    </a>
                    <a href="account.php?page=1">
                        <li class="account"><img src="./image/person.png"><span>個人空間</span></li>
                    </a>
                    <a href="planSetting.php?page=1">
                        <li class="account"><img src="./image/planSetting.png"><span>保費計劃</span></li>
                    </a>
                    <li class="logout"><img src="./image/Logout.png"><span>登出</span></li>
                </ul>
            </div>
            <div class="mainRight">
                <div class="dashborad">
                    <div class="hello">
                        <div class="helloMsg">
                            <span class="helloUser">你好</span>
                            <span class="welcome">歡迎回到 SEED， <br />很榮幸可以為你服務。</span>
                        </div>
                        <div class="helloImage">
                            <div></div>

                        </div>

                    </div>
                    <div class="alert">
                        <div class="alertHeader">
                            <div class="alertLeft">
                                <span class="icon"></span>
                                <span>最新公告</span>
                            </div>

                            <div class="addAnnouce"></div>


                        </div>
                        <div class="content announceList" style="overflow-y: scroll;">
                            <div class="title">
                                - 歡迎加入『 SEED Wealth Management Area 』<br />
                                - 保費融資計算系統 經已上架，會員敬請留意。 <br />
                                - 歡迎加入『 SEED Wealth Management Area 』<br />


                            </div>

                            <!-- <span style="display: block;width: 100%;"><a
                                    href="https://www.hkab.org.hk/DisplayInterestSettlementRatesAction.do?lang=b5"
                                    style=" color: #6A6A6A; size: 12px;" target="_blank">- 香港銀行公會港元利息結算利率 <img
                                        src="/image/clicktolink.png" style="width: 23px;height: 13px;"></a></span>

                            <span style="display: block;width: 100%;"><a
                                    href="https://www.cmbwinglungbank.com/wlb_corporate/hk/personal/investments/financial-information/interest-rates/hkd-best-lending-rate.html"
                                    style=" color: #6A6A6A; size: 12px;" target="_blank">- 招商永隆銀行最優惠貸款利率 <img
                                        src="/image/clicktolink.png" style="width: 23px;height: 13px;">
                                </a></span>

                            <span style="display: block;width: 100%;"><a
                                    href="http://www.aastocks.com/tc/forex/default.aspx"
                                    style=" color: #6A6A6A; size: 12px;" target="_blank">- 多元貨幣兌港元兌換價（實時）<img
                                        src="/image/clicktolink.png" style="width: 23px;height: 13px;"></a></span> -->

                        </div>
                    </div>
                    <div class="annouceFormContainer">
                        <form class="annouceForm" method="POST">
                            <div class="formTitle">
                                <span class="addNewTtile">新增公告</span>
                                <span class="closeDraft"></span>
                            </div>
                            <div class="annouceTtile">
                                <label for="title">標題</label>
                                <input type="text" id="title" name="title"></input>
                            </div>
                            <div class="annouceContent">
                                <label for="content">內容</label>
                                <textarea id="content" name="content" rows="9" cols="50"></textarea>
                            </div>

                            <div class="button">
                                <div class="buttonLeft">
                                    <div class="addImage" id="addImage"></div>
                                    <div class="addEmoji" id="addEmoji"></div>
                                    <div class="addLink" id="addLink"></div>
                                    <div class="uploadImage"> <input type="file" name="image" id="image"></div>
                                </div>
                                <div class="postButton
                                ">發佈</div>


                            </div>
                            <div class="readerDiv">
                                <label>可瀏覽：</label>
                                <input type="radio" name="reader" id="all" value="all" class="reader"
                                    style="margin-left: 32px;"></input>
                                <label for="all">全部</label>
                                <input type="radio" name="reader" id="leader" value="leader" class="reader"></input>
                                <label for="leader">Leader</label>
                                <input type="radio" name="reader" id="member" value="member" class="reader"></input>
                                <label for="member">Member</label>
                            </div>




                        </form>
                    </div>
                    <div class="announceContentContainer">
                        <div class="detailTitle">
                            <span class="announcementTitle"></span>
                            <span class="deleteAnnounce">刪除此公告</span>
                            <span class="closeDraft closeDetail"></span>
                        </div>
                        <div class="detailContent">
                            <div class="contentText"></div>
                            <div class="imageContainer"></div>

                        </div>


                    </div>


                    <div class="notice">
                        <div class="noticeHeader">
                            <span class="icon"></span>
                            <span>通知中心</span>
                        </div>
                        <div class="content">
                            - 暫無通知
                        </div>
                    </div>
                </div>
                <div class="clientCorner">
                    <div class="apps">
                        <span class="appslogo"></span>
                        <span style="font-size: 22px;">應用程式</span>
                    </div>
                    <div class="clientCornerList">



                        <div class="Premium_Fin_Cal">
                            <span class="clientIcon">P</span>
                            <span class="clientName">Premium Fin-Cal</span>
                            <span class="memberOnly" style="margin-left: 46px;"><img src="image/member.png"
                                    style="width: 20px;height: 20px;"></span>
                            <span class="rightArrow"></span>
                        </div>

                        <a href="./customerListPB.php?page=1">
                            <div class="Premium_Fin_PB_Cal">
                                <span class="clientIcon">PB</span>
                                <span class="clientName">Premium Fin-Cal (PB)</span>
                                <span class="memberOnly" style="margin-left: 5px;"><img src="image/member.png"
                                        style="width: 20px;height: 20px;"></span>
                                <span class="rightArrow"></span>
                            </div>
                        </a>
                        <a href="./mcCal.html">
                            <div>
                                <span class="clientIcon3"><img src="image/callogo.png"
                                        style="align-items: center;"></span>
                                <span class="clientName">Premium Fin-Cal (MC)</span>
                                <span class="rightArrow"></span>
                            </div>
                        </a>



                    </div>
                </div>
            </div>
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

var auth = getCookieValue("auth");
console.log(auth);
let closeDetail = document.querySelector(".closeDetail")
let announceContentContainer = document.querySelector(".announceContentContainer")
let annouceList = document.querySelector(".announceList")
let title = document.querySelector('.title')
let announcementTitle = announceContentContainer.getElementsByClassName("announcementTitle");
let contentText = announceContentContainer.getElementsByClassName("contentText")[0]

window.addEventListener("load", function() {
    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4) {
            if (objXMLHttpRequest.status === 200) {
                var response = JSON.parse(objXMLHttpRequest.responseText);
                console.log(response);


                for (let i = 0; i < response.data.length; i++) {
                    title.innerHTML = response.data[0].title;
                    title.addEventListener('click', function() {


                        console.log(announcementTitle);
                        announcementTitle[0].innerHTML = response.data[0].title;
                        contentText[0].innerHTML = response.data[0].content
                        const anchors = contentText.querySelectorAll('a');
                        anchors.forEach(anchor => {
                            // Ensure the href attribute exists and is not empty
                            const href = anchor.getAttribute('href');
                            if (href) {
                                // Create a new anchor element and set its href
                                const newAnchor = document.createElement('a');
                                newAnchor.href = href;
                                newAnchor.textContent = anchor
                                    .textContent; // Set the anchor's text

                                // Replace the original anchor with the new one
                                anchor.parentNode.replaceChild(newAnchor, anchor);
                            }
                        });

                        // Display the announcement content container
                        const announceContentContainer = document.getElementById(
                            'announceContentContainer');
                        announceContentContainer.style.display = 'block';
                    })

                }

                var cloneRow = title.cloneNode(true);
                for (var i = 1; i < response.data.length; i++) {
                    console.log(i);
                    var newRow = cloneRow.cloneNode(true);
                    newRow.innerHTML = response.data[i].title;
                    annouceList.appendChild(newRow);

                    // Create a closure to capture the current value of i
                    (function(index) {
                        newRow.addEventListener('click', function() {
                            console.log(index);
                            console.log(response.data[index].title);

                            if (announcementTitle && announceContentContainer) {
                                announcementTitle[0].innerHTML = response.data[index].title;
                                announceContentContainer.style.display = 'block';
                            } else {
                                console.log(
                                    "Element with ID 'announcementTitle' or 'announceContentContainer' not found."
                                );
                            }
                        });
                    })(i);
                }








            } else {
                alert('Error Code: ' + objXMLHttpRequest.status);
                alert('Error Message: ' + objXMLHttpRequest.statusText);
            }
        }
    }

    objXMLHttpRequest.open('POST', 'cal.php/getAnnouncement');
    objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    objXMLHttpRequest.send('auth=' + encodeURIComponent(auth));
})

let annouceFormContainer = document.querySelector(".annouceFormContainer");
let emojiPickerVisible = false; // Global variable to track picker visibility
let emojiPickerInstance; // Declare the picker instance outside the click event
document.addEventListener('DOMContentLoaded', function() {
    let addEmoji = document.querySelector(".addEmoji");
    insertEmoji = (emoji) => {
        const typingArea = document.querySelector("#content")
        const startPos = typingArea.selectionStart;
        const endPos = typingArea.selectionEnd;
        typingArea.value =
            typingArea.value.substring(0, startPos) +
            emoji.native +
            typingArea.value.substring(endPos, typingArea.value.length);

        // 设置插入表情后的光标位置
        typingArea.selectionStart = startPos + emoji.native.length;
        typingArea.selectionEnd = startPos + emoji.native.length;
        console.log(typingArea.value);
    };
    addEmoji.addEventListener('click', function() {
        if (!emojiPickerVisible) {
            const pickerOptions = {
                categories: [
                    'people',
                    // 'places',
                    // 'symbols',
                    'activity',
                    // 'flags',
                    // 'foods',
                    // 'frequent',
                    'nature',
                    // 'objects',

                ],

                onEmojiSelect: (emoji) => {
                    insertEmoji(emoji);
                }
            };

            emojiPickerInstance = new EmojiMart.Picker(pickerOptions);
            annouceFormContainer.appendChild(emojiPickerInstance);
        }

        // Toggle the picker visibility
        emojiPickerVisible = !emojiPickerVisible;
        if (emojiPickerVisible) {
            emojiPickerInstance.style.display = 'block'
        } else {
            emojiPickerInstance.style.display = 'none'
        }
    });
});

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



//console.log(username);

var nav = document.querySelector('.nav')
nav.addEventListener('click', function() {
    nav.classList.toggle("show")
})



// Example usage
function getCompanyFromCookie() {
    const companyCookie = getCookieValue('company');
    return companyCookie ? decodeURIComponent(companyCookie) : null;
}
var username = getCookieValue("username");
console.log(username);
const companyValue = getCompanyFromCookie();
console.log(companyValue);
// let auth = getCookieValue("auth");
// console.log(auth);

let account = document.querySelector('.account');
if (auth !== 'admin') {
    account.style.display = "none"
}


var Premium_Fin_Cal = document.querySelector(".Premium_Fin_Cal");
Premium_Fin_Cal.addEventListener('click', function() {

    window.location.href = 'http://localhost/seed/customerList.php?page=1';
})
var helloUser = document.querySelector('.helloUser');
if (username == null) {
    helloUser.innerHTML = ('你好')
} else {
    helloUser.innerHTML = ('你好，' + username.split('@')[0])
}



let logout = document.querySelector('.logout');

logout.addEventListener("click", function() {
    document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie = "company=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

    window.location.href = 'http://localhost/seed/login.php'

})

let addAnnouce = document.querySelector(".addAnnouce");

let closeDraft = document.querySelector(".closeDraft")

addAnnouce.addEventListener("click", function() {
    annouceFormContainer.style.display = 'block'
})
closeDraft.addEventListener('click', function() {
    annouceFormContainer.style.display = 'none'
})

let addImage = document.querySelector(".addImage")
let uploadImage = document.querySelector(".uploadImage")
addImage.addEventListener('click', function() {
    uploadImage.style.display = 'block'
})

let addLink = document.querySelector(".addLink")
addLink.addEventListener('click', function() {
    const typingArea = document.querySelector("#content");
    const linkTemplate = '<a href=""></a>';

    // Get the selection start position
    const startPos = typingArea.selectionStart;

    // Insert the link template at the selection position
    typingArea.setRangeText(linkTemplate, startPos, startPos, 'end');

    // Move the cursor to the middle of the inserted link
    const newCursorPos = startPos + (linkTemplate.length / 2);
    typingArea.setSelectionRange(newCursorPos, newCursorPos);

    console.log(typingArea.innerHTML);
})

const postBtn = document.querySelector(".postButton")
postBtn.addEventListener('click', function() {
    var form = document.querySelector(".annouceForm")

    var formData = new FormData(form);

    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4) {
            if (objXMLHttpRequest.status === 200) {
                var response = JSON.parse(objXMLHttpRequest.responseText);
                console.log(response);
                if (response.success) {


                    // window.location.href = 'http://localhost/seed/index.php';

                }
            }


        } else {
            // alert('Error Code: ' + objXMLHttpRequest.status);
            // alert('Error Message: ' + objXMLHttpRequest.statusText);
            alert(response.message);
        }
    }


    objXMLHttpRequest.open('POST', 'cal.php/postAnnoucement'); // Specify the login endpoint
    objXMLHttpRequest.send(formData);
});


closeDetail.addEventListener('click', function() {
    announceContentContainer.style.display = 'none'
})
</script>

</html>