//setting event listener to open modal when logout is clicked
let btnLogout = document.getElementById("btn-logout");
let overlay = document.getElementById("container-overlay");
let btnLogoutCancel = document.getElementById("modal-cancel");
let body = document.getElementById("body");

btnLogout.addEventListener("click", () => {
  overlay.classList.add("active");
  body.classList.add("active-body");
});

btnLogoutCancel.addEventListener("click", () => {
  overlay.classList.remove("active");
  body.classList.remove("active-body");
});

// adding click event for navigation fresh/inprocess/return to display content
let targetTables = document.querySelectorAll("[data-tab-target]");
let tabContents = document.querySelectorAll("[data-tab-content]");

targetTables.forEach((targetTable) => {
  targetTable.addEventListener("click", () => {
    let target = document.querySelector(targetTable.dataset.tabTarget);
    tabContents.forEach((tabContent) => {
      tabContent.classList.remove("active");
    });
    targetTables.forEach((targetTable) => {
      targetTable.classList.remove("active");
    });
    targetTable.classList.add("active");
    target.classList.add("active");
  });
});

//setting event listener to open modal when view button is clicked
let viewButtonOverlay = document.getElementById("overlay");
let viewButtonCancel = document.getElementById("bottom-cancel");
let viewButtonXicon = document.getElementById("cancel-button-inside");
let viewButtonContent = document.getElementById("view-details");

function overlayAutoLoad() {
  if (viewButtonContent.className.includes("active")) {
    document.querySelector("body").style.overflowY = " hidden";
    viewButtonOverlay.addEventListener("click", () => {
      closeOverlay();
    });

    viewButtonCancel.addEventListener("click", () => {
      closeOverlay();
    });

    viewButtonXicon.addEventListener("click", () => {
      closeOverlay();
    });
  } else {
    return;
  }
}

function closeOverlay() {
  viewButtonOverlay.classList.remove("active");
  viewButtonContent.classList.remove("active");
  window.location.href = "../../login.php";
}

overlayAutoLoad();

/* adding 'active' class to inprocess tab when button view clicked
this will prevent the page for returning the active tab to 'Fresh' 
tab everytime the button view is clicked in 'inprocess' tab */

let btnInprocessViews = document.querySelectorAll("inprocess-view");
let inprocessTab = document.getElementById("table-details-inprocess");
let freshTab = document.getElementById("table-details-fresh");

btnInprocessViews.forEach((btnInprocessView) => {
  btnInprocessView.addEventListener("click", () => {
    inprocessTab.classList.add("active");
  });
});

let formDelete = document.getElementById("asdfasdf");
let deleteButtons = document.querySelectorAll("#delete");
let hiddenId = document.querySelectorAll("#viewDetailsHidden");

deleteButtons.forEach((deleteButton) => {
  deleteButton.addEventListener("click", (e) => {
    e.preventDefault();
    if (confirm("Are you sure you want to delete this application?") == true) {
      let slicedId = deleteButton.className.slice(15, 27);
      console.log(slicedId);
      window.location.href = `verifierDashboard.php?delete=${slicedId}`;
    }
  });
});

let forwardDisburse = document.getElementById("forward-disburse");

forwardDisburse.onclick = () => {
  if (confirm("Continue action?") == true) {
    let container = document.getElementById("container-view-button");
    let buttonNextSubmit = document.createElement("button");
    buttonNextSubmit.setAttribute("type", "Submit");
    buttonNextSubmit.setAttribute("name", "forward-disburse");
    buttonNextSubmit.setAttribute("id", "submit-edit");
    container.appendChild(buttonNextSubmit);
    document.getElementById("submit-edit").hidden = true;

    buttonNextSubmit.click();
  }
};
