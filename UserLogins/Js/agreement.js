let doc = new jsPDF();
let bodyForm = document.getElementById("pdf-convert");

doc.fromHTML(
  bodyForm,
  15,
  15,
  {
    width: 170,
  },
  function () {
    let contractNo = document.getElementById("contract-no").innerHTML;
    let blob = doc.output("blob");

    let label = document.createElement("input");
    label.setAttribute("name", "contractNo");
    label.setAttribute("value", contractNo);
    console.log(label.value);

    let formData = new FormData();
    formData.append("pdf", blob);
    formData.append("contractNo", label.value);

    fetch("saveContract.php", {
      method: "POST", // or 'PUT'
      body: formData,
    })
      .then((result) => {
        window.location.href = `saveContract.php?contractNo=${contractNo}`;
        console.log("Success:", result);
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
);
console.log(document.getElementById("generate-pdf"));
