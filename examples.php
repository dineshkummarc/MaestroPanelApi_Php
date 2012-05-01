<?php

include 'Class.MaestroPanelApiCient.php';

$api_key 	= ''; 	//Api anahtar�
$host 		= ''; 	//Sunucu ip adresi ya da alan ad� (�rnek : 127.0.0.1 ya da alanadi.com)
$port		= 9715; //MaestroPanel portu
$ssl		= false;//Ssl kullan�p kullan�lmad���n� belirtir.�u anki versiyonda ssl olmad��� i�in false de�erini verin

$client = new MaestroPanelApiClient($api_key, $host, $port, $ssl);

$domain				= 'phpuzmani.com'; //��lem yap�lacak alan ad�
$domain_alias		= '1GB_HOST'; 	//Domain paketinin alias ad�
$username			= 'phpapi';//Kullan�c� ad�
$password			= 'kemal1!*';	//�ifre (En az 8 karakterden olu�mal� ve en az 2 alfa n�merik olmayan karakter i�ermelidir.class dosyas�ndan bu �zellikler de�i�tirilebilir.)
$active_domain_user	= true;			//Kullan�c�n�n aktif edilip edilmeyece�ini belirtir.
$first_name			= 'Kemal';		//M��terinin ad�
$last_name			= 'Birinci';	//M��terinin soyad�
$email				= 'kemal@bilgisayarmuhendisi.net'; //M��terinin e-posta adresi

//$result de�i�kenine ba�ar�s�z durumda false, ba�ar� durumunda ise SimpleXMLElement nesne tipinde sonu� d�ner.

//Yeni bir domain olu�turur
$result = $client->domain_create($domain, $domain_alias, $username, $password, $active_domain_user, $first_name, $last_name, $email);

//Domaini durdurur
//$result = $client->domain_stop($domain);

//Domaini ba�lat�r
//$result = $client->domain_start($domain);

//Domaini siler
//$result = $client->domain_delete($domain);

/**
* Domain �ifresini de�i�tirir
* 
* �ifre de�i�tirmek i�in 2 y�ntem vard�r.
*
* 1) �ifreyi belirtti�iniz bir �ifre ile de�i�tirir. 
* $result = $client->domain_reset_password($domain, '123456*!');
* 
* 2) �ifre parametresine bo� bir de�i�ken vermeniz ile �ifreyi kendisi �retir ve de�i�keninize de �ifreyi atar.
* $password = ''; 
* $client->domain_reset_password($domain, $password);
* echo $password;
*/

if($result){
	echo '��lem Ba�ar�yla ger�ekle�ti.<br />';
	echo 'Kod : '.$result->Code . '<br />Mesaj : ' . $result->Message.'<br />Detayl� Mesaj<pre>'.$result->OperationResult.'</pre>';		

	
	foreach($client->get_errors() as $error){
		echo '<pre>' . $error . '</pre>';
	}
}else{
	foreach($client->get_errors() as $error){
		echo '<pre>' . $error . '</pre>';
	}
}

?>