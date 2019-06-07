<?php
	$user_email = $_POST['email'];
	$message = $_POST['message'];
	$site_email = 'NikolaSamsonov@mail.ru';

	$subject = '=?utf-8?B?'.base64_encode("Сообщ").'?=';
	$headers = 'From: $user_email\r\nReply-to: $email\r\nContent-type: text/html;charset=utf-8\r\n';
	mail($site_email, $subject, $message, $headers);
?>

<script type="text/javascript">
	// переход на предыдущую страницу
	history.back();
</script>