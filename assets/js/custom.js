
$(document).ready(function () {
  $('select.selecthotel').on('change', function () {
    var selectorder = $(".selecthotel option:selected").val();
    if (selectorder == "1") {
      // alert("New Hotels");
    } else if (selectorder == "2") {
      // alert("Old Hotels");
    }
    $.ajax({
      url: ajax_url,
      type: "POST",
      data: { 'action': 'save_ajax_data', 'filter': selectorder },
      success: function (data) {
        $('#hotelContainer').html(data);
      }
    });
  });
});
//pagination ajax....
$(document).ready(function (){
  var currentPage = 1;
  $("#more_posts").on("click", function () {
    currentPage++;
    // alert("Hello");
    $.ajax({
      url: ajax_url,
      type: "POST",
      datatype: "html",
      data: { 'action': 'more_post_ajax', 'paged': currentPage },
      success: function (data) {
        var allposts = $('#hotel_posts').val();
        if (allposts == '') 
        {
          $('#more_posts').hide();
        }
        $('#hotelContainer').append(data);
      }
    });
  });
});
