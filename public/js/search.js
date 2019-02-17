$(function() {
  $(".row")
    .children()
    .each(function(i) {
      if (i % 2 == 1) {
        $(this).addClass("even");
      } else {
        $(this).addClass("odd");
      }
    });
});
