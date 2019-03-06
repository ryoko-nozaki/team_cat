jQuery(function() {
  $('#search_book').on('click', function(){
    var isbn = $('#isbn').val();
    $.ajax({
      url: '/searchBook',
      type: 'GET',
      data: {
        'isbn': isbn
      }
    }).done(function(data) {
      if (data.status == 'true') {
        $('#thumbnail_img').attr('src', data.thumbnail);
        $('#thumbnail').val(data.thumbnail);
        $('#title').val(data.title);
        $('#author').val(data.author);
        $('#description').val(data.description);
      } else {

      }
    }).fail(function() {

    });
  });
});
