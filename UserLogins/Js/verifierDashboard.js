$(document).ready(function () {
  function displayData(status) {
    let dataTable = $("#data-table").DataTable({
      processing: true,
      // serverSide: true,
      order: [],
      ajax: {
        url: "../../inc/extractData.inc.php",
        method: "POST",
        data: {
          request_status: status,
        },
      },
    });
  }

  displayData("Fresh");

  let targetTables = $(".tabTarget");
  targetTables.click(function () {
    targetTables.removeClass("active");
    $(this).addClass("active");

    $("#data-table").DataTable().clear().destroy();
    displayData($(this).text());
  });

  function showEditButton(bucket) {
    if (bucket == "Fresh") {
      $("#save-ids").hide();
      $("#inprocess").show();
    } else {
      $("#save-ids").show();
      $("#save-ids").val("Edit");
      $("#inprocess").hide();
    }
  }

  //setting event listener to open modal when view button is clicked
  let viewButtonOverlay = $("#overlay");
  let viewButtonContent = $("#view-details");

  function getClientDetails(id) {
    $.post(
      "../../inc/getClientDetails.php",
      { get_single_client: id },
      function (data) {
        data = jQuery.parseJSON(data);
        $.each(data, function (i, item) {
          $("#application_no").html(item.application_no);
          $("#view-name").html(
            item.firstname + " " + item.middlename + " " + item.lastname
          );
          $("#address").html(
            item.house_no +
              " " +
              item.street +
              " " +
              item.barangay +
              " " +
              item.city +
              " " +
              item.municipality
          );
          $("#primary_no").html(item.primary_no);
          $("#alternate_no").html(item.secondary_no);
          $("#gender").html(item.gender);
          $("#email").html(item.email);
          $("#company_name").html(item.company_name);
          $("#position").html(item.position);
          $("#date_hired").html(item.date_hired);
          $("#salary").html(item.basic_salary);
          $("#primary_bank").html(item.primary_bank);

          let attachments = $(".view-uploaded-file").children();
          let attachmentsURL = `../../image.php?application_no=${item.application_no}&filename=Attachment`;

          for (let i = 0; i < attachments.length; i++) {
            attachments[i].href = attachmentsURL + i;
          }

          $("#fieldAttachment").append(displayAttachmentsOption(item.status));

          $("#save-id").val(item.application_no);
          $("#app_no").val(item.application_no);
          showEditButton(item.status);
        });
      }
    ).fail(function () {
      console.log("error");
    });
  }

  function displayAttachmentsOption(status) {
    if (status == "Fresh") {
      return;
    } else {
      let attachmentsOption = `<div class='file-upload' id='file-upload'>
                                  <div class='file-upload-container'>
                                      <input type='file' name='file-govtid' class='attachments' />
                                      <label>*File type must be maximum of 25mb* - GOV'T ID</label>
                                      <input type='file' name='file-coid' class='attachments' />
                                      <label>*File type must be maximum of 25mb* - COID</label>
                                      <input type='file' name='file-poi' class='attachments' />
                                      <label>*File type must be maximum of 25mb* - POI</label>
                                  </div>
                                  <div class='file-upload-container'>
                                      <input type='file' name='file-pob' class='attachments' />
                                      <label>*File type must be maximum of 25mb* - POB</label>
                                      <input type='file' name='file-atm' class='attachments' />
                                      <label>*File type must be maximum of 25mb* - ATM</label>
                                      <input type='file' name='file-others' class='attachments' />
                                      <label>*File type must be maximum of 25mb* - OTHERS</label>
                                  </div>
                              </div>`;
      return attachmentsOption;
    }
  }

  $(document).on("click", "[data-view-details]", function () {
    viewButtonOverlay.addClass("active");
    viewButtonContent.addClass("active");
    $(document.body).css("overflow-y", "hidden");

    let viewDetailsID = $(this).parent().children("#viewDetailsHidden").val();

    getClientDetails(viewDetailsID);
  });

  let cancelButtons = $("[data-cancel-inside]");

  cancelButtons.on("click", function () {
    viewButtonOverlay.removeClass("active");
    viewButtonContent.removeClass("active");
    $(document.body).css("overflow-y", "visible");

    $("#fieldAttachment").children("#file-upload").html("");
    $("#save-ids").hide();
    $("#inprocess").hide();
  });

  $("#save-remarks").on("click", function (e) {
    e.preventDefault();
    $("#form-attachments").submit();
  });

  $(document).on("click", "#delete", function () {
    if (confirm("Are you sure you want to delete this application?") == true) {
      $("#form-action-buttons").submit();
    } else {
      return;
    }
  });
});
