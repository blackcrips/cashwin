// navigation bar
let tabs = document.querySelectorAll("[data-tab-target]");
let tabContents = document.querySelectorAll("[data-tab-content]");

tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    let target = document.querySelector(tab.dataset.tabTarget);
    tabContents.forEach((tabContent) => {
      tabContent.classList.remove("active");
    });
    tabs.forEach((tab) => {
      tab.classList.remove("active");
    });
    tab.classList.add("active");
    target.classList.add("active");
  });
});

// setting up birthday
let birthday = document.getElementById("birthday");
let birthdaySpan = document.getElementById("birthday-span");
let dateHire = document.getElementById("date-hire");
let dateHireSpan = document.getElementById("date-hire-span");

const m = moment();

birthday.onchange = () => {
  __dateKeyup(birthday.value, birthdaySpan);
};

birthday.addEventListener("keyup", () => {
  __dateKeyup(birthday.value, birthdaySpan);
});

function displayBirthday() {
  __dateKeyup(birthday.value, birthdaySpan);
}
displayBirthday();

dateHire.onchange = () => {
  __dateKeyup(dateHire.value, dateHireSpan);
};

dateHire.addEventListener("keyup", () => {
  __dateKeyup(dateHire.value, dateHireSpan);
});

function __dateKeyup(dateValue, dateSpan) {
  let dateInput = new moment(dateValue);
  let newBirthday = m.diff(dateInput, "years");

  if (isNaN(newBirthday) || newBirthday < 0) {
    dateSpan.innerHTML = "";
  } else if (newBirthday <= 20 || newBirthday >= 51) {
    dateSpan.innerHTML = `${newBirthday} Years old`;
    dateSpan.style.color = "Red";
  } else {
    dateSpan.innerHTML = `${newBirthday} Years old`;
    dateSpan.style.color = "yellow";
  }
}

// fetch data from database to create option button base on accredited bank accounts
let bankName = document.getElementById("bank-name");
let bankDetails = document.getElementById("destination-account");

bankName.onchange = function () {
  fetch("classes/dbhmodelbanks.class.php")
    .then((res) => res.json())
    .then((response) => {
      for (i = 0; i <= response.length; i++) {
        if (response[i].name == bankName.value) {
          return (bankDetails.value = response[i].destination_account);
        }
      }
    })
    .catch((error) => console.log(error));
};

// fetch data from database to create option button for alternate bank account base on accredited bank accounts
let alternateBankName = document.getElementById("alternate-bank-name");
let alternateBankDetails = document.getElementById(
  "alternate-destination-account"
);

alternateBankName.onchange = function () {
  fetch("../../classes/dbhmodelbanks.class.php")
    .then((res) => res.json())
    .then((response) => {
      for (i = 0; i <= response.length; i++) {
        if (response[i].name == alternateBankName.value) {
          return (alternateBankDetails.value = response[i].destination_account);
        }
      }
    })
    .catch((error) => console.log(error));
};

// getting data from database depending on input bank account number and return "RED" background in textbox if
// not the same as the bank given and green if input bank account number matched

let bankAccountNumber = document.getElementById("account-number");
let bankAccountCount = document.getElementById("account-number-count");
bankAccountNumber.addEventListener("keyup", () => {
  bankAccountCountIdentifier(bankName, bankAccountCount, bankAccountNumber);

  bankAccountCount.value = bankAccountNumber.value.length;
});

// getting data from database depending on input bank account number and return "RED" background in textbox if
// not the same as the bank given and green if input bank account number matched
// NOTE THAT THIS IS SAME CODE AS PRIMARY BANK ACCOUNT

let alternateBankAccountNumber = document.getElementById(
  "alternate-account-number"
);
let alternateAccountNumberCount = document.getElementById(
  "alternate-account-number-count"
);

alternateBankAccountNumber.addEventListener("keyup", () => {
  bankAccountCountIdentifier(
    alternateBankName,
    alternateAccountNumberCount,
    alternateBankAccountNumber
  );

  alternateAccountNumberCount.value = alternateBankAccountNumber.value.length;
});

fetch("../../classes/dbhmodelbanks.class.php")
  .then((res) => res.json())
  .then((response) => {
    response.forEach((bank) => {
      getPrimaryBankAccountDestionation(bank);
      bankAccountCountIdentifier(bankName, bankAccountCount, bankAccountNumber);
      bankAccountCountIdentifier(
        alternateBankName,
        alternateAccountNumberCount,
        alternateBankAccountNumber
      );
      getAlternateBankAccountDestionation(bank);
    });
  })
  .catch((error) => console.log(error));

function getPrimaryBankAccountDestionation(bank) {
  if (bank.name == bankName.value) {
    bankDetails.value = bank.destination_account;
    bankAccountCount.value = bankAccountNumber.value.length;
  }
}

function getAlternateBankAccountDestionation(bank) {
  if (bank.name == alternateBankName.value) {
    alternateBankDetails.value = bank.destination_account;
    alternateAccountNumberCount.value = alternateBankAccountNumber.value.length;
  }
}

function bankAccountCountIdentifier(
  thisBankName,
  thisBankAccountCount,
  thisBankAccountNumber
) {
  fetch("../../classes/dbhmodelbanks.class.php")
    .then((res) => res.json())
    .then((response) => {
      for (x = 0; x <= response.length; x++) {
        if (response[x].name == thisBankName.value) {
          if (thisBankAccountNumber.value.length == 0) {
            thisBankAccountCount.style.backgroundColor = "RED";
            thisBankAccountCount.style.fontWeight = "bold";
            thisBankAccountCount.style.color = "white";
            return;
          } else if (
            response[x].count1 == thisBankAccountNumber.value.length ||
            response[x].count2 == thisBankAccountNumber.value.length ||
            response[x].count3 == thisBankAccountNumber.value.length
          ) {
            thisBankAccountCount.style.backgroundColor = "GREEN";
            thisBankAccountCount.style.fontWeight = "bold";
            thisBankAccountCount.style.color = "white";
            return;
          } else {
            thisBankAccountCount.style.backgroundColor = "RED";
            thisBankAccountCount.style.fontWeight = "bold";
            thisBankAccountCount.style.color = "white";
            return;
          }
        }
      }
    })
    .catch((error) => console.log(error));
}

// Using fetch to retrieve data from compliance.json to use for select options

fetch("../../json/compliance.json")
  .then((resp) => resp.json())
  .then((json) => {
    //setting up select element
    let purposeOfLoansOption = document.getElementById("purpose-of-loan");

    //for loop to get each purpose of loan details in compliance.Json
    for (a = 0; a < json.purposeOfLoan.length; a++) {
      // setting up node as template that will later be use
      // to insert in select element that declared above
      let purposeOfLoanNode = document.createElement("option");

      // creating text node to append in option element that we delared
      // each iteration will create a textnode (just like array)
      let purposeOfLoanAttribute = document.createTextNode(
        `${json.purposeOfLoan[a]}`
      );

      // setting attribute of option element with the value from compliance.json
      // note that a is = 0 and as iteration ends this process will create an
      // option element with a value that corresponds to the value inside compliance.json
      purposeOfLoanNode.setAttribute("value", `${json.purposeOfLoan[a]}`);

      // appending text node that we declared earlier for each option element that we created
      // note that this append method will consist of all value corresponds to the value
      // inside compliance.json (same as setAttribute value)
      // this will create an option elements with the same innerhtml and value
      // that we fetch form compliance.json
      purposeOfLoanNode.appendChild(purposeOfLoanAttribute);

      //appending each option element that we created inside this for loop
      // this will create a list of options for select element in html with a dynamic value from compliance.json
      purposeOfLoansOption.appendChild(purposeOfLoanNode);
    }
  });

// Getting all expenses
let unofficialExpenses = document.getElementById("unofficial-expenses");
let additionalExpenses = document.getElementById("additional-expenses");
let computedExpenses = document.querySelectorAll("[data-expenses]");
let originalNetpay = document.getElementById("original-net");
let inputNetpays = document.querySelectorAll("[data-inputnet]");
let totalNetpay = document.getElementById("total-net");

computedExpenses.forEach((computedExpense) => {
  computedExpense.addEventListener("keyup", () => {
    let sampleExpenses = 0;
    for (i = 0; i < computedExpenses.length; i++) {
      if (computedExpenses[i].value == "") {
        computedExpenses[i].value = 0;
      }
      sampleExpenses += parseInt(computedExpenses[i].value);
    }

    unofficialExpenses.value = parseInt(sampleExpenses).toLocaleString();
    getTotalNet(originalNetpay, unofficialExpenses, totalNetpay);
  });
});

function setZeroValue(computedExpenses) {
  for (let i = 0; i < computedExpenses.length; i++) {
    if (computedExpenses[i].value == "") {
      computedExpenses[i].value = 0;
    }
  }
}

setZeroValue(computedExpenses);

// displaying net pay base on inserted netpay

function originalNet(originalNetpay) {
  let net1 = document.getElementById("net-1").value;
  let net2 = document.getElementById("net-2").value;
  let net3 = document.getElementById("net-3").value;
  let net4 = document.getElementById("net-4").value;

  originalNetpay.value = (
    parseInt(net1) +
    parseInt(net2) +
    parseInt(net3) +
    parseInt(net4)
  ).toLocaleString("en");
}

function unOfficalExpensess(computedExpenses, unofficialExpenses) {
  let sampleExpenses = 0;
  for (let i = 0; i < computedExpenses.length; i++) {
    sampleExpenses += parseInt(computedExpenses[i].value);
  }

  unofficialExpenses.value = sampleExpenses.toLocaleString();
}

unOfficalExpensess(computedExpenses, unofficialExpenses);
originalNet(originalNetpay);

inputNetpays.forEach((inputNetpay) => {
  inputNetpay.addEventListener("keyup", () => {
    let net1 = document.getElementById("net-1").value;
    let net2 = document.getElementById("net-2").value;
    let net3 = document.getElementById("net-3").value;
    let net4 = document.getElementById("net-4").value;

    originalNetpay.value = (
      parseInt(net1) +
      parseInt(net2) +
      parseInt(net3) +
      parseInt(net4)
    ).toLocaleString();

    getTotalNet(originalNetpay, unofficialExpenses, totalNetpay);
  });
});

setZeroValue(inputNetpays);

//getting final net pay
function getTotalNet(originalNetpay, unofficialExpenses, totalNetpay) {
  originalNetpayString = originalNetpay.value.replace(",", "");
  unofficialExpensesString = unofficialExpenses.value.replace(",", "");

  let sumofNet =
    parseInt(originalNetpayString) - parseInt(unofficialExpensesString);

  if (sumofNet <= 0) {
    totalNetpay.value = 0;
    totalNetpay.style.backgroundColor = "red";
  } else {
    totalNetpay.value = sumofNet.toLocaleString();
  }
}

getTotalNet(originalNetpay, unofficialExpenses, totalNetpay);

//onchange event for approve term
// this will hide some payment due dates depending on the term

let interestRateTemplate = [
  ["Monthly", 0.152, 1, 28],
  ["Weekly-1", 0.15, 1, 7],
  ["Weekly-2", 0.15, 2, 7],
  ["Weekly-3", 0.035, 3, 7],
  ["Weekly-4", 0.08, 4, 7],
  ["Weekly-5", 0.125, 5, 7],
  ["Bi-weekly-1", 0.008, 1, 14],
  ["Bi-weekly-2", 0.116, 2, 14],
  ["Bi-weekly-3", 0.224, 3, 14],
  ["Bi-weekly-4", 0.448, 4, 14],
];

let approveTerm = document.getElementById("approve-term");
let disbursementDate = document.getElementById("disbursement-date");
let firstDueDate = document.getElementById("first-due-date");
let secondDueDate = document.getElementById("second-due-date");
let thirdDueDate = document.getElementById("third-due-date");
let fourthDueDate = document.getElementById("fourth-due-date");
let fifthDueDate = document.getElementById("fifth-due-date");
let approveAmount = document.getElementById("approve-amount");

approveTerm.onchange = function () {
  paymentTerms();
  amortization(approveTerm.value);
};

disbursementDate.onchange = function () {
  paymentTerms();
  amortization(approveTerm.value);
};

function paymentTerms() {
  if (approveTerm.value == "Monthly" || approveTerm.value == "Bi-weekly-1") {
    firstDueDate.classList.add("active");
    secondDueDate.classList.remove("active");
    thirdDueDate.classList.remove("active");
    fourthDueDate.classList.remove("active");
    fifthDueDate.classList.remove("active");
  } else if (
    approveTerm.value == "Weekly-2" ||
    approveTerm.value == "Bi-weekly-2"
  ) {
    firstDueDate.classList.add("active");
    secondDueDate.classList.add("active");
    thirdDueDate.classList.remove("active");
    fourthDueDate.classList.remove("active");
    fifthDueDate.classList.remove("active");
  } else if (
    approveTerm.value == "Weekly-3" ||
    approveTerm.value == "Bi-weekly-3"
  ) {
    firstDueDate.classList.add("active");
    secondDueDate.classList.add("active");
    thirdDueDate.classList.add("active");
    fourthDueDate.classList.remove("active");
    fifthDueDate.classList.remove("active");
  } else if (approveTerm.value == "Weekly-4") {
    firstDueDate.classList.add("active");
    secondDueDate.classList.add("active");
    thirdDueDate.classList.add("active");
    fourthDueDate.classList.add("active");
    fifthDueDate.classList.remove("active");
  } else {
    firstDueDate.classList.add("active");
    secondDueDate.classList.add("active");
    thirdDueDate.classList.add("active");
    fourthDueDate.classList.add("active");
    fifthDueDate.classList.add("active");
  }
}

// creating function that will get the array value of InterestrateTemplate
// with the corrisponding term approve and interest rate
function amortization(term) {
  let dueDates = document.querySelectorAll("#due-dates");
  let paymentAmount = document.querySelectorAll("#payment");
  let interestRate = document.getElementById("interest-rate");

  if (approveAmount.value == "" || disbursementDate.value == "") {
    dueDates[0].value = "Invalid input";
  } else {
    for (i = 0; i < interestRateTemplate.length; i++) {
      if (interestRateTemplate[i][0] == term) {
        let newYear = moment(disbursementDate.value);
        // interestRate.value = interestRateTemplate[i][1];

        for (x = 0; x < interestRateTemplate[i][2]; x++) {
          let approveAmountWithInterest =
            parseInt(approveAmount.value) * interestRateTemplate[i][1] +
            parseInt(approveAmount.value);

          approveAmountWithInterest + parseInt(approveAmount.value);

          let totalPayment = document.getElementById("total-payment");
          totalPayment.value = approveAmountWithInterest.toLocaleString();
          totalPayment.style.color = "black";
          totalPayment.style.fontWeight = "600";

          let paymentPerDueDate =
            approveAmountWithInterest / parseInt(interestRateTemplate[i][2]);

          paymentAmount[x].value = paymentPerDueDate.toLocaleString();

          newYear.add(interestRateTemplate[i][3], "days");
          dueDates[x].value = newYear.format("LL");

          let computedInterestRate = `${interestRateTemplate[i][1] * 100}`;

          interestRate.value = `${computedInterestRate.slice(
            0,
            interestRate.value.indexOf(".") + 3
          )}%`;

          let disburseAmount = document.getElementById("disburse-amount");
          disburseAmount.value = (
            approveAmount.value -
            approveAmount.value * 0.1
          ).toLocaleString();
          disburseAmount.style.color = "black";
          disburseAmount.style.fontWeight = "600";
        }
      }
    }
  }
}

function loanQuotation() {
  if (
    approveAmount.value == "" ||
    approveTerm.value == "" ||
    disbursementDate.value == ""
  ) {
    return;
  } else {
    paymentTerms();
    amortization(approveTerm.value);
  }
}

loanQuotation();

let dataValidation = document.querySelectorAll("[data-validation]");
let buttonForward = document.getElementById("forward");

let buttonBack = document.getElementById("back");

buttonBack.onclick = () => {
  window.location.href = "../../login.php";
};

buttonForward.onclick = () => {
  let countDataValidationLength = dataValidation.length;
  for (let i = 0; i < dataValidation.length; i++) {
    if (dataValidation[i].value == "") {
      dataValidation[i].style.boxShadow = "0px 0px 10px 1px red";
      document.getElementById("message").innerHTML =
        "Please fill up all important fields!";
    } else {
      countDataValidationLength--;
      dataValidation[i].style.boxShadow = "none";
    }
  }

  if (countDataValidationLength == 0) {
    document.getElementById("message").innerHTML = "";

    if (confirm("Save changes before clicking 'yes' button?") == true) {
      let container = document.getElementById("container-button");
      let buttonNextSubmit = document.createElement("button");
      buttonNextSubmit.setAttribute("type", "Submit");
      buttonNextSubmit.setAttribute("name", "forward-button");
      buttonNextSubmit.setAttribute("id", "forward-button");
      container.appendChild(buttonNextSubmit);
      document.getElementById("forward-button").hidden = true;

      buttonNextSubmit.click();
    }
  }
};
