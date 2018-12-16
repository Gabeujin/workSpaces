let getParameter = function(i){
  let returnValue;
  let url = location.href;
  let parameters = (url.slice(url.indexOf('?') + 1, url.length)).split('&');
  parameters.forEach(function(index){
    let param = index.split('=')[0];
    if(param.toUpperCase() == i.toUpperCase())returnValue = index.split('=')[1];
  });
  return decodeURIComponent(returnValue);
};

let getParam = getParameter('id') ? getParameter('id') : null;
if(getParam != null){
  let target = document.querySelector("a[href='author.php?id="+getParam+"']");
  target.style.backgroundColor = 'white';
}
