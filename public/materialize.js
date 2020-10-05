document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems, options);
});

function changeOption() {
  $('.all-options').hide();
  $('#' + $('#options').val()).show();
}
