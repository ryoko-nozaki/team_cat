jQuery(function() {
  $('#search_book').on('click', function(){
    console.log('test');
    var isbn = $('#isbn').val();
    console.log(isbn);
    $.ajax({
      url: '/searchBook',
      type: 'GET',
      data: {
        'isbn': isbn
      }
  }).done(function(data) {
      console.log(data);
    }).fail(function() {
      console.log('失敗');
    });
  });
});
