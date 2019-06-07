/* анимация развертки/свертки формы (используется jqerry!!!!) */
function anichange (objName) {
	if ( $(objName).css('display') == 'none' ) {
		$(objName).animate({height: 'show'}, 400);
	} else {
		$(objName).animate({height: 'hide'}, 200);
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