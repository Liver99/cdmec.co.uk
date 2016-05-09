var UNIXtime = Date.now();// get Unix timestamp for this instant (ms)
var datesArray=Array();

$('.date').each(function(index, value){  // for data-date
  var runningDate = new Date( $(this).data('date') ).getTime();  // get date from data-date
  if (UNIXtime <= runningDate) {                // if date is in the future
    datesArray.push(runningDate);
  }
});
var closestDate = closest(UNIXtime, datesArray);

$('.date').each(function(index, value){  // for each table cell
  var runningDate = new Date( $(this).data('date') ).getTime();  // get date from data-date
  if (UNIXtime <= runningDate) {                // if date is in the future
    if (runningDate==closestDate){
      $(this).addClass('success');
    } else {
      $(this).addClass('active');
    }
  } else {                                     // date in the past
    $(this).addClass('text-muted');
  }
});


function closest (num, arr) {
  var curr = arr[0];
  var diff = Math.abs (num - curr);
  for (var val = 0; val < arr.length; val++) {
    var newdiff = Math.abs (num - arr[val]);
    if (newdiff < diff) {
      diff = newdiff;
      curr = arr[val];
    }
  }
  return curr;
}
