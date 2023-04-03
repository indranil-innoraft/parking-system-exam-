$(document).ready(function onDocumentLoadPerformFunctios() {
  //Go back button.
  $('#go-back').on('click', function goPreviousBack() {
    parent.history.back();
  });
});
