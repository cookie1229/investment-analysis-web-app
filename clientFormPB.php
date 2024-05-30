<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content='width=1168px' name='viewport' />
    <link rel="stylesheet" href="./css/header/header.css">
    <link rel="stylesheet" href="./css/mainLeft/mainLeft.css">
    <link rel="stylesheet" href="./css/formPB/formPB.css">

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
            <text style="font-size: 20px; color: black; font-weight:200;">保險融資（私人銀行）計算系統</text>
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
                <form action="cal.php/saveEditPB" method="POST" id="pbform">
                    <input type="hidden" name="clientNum" class="clientNum">
                    <div class="tablist">
                        <ul>
                            <li class="currentaccount tabListNav current">
                            </li>
                            <li class="policyinvest tabListNav"></li>
                            <li class="bankinvest tabListNav"></li>
                            <li class="returntablePB tabListNav"></li>
                            <li class="assetTable tabListNav"></li>
                            <li class="showAll tabListNav" style="width: 0px;"></li>


                        </ul>


                        <div class="formContainer">
                            <div class="formHeader">

                                <div class="formTitle">基本資料及分配</div>
                                <div class="formRight">
                                    <button class="cancelBtn"><img src="./image/cancel.png"></button>
                                    <button class="saveBtn"><input type="submit" value=''></input></button>

                                    <!-- <button class="chatBtn"><img src="./image/chatbot.png"></button> -->

                                    <button class="exportBtn"><img src="./image/export.png"></button>
                                </div>
                            </div>
                            <div style="height:53px" class="formNumber">1/5</div>

                            <div class="clientForm display" name="基本資料及分配">
                                <div class="personTitle">
                                    <img src="./image/personicon.png">
                                    <span>
                                        稱謂：
                                    </span>
                                    <div class="titleChoices">
                                        <div class="title"><label for="mr">Mr</label><input type="radio" id="mr"
                                                name="title" value="Mr" checked="true"></div>

                                        <div class="title"><label for="ms">Ms</label><input type="radio" id="ms"
                                                name="title" value="Ms"></div>
                                        <div class="title"><label for="mrs">Mrs</label><input type="radio" id="ms"
                                                name="title" value="Mrs"></div>

                                    </div>

                                </div>
                                <div class="clientName">
                                    <img src="./image/clientnameicon.png">
                                    <span>
                                        客戶名稱：
                                    </span>
                                    <div class="clientNameInput">
                                        <input type="text" name="clientName" required>
                                    </div>

                                </div>
                                <div class="cashInvest">
                                    <img src="./image/cashinvesticon.png">
                                    <span>
                                        現金投資金額：
                                    </span>
                                    <div class="cash_investmentInput">
                                        <input type="text" name="cash_investment">
                                        <span class="unit">HKD</span>
                                    </div>

                                </div>
                                <div class="property_value_pb">
                                    <img src="./image/property.png">
                                    <span>
                                        物業估值：
                                    </span>
                                    <div class="property_value_pbInput">
                                        <input type="text" name="property_value_pb">
                                        <span class="unit">HKD</span>
                                    </div>

                                </div>
                                <div class="mortgage_percent_pb">
                                    <div class="right"></div>
                                    <span>
                                        按揭百分比(PB)：
                                    </span>
                                    <div class="mortgage_percent_pbInput">
                                        <input type="text" name="mortgage_percent_pb">
                                        <span class="unit">%</span>
                                    </div>

                                </div>
                                <div class="mortgage_amount_pb">
                                    <div class="right"></div>
                                    <span>
                                        按揭總額：
                                    </span>
                                    <div class="mortgage_amount_pbInput">
                                        <input type="text" name="mortgage_amount_pb" readonly>
                                        <span class="unit">HKD</span>
                                    </div>

                                </div>
                                <div class="policy_value_pb">
                                    <img src="./image/interesticon.png">
                                    <span>
                                        保單退保價值：
                                    </span>
                                    <div class="policy_value_pbInput">
                                        <input type="text" name="policy_value_pb">
                                        <span class="unit">HKD</span>
                                    </div>

                                </div>
                                <div class="policy_percent_pb">
                                    <div class="right"></div>
                                    <span>
                                        保單融資百分比(PB)：
                                    </span>
                                    <div class="policy_percent_pbInput">
                                        <input type="text" name="policy_percent_pb">
                                        <span class="unit">%</span>
                                    </div>

                                </div>
                                <div class="policy_financing_pb">
                                    <div class="right"></div>
                                    <span>
                                        抵押總額：
                                    </span>
                                    <div class="policy_financing_pbInput">
                                        <input type="text" name="policy_financing_pb" readonly>
                                        <span class="unit">HKD</span>
                                    </div>

                                </div>
                                <div class="total_investment">
                                    <img src="./image/saving.png">
                                    <span>
                                        投資總額：
                                    </span>
                                    <div class="total_investmentInput">
                                        <input type="text" name="total_investment" readonly>
                                        <span class="unit">HKD</span>
                                    </div>

                                </div>


                                <div class="bankInvestPart">
                                    <div class="right"></div>
                                    <div class="bankInvestPartA">
                                        <span>
                                            銀行部分：
                                        </span>
                                        <div class="pb_percentInput">
                                            <input type="text" name="pb_percent">
                                            <span class="unit">%</span>
                                        </div>
                                    </div>

                                    <div class="bankInvestPartA" style="margin-left: 53px;">
                                        <span>
                                            投資->銀行：
                                        </span>
                                        <div class="pb_partInput">
                                            <input type="text" name="pb_part" readonly>
                                            <span class="unit">HKD</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="bankInvestPart">
                                    <div class="right"></div>
                                    <div class="bankInvestPartA">
                                        <span>
                                            保費融資部分：
                                        </span>
                                        <div class="pf_percentInput">
                                            <input type="text" name="pf_percent" readonly>
                                            <span class="unit">%</span>
                                        </div>
                                    </div>

                                    <div class="bankInvestPartA" style="margin-left: 53px;">
                                        <span>
                                            投資->保費融資：
                                        </span>
                                        <div class="pf_partInput">
                                            <input type="text" name="pf_part" readonly>
                                            <span class="unit">HKD</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="mortgage_detail">
                                    <div class="mortgage_detail_bar">物業按揭 <span class="downArrow3"
                                            style="margin-left: 10px;"></span></div>
                                    <div class="bankInvestPart">
                                        <img src="./image/property.png">
                                        <div class="bankInvestPartA">
                                            <span>
                                                物業估值：
                                            </span>
                                            <div class="property_value_mInput">
                                                <input type="text" name="property_value_m">
                                                <span class="unit">HKD</span>
                                            </div>
                                        </div>

                                        <div class="bankInvestPartA" style="margin-left: 53px;">
                                            <span>
                                                按揭百分比：
                                            </span>
                                            <div class="mortgage_percent_mInput">
                                                <input type="text" name="mortgage_percent_m">
                                                <span class="unit">%</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mortgage_amount_m">
                                        <div class="right"></div>
                                        <span>
                                            按揭總額：
                                        </span>
                                        <div class="mortgage_amount_mInput">
                                            <input type="text" name="mortgage_amount_m" readonly>
                                            <span class="unit">HKD</span>
                                        </div>

                                    </div>
                                    <div class="bankInvestPart">
                                        <img src="./image/age.png">
                                        <div class="bankInvestPartA">
                                            <span>
                                                年齡：
                                            </span>
                                            <div class="ageInput">
                                                <input type="text" name="age">

                                            </div>
                                        </div>

                                        <div class="bankInvestPartA" style="margin-left: 53px;">
                                            <span>
                                                銀行按揭基準：
                                            </span>
                                            <div class="up_limitInput">
                                                <input type="text" name="up_limit">

                                            </div>
                                        </div>

                                    </div>
                                    <div class="payment_year">
                                        <div class="right"></div>
                                        <span>
                                            供款年期：
                                        </span>
                                        <div class="payment_yearInput">
                                            <input type="text" name="payment_year">

                                        </div>

                                    </div>
                                    <div class="int_rate_m">
                                        <img src="./image/int_rarte_m.png">
                                        <span>
                                            按揭利率：
                                        </span>
                                        <div class="int_rate_mInput">
                                            <input type="text" name="int_rate_m">
                                            <span class="unit">%</span>
                                        </div>

                                    </div>
                                    <div class="pmt">
                                        <div class="right"></div>
                                        <span>
                                            Monthly Payment：
                                        </span>
                                        <div class="pmtInput">
                                            <input type="text" name="pmt">
                                            <span class="unit">HKD</span>

                                        </div>
                                        <div class="detail_btn">細節</div>

                                    </div>

                                    <div class="pmt_detail">
                                        <div class="pmt_detail_header">
                                            <span>Monthly Payment</span>
                                            <span class="hidden_btn"></span>
                                        </div>
                                        <div class="pmt_tableContainer">
                                            <table class="pmt_table">
                                                <thead>
                                                    <tr>
                                                        <th>Year End</th>
                                                        <th>Mortgage payment</th>
                                                        <th>Remain Loan in Year</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="pmt_table_tr">
                                                        <td>
                                                            <div class="year_end">0</div>
                                                        </td>
                                                        <td>
                                                            <div class="mortgage_payment"></div>
                                                        </td>
                                                        <td>
                                                            <div class="remain_loan_in_year"></div>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>

                                        </div>

                                    </div>





                                </div>
                            </div>
                            <div class="clientForm" name="保費融資">

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
                                                class="financing_ratioInput"><span>%
                                            </span></div>
                                    </div>
                                </div>

                                <div class="row2">
                                    <div class="question question3">
                                        <div class="questionTitle">
                                            <span class="number">3</span>
                                            <span class="questionName">客戶部分</span>
                                        </div>
                                        <div class="question3Input">
                                            <input type="text" name="client_portion" readonly
                                                class="client_portionInput">
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
                                            <input type="text" name="bank_portion" class="bank_portionInput" readonly>
                                            <span class="dollarSign">$</span>
                                        </div>
                                        <div class="question4Input"><input type="text" name="bank_portion_percentage"
                                                class="bank_portion_percentage" readonly>
                                            <span>%</span>
                                        </div>
                                    </div>
                                    <div class="question question5">
                                        <div class="questionTitle">
                                            <span class="number">5</span>
                                            <span class="questionName">保單價值</span><span class="detail_btn1">明細</span>
                                        </div>
                                        <div class="question5Input">
                                            <input type="text" name="total_portion" class="total_portionInput" readonly>
                                            <span class="dollarSign">$</span>
                                        </div>
                                        <div class="question5Input"><input type="text" name="total_portion_percentage"
                                                readonly class="total_portion_percentage" value=100.00>
                                            <span>%</span>
                                        </div>
                                    </div>



                                </div>
                                <div class="total_portion_detail">
                                    <div class="total_portion_detail_header">
                                        <span>Policy Detail</span>
                                        <span class="hidden_btn1"></span>
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
                                                        class="questionName">Welcome
                                                        Bonus</span></div>
                                                <div class="question6Input"><input type="text" name="welcome_bonus"
                                                        class="welcome_bonusInput"><span>% </span>
                                                </div>
                                            </div>
                                            <div class="question question7">
                                                <div class="questionTitle"><span class="number">2</span><span
                                                        class="questionName">Bonus
                                                        Amount</span></div>
                                                <div class="question7Input"><input type="text" name="bonus_amount"
                                                        class="bonus_amountInput" readonly><span
                                                        class="dollarSign">$</span>
                                                </div>
                                            </div>
                                            <div class="question question8">
                                                <div class="questionTitle"><span class="number">3</span><span
                                                        class="questionName">Policy
                                                        Discount</span></div>
                                                <div class="question8Input"><input type="text"
                                                        name="policy_discount_rate" readonly
                                                        class="policy_discount_rateInput">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row4">
                                            <div class="question question9">
                                                <div class="questionTitle"><span class="number">4</span><span
                                                        class="questionName">Discount
                                                        Amount</span></div>
                                                <div class="question9Input"><input type="text" name="discount_amount"
                                                        class="discount_amountInput" readonly><span
                                                        class="dollarSign">$</span>
                                                </div>
                                            </div>
                                            <div class="question question10">
                                                <div class="questionTitle"><span class="number">5</span><span
                                                        class="questionName">Coupon</span>
                                                </div>
                                                <div class="question10Input"><input type="text" name="coupon"
                                                        class="couponInput"><span class="dollarSign">$</span>
                                                </div>
                                            </div>
                                            <div class="question question11">
                                                <div class="questionTitle"><span class="number">6</span><span
                                                        class="questionName">Total
                                                        Bonus</span></div>
                                                <div class="question11Input"><input type="text" name="total_bonus"
                                                        class="total_bonusInput" readonly><span
                                                        class="dollarSign">$</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row5">
                                            <div class="question question12">
                                                <div class="questionTitle"><span class="number">7</span><span
                                                        class="questionName">Leverage
                                                        Rate</span></div>
                                                <div class="question12Input"><input type="text" name="leverager_ate"
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
                                                        class="questionName">首日退保價值</span>
                                                </div>
                                                <div class="question15Input"><input type="text" name="d1_sv"
                                                        class="d1_svInput" readonly><span class="dollarSign">$</span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="clientForm" name="銀行投資">

                                <div class="innerTitle">銀行投資</div>
                                <div class="row1">
                                    <div class="question question2">
                                        <div class="questionTitle"><span class="number">1</span><span
                                                class="questionName">投資-> 銀行</span></div>
                                        <div class="question2Input readonly"><input type="text" name="pb_part1"
                                                class="pb_part1Input readonly" readonly><span
                                                class="dollarSign">$</span></div>
                                    </div>

                                    <div class="question question2">
                                        <div class="questionTitle"><span class="number">2</span><span
                                                class="questionName">LTV</span></div>
                                        <div class="question2Input"><input type="text" name="LTV" class="LTVInput"
                                                value=70><span>%
                                            </span></div>
                                    </div>
                                </div>
                                <div class="row1">
                                    <div class="question question2">
                                        <div class="questionTitle"><span class="number">3</span><span
                                                class="questionName">Max</span></div>
                                        <div class="question2Input readonly"><input type="text" name="LTV_max"
                                                class="LTV_maxInput readonly" readonly><span>倍</span></div>
                                    </div>

                                    <div class="question question2">
                                        <div class="questionTitle"><span class="number">4</span><span
                                                class="questionName">Multiplier</span></div>
                                        <div class="question2Input"><input type="text" name="multiplier"
                                                class="multiplierInput" placeholder=""><span>倍
                                            </span></div>
                                    </div>
                                </div>

                                <div class="row1">
                                    <div class="question question2">
                                        <div class="questionTitle"><span class="number">5</span><span
                                                class="questionName">O/D Amount</span></div>
                                        <div class="question2Input readonly"><input type="text" name="od_amount"
                                                class="od_amountInput readonly" readonly><span
                                                class="dollarSign">$</span></div>
                                    </div>

                                    <div class="question question2">
                                        <div class="questionTitle"><span class="number">6</span><span
                                                class="questionName">總投資金額</span></div>
                                        <div class="question2Input readonly"><input type="text"
                                                name="total_investment_pb" class="total_investment_pbInput readonly"
                                                placeholder="" readonly><span class="dollarSign">$</span></div>
                                    </div>
                                </div>

                                <div style="margin-top: 81px;">
                                    <div class="row1">
                                        <div class="question question2">
                                            <div class="questionTitle"><span class="number">7</span><span
                                                    class="questionName">投資回報率（預期）</span></div>
                                            <div class="question2Input"><input type="text" name="investment_yield"
                                                    class="investment_yieldInput"><span>%</span></div>
                                        </div>

                                        <div class="question question2">
                                            <div class="questionTitle"><span class="number">8</span><span
                                                    class="questionName">投資回報</span></div>
                                            <div class="question2Input readonly"><input type="text"
                                                    name="investment_return" class="investment_returnInput readonly"
                                                    placeholder="" readonly><span class="dollarSign">$</span></div>
                                        </div>
                                    </div>
                                    <div class="row1">
                                        <div class="question question2">
                                            <div class="questionTitle"><span class="number">9</span><span
                                                    class="questionName">融資利率（預期）</span></div>
                                            <div class="question2Input"><input type="text" name="financing_rate"
                                                    class="financing_rateInput"><span>%</span></div>
                                        </div>

                                        <div class="question question2">
                                            <div class="questionTitle"><span class="number">10</span><span
                                                    class="questionName">融資利息</span>
                                                <span class="detail_btn2">明細</span>
                                            </div>
                                            <div class="question2Input readonly"><input type="text" name="financing_int"
                                                    class="financing_intInput readonly" placeholder="" readonly><span
                                                    class="dollarSign">$</span>
                                            </div>
                                        </div>
                                        <div class="financing_int_detail">
                                            <div class="financing_int_header">
                                                <span>Financing Interest Detail</span>
                                                <span class="hidden_btn2"></span>
                                            </div>
                                            <div class="financing_int_tableContainer">
                                                <table class="financing_int_table">
                                                    <thead>
                                                        <tr>
                                                            <th>按揭總額</th>
                                                            <th>抵押總額</th>
                                                            <th>OD Amount</th>
                                                            <th>銀行融資部分</th>
                                                            <th>融資利率(%)</th>
                                                            <th>PMT(每年)</th>
                                                            <th>融資利息</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="financing_int_tr">
                                                            <td>
                                                                <div class="detail_mortgage_amount_pb"></div>
                                                            </td>
                                                            <td>
                                                                <div class="detail_policy_value_pb"></div>
                                                            </td>
                                                            <td>
                                                                <div class="detail_od_amount"></div>
                                                            </td>
                                                            <td>
                                                                <div class="detail_bank_portion"></div>
                                                            </td>
                                                            <td>
                                                                <div class="detail_financing_rate"><span>%</span></div>
                                                            </td>
                                                            <td>
                                                                <div class="detail_PMT"></div>
                                                            </td>
                                                            <td>
                                                                <div class="detail_financing_int"></div>
                                                            </td>

                                                        </tr>


                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="row1">
                                        <div class="question question2">
                                            <div class="questionTitle"><span class="number">11</span><span
                                                    class="questionName">手續費率</span></div>
                                            <div class="question2Input"><input type="text" name="mgt_fee_rate"
                                                    class="mgt_fee_rateInput"></div>
                                        </div>

                                        <div class="question question2">
                                            <div class="questionTitle"><span class="number">12</span><span
                                                    class="questionName">手續費</span></div>
                                            <div class="question2Input"><input type="text" name="mgt_fee"
                                                    class="mgt_feeInput readonly" placeholder="" readonly><span
                                                    class="dollarSign">$</span></div>
                                        </div>
                                    </div>


                                </div>





                            </div>
                            <div class="clientForm" name="回報表">

                                <div class="innerTitle">Profit and Loss</div>

                                <table class="interestTable">
                                    <thead>
                                        <tr>
                                            <th style="width:70px;padding-left: 40px;padding-right: 13px;">年度</th>
                                            <th style="width:160px;padding-left: 11px;">融資利率
                                            </th>
                                            <th style="width:232px;padding-left: 17px;padding-right: 13px;">利息支出
                                            </th>
                                            <th style="width:160px;padding-left: 10px;padding-right: 18px;">投資利率
                                            </th>
                                            <th style="width:259px;padding-left: 12px;padding-right: 12px;">利潤（如有）
                                            </th>
                                            <th style="width:290px;padding-left: 10px;padding-right: 40px;">累計利息
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="interestTableBody">

                                        <tr class="interestPay">
                                            <td>
                                                <div style="width: 70px;margin-left: 28px;" class="year_i">1</div>
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
                                                <div style="width: 138px">
                                                    <select class="select_int_yield" name="int_yield[]"
                                                        id="int_yield"></select>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width: 215px">
                                                    <span class="dollarSign">$</span>
                                                    <input type="text" class="annual_int_return"
                                                        name="annual_int_return" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width:215px;margin-right: 28px;">
                                                    <span class="dollarSign">$</span>
                                                    <input type="text" class="net_return" name="net_return" readonly>
                                                </div>
                                            </td>
                                        </tr>



                                    </tbody>
                                </table>

                            </div>
                            <div class="clientForm" name="資產負債表">
                                <div class="innerTitle">Balance Sheet</div>
                                <div class="returnSumTableContainer">
                                    <table class="returnSumTable">
                                        <thead>
                                            <tr>

                                                <th style="padding-left: 18px;">年度</th>
                                                <th>保單價值(+)</th>
                                                <th>銀行投資(+)</th>
                                                <th>總抵押品(-)</th>
                                                <th>現金成本(-)</th>
                                                <th>Policy Bonus (+)</th>
                                                <th>每年利潤(累計)(+)</th>
                                                <th>總回報</th>
                                                <th>總回報率</th>
                                                <th style="padding-right: 34px;">平均回報率</th>




                                            </tr>
                                        </thead>
                                        <tbody class="returntablePBBody">
                                            <tr class="returnDetail">
                                                <td>
                                                    <div style="width:50px;margin-left: 15px;" class="year_bs">
                                                        1
                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="width:160px">
                                                        <span class="dollarSign">$</span>
                                                        <input type="text" class="policy_value_bs" readonly
                                                            name="policy_value_bs">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="width:160px"><span class="dollarSign">$</span>
                                                        <input type="text" class="investment_pb" name="investment_pb"
                                                            readonly>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="width:160px"><span class="dollarSign">$</span>
                                                        <input type="text" class="total_loan" name="total_loan"
                                                            readonly>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="width:160px"><span class="dollarSign">$</span>
                                                        <input type="text" class="capital" name="capital" readonly>

                                                    </div>
                                                <td>
                                                    <div style="width:160px" class=""><span class="dollarSign">$</span>
                                                        <input type="text" class="policy_bonus" name="policy_bonus"
                                                            readonly>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div style="width:160px" class=""><span
                                                            class="dollarSign">$</span><input type="text"
                                                            class="accum_np" name="accum_np" readonly></div>

                                                </td>
                                                <td>
                                                    <div style="width:160px"><span class="dollarSign">$</span>
                                                        <input type="text" class="total_return" name="total_return"
                                                            readonly>

                                                    </div>
                                                </td>

                                                <td>
                                                    <div style="width:133px">
                                                        <input type="text" class="total_return_rate"
                                                            name="total_return_rate"><span class="pertSign"
                                                            readonly>%</span>


                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="width:133px;margin-right: 15px;">
                                                        <input type="text" class="aver_return_rate"
                                                            name="aver_return_rate" readonly><span class="pertSign"
                                                            readonly>%</span>

                                                    </div>
                                                </td>


                                            </tr>


                                        </tbody>
                                    </table>
                                </div>


                            </div>

                </form>

                <div class="rightArrow"></div>



            </div>
        </div>
    </div>

</body>
<script src="config.js"></script>
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
var nav = document.querySelector('.nav')
nav.addEventListener('click', function() {
    nav.classList.toggle("show")
})
var currentaccount = document.querySelector('.currentaccount')
var policyinvest = document.querySelector('.policyinvest')
var bankinvest = document.querySelector('.bankinvest')
var returntablePB = document.querySelector('.returntablePB');
var assetTable = document.querySelector('.assetTable');
var rightArrow = document.querySelector('.rightArrow');


currentaccount.addEventListener('click', function() {
    policyinvest.classList.remove('currentpolicyinvest')
    bankinvest.classList.remove('currentbankinvest');
    returntablePB.classList.remove('currentreturntablePB');
    assetTable.classList.remove('currentassetTable');
    rightArrow.style.backgroundImage = 'url("image/longarrowright.png")'

})

policyinvest.addEventListener('click', function() {
    policyinvest.classList.add('currentpolicyinvest')

    if (policyinvest.classList.contains('currentpolicyinvest')) {
        bankinvest.classList.remove('currentbankinvest');
        returntablePB.classList.remove('currentreturntablePB');
        assetTable.classList.remove('currentassetTable');
        rightArrow.style.backgroundImage = 'url("image/longarrowright.png")'

    }
})

bankinvest.addEventListener('click', function() {
    bankinvest.classList.add('currentbankinvest')
    if (bankinvest.classList.contains('currentbankinvest')) {
        //console.log('1111');
        policyinvest.classList.add('currentpolicyinvest');
        returntablePB.classList.remove('currentreturntablePB');
        assetTable.classList.remove('currentassetTable');
        rightArrow.style.backgroundImage = 'url("image/longarrowright.png")'

    }

})

returntablePB.addEventListener('click', function() {
    returntablePB.classList.add('currentreturntablePB')
    if (returntablePB.classList.contains('currentreturntablePB')) {

        //console.log('1111');
        policyinvest.classList.add('currentpolicyinvest')
        bankinvest.classList.add('currentbankinvest')
        assetTable.classList.remove('currentassetTable')
        rightArrow.style.backgroundImage = 'url("image/longarrowright.png")'

    }

})

assetTable.addEventListener('click', function() {
    assetTable.classList.add('currentassetTable')
    if (assetTable.classList.contains('currentassetTable')) {
        policyinvest.classList.add('currentpolicyinvest')
        bankinvest.classList.add('currentbankinvest')
        returntablePB.classList.add('currentreturntablePB')
        rightArrow.style.backgroundImage = 'url("image/longarrowright.png")'

    }

})


var navList = document.getElementsByClassName('tabListNav')
console.log(navList);
var formList = document.getElementsByClassName('clientForm')
console.log(formList);
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
        formNumber.innerHTML = i + 1 + '/5'

    })
}

var rightArrow = document.querySelector('.rightArrow')
var leftArrow = document.querySelector('leftArrow')
var innerTitle = document.getElementsByClassName('innerTitle')
console.log(innerTitle);
rightArrow.addEventListener('click', function() {

    for (let i = 0; i < navList.length; i++) {
        navList[i].index = i;

        if (navList[i].classList.contains('current') && formList[i].classList.contains('display')) {
            if (navList[i].index < 4) {
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
        if (navList[i].index == 4) {
            console.log('23');
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

var mortgage_detail = document.querySelector(".mortgage_detail");
var downArrow3 = document.querySelector('.downArrow3')
downArrow3.addEventListener('click', function() {
    mortgage_detail.classList.toggle("mortgage_detail_show")
})


var int_rate_select = document.getElementById("int_rate");
console.log(int_rate_select);
var initialValue = 1.00;
var interval = 0.25;
var maxValue = 6.00;

for (var i = initialValue; i <= maxValue; i += interval) {
    var option = document.createElement('option');
    var optionText = i.toFixed(2) + '%';
    option.value = optionText;
    option.innerHTML = optionText;
    //console.log(option);
    int_rate_select.appendChild(option);

}

var int_rate_select = document.getElementById("int_yield");
//console.log(int_rate_select);
var initialValue = 3.00;
var interval = 0.25;
var maxValue = 6.00;

for (var i = initialValue; i <= maxValue; i += interval) {
    var option = document.createElement('option');
    var optionText = i.toFixed(2) + '%';
    option.value = optionText;
    option.innerHTML = optionText;
    //console.log(option);
    int_yield.appendChild(option);

}

var interestTableBody = document.querySelector('.interestTableBody');
var interestPay = document.querySelector('.interestPay');
var year_i = interestPay.querySelector('.year_i');

// Clone the initial row
var cloneRow = interestPay.cloneNode(true);

for (var i = 2; i <= 30; i++) {
    var newRow = cloneRow.cloneNode(true);
    var newRowYear = newRow.querySelector('.year_i');
    newRowYear.innerHTML = i;
    interestTableBody.appendChild(newRow);
}
var returntablePBBody = document.querySelector('.returntablePBBody');
var returnDetail = document.querySelector('.returnDetail');

for (var i = 2; i <= 30; i++) {
    var cloneRow = returnDetail.cloneNode(true);
    var newRow = cloneRow.cloneNode(true);
    var newRowYear = newRow.querySelector('.year_bs');
    newRowYear.innerHTML = i;
    returntablePBBody.appendChild(newRow);
}
var pmt_table_tr = document.querySelector('.pmt_table_tr');
var pmt_table = document.querySelector('.pmt_table');



for (var i = 1; i <= 30; i++) {
    var clonedRow = pmt_table_tr.cloneNode(true);
    var yearEndDiv = clonedRow.querySelector('.year_end');
    var mortgagePaymentDiv = clonedRow.querySelector('.mortgage_payment');
    var remainLoanDiv = clonedRow.querySelector('.remain_loan_in_year');

    yearEndDiv.innerHTML = i;
    mortgagePaymentDiv.innerHTML = '';
    remainLoanDiv.innerHTML = '';

    pmt_table.appendChild(clonedRow);
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

var hidden_btn = document.querySelector(".hidden_btn")
var detail_btn = document.querySelector(".detail_btn")
var pmt_detail = document.querySelector(".pmt_detail")
detail_btn.addEventListener("click", function() {
    pmt_detail.style.display = 'block'
})
hidden_btn.addEventListener("click", function() {
    pmt_detail.style.display = 'none'
})

var hidden_btn = document.querySelector(".hidden_btn1")
var detail_btn = document.querySelector(".detail_btn1")
var total_portion_detail = document.querySelector(".total_portion_detail")
detail_btn.addEventListener("click", function() {
    total_portion_detail.style.display = 'block'
})
hidden_btn.addEventListener("click", function() {
    total_portion_detail.style.display = 'none'
})
var hidden_btn = document.querySelector(".hidden_btn2")
var detail_btn = document.querySelector(".detail_btn2")
var financing_int_detail = document.querySelector(".financing_int_detail")
detail_btn.addEventListener("click", function() {
    financing_int_detail.style.display = 'block'
    financing_int_detail.style.zIndex = '20'
})
hidden_btn.addEventListener("click", function() {
    financing_int_detail.style.display = 'none'
})
</script>

<script>
//console.log('23');


// var username = getCookieValue("username");
// console.log(username);
const cash_investmentInput = document.querySelector(
    ".cash_investmentInput input"
);
const property_value_pbInput = document.querySelector(
    ".property_value_pbInput input"
);
const mortgage_percent_pbInput = document.querySelector(
    ".mortgage_percent_pbInput input"
);
const mortgage_amount_pbInput = document.querySelector(
    ".mortgage_amount_pbInput input"
);
const policy_value_pbInput = document.querySelector(
    ".policy_value_pbInput input"
);
const policy_percent_pbInput = document.querySelector(
    ".policy_percent_pbInput input"
);
const policy_financing_pbInput = document.querySelector(
    ".policy_financing_pbInput input"
);
const payment_yearInput = document.querySelector(".payment_yearInput input");
const mortgage_amount_mInput = document.querySelector(
    ".mortgage_amount_mInput input"
);
const property_value_mInput = document.querySelector(
    ".property_value_mInput input"
);
const mortgage_percent_mInput = document.querySelector(
    ".mortgage_percent_mInput input"
);
const total_investmentInput = document.querySelector(
    ".total_investmentInput input"
);

const pb_percentInput = document.querySelector(".pb_percentInput input");
const pb_partInput = document.querySelector(".pb_partInput input");
const pf_percentInput = document.querySelector(".pf_percentInput input");
const pf_partInput = document.querySelector(".pf_partInput input");
const ageIput = document.querySelector(".ageInput input");
const up_limitInput = document.querySelector(".up_limitInput input");

const int_rate_mInput = document.querySelector(".int_rate_mInput input");
const pmtInput = document.querySelector(".pmtInput input");
const year_endInput = document.getElementsByClassName("year_end");
const mortgage_paymentInput =
    document.getElementsByClassName("mortgage_payment");
const remain_loan_in_yearInput = document.getElementsByClassName(
    "remain_loan_in_year"
);
const pmt_tr = document.getElementsByClassName("pmt_table_tr");

const selectPlan = document.querySelector(".selectPlan");
const plan = document.querySelector('.selectPlan');
const d1_total_premiumInput = document.querySelector(".d1_total_premiumInput");
const financing_ratioInput = document.querySelector(".financing_ratioInput");
const d1_discounted_premiumInput = document.querySelector(
    ".d1_discounted_premiumInput"
);
const d1_svInput = document.querySelector(".d1_svInput");
const policy_discount_rateInput = document.querySelector(
    ".policy_discount_rateInput"
);
const client_portionInput = document.querySelector(".client_portionInput");
const client_portion_percentageInput = document.querySelector(
    ".client_portion_percentage"
);
const total_portionInput = document.querySelector(".total_portionInput");
const bank_portionInput = document.querySelector(".bank_portionInput");
const bank_portion_percentageInput = document.querySelector(
    ".bank_portion_percentage"
);
const welcome_bonusInput = document.querySelector(".welcome_bonusInput");
const bonus_amountInput = document.querySelector(".bonus_amountInput");
const discount_amountInput = document.querySelector(".discount_amountInput");
const couponInput = document.querySelector(".couponInput");
const total_bonusInput = document.querySelector(".total_bonusInput");
const leverage_rateInput = document.querySelector(".leverage_rateInput");
const pb_part1Input = document.querySelector(".pb_part1Input");
const LTVInput = document.querySelector(".LTVInput");
const LTV_maxInput = document.querySelector(".LTV_maxInput");
const multiplierInput = document.querySelector(".multiplierInput");
const od_amountInput = document.querySelector(".od_amountInput");
const total_investment_pbInput = document.querySelector(
    ".total_investment_pbInput"
);
const investment_yieldInput = document.querySelector(".investment_yieldInput");
const investment_returnInput = document.querySelector(
    ".investment_returnInput"
);
const financing_rateInput = document.querySelector(".financing_rateInput");
const financing_intInput = document.querySelector(".financing_intInput");
const mgt_fee_rateInput = document.querySelector(".mgt_fee_rateInput");
const mgt_feeInput = document.querySelector(".mgt_feeInput");
const select_int_rate = document.getElementsByClassName("select_int_rate");
const annual_int_paidInput = document.getElementsByClassName("annual_int_paid");
const select_int_yield = document.getElementsByClassName("select_int_yield");
const annual_int_returnInput =
    document.getElementsByClassName("annual_int_return");
const net_returnInput = document.getElementsByClassName("net_return");
const policy_value_bsInput = document.getElementsByClassName("policy_value_bs");

const investment_pbInput = document.getElementsByClassName("investment_pb");
const total_loanInput = document.getElementsByClassName("total_loan");
const capitalInput = document.getElementsByClassName("capital");
const policy_bonusInput = document.getElementsByClassName("policy_bonus");
const accum_npInput = document.getElementsByClassName("accum_np");
const total_returnInput = document.getElementsByClassName("total_return");
const total_return_rateInput =
    document.getElementsByClassName("total_return_rate");
const aver_return_rateInput =
    document.getElementsByClassName("aver_return_rate");
const year_bs = document.getElementsByClassName("year_bs");
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
const detail_mortgage_amount_pb = document.querySelector(
    ".detail_mortgage_amount_pb"
);
const detail_policy_value_pb = document.querySelector(
    ".detail_policy_value_pb"
);
const detail_od_amount = document.querySelector(".detail_od_amount");
const detail_bank_portion = document.querySelector(".detail_bank_portion");
const detail_financing_rate = document.querySelector(".detail_financing_rate");
const detail_PMT = document.querySelector(".detail_PMT");
const detail_financing_int = document.querySelector(".detail_financing_int");
const clientName = document.querySelector(".clientNameInput input");
console.log(clientName);

var urlParams = new URLSearchParams(window.location.search);
var currentClient = urlParams.get('clientNum');
//clientNum.value = currentClient;
//console.log(currentClient);

var url = new URL(config.apiUrl + '/getClientFormPB');
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
            clientName.value = clientData.clientName;
            cash_investmentInput.value = clientData.cash_investment;
            property_value_pbInput.value = clientData.property_value_pb;
            mortgage_percent_pbInput.value = parseFloat(clientData.mortgage_percent_pb);
            policy_value_pbInput.value = clientData.policy_value_pb;
            policy_percent_pbInput.value = clientData.policy_percent_pb;
            total_investmentInput.value = clientData.total_investment;
            total_investment_pbInput.value = clientData.total_investment_pb;;
            pb_partInput.value = clientData.pb_part;
            pb_percentInput.value = clientData.pb_percent;
            property_value_mInput.value = clientData.property_value_m;
            mortgage_amount_mInput.value = clientData.mortgage_amount_m;
            mortgage_percent_mInput.value = clientData.mortgage_percent_m;
            int_rate_mInput.value = clientData.int_rate_m;
            ageIput.value = clientData.age;
            up_limitInput.value = clientData.up_limit;
            pmtInput.value = clientData.pmt;
            selectPlan.value = clientData.plan;
            financing_ratioInput.value = clientData.financing_ratio;
            welcome_bonusInput.value = clientData.welcome_bonus;
            couponInput.value = clientData.coupon;
            int_rate_arr = clientData.int_rate.split(',');
            console.log(int_rate_arr);
            console.log(select_int_rate);
            for (let i = 0; i < select_int_rate.length; i++) {
                select_int_rate[i].value = int_rate_arr[i];
                console.log(int_rate_arr[i]);
            }
            multiplierInput.value = parseFloat(clientData.multiplier);
            investment_yieldInput.value = parseFloat(clientData.investment_yield);
            financing_rateInput.value = parseFloat(clientData.financing_rate);
            mgt_fee_rateInput.value = parseFloat(clientData.mgt_fee_rate);
            int_yield_arr = clientData.int_yield.split(',');
            console.log(int_yield_arr);
            for (let i = 0; i < select_int_yield.length; i++) {
                select_int_yield[i].value = int_yield_arr[i];
            }



            updateFinancingInt();


            function getTotalPortion() {
                const url = new URL(config.apiUrl + "/getTotalPortion");
                url.searchParams.append("selected_plan", selectPlan.value);
                fetch(url, {
                        headers: {
                            "Content-Type": "application/json",
                        },
                    })
                    .then((response) => {
                        if (response.ok) {
                            // Parse the JSON response
                            return response.json();
                        } else {
                            throw new Error("Error");
                        }
                    })
                    .then((data) => {
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
                        // console.log(
                        //   "policy_discount_rateInput.value:",
                        //   policy_discount_rateInput.value
                        // );
                        updateClientPortion();
                        updateFinancingInt();
                        updateTotalPortionDetail()
                    })
                    .catch((error) => {
                        console.error("An error occurred:", error);
                    });
            };
            getTotalPortion()




            updateMortgageAmount()

        }
    })

    .catch(error => {
        console.error('An error occurred:', error);
    });






document.cookie = "userName=" + encodeURIComponent(username);
var form = document.getElementById('pbform');
var formData = new FormData(form);
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

console.log(config.apiUrl); // Assuming 'config.apiUrl' is defined and contains the correct URL

var urlParams = new URLSearchParams(window.location.search);
var currentPage = urlParams.get('clientNum');
console.log(currentPage);
var clientNum = document.querySelector('.clientNum')
clientNum.value = currentPage;

objXMLHttpRequest.open('POST', 'cal.php/saveEdit');
objXMLHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//post the username and pagenumber to php
objXMLHttpRequest.send(FormData);

var exportBtn = document.querySelector(".exportBtn")
exportBtn.addEventListener("click", function() {
    window.print()
})
var logout = document.querySelector('.logout');
logout.addEventListener("click", function() {
    document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    window.location.href = 'https://www.premfihk.com/'

})
</script>
<script src="calPBClient.js"></script>

</html>