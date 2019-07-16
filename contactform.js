jQuery(document).ready(function($) {

$(".ajax-contact-form").submit(function() {
var str = $(this).serialize();

$.ajax({
type: "POST",
url: "https://mariebilan.github.io/todo-app/site/contact.php",
data: str,
success: function(msg) {
if(msg == 'OK') {
result = '<p>Your message has been sent</p>';
$(".fields").hide();
} else {
result = msg;
}
$('.note').html(result);
}
});
return false;
});
});