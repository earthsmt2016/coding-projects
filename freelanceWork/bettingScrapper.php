<?php

$output = shell_exec("curl -s 'https://m.twinspires.com/php/fw/php_BRIS_BatchAPI/2.3/Tote/CurrentRace?username=iphone&password=ru13juhyo&ip=94.197.120.103&affid=2800&output=json' -H 'Accept: application/json, text/javascript, */*; q=0.01' -H 'Accept-Encoding: gzip, deflate, br' -H 'Accept-Language: en-GB,en;q=0.5' -H 'Connection: keep-alive' -H 'Cookie: frosmo_quickContext=%7B%22VERSION%22%3A%221.1.0%22%2C%22UID%22%3A%2260mts6.j1zgf8jt%22%2C%22lastPageView%22%3A%7B%22time%22%3A1493239967823%7D%2C%22states%22%3A%7B%22session%22%3A%7B%7D%7D%7D; _ga=GA1.3.1385454027.1493239801; scarab.visitor=%227BD4D8D707CF076D%22; frosmo_keywords=.tggp_1; __storejs__=%22__storejs__%22; SAID=B1U%3D; SID=555ce26859a65d492638cd3b89fb7bf7; _vwo_uuid_v2=D88FB00F401AFE62576C68F1A646E66E|d8edf082121f5651779bd3c380e33098; _ga=GA1.2.961637672.1493239969; xdVisitorId=11E5dCNHAF3DY73--VMtjl8HAR9AiGYuiaotYQqEpwAyhIM2A28; atgRecVisitorId=11E5dCNHAF3DY73--VMtjl8HAR9AiGYuiaotYQqEpwAyhIM2A28; atgRecSessionId=VBGsCa2qgeDzgHnF7HxtvkoSXSeSwy6POY-0TwYrH7e96Cm64t9m!508038641!612038873; _dc_gtm_UA-3578763-1=1; _gat_UA-3578763-1=1' -H 'Host: m.twinspires.com' -H 'Referer: https://m.twinspires.com/' -H 'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:48.0) Gecko/20100101 Firefox/48.0' -H 'X-NewRelic-ID: VgIDUl9RGwECXFdSBAE=' -H 'X-Requested-With: XMLHttpRequest'");

$jsonOuput = json_decode($output);
foreach($jsonOuput->{'CurrentRace'} as $invOutput)
{
	//var_dump("DISPLAY_NAME: ".$invOutput->{'DisplayName'});
	//$invOutput->{'BrisCode'} = "CT";
	//$invOutput->{'TrackType'} = "Thoroughbred";

	$url = "https://m.twinspires.com/php/fw/php_BRIS_BatchAPI/2.3/Cdi/IntegratedScratch?username=iphone&password=ru13juhyo&ip=94.197.120.103&affid=2800&affiliateId=2800&output=json&track=".$invOutput->{'BrisCode'}."&type=".$invOutput->{'TrackType'};
	$outputBets = shell_exec("curl -s '".$url."' -H 'Accept: application/json, text/javascript, */*; q=0.01' -H 'Accept-Encoding: gzip, deflate, br' -H 'Accept-Language: en-GB,en;q=0.5' -H 'Connection: keep-alive' -H 'Cookie: frosmo_quickContext=%7B%22VERSION%22%3A%221.1.0%22%2C%22UID%22%3A%2260mts6.j1zgf8jt%22%2C%22lastPageView%22%3A%7B%22time%22%3A1493239967823%7D%2C%22states%22%3A%7B%22session%22%3A%7B%7D%7D%7D; _ga=GA1.3.1385454027.1493239801; scarab.visitor=%227BD4D8D707CF076D%22; frosmo_keywords=.tggp_1; __storejs__=%22__storejs__%22; SAID=B1U%3D; SID=555ce26859a65d492638cd3b89fb7bf7; _vwo_uuid_v2=D88FB00F401AFE62576C68F1A646E66E|d8edf082121f5651779bd3c380e33098; _ga=GA1.2.961637672.1493239969; xdVisitorId=11E5dCNHAF3DY73--VMtjl8HAR9AiGYuiaotYQqEpwAyhIM2A28; atgRecVisitorId=11E5dCNHAF3DY73--VMtjl8HAR9AiGYuiaotYQqEpwAyhIM2A28; atgRecSessionId=VBGsCa2qgeDzgHnF7HxtvkoSXSeSwy6POY-0TwYrH7e96Cm64t9m!508038641!612038873; _dc_gtm_UA-3578763-1=1; _gat_UA-3578763-1=1' -H 'Host: m.twinspires.com' -H 'Referer: https://m.twinspires.com/' -H 'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:48.0) Gecko/20100101 Firefox/48.0' -H 'X-NewRelic-ID: VgIDUl9RGwECXFdSBAE=' -H 'X-Requested-With: XMLHttpRequest'");
	$bettingRaces = json_decode($outputBets);
	foreach($bettingRaces->{'IntegratedScratches'} as $key => $betRace)
	{
		var_dump("DISPLAY_NAME: ".$invOutput->{'DisplayName'});
		var_dump("Race ".($key+1));
		$url = "https://m.twinspires.com/php/fw/php_BRIS_BatchAPI/2.3/Tote/OddsMtpPost?username=iphone&password=ru13juhyo&ip=94.197.120.103&affid=2800&affiliateId=2800&output=json&track=".$invOutput->{'BrisCode'}."&type=".$invOutput->{'TrackType'}."&race=".($key+1);
		$outputRaceOdds = shell_exec("curl -s '".$url."' -H 'Accept: application/json, text/javascript, */*; q=0.01' -H 'Accept-Encoding: gzip, deflate, br' -H 'Accept-Language: en-GB,en;q=0.5' -H 'Connection: keep-alive' -H 'Cookie: frosmo_quickContext=%7B%22VERSION%22%3A%221.1.0%22%2C%22UID%22%3A%2260mts6.j1zgf8jt%22%2C%22lastPageView%22%3A%7B%22time%22%3A1493239967823%7D%2C%22states%22%3A%7B%22session%22%3A%7B%7D%7D%7D; _ga=GA1.3.1385454027.1493239801; scarab.visitor=%227BD4D8D707CF076D%22; frosmo_keywords=.tggp_1; __storejs__=%22__storejs__%22; SAID=B1U%3D; SID=555ce26859a65d492638cd3b89fb7bf7; _vwo_uuid_v2=D88FB00F401AFE62576C68F1A646E66E|d8edf082121f5651779bd3c380e33098; _ga=GA1.2.961637672.1493239969; xdVisitorId=11E5dCNHAF3DY73--VMtjl8HAR9AiGYuiaotYQqEpwAyhIM2A28; atgRecVisitorId=11E5dCNHAF3DY73--VMtjl8HAR9AiGYuiaotYQqEpwAyhIM2A28; atgRecSessionId=VBGsCa2qgeDzgHnF7HxtvkoSXSeSwy6POY-0TwYrH7e96Cm64t9m!508038641!612038873; _dc_gtm_UA-3578763-1=1; _gat_UA-3578763-1=1' -H 'Host: m.twinspires.com' -H 'Referer: https://m.twinspires.com/' -H 'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:48.0) Gecko/20100101 Firefox/48.0' -H 'X-NewRelic-ID: VgIDUl9RGwECXFdSBAE=' -H 'X-Requested-With: XMLHttpRequest'");
		$urlProbs = "https://m.twinspires.com/php/fw/php_BRIS_BatchAPI/2.3/Tote/ExactaProbables?username=iphone&password=ru13juhyo&ip=94.197.121.165&affid=2800&affiliateId=2800&output=json&track=".$invOutput->{'BrisCode'}."&type=".$invOutput->{'TrackType'}."&race=".($key+1);
		$outputProbOdds = shell_exec("curl -s '".$urlProbs."' -H 'Accept: application/json, text/javascript, */*; q=0.01' -H 'Accept-Encoding: gzip, deflate, br' -H 'Accept-Language: en-GB,en;q=0.5' -H 'Connection: keep-alive' -H 'Cookie: frosmo_quickContext=%7B%22VERSION%22%3A%221.1.0%22%2C%22UID%22%3A%2260mts6.j1zgf8jt%22%2C%22lastPageView%22%3A%7B%22time%22%3A1493239967823%7D%2C%22states%22%3A%7B%22session%22%3A%7B%7D%7D%7D; _ga=GA1.3.1385454027.1493239801; scarab.visitor=%227BD4D8D707CF076D%22; frosmo_keywords=.tggp_1; __storejs__=%22__storejs__%22; SAID=B1U%3D; SID=555ce26859a65d492638cd3b89fb7bf7; _vwo_uuid_v2=D88FB00F401AFE62576C68F1A646E66E|d8edf082121f5651779bd3c380e33098; _ga=GA1.2.961637672.1493239969; xdVisitorId=11E5dCNHAF3DY73--VMtjl8HAR9AiGYuiaotYQqEpwAyhIM2A28; atgRecVisitorId=11E5dCNHAF3DY73--VMtjl8HAR9AiGYuiaotYQqEpwAyhIM2A28; atgRecSessionId=VBGsCa2qgeDzgHnF7HxtvkoSXSeSwy6POY-0TwYrH7e96Cm64t9m!508038641!612038873; _dc_gtm_UA-3578763-1=1; _gat_UA-3578763-1=1' -H 'Host: m.twinspires.com' -H 'Referer: https://m.twinspires.com/' -H 'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:48.0) Gecko/20100101 Firefox/48.0' -H 'X-NewRelic-ID: VgIDUl9RGwECXFdSBAE=' -H 'X-Requested-With: XMLHttpRequest'");
		$outputProbsJson = json_decode($outputProbOdds);
		$probsOdds = $outputProbsJson->{'Exotics'}->{'RunList'};
		if(empty($probsOdds))
		{
			print("No probables available".PHP_EOL);	
		}
		else
		{
			print("Probables table".PHP_EOL);
			foreach($probsOdds as $indexI => $invProbOdd)
			{
				foreach($invProbOdd->{'Combos'} as $indexJ => $element)
				{
					$probMatrix[$indexI][$indexJ] = $element->{'Amount'};
				}
				foreach($probMatrix[$indexI] as $rowElement)
				{
					printf("%10.1f", $rowElement);
				}
				print(PHP_EOL);
			}
		}
	
		$jsonOutputRaceOdds = json_decode($outputRaceOdds);
		$odds = array();
		if(property_exists($jsonOutputRaceOdds, "WinOdds"))
		{
			$odds = $jsonOutputRaceOdds->{"WinOdds"}->{"Entries"};
		}
		$oddsArray = array();
		foreach($betRace->{'EntryChanges'} as $index => $entryChange)
		{
			//var_dump($entryChange->{'HorseName'});
			//if(is_numeric($entryChange->{'ProgramNumber'}))
			//{
				if(array_key_exists($index, $odds) && property_exists($odds[$index], "NumOdds"))
				{
					array_push($oddsArray, trim($odds[$index]->{"NumOdds"}));
				}
				//else
				//{
				//	array_push($oddsArray, 0.5);
				//}
			//}
		}
		print("Odds for the Horses.".PHP_EOL);
		foreach(array_keys($oddsArray) as $horse => $horseIndex)
		{
			printf("%6.1d", $horseIndex);
		}
		print(PHP_EOL);
		foreach($oddsArray as $horse => $odds)
		{
			printf("%6.1f", $odds);
		}
		print(PHP_EOL);

		print("Exacta Odds compared to odds".PHP_EOL);
		for($index = 0; $index < count($oddsArray); $index++)
		{
			$rightIndex = $index +1;
			$matrix[$index][$index] = "x";
			if(!empty($probMatrix))
			{
				$payingAmount[$index][$index] = "x";
			}
			while($rightIndex < count($oddsArray))
			{
				$matrix[$index][$rightIndex] = (float) ($oddsArray[$index]*$oddsArray[$rightIndex]*2) + 5;
				$matrix[$rightIndex][$index] = (float) $matrix[$index][$rightIndex];
				if(!empty($probMatrix))
				{
					$payingAmount[$index][$rightIndex] =  $probMatrix[$index][$rightIndex] - $matrix[$index][$rightIndex];
					$payingAmount[$rightIndex][$index] =  $probMatrix[$rightIndex][$index] - $matrix[$rightIndex][$index];
				}

				$rightIndex++;
			}
			$row = $matrix[$index];
			foreach($row as $invElement)
			{
				if(is_string($invElement))
				{
					printf("%10.1s", "x");
				}
				else
				{
					printf("%10.1f", $invElement);
				}
			}
			print(PHP_EOL);
		}

		if(!empty($payingAmount))
		{
			print("Calculated Value".PHP_EOL);
			foreach($payingAmount as $indexX => $invRow)
			{
				foreach($invRow as $indexY => $invElement)
				{
					if(is_string($invElement))
					{
						printf("%10.1s", "x");
					}
					else
					{
						printf("%10.1f", $invElement);
					}
				}
				print(PHP_EOL);
			}
		}
		unset($payingAmount);
		unset($matrix);
		unset($probMatrix);
	}
}

?>
