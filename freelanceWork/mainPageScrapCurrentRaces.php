<?php

$races = shell_exec("curl -s 'https://m.twinspires.com/php/fw/php_BRIS_BatchAPI/2.3/Tote/CurrentRace?username=iphone&password=ru13juhyo&ip=94.197.120.103&affid=2800&output=json' -H 'Accept: application/json, text/javascript, */*; q=0.01' -H 'Accept-Encoding: gzip, deflate, br' -H 'Accept-Language: en-GB,en;q=0.5' -H 'Connection: keep-alive' -H 'Cookie: frosmo_quickContext=%7B%22VERSION%22%3A%221.1.0%22%2C%22UID%22%3A%2260mts6.j1zgf8jt%22%2C%22lastPageView%22%3A%7B%22time%22%3A1493239967823%7D%2C%22states%22%3A%7B%22session%22%3A%7B%7D%7D%7D; _ga=GA1.3.1385454027.1493239801; scarab.visitor=%227BD4D8D707CF076D%22; frosmo_keywords=.tggp_1; __storejs__=%22__storejs__%22; SAID=B1U%3D; SID=555ce26859a65d492638cd3b89fb7bf7; _vwo_uuid_v2=D88FB00F401AFE62576C68F1A646E66E|d8edf082121f5651779bd3c380e33098; _ga=GA1.2.961637672.1493239969; xdVisitorId=11E5dCNHAF3DY73--VMtjl8HAR9AiGYuiaotYQqEpwAyhIM2A28; atgRecVisitorId=11E5dCNHAF3DY73--VMtjl8HAR9AiGYuiaotYQqEpwAyhIM2A28; atgRecSessionId=VBGsCa2qgeDzgHnF7HxtvkoSXSeSwy6POY-0TwYrH7e96Cm64t9m!508038641!612038873; _dc_gtm_UA-3578763-1=1; _gat_UA-3578763-1=1' -H 'Host: m.twinspires.com' -H 'Referer: https://m.twinspires.com/' -H 'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:48.0) Gecko/20100101 Firefox/48.0' -H 'X-NewRelic-ID: VgIDUl9RGwECXFdSBAE=' -H 'X-Requested-With: XMLHttpRequest'");

$racesJ = json_decode($races);
$races = array();
foreach($racesJ->{'CurrentRace'} as $invRace)
{
	$importantInfo = array();
	$importantInfo['BrisCode']    =  $invRace->{'BrisCode'};
	$importantInfo['TrackType']   =  $invRace->{'TrackType'};
	$importantInfo['DisplayName'] =  $invRace->{'DisplayName'};
	array_push($races, $importantInfo);
}

echo "<table border='1'>";
foreach($races as $race)
{
	echo "<tr>";
	echo "<td><a href = './displayOdds.php?race=".$race['DisplayName'].'&brisCode='.$race['BrisCode'].'&trackType='.$race['TrackType']."'.>".$race['DisplayName']."</a></td>";
	echo "</tr>";
}
echo "</table>";


?>