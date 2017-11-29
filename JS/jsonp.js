$(document).ready(function () {
  $("#search").click(function () {
    $.ajax({
      type: "get",
      url: "http://192.168.1.12:81demo/chaxun.php?user=" + $("#keyword").val(),
      dataType: "json",
      success: function (data) {
        if (data.success) {
          $("#searchResult").html(data.msg);
        } else {
          $("#searchResult").html("出现错误：" + data.msg);
        }
      },
      error: function(jqXHR) {
      	$("#searchResult").html("出现错误：" + jqXHR.status);
      }
    });
  })
})