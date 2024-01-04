var currentPage = 2;
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
    // currentPage++;
  }
  $.ajax({
    url: ajax_url,
    type: "POST",
    datatype: "json",
    data: { 'action': 'load_ajax', 'paged': currentPage, 'load_more': load_more, 'filter': selectorder},
    success: function (data) {
      if(load_more == false){
        $('#more_posts').hide();
        $('#hotelContainer').html(data);   
    }
    else if (load_more == true){ 
      // var postcount = $(".count").val();
      // console.log(postcount);
      // if(postcount == 0) {
      //   $('#more_posts').hide();
      // }
      $('#hotelContainer').append(data);
      currentPage++
    }
    }
  }); 
}
 // if (currentPage == '4') 
      // {
      //   $('#more_posts').hide();
      // }
      // var postcontainer = $('#p_container').val();
      // if(postcontainer == ""){
      //   $("#more_posts").hide();
      // }