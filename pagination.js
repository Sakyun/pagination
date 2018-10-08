var anchors = document.querySelectorAll(".pagination a");
var pageNumber = parseInt(getQueryVariable("page"));
var previous;
var next;
var url = "index.php?page=";
function getQueryVariable(variable)
{
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
    let result = pair[1].split("/");
    result = result[0];
    if(pair[0] == variable){return result;}
  }
  return(false);
}

//Adding class active
anchors[pageNumber].classList.add('active');
//Make first and last anchors work
//Previous
if (pageNumber == 1) {
  previous = url+(anchors.length-2);
}else{
  previous = url+(pageNumber - 1);
}
//Next
if (pageNumber == anchors.length-2) {
  next = url+1;
}else {
  next = url+(pageNumber +1);
}

anchors[0].setAttribute("href",previous);
anchors[anchors.length-1].setAttribute("href",next);
