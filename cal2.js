//const year_p = document.getElementsByClassName("year_p");
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
//console.log(detail_total_valueInput);
let cash_investment;
let aum;
let aum_int;
let financing_ratio;
let client_portion;
let client_portion_percentage;
let bank_portion;
let bank_portion_percentage;
let total_portion;
let welcome_bonus;
let bonus_amount;
let policy_discount_rate;
let discount_amount;
let coupon;
let total_bonus;
let leverage_rate;
let d1_total_premium;
let d1_discounted_premium;
let d1_sv;
let int_rate;
let annual_int_paid;
let annual_int_return;
let net_int_paid;
let policy_value_p;
let gp_p;
let total_int_paid_p;
let np_p;
let total_return_rate;
let aver_return_rate;
let total_value_b = [];

let years;
let detail_year;
let detail_plan;
let detail_total_premium;
let detail_GCV;
let detail_acc_div;
let detail_term_div;
let detail_total_value;
let total_value_detail = [];
let total_premium_detail = [];
let acc_div_detail = [];
let term_div_detail = [];
let GCV_detail = [];
let multi;

function updateClientPortion() {
  cash_investment =
    parseFloat(cashInvestmentInput.value.replace(/,/g, "")) || 0;
  aum = parseFloat(aumInput.value.replace(/,/g, "")) || 0;
  client_portion = (cash_investment - aum).toFixed(0) || 0;
  clientPortionInput.value = parseFloat(client_portion).toLocaleString();
  financing_ratio = parseFloat(financing_ratioInput.value) || 0;
  //console.log(financing_ratio);
  d1_sv = parseFloat(d1_svInput.value.replace(/,/g, "")) || 0;
  //console.log(d1_svInput.value); // "80,000" (formatted value)
  d1_total_premium =
    parseFloat(d1_total_premiumInput.value.replace(/,/g, "")) || 0;
  //console.log(d1_total_premium);
  client_portion_percentage =
    (1 - ((financing_ratio / 100) * d1_sv) / d1_total_premium).toFixed(2) || 0;
  //console.log(client_portion_percentage);
  client_portion_percentageInput.value = (
    client_portion_percentage * 100
  ).toFixed(2);
  total_portion = (client_portion / client_portion_percentage).toFixed(0) || 0;
  total_portionInput.value = parseFloat(total_portion).toLocaleString();
  bank_portion_percentage =
    ((1 - client_portion_percentage) * 100).toFixed(2) || 0;
  bank_portion_percentageInput.value = bank_portion_percentage;
  bank_portion = (total_portion - client_portion).toFixed(0) || 0;
  bank_portion_Input.value = parseFloat(bank_portion).toLocaleString();
}

function updateBonusAmount() {
  updateClientPortion();
  welcome_bonus = parseFloat(welcome_bonusInput.value);
  total_portion = parseFloat(total_portionInput.value.replace(/,/g, "")) || 0;

  //console.log(total_portion);
  bonus_amount = (total_portion * (welcome_bonus / 100)).toFixed(0);
  //console.log(bonus_amount);
  bonus_amountInput.value = parseFloat(bonus_amount).toLocaleString();
  policy_discount_rate = parseFloat(policy_discount_rateInput.value) || 0;
  discount_amount = (total_portion * policy_discount_rate).toFixed(0);
  discount_amountInput.value = parseFloat(discount_amount).toLocaleString();
  coupon = parseFloat(couponInput.value.replace(/,/g, "")) || 0;
  total_bonus =
    (
      parseFloat(bonus_amount) +
      parseFloat(discount_amount) +
      parseFloat(coupon)
    ).toFixed(0) || 0;
  total_bonusInput.value = parseFloat(total_bonus).toLocaleString();
  leverage_rate = (total_portion / (client_portion - total_bonus)).toFixed(2);
  leverage_rateInput.value = leverage_rate;
}

function updateAnnuaIntReturn() {
  updateBonusAmount();
  let net_int = 0;
  bank_portion = parseFloat(bank_portion_Input.value.replace(/,/g, "")) || 0;
  for (let i = 0; i < annual_int_paidInput.length; i++) {
    int_rate = parseFloat(int_rate_year[i].value.slice(0, -1));
    annual_int_paid = ((bank_portion * int_rate) / 100).toFixed(0);
    annual_int_paidInput[i].value =
      parseFloat(annual_int_paid).toLocaleString();
    aum_int = parseFloat(aum_intInput.value) || 0;
    aum = parseFloat(aumInput.value.replace(/,/g, "")) || 0;
    annual_int_return = ((aum_int / 100) * aum).toFixed(0);
    annual_int_returnInput[i].value =
      parseFloat(annual_int_return).toLocaleString();
    let net_int_yearly = (annual_int_paid - annual_int_return).toFixed(0);
    net_int += parseFloat(net_int_yearly);
    net_int_paidInput[i].value = parseFloat(net_int).toLocaleString();
    total_portion = parseFloat(total_portionInput.value.replace(/,/g, "")) || 0;
    d1_total_premium =
      parseFloat(d1_total_premiumInput.value.replace(/,/g, "")) || 0;
    let total_value = parseFloat(total_value_b[i]) || 0;
    policy_value_p = ((total_portion / d1_total_premium) * total_value).toFixed(
      0
    );
    policy_value_pInput[i].value = parseFloat(policy_value_p).toLocaleString();
    total_bonus = parseFloat(total_bonusInput.value.replace(/,/g, "")) || 0;
    gp_p = (policy_value_p - total_portion + total_bonus).toFixed(0);
    gp_pInput[i].value = parseFloat(gp_p).toLocaleString();
    total_int_paid_pInput[i].value = parseFloat(net_int).toLocaleString();
    np_p = (parseFloat(gp_p) - parseFloat(net_int)).toFixed(0);
    np_pInput[i].value = parseFloat(np_p).toLocaleString();
    cash_investment =
      parseFloat(cashInvestmentInput.value.replace(/,/g, "")) || 0;
    total_return_rate = ((np_p / cash_investment) * 100).toFixed(2);
    total_return_rateInput[i].value =
      parseFloat(total_return_rate).toLocaleString();
    years = parseFloat(year_np[i].innerHTML);
    //console.log(years);
    aver_return_rate = (total_return_rate / years).toFixed(2);

    aver_return_rateInput[i].value = aver_return_rate;
  }
}
updateAnnuaIntReturn();

function updateTotalPortionDetail() {
  updateClientPortion();
  total_portion = parseFloat(total_portionInput.value.replace(/,/g, "")) || 0;
  console.log(total_portion);
  d1_total_premium =
    parseFloat(d1_total_premiumInput.value.replace(/,/g, "")) || 0;
  //console.log(typeof d1_total_premium);
  var multi = parseFloat(total_portion) / parseFloat(d1_total_premium);
  console.log(multi);

  for (let i = 0; i < detail_planInput.length; i++) {
    detail_planInput[i].innerHTML = plan.value;
    detail_total_value = (parseFloat(total_value_detail[i]) * multi).toFixed(0);
    //console.log(detail_total_value);
    detail_total_valueInput[i].innerHTML =
      parseFloat(detail_total_value).toLocaleString();

    detail_total_premium = (
      parseFloat(total_premium_detail[i]) * multi
    ).toFixed(0);
    detail_total_premiumInput[i].innerHTML =
      parseFloat(detail_total_premium).toLocaleString();

    detail_GCV = (parseFloat(GCV_detail[i]) * multi).toFixed(0);
    detail_GCVInpput[i].innerHTML = parseFloat(detail_GCV).toLocaleString();

    detail_term_div = (parseFloat(term_div_detail[i]) * multi).toFixed(0);
    detail_term_divInput[i].innerHTML =
      parseFloat(detail_term_div).toLocaleString();

    detail_acc_div = (parseFloat(acc_div_detail[i]) * multi).toFixed(0);
    detail_acc_divInput[i].innerHTML =
      parseFloat(detail_acc_div).toLocaleString();
  }
}
cashInvestmentInput.addEventListener("input", function () {
  var numericValue =
    parseFloat(cashInvestmentInput.value.replace(/,/g, "")) || 0;
  cashInvestmentInput.value = numericValue.toLocaleString();
  if (numericValue > 0) {
    updateClientPortion();
    updateAnnuaIntReturn();
    updateTotalPortionDetail();
  }
  //console.log(cashInvestmentInput.value);
});

aumInput.addEventListener("input", function () {
  var aum = parseFloat(aumInput.value.replace(/,/g, "")) || 0;
  aumInput.value = aum.toLocaleString();
  updateClientPortion();
  updateAnnuaIntReturn();
  updateTotalPortionDetail();
});

aum_intInput.addEventListener("input", function () {
  updateAnnuaIntReturn();
});

financing_ratioInput.addEventListener("input", function () {
  updateAnnuaIntReturn();
  updateTotalPortionDetail();
});

welcome_bonusInput.addEventListener("input", function () {
  updateBonusAmount();
  updateAnnuaIntReturn();
});

couponInput.addEventListener("input", function () {
  var coupon = parseFloat(couponInput.value.replace(/,/g, "")) || 0;
  couponInput.value = coupon.toLocaleString();
  updateBonusAmount();
  updateAnnuaIntReturn();
});

plan.addEventListener("change", function () {
  const url = new URL(config.apiUrl + "/getTotalPortion");
  url.searchParams.append("selected_plan", plan.value);
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
    .catch((error) => {
      console.error("An error occurred:", error);
    });
});

for (let i = 0; i < int_rate_year.length; i++) {
  int_rate_year[i].addEventListener("change", function () {
    updateAnnuaIntReturn();
  });
}
