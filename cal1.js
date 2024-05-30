const cashInvestmentInput = document.querySelector(
  ".cash_investmentInput input"
);
const aumInput = document.querySelector(".aumInput input");
const clientPortionInput = document.querySelector(".client_portionInput");
const client_portion_percentagec = document.querySelector(
  ".client_portion_percentage"
);
const aum_intInput = document.querySelector(".aum_intInput input");
const annual_int_returnInput =
  document.getElementsByClassName("annual_int_return");
console.log(annual_int_returnInput);
const net_int_paid = document.getElementsByClassName("net_int_paid");
const annual_int_paid = document.getElementsByClassName("annual_int_paid");
const total_int_paid_p = document.getElementsByClassName("total_int_paid_p");
const welcome_bonusInput = document.querySelector(".welcome_bonusInput");

const couponInput = document.querySelector(".couponInput");
const int_rate_year = document.getElementsByClassName("select_int_rate");

const total_bonusInput = document.querySelector(".total_bonusInput");
const policy_value_p = document.getElementsByClassName("policy_value_p");
const gp_p = document.getElementsByClassName("gp_p");
const np_p = document.getElementsByClassName("np_p");
const year_np = document.getElementsByClassName("year_p");
console.log(year_np);
const total_return_rate = document.getElementsByClassName("total_return_rate");
const aver_return_rate = document.getElementsByClassName("aver_return_rate");

let gp;
let np;
let totalReturnRate;
let average_return;
let year;
console.log(annual_int_paid);
let net_int;
let annual_int_paid_year;
let cashInvestment; // Declare the cashInvestment variable
let aum;
let client_portion;
let financing_ratio;
let d1_sv;
let d1_total_premium;
let aum_int;
let annual_int_return;
let total_portion;
let select_int_rate;
let policy_value;
let welcome_bonus;
let bonus_amount;
let policy_discount_rate;
let discount_amount;
let coupon;
let total_bonus;

cashInvestmentInput.addEventListener("input", updateClientPortion(), calNp());
aumInput.addEventListener("input", function () {
  updateClientPortion();
  if (aumInput.value !== "") {
    updateAnnuaIntReturn();
    updateNetIntPaid();
  }
});
aum_intInput.addEventListener("input", updateAnnuaIntReturn);
financing_ratioInput.addEventListener("input", updateClientPortion);
d1_total_premiumInput.addEventListener("input", updateClientPortion);
d1_svInput.addEventListener("input", updateClientPortion);

total_portionInput.addEventListener("input", function () {
  const bank_portion =
    parseFloat(total_portionInput.value) - parseFloat(clientPortionInput.value);
  bank_portion_Input.value = bank_portion.toFixed(2);
  bank_portion_percentage.value = parseFloat(
    100 - client_portion_percentagec.value
  ).toFixed(2);
  const discount_amount =
    parseFloat(
      policy_discount_rateInput.value * total_portionInput.value
    ).toFixed(2) || 0;
  discount_amountInput.value = discount_amount;
  // Call the function to update leverage_rateInput
  updateleverage_rateInput();
  updatePolicyValue();
  calGp();
  calNp();
});

function updateClientPortion() {
  cashInvestment = parseFloat(cashInvestmentInput.value) || 0;
  aum = parseFloat(aumInput.value) || 0;
  financing_ratio = parseFloat(financing_ratioInput.value / 100) || 0;
  d1_sv = parseFloat(d1_svInput.value) || 0;
  d1_total_premium = parseFloat(d1_total_premiumInput.value) || 0;
  clientPortion = cashInvestment - aum;
  client_portion_percentagec.value =
    (1 - (financing_ratio * d1_sv) / d1_total_premium) * 100;

  clientPortionInput.value = clientPortion.toFixed(2);
  total_portionInput.value = parseFloat(
    clientPortionInput.value / (client_portion_percentagec.value / 100)
  ).toFixed(2);
  bank_portion_Input.value = parseFloat(
    total_portionInput.value - clientPortionInput.value
  ).toFixed(2);
  bank_portion_percentage.value = parseFloat(
    100 - client_portion_percentagec.value
  ).toFixed(2);

  console.log(clientPortionInput.value);
  const discount_amount =
    parseFloat(
      policy_discount_rateInput.value * total_portionInput.value
    ).toFixed(2) || 0;
  discount_amountInput.value = discount_amount;
  updateleverage_rateInput();

  for (let i = 0; i < annual_int_paid.length; i++) {
    select_int_rate = parseFloat(int_rate_year[i].value.slice(0, -1));
    annual_int_paid[i].value = (
      (select_int_rate / 100) *
      bank_portion_Input.value
    ).toFixed(2);
  }
  updateNetIntPaid();
  updatePolicyValue();
  calGp();
  calNp();
}

// ...

function updateAnnuaIntReturn() {
  const aum_int = parseFloat(aum_intInput.value) / 100 || 0;
  const aum = parseFloat(aumInput.value) || 0;

  const annual_int_return = aum_int * aum;
  console.log(annual_int_return);

  for (let i = 0; i < annual_int_returnInput.length; i++) {
    annual_int_returnInput[i].value = annual_int_return.toFixed(2);
  }
}

welcome_bonusInput.addEventListener("input", updateBonusAmount);
function updateBonusAmount() {
  const bonus_amount = (
    total_portionInput.value *
    (welcome_bonusInput.value / 100)
  ).toFixed(2);
  bonus_amountInput.value = bonus_amount;
}

function updateTotalBonus() {
  console.log(couponInput.value);

  const coupon = parseFloat(couponInput.value);
  //console.log(typeof coupon);
  // console.log(bonus_amountInput.value);
  const bonus_amount = parseFloat(bonus_amountInput.value);
  const discount_amount = parseFloat(discount_amountInput.value);
  total_bonusInput.value = parseFloat(
    coupon + bonus_amount + discount_amount
  ).toFixed(2);
  updateleverage_rateInput();
  calGp();
}

couponInput.addEventListener("input", updateTotalBonus);
bonus_amountInput.addEventListener("input", updateTotalBonus);
discount_amountInput.addEventListener("input", updateTotalBonus);

const leverage_rateInput = document.querySelector(".leverage_rateInput");
console.log(leverage_rateInput);

total_portionInput.addEventListener("input", updateleverage_rateInput);

function updateleverage_rateInput() {
  const clientPortion = parseFloat(clientPortionInput.value);
  const total_bonus = parseFloat(total_bonusInput.value);

  if (!isNaN(clientPortion) && !isNaN(total_bonus)) {
    leverage_rateInput.value = parseFloat(
      total_portionInput.value / (clientPortion - total_bonus)
    ).toFixed(2);
  } else {
  }
}

// clientPortionInput.addEventListener("input", updateleverage_rateInput);
// total_bonusInput.addEventListener("input", updateleverage_rateInput);

// const select_int_rate = document.getElementsByClassName("int_rate_year");

console.log(int_rate_year);

// bank_portion_Input.addEventListener("input", function () {

// });

// Add event listeners to int_rate_year elements
for (let i = 0; i < int_rate_year.length; i++) {
  int_rate_year[i].addEventListener("change", function () {
    console.log(int_rate_year[i].value);
    select_int_rate = parseFloat(int_rate_year[i].value.slice(0, -1));
    console.log(select_int_rate);
    console.log(bank_portion_Input.value);
    annual_int_paid[i].value = (
      bank_portion_Input.value *
      (select_int_rate / 100)
    ).toFixed(2);
    console.log(annual_int_paid[i].value);
    updateNetIntPaid();
  });
}

console.log(total_int_paid_p);
function updateNetIntPaid() {
  let net_int = 0; // Declare net_int outside the loop
  for (let i = 0; i < net_int_paid.length; i++) {
    const annual_int_return = parseFloat(annual_int_returnInput[i].value) || 0;
    const annual_int_paid_year = parseFloat(annual_int_paid[i].value) || 0;
    net_int_paid[i].value =
      parseFloat(annual_int_paid_year) - parseFloat(annual_int_return);
    net_int += parseFloat(net_int_paid[i].value);
    net_int_paid[i].value = net_int.toFixed(2); // Update the accumulated net value
    total_int_paid_p[i].value = net_int.toFixed(2);
  }
}

// for (let i = 0; i < select_int_rate[i].length; i++) {
//   select_int_rate[i].addEventListener("change", function () {
//     console.log(select_int_rate.value);
//   });

//console.log(policy_value_p);

function updatePolicyValue() {
  for (let i = 0; i < policy_value_p.length; i++) {
    policy_value = (
      (total_portionInput.value / d1_total_premiumInput.value) *
      total_value_b[i]
    ).toFixed(2);
    policy_value_p[i].value = policy_value;
  }
}

function calGp() {
  for (let i = 0; i < gp_p.length; i++) {
    total_bonus = parseFloat(total_bonusInput.value) || 0;
    policy_value = parseFloat(policy_value_p[i].value) || 0;
    total_portion = parseFloat(total_portionInput.value) || 0;
    gp = (policy_value - total_portion + total_bonus).toFixed(2);
    gp_p[i].value = gp;
  }
}

function calNp() {
  for (let i = 0; i < np_p.length; i++) {
    gp = parseFloat(gp_p[i].value) || 0;
    net_int = parseFloat(net_int_paid[i].value) || 0;
    np = (gp - net_int).toFixed(2);
    np_p[i].value = np;
    cashInvestment = parseFloat(cashInvestmentInput.value) || 0;
    totalReturnRate = (np / cashInvestment) * 100;
    total_return_rate[i].value = totalReturnRate.toFixed(2);
    year = parseFloat(year_np[i].innerHTML);
    average_return = (totalReturnRate / year).toFixed(2);
    aver_return_rate[i].value = average_return;
  }
}
