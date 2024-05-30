<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content='width=1168px' name='viewport' />
    <link rel="stylesheet" href="./css/header/header.css">
    <link rel="stylesheet" href="./css/mainLeft/mainLeft.css">
    <link rel="stylesheet" href="./css/form/form.css">


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
            <text style="font-size: 20px; color: black; font-weight:200;">保險融資計算系統</text>
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
                    <!-- <li><img src="./image/menu.png"><span>參與空間</span></li>
                    <li><img src="./image/navapps.png"><span>應用程序</span></li>
                    <li><img src="./image/person.png"><span>個人空間</span></li> -->
                    <li class="logout"><img src="./image/Logout.png"><span>登出</span></li>
                </ul>
            </div>
            <div class="mainRight">
                <form action="cal.php/saveEdit" method="POST" id="calform">
                    <input type="hidden" name="pageNumber" id="clientNum">

                    <div class="tablist">
                        <ul>
                            <li class="currentaccount tabListNav current">
                            </li>
                            <li class="policycontent tabListNav"></li>
                            <li class="interest tabListNav"></li>
                            <li class="returntable tabListNav"></li>
                            <li class="showAll tabListNav" style="width: 0px;"></li>


                        </ul>


                        <div class="formContainer">
                            <div class="formHeader">

                                <div class="formTitle">基本資料</div>
                                <div class="formRight">
                                    <button class="cancelBtn"><img src="./image/cancel.png"></button>
                                    <button class="saveBtn"><input type="submit" value=''></input></button>

                                    <!-- <button class="chatBtn"><img src="./image/chatbot.png"></button> -->

                                    <button class="exportBtn"><img src="./image/export.png"></button>
                                </div>
                            </div>
                            <div style="height:53px" class="formNumber">1/4</div>


                            <div class="clientForm display" name="基本資料">
                                <div class="personTitle">
                                    <img src="./image/personicon.png">
                                    <span>
                                        稱謂：
                                    </span>
                                    <div class="titleChoices">
                                        <div class="title Mr"><label for="mr">Mr</label><input type="radio" id="Mr"
                                                name="title" value="Mr" checked="true"></div>

                                        <div class="title Ms"><label for="ms">Ms</label><input type="radio" id="Ms"
                                                name="title" value="Ms"></div>
                                        <div class="title Mrs"><label for="mrs">Mrs</label><input type="radio" id="Mrs"
                                                name="title" value="Mrs"></div>

                                    </div>

                                </div>
                                <div class="clientName">
                                    <img src="./image/clientnameicon.png">
                                    <span>
                                        客戶名稱：
                                    </span>
                                    <div class="clientNameInput">
                                        <input type="text" name="clientName" required="required" class="name">
                                    </div>

                                </div>
                                <div class="cashInvenst">
                                    <img src="./image/cashinvesticon.png">
                                    <span>
                                        現金投資金額：
                                    </span>
                                    <div class="cash_investmentInput">
                                        <input type="text" name="cash_investment">
                                        <span class="unit">HKD</span>
                                    </div>

                                </div>
                                <div class="bankRequire">
                                    <img src="./image/bankrequireicon.png">
                                    <span>
                                        銀行開戶要求：
                                    </span>
                                    <div class="aumInput">
                                        <input type="text" name="aum">
                                        <span class="unit">HKD</span>
                                    </div>

                                </div>
                                <div class="accountInterest">
                                    <img src="./image/interesticon.png">
                                    <span>
                                        戶口利息/率潤：
                                    </span>
                                    <div class="aum_intInput">
                                        <input type="text" name="aum_int">
                                        <span class="unit">%</span>
                                    </div>

                                </div>
                            </div>
                            <div class="clientForm" name="保單內容">
                                <div class="innerTitle">保單內容</div>
                                <div class="row1">
                                    <div class="question ">
                                        <div class="questionTitle"><span class="number">1</span><span
                                                class="questionName">選擇計劃</span></div>
                                        <select class="selectPlan" name="plan" id="plan">
                                            <option value="---">---</option>

                                        </select>
                                    </div>
                                    <div class="question question2">
                                        <div class="questionTitle"><span class="number">2</span><span
                                                class="questionName">銀行融資比率</span></div>
                                        <div class="question2Input"><input type="text" name="financing_ratio"
                                                class="financing_ratioInput"><span>% </span></div>
                                    </div>
                                </div>

                                <div class="row2">
                                    <div class="question question3">
                                        <div class="questionTitle">
                                            <span class="number">3</span>
                                            <span class="questionName">客戶部分</span>
                                        </div>
                                        <div class="question3Input">
                                            <input type="text" name="client_portion" class="client_portionInput"
                                                readonly>
                                            <span class="dollarSign">$</span>
                                        </div>
                                        <div class="question3Input"><input type="text" name="client_portion_percentage"
                                                class="client_portion_percentage" readonly>
                                            <span>%</span>
                                        </div>
                                    </div>
                                    <div class="question question4">
                                        <div class="questionTitle">
                                            <span class="number">4</span>
                                            <span class="questionName">銀行融資部分</span>
                                        </div>
                                        <div class="question4Input">
                                            <input type="text" name="bank_portion" class="bank_portion_Input" readonly>
                                            <span class="dollarSign">$</span>
                                        </div>
                                        <div class="question4Input"><input type="text" name="bank_portion_percentage"
                                                readonly class="bank_portion_percentage">
                                            <span>%</span>
                                        </div>
                                    </div>
                                    <div class="question question5">
                                        <div class="questionTitle">
                                            <span class="number">5</span>
                                            <span class="questionName">保單價值</span><span class="detail_btn">明細</span>
                                        </div>
                                        <div class="question5Input">
                                            <input type="text" name="total_portion" class="total_portionInput" readonly>
                                            <span class="dollarSign">$</span>
                                        </div>
                                        <div class="question5Input"><input type="text" name="total_portion_percentage"
                                                class="total_portion_percentage" value="100.00" readonly>
                                            <span>%</span>
                                        </div>
                                    </div>




                                </div>

                                <div class="total_portion_detail">
                                    <div class="total_portion_detail_header">
                                        <span>Policy Detail</span>
                                        <span class="hidden_btn"></span>
                                    </div>
                                    <div class="total_portion_tableContainer">
                                        <table class="total_portion_table">
                                            <thead>
                                                <tr>
                                                    <th>Year End</th>
                                                    <th>Plan</th>
                                                    <th>Total Premium</th>
                                                    <th>GCV</th>
                                                    <th>Acc. Div</th>
                                                    <th>Term. Div</th>
                                                    <th>Total Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="total_portion_table_tr">
                                                    <td>
                                                        <div class="detail_year_end">0</div>
                                                    </td>
                                                    <td>
                                                        <div class="detail_plan"></div>
                                                    </td>
                                                    <td>
                                                        <div class="detail_total_premium"></div>
                                                    </td>
                                                    <td>
                                                        <div class="detail_GCV"></div>
                                                    </td>
                                                    <td>
                                                        <div class="detail_acc_div"></div>
                                                    </td>
                                                    <td>
                                                        <div class="detail_term_div"></div>
                                                    </td>
                                                    <td>
                                                        <div class="detail_total_value"></div>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                                <div class="client_portion_detail">
                                    <div class="client_portion_bar">客戶部分（詳細） <span class="downArrow"></span></div>
                                    <div class="client_portion_question">
                                        <div class="row3">
                                            <div class="question question6">
                                                <div class="questionTitle"><span class="number">1</span><span
                                                        class="questionName">Welcome Bonus</span></div>
                                                <div class="question6Input"><input type="text" name="welcome_bonus"
                                                        class="welcome_bonusInput"><span>% </span>
                                                </div>
                                            </div>
                                            <div class="question question7">
                                                <div class="questionTitle"><span class="number">2</span><span
                                                        class="questionName">Bonus Amount</span></div>
                                                <div class="question7Input"><input type="text" name="bonus_amount"
                                                        class="bonus_amountInput" readonly><span
                                                        class="dollarSign">$</span>
                                                </div>
                                            </div>
                                            <div class="question question8">
                                                <div class="questionTitle"><span class="number">3</span><span
                                                        class="questionName">Policy Discount</span></div>
                                                <div class="question8Input"><input type="text"
                                                        name="policy_discount_rate" class="policy_discount_rateInput"
                                                        readonly>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row4">
                                            <div class="question question9">
                                                <div class="questionTitle"><span class="number">4</span><span
                                                        class="questionName">Discount Amount</span></div>
                                                <div class="question9Input"><input type="text" name="discount_amount"
                                                        class="discount_amountInput" readonly><span
                                                        class="dollarSign">$</span>
                                                </div>
                                            </div>
                                            <div class="question question10">
                                                <div class="questionTitle"><span class="number">5</span><span
                                                        class="questionName">Coupon</span></div>
                                                <div class="question10Input"><input type="text" name="coupon"
                                                        class="couponInput"><span class="dollarSign">$</span>
                                                </div>
                                            </div>
                                            <div class="question question11">
                                                <div class="questionTitle"><span class="number">6</span><span
                                                        class="questionName">Total Bonus</span></div>
                                                <div class="question11Input"><input type="text" name="total_bonus"
                                                        class="total_bonusInput" readonly><span
                                                        class="dollarSign">$</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row5">
                                            <div class="question question12">
                                                <div class="questionTitle"><span class="number">7</span><span
                                                        class="questionName">Leverage Rate</span></div>
                                                <div class="question12Input"><input type="text" name="leverager_rate"
                                                        class="leverage_rateInput" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d1_premium_detail">
                                    <div class="d1_premium_detail_bar">首日保單價值<span class="downArrow2"></span></div>
                                    <div class="d1_premium_detail_question">
                                        <div class="row6">
                                            <div class="question question13">
                                                <div class="questionTitle"><span class="number">1</span><span
                                                        class="questionName">總保費</span>
                                                </div>
                                                <div class="question13Input"><input type="text" name="d1_total_premium"
                                                        class="d1_total_premiumInput" readonly><span
                                                        class="dollarSign">$</span>
                                                </div>
                                            </div>
                                            <div class="question question14">
                                                <div class="questionTitle"><span class="number">2</span><span
                                                        class="questionName">折扣後保費</span>
                                                </div>
                                                <div class="question14Input"><input type="text"
                                                        name="d1_discounted_premium" class="d1_discounted_premiumInput"
                                                        readonly><span class="dollarSign">$</span>
                                                </div>
                                            </div>
                                            <div class="question question15">
                                                <div class="questionTitle"><span class="number">3</span><span
                                                        class="questionName">首日退保價值</span></div>
                                                <div class="question15Input"><input type="text" name="d1_sv"
                                                        class="d1_svInput" readonly><span class="dollarSign">$</span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="clientForm" name="利息支付">

                                <div class="innerTitle">利息支付</div>

                                <table class="interestTable">
                                    <thead>
                                        <tr>
                                            <th style="width:176px;padding-left: 40px;padding-right: 45px;">年度</th>
                                            <th style="width:160px;padding-left: 10px;padding-right: 18px;">融資利率
                                            </th>
                                            <th style="width:208px;padding-left: 17px;padding-right: 13px;">利息支出
                                            </th>
                                            <th style="width:230px;padding-left: 12px;padding-right: 12px;">利潤（如有）
                                            </th>
                                            <th style="width:290px;padding-left: 10px;padding-right: 40px;">利息支出（累計）
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="interestTableBody">

                                        <tr class="interestPay">
                                            <td>
                                                <div style="width: 84px;margin-left: 40px;" class="year_i">1</div>
                                            </td>
                                            <td>
                                                <div style="width: 138px">
                                                    <select class="select_int_rate" name="int_rate[]"
                                                        id="int_rate"></select>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width: 184px">
                                                    <span class="dollarSign">$</span>
                                                    <input type="text" class="annual_int_paid" name="annual_int_paid"
                                                        readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width: 213px">
                                                    <span class="dollarSign">$</span>
                                                    <input type="text" class="annual_int_return"
                                                        name="annual_int_return" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width:238px;margin-right: 40px;">
                                                    <span class="dollarSign">$</span>
                                                    <input type="text" class="net_int_paid" name="net_int_paid"
                                                        readonly>
                                                </div>
                                            </td>
                                        </tr>



                                    </tbody>
                                </table>

                            </div>
                            <div class="clientForm" name="回報表">
                                <div class="innerTitle">回報表</div>
                                <table class="returnSumTable">
                                    <thead>
                                        <tr>

                                            <th>年度</th>
                                            <th>保單價值</th>
                                            <th>毛利（保單價值-保單成本）</th>
                                            <th>利息支出（累計）</th>
                                            <th>純利</th>
                                            <th>總回報率</th>
                                            <th>平均回報率</th>


                                        </tr>
                                    </thead>
                                    <tbody class="returnTableBody">
                                        <tr class="returnDetail">

                                            <td>
                                                <div style="width:84px" class="year_p">
                                                    1
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width:138px">
                                                    <span class="dollarSign">$</span>
                                                    <input type="text" class="policy_value_p" name="policy_value_p"
                                                        readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width:234px"><span class="dollarSign">$</span>
                                                    <input type="text" class="gp_p" name="gp_p" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width:177px"><span class="dollarSign">$</span>
                                                    <input type="text" class="total_int_paid_p" name="total_int_paid_p"
                                                        readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width:133px"><span class="dollarSign">$</span>
                                                    <input type="text" class="np_p" name="np_p" readonly>

                                                </div>
                                            <td>
                                                <div style="width:128px" class=""> <input type="text"
                                                        class="total_return_rate" name="total_return_rate"
                                                        readonly><span class="pertSign">%</span></div>

                                            </td>
                                            <td>
                                                <div style="width:113px" class=""><input type="text"
                                                        class="aver_return_rate" name="aver_return_rate" readonly><span
                                                        class="pertSign">%</span></div>

                                            </td>


                                        </tr>


                                    </tbody>
                                </table>

                            </div>





                </form>

                <div class="rightArrow"></div>



            </div>
        </div>
    </div>


</body>
<script src="config.js"></script>
<script>
var username = getCookieValue("username");
console.log(username);

function getCompanyFromCookie() {
    const companyCookie = getCookieValue('company');
    return companyCookie ? decodeURIComponent(companyCookie) : null;
}
var username = getCookieValue("username");
console.log(username);
const companyValue = getCompanyFromCookie();
console.log(companyValue);


if (username == null) {
    window.location.href = "http://localhost/seed/login.php";
}

var planList = document.querySelector('.selectPlan')
var options = planList.getElementsByTagName('option')


function getPlanOptions() {
    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4) {
            if (objXMLHttpRequest.status === 200) {
                var response = JSON.parse(objXMLHttpRequest.responseText);
                console.log(response);


                for (var i = 0; i < response.data.length; i++) {
                    var option = document.createElement('option');
                    var optionText = response.data[i].selectedPlan
                    option.value = optionText;
                    option.innerHTML = optionText;
                    option.classList.add('plan')
                    //console.log(option);s
                    planList.appendChild(option);

                }
            } else {
                alert('Error Code: ' + objXMLHttpRequest.status);
                alert('Error Message: ' + objXMLHttpRequest.statusText);
            }
        }
    }

    objXMLHttpRequest.open('POST', 'cal.php/getPlanOption');
    objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    objXMLHttpRequest.send('company=' + encodeURIComponent(companyValue));


}

function getAllPlan() {
    var objXMLHttpRequest = new XMLHttpRequest();
    objXMLHttpRequest.onreadystatechange = function() {
        if (objXMLHttpRequest.readyState === 4) {
            if (objXMLHttpRequest.status === 200) {
                var response = JSON.parse(objXMLHttpRequest.responseText);
                console.log(response);

                for (var i = 0; i < response.data.length; i++) {
                    var option = document.createElement('option');
                    var optionText = response.data[i].selectedPlan
                    option.value = optionText;
                    option.innerHTML = optionText;
                    option.classList.add('plan')
                    //console.log(option);s
                    planList.appendChild(option);

                }
            } else {
                alert('Error Code: ' + objXMLHttpRequest.status);
                alert('Error Message: ' + objXMLHttpRequest.statusText);
            }
        }
    }

    objXMLHttpRequest.open('POST', 'cal.php/getAllPlan');
    objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    objXMLHttpRequest.send('company=' + encodeURIComponent(companyValue));

    // for (var i = 0; i < options.length; i++) {
    //     var option = document.createElement('option');
    //     option.value = options[i].value;
    //     option.innerHTML = options[i].text;
    //     option.classList.add('plan');
    //     planList.appendChild(option);
    // }
}

if (companyValue === 'ALL') {
    getAllPlan()
} else {
    getPlanOptions()
}
var currentaccount = document.querySelector('.currentaccount')
var policycontent = document.querySelector('.policycontent')
var interest = document.querySelector('.interest')
var returntable = document.querySelector('.returntable');
var rightArrow = document.querySelector('.rightArrow')
const clientNameInput = document.querySelector('clientNameInput');
const name = document.querySelector('.name');
var interestTableBody = document.querySelector('.interestTableBody');
var interestPay = document.querySelector('.interestPay');
var year_i = interestPay.querySelector('.year_i');

const cashInvestmentInput = document.querySelector(
    ".cash_investmentInput input"
);
const aumInput = document.querySelector(".aumInput input");
const clientPortionInput = document.querySelector(".client_portionInput");
const client_portion_percentageInput = document.querySelector(
    ".client_portion_percentage"
);
const aum_intInput = document.querySelector(".aum_intInput input");
const annual_int_returnInput =
    document.getElementsByClassName("annual_int_return"); //console.log(annual_int_returnInput);
const net_int_paidInput = document.getElementsByClassName("net_int_paid");
const annual_int_paidInput = document.getElementsByClassName("annual_int_paid");
const total_int_paid_pInput =
    document.getElementsByClassName("total_int_paid_p");
const welcome_bonusInput = document.querySelector(".welcome_bonusInput");
const couponInput = document.querySelector(".couponInput");
const int_rate_year = document.getElementsByClassName("select_int_rate");
const total_bonusInput = document.querySelector(".total_bonusInput");
const policy_value_pInput = document.getElementsByClassName("policy_value_p");
const gp_pInput = document.getElementsByClassName("gp_p");
const np_pInput = document.getElementsByClassName("np_p");
const year_np = document.getElementsByClassName("year_p");
console.log(year_np);
const total_return_rateInput =
    document.getElementsByClassName("total_return_rate");
const aver_return_rateInput =
    document.getElementsByClassName("aver_return_rate");
const plan = document.querySelector(".selectPlan");
const d1_total_premiumInput = document.querySelector(".d1_total_premiumInput");
const financing_ratioInput = document.querySelector(".financing_ratioInput");
const d1_discounted_premiumInput = document.querySelector(
    ".d1_discounted_premiumInput"
);
const d1_svInput = document.querySelector(".d1_svInput");

var total_portionInput = document.querySelector(".total_portionInput");
var total_portion_percentage = document.querySelector(
    ".total_portion_percentage"
);
const bank_portion_Input = document.querySelector(".bank_portion_Input");
const bank_portion_percentageInput = document.querySelector(
    ".bank_portion_percentage"
);
const bonus_amountInput = document.querySelector(".bonus_amountInput");
const policy_discount_rateInput = document.querySelector(
    ".policy_discount_rateInput"
);
const discount_amountInput = document.querySelector(".discount_amountInput");
const leverage_rateInput = document.querySelector(".leverage_rateInput");
const detail_year_endInput = document.getElementsByClassName("detail_year_end");
const detail_planInput = document.getElementsByClassName("detail_plan");
const detail_total_premiumInput = document.getElementsByClassName(
    "detail_total_premium"
);
const detail_GCVInpput = document.getElementsByClassName("detail_GCV");
const detail_acc_divInput = document.getElementsByClassName("detail_acc_div");
const detail_term_divInput = document.getElementsByClassName("detail_term_div");
const detail_total_valueInput =
    document.getElementsByClassName("detail_total_value");

let total_value_b = [];;
var clientNum = document.getElementById("clientNum");

var navList = document.getElementsByClassName('tabListNav')
//console.log(navList);
var formList = document.getElementsByClassName('clientForm')
//console.log(formList);
var formTitle = document.querySelector('.formTitle')
var formNumber = document.querySelector('.formNumber')
for (let i = 0; i < navList.length; i++) {
    navList[i].index = i;
    navList[i].addEventListener('click', function() {
        for (let j = 0; j < formList.length; j++) {
            navList[i].classList.remove('current')
            formList[j].classList.remove('display')

        }


        for (let k = 0; k < innerTitle.length; k++) {
            innerTitle[k].classList.remove('innerTitle_show')
        }

        this.classList.add('current');
        formList[this.index].classList.add('display')
        formTitle.innerHTML = formList[this.index].getAttribute('name')
        formNumber.innerHTML = i + 1 + '/4'

    })
}

var rightArrow = document.querySelector('.rightArrow')
var leftArrow = document.querySelector('leftArrow')
var innerTitle = document.getElementsByClassName('innerTitle')
//console.log(innerTitle);
rightArrow.addEventListener('click', function() {

    for (let i = 0; i < navList.length; i++) {
        navList[i].index = i;

        if (navList[i].classList.contains('current') && formList[i].classList.contains('display')) {
            if (navList[i].index < 3) {
                navList[i].classList.remove('current')
                formList[i].classList.remove('display')
                navList[i + 1].classList.add('current')
                formList[i + 1].classList.add('display')
                formTitle.innerHTML = formList[i + 1].getAttribute('name')
                var navName = navList[i + 1].getAttribute('class').split(' ')[0];
                var currentNavName = 'current' + navName;
                console.log(currentNavName);
                navList[i + 1].classList.add(currentNavName)


                formList[i].classList.remove('display')
                formList[i + 1].classList.add('display')
                console.log(navList[i].index);
                rightArrow.style.backgroundImage = 'url("image/longarrowright.png")'



                break;
            }


        }
        if (navList[i].index == 3) {
            console.log('23');
            console.log(navList[i].index);
            for (let j = 0; j < formList.length; j++) {
                formList[j].classList.add('display');
                formTitle.innerHTML = '查看全部';

                for (let k = 0; k < innerTitle.length; k++) {
                    innerTitle[k].classList.add('innerTitle_show')
                }


            }
            rightArrow.style.display = 'none'
        }

    }

})


var title = document.getElementsByClassName('title')

for (let i = 0; i < title.length; i++) {
    title[i].addEventListener('click', function() {
        for (let j = 0; j < title.length; j++) {

            title[j].style.backgroundColor = 'rgba(195, 195, 195, 1)'




        }

        this.style.backgroundColor = 'rgba(35, 152, 138, 1)'
    })

}

var client_portion_detail = document.querySelector('.client_portion_detail ')
var downArrow = document.querySelector('.downArrow')
downArrow.addEventListener('click', function() {
    client_portion_detail.classList.toggle("client_portion_detail_show")
})

var d1_premium_detail = document.querySelector('.d1_premium_detail')
var downArrow2 = document.querySelector('.downArrow2')
downArrow2.addEventListener('click', function() {
    d1_premium_detail.classList.toggle("d1_premium_detail_show")
})

var int_rate_select = document.getElementById("int_rate");
//console.log(int_rate_select);
var initialValue = 1.00;
var interval = 0.25;
var maxValue = 6.00;

for (var i = initialValue; i <= maxValue; i += interval) {
    var option = document.createElement('option');
    var optionText = i.toFixed(2) + '%';
    option.value = optionText;
    option.innerHTML = optionText;
    option.classList.add('int_rate_year')
    //console.log(option);
    int_rate_select.appendChild(option);

}
// var int_rate_year = document.getElementsByClassName('int_rate_year')
// console.log(int_rate_year);



var nav = document.querySelector('.nav')
nav.addEventListener('click', function() {
    nav.classList.toggle("show")
})


// Clone the initial row
var cloneRow = interestPay.cloneNode(true);

for (var i = 2; i <= 30; i++) {
    var newRow = cloneRow.cloneNode(true);
    var newRowYear = newRow.querySelector('.year_i');
    newRowYear.innerHTML = i;
    interestTableBody.appendChild(newRow);
}

var returnTableBody = document.querySelector('.returnTableBody ');
var returnDetail = document.querySelector('.returnDetail');
var year_p = interestPay.querySelector('.year_p');

// Clone the initial row
var cloneRow = returnDetail.cloneNode(true);

for (var i = 2; i <= 30; i++) {
    var newRow = cloneRow.cloneNode(true);
    var newRowYear = newRow.querySelector('.year_p');
    newRowYear.innerHTML = i;
    returnTableBody.appendChild(newRow);
}
var total_portion_table = document.querySelector('.total_portion_table tbody');
var total_portion_table_tr = document.querySelector('.total_portion_table_tr');
var detail_year_end = interestPay.querySelector('.detail_year_end');

// Clone the initial row
var cloneRow = total_portion_table_tr.cloneNode(true);

for (var i = 1; i <= 30; i++) {
    var newRow = cloneRow.cloneNode(true);
    var newRowYear = newRow.querySelector('.detail_year_end');
    newRowYear.innerHTML = i;
    total_portion_table.appendChild(newRow);
}


currentaccount.addEventListener('click', function() {
    policycontent.classList.remove('currentpolicycontent')
    interest.classList.remove('currentinterest');
    returntable.classList.remove('currentreturntable');
    rightArrow.style.backgroundImage = 'url("image/longarrowright.png")'

})

policycontent.addEventListener('click', function() {
    policycontent.classList.add('currentpolicycontent')

    if (policycontent.classList.contains('currentpolicycontent')) {
        interest.classList.remove('currentinterest');
        returntable.classList.remove('currentreturntable');
        rightArrow.style.backgroundImage = 'url("image/longarrowright.png")'

    }
})

interest.addEventListener('click', function() {
    interest.classList.add('currentinterest')
    if (interest.classList.contains('currentinterest')) {
        ///console.log('1111');
        policycontent.classList.add('currentpolicycontent');
        returntable.classList.remove('currentreturntable')
        rightArrow.style.backgroundImage = 'url("image/longarrowright.png")'

    }

})

returntable.addEventListener('click', function() {
    returntable.classList.add('currentreturntable')
    if (returntable.classList.contains('currentreturntable')) {
        ///console.log('1111');
        policycontent.classList.add('currentpolicycontent')
        interest.classList.add('currentinterest')
        rightArrow.style.backgroundImage = 'url("image/longarrowright.png")'

    }

})


var urlParams = new URLSearchParams(window.location.search);
var currentClient = urlParams.get('clientNum');
clientNum.value = currentClient;
console.log(clientNum.value);
//const year_p = document.getElementsByClassName("year_p");

var url = new URL(config.apiUrl + '/getClientForm');
url.searchParams.append('clientNum', currentClient);
fetch(url, {
        headers: {
            'Content-Type': 'application/json'
        }
    })

    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.success) {
            var clientData = data.data[0]; // Access the first object in the data array
            console.log(clientData);
            for (let i = 0; i < title.length; i++) {
                if (title[i].classList.contains(clientData.title)) {
                    title[i].style.backgroundColor = 'rgba(35, 152, 138, 1)'
                } else {
                    title[i].style.backgroundColor = 'rgba(195, 195, 195, 1)'
                }
            }
            name.value = clientData.clientName;
            cashInvestmentInput.value = clientData.cash_investment;
            aumInput.value = clientData.aum;
            aum_intInput.value = clientData.aum_int;
            financing_ratioInput.value = clientData.financing_ratio;
            welcome_bonusInput.value = parseFloat(clientData.welcome_bonus).toLocaleString();
            couponInput.value = parseFloat(clientData.coupon).toLocaleString();
            plan.value = clientData.plan;



            //console.log(clientData.select_int_rate);
            int_rate_arr = clientData.select_int_rate.split(',');
            //console.log(int_rate_arr);


            for (let i = 0; i < int_rate_year.length; i++) {
                int_rate_year[i].value = int_rate_arr[i];

                int_rate_year[i].addEventListener("change", function() {
                    //console.log(int_rate_year[i].value);
                    updateAnnuaIntReturn();


                });
            }

            const url = new URL(config.apiUrl + '/getTotalPortion');
            url.searchParams.append('selected_plan', plan.value);
            fetch(url, {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) {

                        // Parse the JSON response
                        return response.json();
                    } else {
                        throw new Error('Error');
                    }
                })
                .then(data => {
                    // Process the retrieved JSON data
                    console.log(data);
                    d1_total_premiumInput.value = parseFloat(
                        data[0].TotalPremium
                    ).toLocaleString();
                    d1_discounted_premiumInput.value = parseFloat(
                        data[0].discounted_value
                    ).toLocaleString();
                    d1_svInput.value = parseFloat(data[0].TotalValue).toLocaleString();
                    console.log(d1_svInput.value);

                    for (let i = 1; i < 31; i++) {
                        total_value_b.push(data[i].TotalValue);
                    }

                    for (let i = 0; i < 31; i++) {
                        total_value_detail.push(data[i].TotalValue);
                    }
                    for (let i = 0; i < 31; i++) {
                        total_premium_detail.push(data[i].TotalPremium);
                    }
                    //console.log(total_premium_detail);
                    for (let i = 0; i < 31; i++) {
                        term_div_detail.push(data[i].TermDiv);
                        //console.log(term_div_detail);
                    }
                    for (let i = 0; i < 31; i++) {
                        acc_div_detail.push(data[i].AccDiv);
                    }
                    for (let i = 0; i < 31; i++) {
                        GCV_detail.push(data[i].GCV);
                    }

                    console.log(total_value_b);
                    let d1_discounted_premium = parseFloat(
                        d1_discounted_premiumInput.value.replace(/,/g, "")
                    );
                    let d1_total_premium = parseFloat(
                        d1_total_premiumInput.value.replace(/,/g, "")
                    );
                    if (d1_discounted_premium != 0) {
                        let policy_discount_rate = parseFloat(
                            (1 - d1_discounted_premium / d1_total_premium) * 100
                        ).toFixed(2);
                        policy_discount_rateInput.value = policy_discount_rate;
                    } else {
                        policy_discount_rateInput.value = "0.00";
                    }


                    updateClientPortion();
                    updateAnnuaIntReturn();
                    updateTotalPortionDetail();

                })
                .catch(error => {
                    console.error('An error occurred:', error);
                });

        } else {
            console.log('No results found');
        }
    })
    .catch(error => {
        console.error('An error occurred:', error);
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




var exportBtn = document.querySelector(".exportBtn")
exportBtn.addEventListener("click", function() {
    window.print()
})
var hidden_btn = document.querySelector(".hidden_btn")
var detail_btn = document.querySelector(".detail_btn")
var total_portion_detail = document.querySelector(".total_portion_detail")
detail_btn.addEventListener("click", function() {
    total_portion_detail.style.display = 'block'
})
hidden_btn.addEventListener("click", function() {
    total_portion_detail.style.display = 'none'
})
var logout = document.querySelector('.logout');

logout.addEventListener("click", function() {
    document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    window.location.href = 'https://www.premfihk.com/'

})

// Example usage
</script>




<script>
var objXMLHttpRequest = new XMLHttpRequest();
objXMLHttpRequest.onreadystatechange = function() {
    if (objXMLHttpRequest.readyState === 4) {
        if (objXMLHttpRequest.status === 200) {
            // alert(objXMLHttpRequest.responseText);
        } else {
            alert('Error Code: ' + objXMLHttpRequest.status);
            alert('Error Message: ' + objXMLHttpRequest.statusText);
        }
    }
}
console.log(config.apiUrl);
objXMLHttpRequest.open('GET', 'cal.php');
objXMLHttpRequest.send();

//set the username value as a cookie:
document.cookie = "userName=" + encodeURIComponent(username);
var form = document.getElementById('calform');
var formData = new FormData(form);




var objXMLHttpRequest = new XMLHttpRequest();
objXMLHttpRequest.onreadystatechange = function() {
    if (objXMLHttpRequest.readyState === 4) {
        if (objXMLHttpRequest.status === 200) {
            // var response = JSON.parse(objXMLHttpRequest.responseText);
            //console.log(response);
        } else {
            alert('Error Code: ' + objXMLHttpRequest.status);
            alert('Error Message: ' + objXMLHttpRequest.statusText);
        }
    }
};
var urlParams = new URLSearchParams(window.location.search);
var currentPage = urlParams.get('page');
console.log(currentPage);


objXMLHttpRequest.open('POST', 'cal.php/saveEdit');
objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//post the username and pagenumber to php
objXMLHttpRequest.send(formData + '&page=' + currentPage);
</script>
<script src="calClient.js"></script>



</html>