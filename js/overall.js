const urlParams = new URLSearchParams(window.location.search);
const get_event_id = urlParams.get('event_id');

if (get_event_id == null) {
  window.location.href = "./";
}

const event_id = get_event_id;

function viewOverallResult() {
  $.ajax({
    url: "./backend/admin/view-overall-result.php",
    type: "POST",
    data: {
      event_id: event_id
    },
    success: function (data) {
      $("#e-overall-results-table").html(data);
      console.log('Result Updated!');
    },
    error: function (data) {
      console.log('An error occurred!');
    }
  });
}

function printResult() {
  const printContents = document.getElementById("e-overall-results-table").innerHTML;
  const originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  $(".card-header").hide();

  window.print();

  document.body.innerHTML = originalContents;
}

$(document).ready(function () {
  $("#e-overall-results-table").html(
    '<div class="mt-5 d-flex justify-content-center align-items-center h-100"><div class="spinner-border text-primary mb-5" role="status"><span class="visually-hidden">Loading...</span></div></div>' +
    '<p class="text-center">Tallying Overall Result...</p>' +
    '<p class="text-center">Please wait...</p>'
  );

  viewOverallResult();

  setInterval(function () {
    viewOverallResult();
  }, 1000);
});
