function onChangeFun() {
  selected_val = document.getElementById('period').value;

  if (selected_val == "1" || selected_val == "2" || selected_val == "3") {
    document.forms['choice'].submit();
  } else if (selected_val == "4") {
    $(document).ready(function(){
      $('#myModal').modal("show");
    });
  }
};
