document.getElementById( "one-query" ).onclick = function () {
  var queryNumber = document.getElementById( "two" );
  var registerNumber = document.getElementById( "three" );
  queryNumber.style.display = "block";
  registerNumber.style.display = "none";
}
document.getElementById( "one-register" ).onclick = function () {
  var queryNumber = document.getElementById( "two" );
  var registerNumber = document.getElementById( "three" );
  queryNumber.style.display = "none";
  registerNumber.style.display = "block";
}

/*JS使用版本
document.getElementById( "search" ).onclick = function () {
  var keyword = document.getElementById( "keyword" ).value;
  var searchResult = document.getElementById( "searchResult" );
  var request = new XMLHttpRequest();
  request.open( "GET", "PHP/JS.php?user=" + keyword );
  request.send();
  request.onreadystatechange = function () {
    if ( request.readyState === 4 ) {
      if ( request.status === 200 ) {
        searchResult.innerHTML = request.responseText;
      } else {
        alert( "发生错误:" + request.status )
      }
    }
  }
}
document.getElementById( "save" ).onclick = function () {
  var userId = document.getElementById( "userId" ).value;
  var email = document.getElementById( "email" ).value;
  var createResult = document.getElementById( "createResult" );
  var request = new XMLHttpRequest();
  request.open( "POST", "PHP/JS.php" );
  var data = "name=" + userId + "&email=" + email;
  request.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
  request.send( data );
  request.onreadystatechange = function () {
    if ( request.readyState === 4 ) {
      if ( request.status === 200 ) {
        createResult.innerHTML = request.responseText;
      } else {
        alert( "发生错误:" + request.status );
      }
    }
  }
}
*/
/*JQuery使用版本
 * 
$(document).ready(function () {
$("#search").click(function () {
    $.ajax({
      type: "GET",
      url: "http://localhost:81/demo/chaxun.php?user=" + $("#keyword").val(),
      dataType: "json",
      success: function (data) {
        if (data.success) {
          $("#searchResult").html(data.msg);
        } else {
          $("#searchResult").html("出现错误：" + data.msg);
        }
      },
      error: function (jqXHR) {
        alert("发生错误：" + jqXHR.status);
      },
    });
});*/

/*JSONP使用版本

$(document).ready(function () {
  $("#search").click(function () {
    $.ajax({
      type: "get",
      url: "http://192.168.1.12:81/demo/chaxun.php?user=" + $("#keyword").val(),
      dataType: "jsonp",
      jsonp: "callback",
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
})*/
