let total_value_b = [];
let cashInvestment;
let property_value_pb;
let mortgage_percent_pb;
let mortgage_amount_pb;
let policy_value_pb;
let policy_percent_pb;
let policy_financing_pb;
let mortgage_amount_m;
let property_value_m;
let mortgage_percent_m;
let total_investment;
let pb_percent;
let pb_part;
let pf_part;
let pf_percent;
let age;
let up_limit;
let payment_year;
let n;
let int_rate_m;
let pmt;
let int_rate_momthly_m;
let year_end;
let mortgage_payment;
let remain_loan_in_year;
let d1_total_premium;
let financing_ratio;
let d1_discounted_premium;
let d1_sv;
let policy_discount_rate;
let client_portion;
let client_portion_percentage;
let total_portion;
let bank_portion;
let bank_portion_percentage;
let welcome_bonus;
let bonus_amount;
let discount_amount;
let coupon;
let total_bonus;
let leverage_rate;
let pb_part1;
let LTV;
let LTV_max;
let multiplier;
let od_amount;
let total_investment_pb;
let investment_yield;
let investment_return;
let financing_rate;
let financing_int;
let mgt_fee_rate;
let mgt_fee;
let int_rate;
let annual_int_paid;
let int_yield;
let annual_int_return;
let net_return;
let policy_value_bs;
let investment_pb;
let total_loan;
let capital;
let policy_bonus;
let accum_np;
let total_return;
let total_return_rate;
let aver_return_rate;
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

function updateMortgageAmount() {
  //console.log("124");
  let property_value_pb =
    parseFloat(property_value_pbInput.value.replace(/,/g, "")) || 0;
  //console.log(property_value_pbInput.value);
  let mortgage_percent_pb = parseFloat(mortgage_percent_pbInput.value) || 0;
  let mortgage_amount_pb = (
    property_value_pb *
    (mortgage_percent_pb / 100)
  ).toFixed(2);
  mortgage_amount_pbInput.value =
    parseFloat(mortgage_amount_pb).toLocaleString();
  //console.log(mortgage_amount_pbInput.value);
}

function updatePolicyFinancingPB() {
  policy_value_pb =
    parseFloat(policy_value_pbInput.value.replace(/,/g, "")) || 0;
  policy_percent_pb = parseFloat(policy_percent_pbInput.value) || 0;
  policy_financing_pb = (policy_value_pb * (policy_percent_pb / 100)).toFixed(
    2
  );
  policy_financing_pbInput.value =
    parseFloat(policy_financing_pb).toLocaleString();
}

function updateMortgageAmountM() {
  let property_value_m =
    parseFloat(property_value_mInput.value.replace(/,/g, "")) || 0;
  //console.log(property_value_pbInput.value);
  let mortgage_percent_m = parseFloat(mortgage_percent_mInput.value) || 0;
  let mortgage_amount_m = (
    property_value_m *
    (mortgage_percent_m / 100)
  ).toFixed(2);
  mortgage_amount_mInput.value = parseFloat(mortgage_amount_m).toLocaleString();
}

function updateTotalInvestment() {
  updateMortgageAmount();
  updateMortgageAmountM();
  updatePolicyFinancingPB();
  //console.log(parseFloat(policy_financing_pbInput.value));
  cashInvestment =
    parseFloat(cash_investmentInput.value.replace(/,/g, "")) || 0;
  for (let i = 0; i < capitalInput.length; i++) {
    capitalInput[i].value = cashInvestment.toLocaleString();
  }
  total_investment = (
    parseFloat(mortgage_amount_mInput.value.replace(/,/g, "")) +
    parseFloat(mortgage_amount_pbInput.value.replace(/,/g, "")) +
    parseFloat(policy_financing_pbInput.value.replace(/,/g, "")) +
    cashInvestment
  ).toFixed(2);
  total_investmentInput.value = parseFloat(total_investment).toLocaleString();
  pb_percent = parseFloat(pb_percentInput.value) || 0;
  pb_part = ((pb_percent / 100) * total_investment).toFixed(2);
  pb_partInput.value = parseFloat(pb_part).toLocaleString();
  pb_part1Input.value = parseFloat(pb_part).toLocaleString();
  pf_percent = (100 - pb_percent).toFixed(2);
  pf_percentInput.value = pf_percent;
  pf_part = ((pf_percent / 100) * total_investment).toFixed(2);
  pf_partInput.value = parseFloat(pf_part).toLocaleString();
  updateClientPortion();
  updateTotalBonus();
  //updateInvestmentReturn();
}

function updatePaymentYear() {
  age = parseFloat(ageIput.value) || 0;
  up_limit = parseFloat(up_limitInput.value) || 0;
  payment_year = up_limit - age;
  if (payment_year > 30) {
    payment_year = 30;
    payment_yearInput.value = parseFloat(payment_year).toLocaleString();
  } else if (payment_year >= 0) {
    payment_year = payment_year;
    payment_yearInput.value = parseFloat(payment_year).toLocaleString();
  } else {
    payment_year = 0;
    payment_yearInput.value = parseFloat(payment_year).toLocaleString();
  }
}

function updatePMT() {
  updatePaymentYear();
  const payment_year =
    parseFloat(payment_yearInput.value.replace(/,/g, "")) || 0;
  const n = payment_year * 12;
  const int_rate_m = parseFloat(int_rate_mInput.value) || 0;
  const int_rate_monthly_m = int_rate_m / 12 / 100;
  const mortgage_amount_m =
    parseFloat(mortgage_amount_mInput.value.replace(/,/g, "")) || 0;
  const numerator =
    mortgage_amount_m *
    int_rate_monthly_m *
    Math.pow(1 + int_rate_monthly_m, n);
  const denominator = Math.pow(1 + int_rate_monthly_m, n);
  const pmt = numerator / (denominator - 1) || 0;
  pmtInput.value = parseFloat(pmt.toFixed(2)).toLocaleString();

  for (let i = 1; i <= payment_year; i++) {
    const months = i * 12;
    const remaining_loan = (
      mortgage_amount_m * Math.pow(1 + int_rate_monthly_m, months) -
      (pmt * (Math.pow(1 + int_rate_monthly_m, months) - 1)) /
        int_rate_monthly_m
    ).toFixed(2);
    remain_loan_in_yearInput[i].innerHTML =
      parseFloat(remaining_loan).toLocaleString();
    remain_loan_in_yearInput[0].innerHTML =
      parseFloat(mortgage_amount_m).toLocaleString();
    mortgage_payment = pmt * 12;
    mortgage_paymentInput[0].innerHTML = "0";
    mortgage_paymentInput[i].innerHTML = parseFloat(
      mortgage_payment.toFixed(2)
    ).toLocaleString();

    //console.log(i + " year(s): " + remaining_loan);
  }
}

function updateClientPortion() {
  total_investment =
    parseFloat(total_investmentInput.value.replace(/,/g, "")) || 0;
  pf_percent = parseFloat(pf_percentInput.value) || 0;
  client_portion = (total_investment * (pf_percent / 100)).toFixed(2);
  client_portionInput.value = parseFloat(client_portion).toLocaleString();
  //client_portion_percentage:
  financing_ratio = parseFloat(financing_ratioInput.value) / 100 || 0;
  //console.log(typeof financing_ratio);
  d1_sv = parseFloat(d1_svInput.value.replace(/,/g, "")) || 0;
  //console.log(d1_sv);
  d1_total_premium =
    parseFloat(d1_total_premiumInput.value.replace(/,/g, "")) || 0;
  client_portion_percentage = (
    (1 - (financing_ratio * d1_sv) / d1_total_premium) *
    100
  ).toFixed(2);
  client_portion_percentageInput.value = client_portion_percentage;
  //total_portion:
  total_portion = (client_portion / (client_portion_percentage / 100)).toFixed(
    2
  );
  total_portionInput.value = parseFloat(total_portion).toLocaleString();
  //bank_portion:
  bank_portion = (total_portion - client_portion).toFixed(2) || 0;
  bank_portionInput.value = parseFloat(bank_portion).toLocaleString();
  bank_portion_percentage = 100.0 - client_portion_percentage;
  bank_portion_percentageInput.value = bank_portion_percentage.toFixed(2);
  //discount amount:
  policy_discount_rate = parseFloat(policy_discount_rateInput.value) || 0;
  discount_amount = (policy_discount_rate * total_portion).toFixed(2);
  discount_amountInput.value = parseFloat(discount_amount).toLocaleString();
  //policy_value_bs
  for (let i = 0; i < policy_value_bsInput.length; i++) {
    //console.log(i + ":" + total_value_b[i]);
    total_portion = parseFloat(total_portionInput.value.replace(/,/g, "")) || 0;
    d1_discounted_premium =
      parseFloat(d1_discounted_premiumInput.value.replace(/,/g, "")) || 0;
    let total_valueB = total_value_b[i];
    policy_value_bs = (
      (total_portion / d1_discounted_premium) *
      total_valueB
    ).toFixed(2);
    //console.log(policy_value_bs);
    policy_value_bsInput[i].value =
      parseFloat(policy_value_bs).toLocaleString();
  }
}

function updateTotalBonus() {
  updateClientPortion();
  //bonus_amount
  welcome_bonus = parseFloat(
    welcome_bonusInput.value.replace(/,/g, "")
  ).toFixed(2);
  total_portion = parseFloat(total_portionInput.value.replace(/,/g, "")) || 0;
  bonus_amount = ((total_portion * welcome_bonus) / 100).toFixed(2) || 0;
  bonus_amountInput.value = parseFloat(bonus_amount).toLocaleString();
  //total_bonus
  coupon = parseFloat(couponInput.value.replace(/,/g, "")) || 0;
  bonus_amount = parseFloat(bonus_amountInput.value.replace(/,/g, "")) || 0;
  discount_amount =
    parseFloat(discount_amountInput.value.replace(/,/g, "")) || 0;
  total_bonus = (bonus_amount + discount_amount + coupon).toFixed(2);
  total_bonusInput.value = parseFloat(total_bonus).toLocaleString();
  for (let i = 0; i < policy_bonusInput.length; i++) {
    policy_bonusInput[i].value = parseFloat(total_bonus).toLocaleString();
  }

  client_portion = parseFloat(client_portionInput.value.replace(/,/g, "")) || 0;
  //leverage_rate
  leverage_rate = (total_portion / (client_portion - total_bonus)).toFixed(2);
  leverage_rateInput.value = leverage_rate;
}

function updateInvestmentReturn() {
  updateTotalInvestment();
  multiplier = parseFloat(multiplierInput.value) || 0;
  pb_part1 = parseFloat(pb_part1Input.value.replace(/,/g, "")) || 0;
  od_amount = (pb_part1 * multiplier - pb_part1).toFixed(2);
  od_amountInput.value = parseFloat(od_amount).toLocaleString();
  total_investment_pb = (parseFloat(pb_part1) + parseFloat(od_amount)).toFixed(
    2
  );
  //console.log(total_investment_pb);
  total_investment_pbInput.value =
    parseFloat(total_investment_pb).toLocaleString();
  for (let i = 0; i < investment_pbInput.length; i++) {
    investment_pbInput[i].value =
      parseFloat(total_investment_pb).toLocaleString();
  }

  //mgt_fee
  mgt_fee_rate = parseFloat(mgt_fee_rateInput.value) || 0;
  mgt_fee = ((mgt_fee_rate / 100) * total_investment_pb).toFixed(2);
  //console.log(mgt_fee);
  mgt_feeInput.value = parseFloat(mgt_fee).toLocaleString();
  //investment_return
  investment_yield = parseFloat(investment_yieldInput.value) || 0;
  investment_return = ((total_investment_pb * investment_yield) / 100).toFixed(
    2
  );
  investment_returnInput.value = parseFloat(investment_return).toLocaleString();
  for (let i = 0; i < select_int_yield.length; i++) {
    int_yield = parseFloat(select_int_yield[i].value) || 0;
    //console.log(int_yield);
    total_investment_pb =
      parseFloat(total_investment_pbInput.value.replace(/,/g, "")) || 0;
    annual_int_return = (total_investment_pb * (int_yield / 100)).toFixed(2);
    annual_int_returnInput[i].value =
      parseFloat(annual_int_return).toLocaleString();
  }
}

function updateMax() {
  LTV = parseFloat(LTVInput.value) || 0;
  LTV_max = (1 / (1 - LTV / 100)).toFixed(2);
  LTV_maxInput.value = LTV_max;
}
updateMax();

function updateFinancingInt() {
  updateInvestmentReturn();
  updateClientPortion();
  updatePMT();
  mortgage_amount_pb =
    parseFloat(mortgage_amount_pbInput.value.replace(/,/g, "")) || 0;
  detail_mortgage_amount_pb.innerHTML =
    parseFloat(mortgage_amount_pb).toLocaleString();
  policy_financing_pb =
    parseFloat(policy_financing_pbInput.value.replace(/,/g, "")) || 0;
  detail_policy_value_pb.innerHTML =
    parseFloat(policy_financing_pb).toLocaleString();
  od_amount = parseInt(od_amountInput.value.replace(/,/g, "")) || 0;
  detail_od_amount.innerHTML = parseFloat(od_amount).toLocaleString();
  bank_portion = parseFloat(bank_portionInput.value.replace(/,/g, "")) || 0;
  //console.log(bank_portion);
  detail_bank_portion.innerHTML = parseFloat(
    bank_portion.toFixed(0)
  ).toLocaleString();
  financing_rate = parseFloat(financing_rateInput.value) || 0;
  detail_financing_rate.innerHTML = parseFloat(financing_rate);
  pmt = parseFloat(pmtInput.value.replace(/,/g, "")) || 0;
  detail_PMT.innerHTML = parseFloat((pmt * 12).toFixed(0)).toLocaleString();
  financing_int = (
    (parseFloat(mortgage_amount_pb) +
      parseFloat(policy_financing_pb) +
      parseFloat(od_amount) +
      parseFloat(bank_portion)) *
      (financing_rate / 100) +
    parseFloat(pmt) * 12
  ).toFixed(0);
  financing_intInput.value = parseFloat(financing_int).toLocaleString();
  detail_financing_int.innerHTML = parseFloat(financing_int).toLocaleString();
  //annual_int_return

  for (let i = 0; i < total_loanInput.length; i++) {
    mortgage_amount_pb =
      parseFloat(mortgage_amount_pbInput.value.replace(/,/g, "")) || 0;
    policy_financing_pb =
      parseFloat(policy_financing_pbInput.value.replace(/,/g, "")) || 0;
    od_amount = parseInt(od_amountInput.value.replace(/,/g, "")) || 0;
    bank_portion = parseFloat(bank_portionInput.value.replace(/,/g, "")) || 0;
    remain_loan =
      parseFloat(remain_loan_in_yearInput[i + 1].innerHTML.replace(/,/g, "")) ||
      0;
    total_loan = (
      mortgage_amount_pb +
      policy_financing_pb +
      remain_loan +
      od_amount +
      bank_portion
    ).toFixed(2);
    total_loanInput[i].value = parseFloat(total_loan).toLocaleString();
  }
  updateAnnuaIntPaid();
  updateNetReturn();
  for (let i = 0; i < total_returnInput.length; i++) {
    policy_value_bs =
      parseFloat(policy_value_bsInput[i].value.replace(/,/g, "")) || 0;
    investment_pb =
      parseFloat(investment_pbInput[i].value.replace(/,/g, "")) || 0;
    total_loan = parseFloat(total_loanInput[i].value.replace(/,/g, "")) || 0;
    capital = parseFloat(capitalInput[i].value.replace(/,/g, "")) || 0;
    policy_bonus =
      parseFloat(policy_bonusInput[i].value.replace(/,/g, "")) || 0;
    accum_np = parseFloat(accum_npInput[i].value.replace(/,/g, "")) || 0;
    total_return = (
      policy_value_bs +
      investment_pb -
      total_loan -
      capital +
      policy_bonus +
      accum_np
    ).toFixed(2);
    total_returnInput[i].value = parseFloat(total_return).toLocaleString();
    cashInvestment =
      parseFloat(cash_investmentInput.value.replace(/,/g, "")) || 0;
    total_return_rate = ((total_return / cashInvestment) * 100).toFixed(2);
    total_return_rateInput[i].value = total_return_rate;
    year = parseFloat(year_bs[i].innerHTML);
    aver_return_rate = (total_return_rate / year).toFixed(2);
    aver_return_rateInput[i].value =
      parseFloat(aver_return_rate).toLocaleString();
  }
}

function updateAnnuaIntPaid() {
  //updateFinancingInt();
  mortgage_amount_pb =
    parseFloat(mortgage_amount_pbInput.value.replace(/,/g, "")) || 0;
  policy_financing_pb =
    parseFloat([policy_financing_pbInput.value.replace(/,/g, "")]) || 0;
  od_amount = parseFloat(od_amountInput.value.replace(/,/g, "")) || 0;
  bank_portion = parseFloat(bank_portionInput.value.replace(/,/g, "")) || 0;
  mgt_fee = parseFloat(mgt_feeInput.value.replace(/,/g, "")) || 0;
  pmt = parseFloat(pmtInput.value.replace(/,/g, "")) || 0;

  // console.log(mgt_fee);

  for (let i = 0; i < select_int_rate.length; i++) {
    int_rate = parseFloat(select_int_rate[i].value);
    //console.log(int_rate);
    annual_int_paid = (
      (mortgage_amount_pb + policy_financing_pb + od_amount + bank_portion) *
        (int_rate / 100) +
      mgt_fee +
      pmt
    ).toFixed(2);
    annual_int_paidInput[i].value =
      parseFloat(annual_int_paid).toLocaleString();
  }
}

function updateNetReturn() {
  net_return = 0;
  for (let i = 0; i < net_returnInput.length; i++) {
    annual_int_return =
      parseFloat(annual_int_returnInput[i].value.replace(/,/g, "")) || 0;
    //console.log(annual_int_return);
    annual_int_paid =
      parseFloat(annual_int_paidInput[i].value.replace(/,/g, "")) || 0;
    let net_return_year = (annual_int_return - annual_int_paid).toFixed(2);
    net_return = parseFloat(net_return);
    net_return += parseFloat(net_return_year);
    //console.log(i + ":" + net_return);
    net_returnInput[i].value = parseFloat(net_return)
      .toFixed(2)
      .toLocaleString();
    accum_npInput[i].value = parseFloat(net_return.toFixed(2)).toLocaleString();
  }
}
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
    detail_total_value = (parseFloat(total_value_detail[i]) * multi).toFixed(2);
    //console.log(detail_total_value);
    detail_total_valueInput[i].innerHTML =
      parseFloat(detail_total_value).toLocaleString();

    detail_total_premium = (
      parseFloat(total_premium_detail[i]) * multi
    ).toFixed(2);
    detail_total_premiumInput[i].innerHTML =
      parseFloat(detail_total_premium).toLocaleString();

    detail_GCV = (parseFloat(GCV_detail[i]) * multi).toFixed(2);
    detail_GCVInpput[i].innerHTML = parseFloat(detail_GCV).toLocaleString();

    detail_term_div = (parseFloat(term_div_detail[i]) * multi).toFixed(2);
    detail_term_divInput[i].innerHTML =
      parseFloat(detail_term_div).toLocaleString();

    detail_acc_div = (parseFloat(acc_div_detail[i]) * multi).toFixed(2);
    detail_acc_divInput[i].innerHTML =
      parseFloat(detail_acc_div).toLocaleString();
  }
}
property_value_pbInput.addEventListener("input", function () {
  var numericValue =
    parseFloat(property_value_pbInput.value.replace(/,/g, "")) || 0;
  property_value_pbInput.value = numericValue.toLocaleString();
  updateMortgageAmount();
  updateTotalInvestment();
  updateFinancingInt();
  updateTotalPortionDetail();
});

mortgage_percent_pbInput.addEventListener("input", function () {
  updateMortgageAmount();
  updateTotalInvestment();
  updateFinancingInt();
  updateTotalPortionDetail();
});
policy_value_pbInput.addEventListener("input", function () {
  var numericValue =
    parseFloat(policy_value_pbInput.value.replace(/,/g, "")) || 0;
  policy_value_pbInput.value = numericValue.toLocaleString();
  updatePolicyFinancingPB();
  updateTotalInvestment();
  updateFinancingInt();
  updateTotalPortionDetail();
});
policy_percent_pbInput.addEventListener("input", function () {
  updatePolicyFinancingPB();
  updateTotalInvestment();
  updateFinancingInt();
  updateTotalPortionDetail();
});

property_value_mInput.addEventListener("input", function () {
  var numericValue =
    parseFloat(property_value_mInput.value.replace(/,/g, "")) || 0;
  property_value_mInput.value = numericValue.toLocaleString();
  updateMortgageAmountM(), updateTotalInvestment(), updatePMT();
  updateFinancingInt();
  updateTotalPortionDetail();
});
mortgage_percent_mInput.addEventListener("input", function () {
  updateMortgageAmountM();
  updateTotalInvestment();
  updatePMT();
  updateFinancingInt();
  updateTotalPortionDetail();
});
cash_investmentInput.addEventListener("input", function () {
  var numericValue =
    parseFloat(cash_investmentInput.value.replace(/,/g, "")) || 0;
  cash_investmentInput.value = numericValue.toLocaleString();
  updateTotalInvestment();
  updateFinancingInt();
  updateTotalPortionDetail();
});
pb_percentInput.addEventListener("input", updateTotalInvestment);
ageIput.addEventListener("input", function () {
  updatePaymentYear();
  updatePMT();
  updateFinancingInt();
  updateTotalPortionDetail();
});
up_limitInput.addEventListener("input", function () {
  updatePaymentYear();
  updatePMT();
  updateFinancingInt();
  updateTotalPortionDetail();
});
int_rate_mInput.addEventListener("input", function () {
  updatePMT();
  updateFinancingInt();
});

selectPlan.addEventListener("change", function () {
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
      // console.log(
      //   "policy_discount_rateInput.value:",
      //   policy_discount_rateInput.value
      // );
      updateClientPortion();
      updateFinancingInt();
      updateTotalPortionDetail();
    })
    .catch((error) => {
      console.error("An error occurred:", error);
    });
});

financing_ratioInput.addEventListener("input", function () {
  updateClientPortion();
  updateTotalBonus();
  updateFinancingInt();
  updateTotalPortionDetail();
});
welcome_bonusInput.addEventListener("input", updateTotalBonus);
couponInput.addEventListener("input", function () {
  var numericValue = parseFloat(couponInput.value.replace(/,/g, "")) || 0;
  couponInput.value = numericValue.toLocaleString();
  updateTotalBonus();
});
multiplierInput.addEventListener("input", function () {
  updateInvestmentReturn();
  updateFinancingInt();
});
LTVInput.addEventListener("input", updateMax);
mgt_fee_rateInput.addEventListener("input", function () {
  updateInvestmentReturn();
  updateFinancingInt();
});
investment_yieldInput.addEventListener("input", function () {
  updateInvestmentReturn();
  updateFinancingInt();
});
financing_rateInput.addEventListener("input", updateFinancingInt);

for (let i = 0; i < select_int_rate.length; i++) {
  select_int_rate[i].addEventListener("change", function () {
    updateFinancingInt();
  });
}

for (let i = 0; i < select_int_yield.length; i++) {
  select_int_yield[i].addEventListener("change", function () {
    updateFinancingInt();
  });
}
