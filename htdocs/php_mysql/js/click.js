var getParameter = function (param) {
    var returnValue;
    var url = location.href;
    var parameters = (url.slice(url.indexOf('?') + 1, url.length)).split('&');
    for (var i = 0; i < parameters.length; i++) {
        var varName = parameters[i].split('=')[0];
        if (varName.toUpperCase() == param.toUpperCase()) {
            returnValue = parameters[i].split('=')[1];
            return decodeURIComponent(returnValue);
        }
    }
};

let getParam = getParameter('id')?getParameter('id'):null;
if(getParam != null){
  let target = document.querySelector("a[href='author.php?id="+getParam+"']");
  target.style.backgroundColor = 'white';
}