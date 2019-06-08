/* анимация развертки/свертки формы (используется jqerry!!!!) */
function showhide(objName) {
	if ( $(objName).css('display') == 'none' ) {
		$(objName).animate({height: 'show'}, 400);
		document.getElementById('showform' ).style.display = 'none';
	} else {
		$(objName).animate({height: 'hide'}, 200, "linear", function(){document.getElementById('showform' ).style.display = 'inline';});
	}
}


function validateAndSubmit()
{
	var email = document.sform.email,
		text  = document.sform.message;

	var maxlength = 300;	

	if (email.value == '') 
	{
		alert('Вы не ввели email!');
	}
	else if (text.value == '') 
	{
		alert('Вы не ввели текст!');
	} 
	else if (text.value.length > maxlength)
	{
		alert('Письмо не должно превышать ' + maxlength + ' символов');
	}
	else
	{
		return true;
	}

	return false;
}