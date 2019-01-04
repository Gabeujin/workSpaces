  let deleteForm = document.querySelectorAll('.deleteForm');
  deleteForm.forEach(function(item){
    item.addEventListener('submit',function(){
      if(!confirm("정말 삭제할까요??")){
        event.preventDefault();
        event.stopPropagation();
      }
    });
  });
