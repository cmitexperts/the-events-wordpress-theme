var currentPage = 1;
$(document).ready(function () {
  $('select.selecthotel').on('change', function () {
    load_data(false);
  });
});

//pagination ajax....
$(document).ready(function (){
  $("#more_posts").on("click", function () {
    load_data(true);
  });
});

function load_data(load_more)
{
  var selectorder = $(".selecthotel option:selected").val();
  if(load_more){
    currentPage++;
  }
  $.ajax({
    url: ajax_url,
    type: "POST",
    datatype: "html",
    data: { 'action': 'load_ajax', 'paged': currentPage, 'load_more': load_more, 'filter': selectorder},
    success: function (data) {
      if(load_more == false){
        $('#hotelContainer').html(data);   
    }
    else if (load_more == true){
      $('#hotelContainer').append(data);
    }
    }
  }); 
}
 // if (currentPage == '4') 
      // {
      //   $('#more_posts').hide();
      // }