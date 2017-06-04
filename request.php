<?php
echo "Запрос GET<br>";
$ch = curl_init("localhost/myAPI/rest/");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$a = (array)json_decode(curl_exec($ch));
echo $a['code'] . " => " . $a['text'];
curl_close($ch);

echo "<br>Запрос POST<br>";
$ch = curl_init("localhost/myAPI/rest/");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$a = (array)json_decode(curl_exec($ch));
echo $a['code'] . " => " . $a['text'];
curl_close($ch);
	
//	echo "<br><br>Запрос POST<br>";
//	$data = 'data=' . json_encode(array('name' => 'test2', 'desc' => 'Тестовая запись'));
//	$ch = curl_init("rest.zamsergey.com/test/3");
//	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//	curl_exec($ch);
//	curl_close($ch);
//
//	echo "<br><br>Запрос PUT<br>";
//	$data = json_encode(array('name' => 'updated', 'desc' => 'Обновленная запись'));
//	$file = tmpfile();
//	fwrite($file, $data, strlen($data));
//	fseek($file, 0);
//	$ch = curl_init("rest.zamsergey.com/test/3?data=$data" . $data);
//	curl_setopt($ch, CURLOPT_PUT, 1);
//	curl_setopt($ch, CURLOPT_INFILE, $file);
//	curl_setopt($ch, CURLOPT_INFILESIZE, strlen($data));
//	curl_exec($ch);
//	curl_close($ch);
//
//	echo "<br><br>Запрос QQQ<br>";
//	$ch = curl_init("rest.zamsergey.com/test/7");
//	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "QQQ");
//	curl_exec($ch);
//	$info = curl_getinfo($ch);
//	curl_close($ch);
//
//	if ($info['http_code'] != 200) {
//		echo 'Произошла ошибка';
//	}
?>