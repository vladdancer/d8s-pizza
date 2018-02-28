(function($, Drupal ) {
    Drupal.AjaxCommands.prototype.getPizzaItem = function (ajax, response, status) {
        console.log(ajax);
        console.log(response);
        console.log(status);
        $('.sidebar').replaceWith(response.item);
    }

}(jQuery, Drupal));
