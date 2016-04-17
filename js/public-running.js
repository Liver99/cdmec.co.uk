var UNIXtime = Date.now();// get Unix timestamp for this instant (ms)

$('td').each(function(index, value){
  var date = new Date( $(this).data('date') ).getTime();
  if (UNIXtime <= date) {
      $(this).addClass('success');
  }
});
