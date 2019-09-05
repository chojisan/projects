function flashMessage(data) {
    var alert = $('.alert-' + data[0])

    alert.find('strong.alert-message').text(data[1]);
    alert.removeClass('hide');

    setTimeout(function() {
        alert.addClass('hide');
    }, 3000);
}