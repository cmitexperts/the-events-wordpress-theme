var currentPage = 1;
var totalpost = parseInt($("#totalpost").val(), 10);
var postperpage = 3;
var loadpost = Math.ceil(totalpost / postperpage);

$(document).ready(function () {
  $('select.selecthotel').on('change', function () {
    load_data(false);
  });
});

$(document).ready(function () {
  $("#more_posts").on("click", function () {
    load_data(true);
  });
});

function load_data(load_more) {
  var selectorder = $(".selecthotel option:selected").val();
  if (load_more) {
    currentPage++;
  }
  $.ajax({
    url: ajax_url,
    type: "POST",
    datatype: "html",
    data: { 'action': 'load_ajax', 'paged': currentPage, 'load_more': load_more, 'filter': selectorder },
    success: function (res) {
      if (load_more == false) {
        currentPage = 1;
        $('#hotelContainer').html(res);
      }
      else if (load_more == true) {
        $('#hotelContainer').append(res);
      }
      
      if (currentPage >= loadpost) {
        $("#more_posts").hide();
      }
      else {
        $("#more_posts").show();
      }
    }
  });
}