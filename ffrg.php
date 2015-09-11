<?php
$pageload_timestamp = date('d.m.Y H:i:s');
$jsonfile = file_get_contents('./ruhrgebiet.json');
$jsonarray = json_decode($jsonfile, true);
$ruhrgebiet_anzahlactive = 0;
$ruhrgebiet_anzahlall = 0;
$ruhrgebiet_anzahlclient = 0;

$niersufer = 0;
$Moers = 0;
$Dortmund = 0;
$Essen = 0;
$FFFF =  0;
$FFFL =  0;
$Hamm = 0;
$Bochum = 0;
$Emscherland = 0;
$rgwest = 0;
$EN = 0;
$SPR = 0;
$WIT = 0;
$Bochum= array();
$Dortmund= array();
$Essen= array();
$Emscherland= array();
$EN= array();
$FFFF= array();
$FFFL= array();
$Hamm= array();
$Moers= array();
$niersufer= array();
$rgwest= array();
$SPR= array();
$WIT= array();
$ruhrgebiet = array();
$fwkeys = array();
$global_firmware=array();

	foreach ($jsonarray['nodes'] as $key=>$value)
	{
		$durchlauf = $durchlauf + 1;
		$online = $value['flags']['online'];
		$fastd = $value['nodeinfo']['software']['fastd']['enabled'];
		$client = 0;
		$clients = $value['statistics']['clients'];
		
		if($online === true) {
			if (strpos($key, "niersufer_65401") !== false) {
				$niersufer_anzahlall = $niersufer_anzahlall + 1;
				$niersufer_anzahlactive = $niersufer_anzahlactive + 1;
				$niersufer_anzahlclient = $niersufer_anzahlclient + $clients;
				$niersufer_forward = ($niersufer_forward+$value['statistics']['traffic']['forward']['bytes']);
				$niersufer_rx = ($niersufer_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$niersufer_tx = ($niersufer_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $niersufer_vpn = $niersufer_vpn + 1;
				$niersufer[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}
			elseif (strpos($key, "moers_65401") !== false) {
				$moers_anzahlall = $moers_anzahlall + 1;
				$moers_anzahlactive = $moers_anzahlactive + 1;
				$moers_anzahlclient = $moers_anzahlclient + $clients;
				$moers_forward = ($moers_forward+$value['statistics']['traffic']['forward']['bytes']);
				$moers_rx = ($moers_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$moers_tx = ($moers_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $moers_vpn = $moers_vpn + 1;
				#echo $key."<hr>";
				$moers[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}
			elseif (strpos($key, "Dortmund_65403") !== false) {
				$Dortmund_anzahlall = $Dortmund_anzahlall + 1;
				$Dortmund_anzahlactive = $Dortmund_anzahlactive + 1;
				$Dortmund_anzahlclient = $Dortmund_anzahlclient + $clients;
				$Dortmund_forward = ($Dortmund_forward+$value['statistics']['traffic']['forward']['bytes']);
				$Dortmund_rx = ($Dortmund_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$Dortmund_tx = ($Dortmund_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $Dortmund_vpn = $Dortmund_vpn + 1;
				$Dortmund[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}
			elseif (strpos($key, "Essen_65406") !== false) {
				$Essen_anzahlall = $Essen_anzahlall + 1;
				$Essen_anzahlactive = $Essen_anzahlactive + 1;
				$Essen_anzahlclient = $Essen_anzahlclient + $clients;
				$Essen_forward = ($Essen_forward+$value['statistics']['traffic']['forward']['bytes']);
				$Essen_rx = ($Essen_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$Essen_tx = ($Essen_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $Essen_vpn = $Essen_vpn + 1;
				$Essen[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}
			elseif (strpos($key, "FFFF_65410") !== false) {
				$FFFF_anzahlall = $FFFF_anzahlall + 1;
				$FFFF_anzahlactive = $FFFF_anzahlactive + 1;
				$FFFF_anzahlclient = $FFFF_anzahlclient + $clients;
				$FFFF_forward = ($FFFF_forward+$value['statistics']['traffic']['forward']['bytes']);
				$FFFF_rx = ($FFFF_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$FFFF_tx = ($FFFF_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $FFFF_vpn = $FFFF_vpn + 1;
				$FFFF[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}
			elseif (strpos($key, "FFFL_65405") !== false) {
				$FFFL_anzahlall = $FFFL_anzahlall + 1;
				$FFFL_anzahlactive = $FFFL_anzahlactive + 1;
				$FFFL_anzahlclient = $FFFL_anzahlclient + $clients;
				$FFFL_forward = ($FFFL_forward+$value['statistics']['traffic']['forward']['bytes']);
				$FFFL_rx = ($FFFL_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$FFFL_tx = ($FFFL_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $FFFL_vpn = $FFFL_vpn + 1;
				$FFFL[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}
			elseif (strpos($key, "Hamm_65404") !== false) {
				$Hamm_anzahlall = $Hamm_anzahlall + 1;
				$Hamm_anzahlactive = $Hamm_anzahlactive + 1;
				$Hamm_anzahlclient = $Hamm_anzahlclient + $clients;
				$Hamm_forward = ($Hamm_forward+$value['statistics']['traffic']['forward']['bytes']);
				$Hamm_rx = ($Hamm_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$Hamm_tx = ($Hamm_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $Hamm_vpn = $Hamm_vpn + 1;
				$Hamm[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}
			elseif (strpos($key, "Bochum_65408") !== false) {
				$Bochum_anzahlall = $Bochum_anzahlall + 1;
				$Bochum_anzahlactive = $Bochum_anzahlactive + 1;
				$Bochum_anzahlclient = $Bochum_anzahlclient + $clients;
				$Bochum_forward = ($Bochum_forward+$value['statistics']['traffic']['forward']['bytes']);
				$Bochum_rx = ($Bochum_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$Bochum_tx = ($Bochum_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $Bochum_vpn = $Bochum_vpn + 1;
				$Bochum[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}
			elseif (strpos($key, "Emscherland_65402") !== false) {
				$Emscherland_anzahlall = $Emscherland_anzahlall + 1;
				$Emscherland_anzahlactive = $Emscherland_anzahlactive + 1;
				$Emscherland_anzahlclient = $Emscherland_anzahlclient + $clients;
				$Emscherland_forward = ($Emscherland_forward+$value['statistics']['traffic']['forward']['bytes']);
				$Emscherland_rx = ($Emscherland_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$Emscherland_tx = ($Emscherland_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $Emscherland_vpn = $Emscherland_vpn + 1;
				$Emscherland[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}
			elseif (strpos($key, "rgwest_65409") !== false) {
				$rgwest_anzahlall = $rgwest_anzahlall + 1;
				$rgwest_anzahlactive = $rgwest_anzahlactive + 1;
				$rgwest_anzahlclient = $rgwest_anzahlclient + $clients;
				$rgwest_forward = ($rgwest_forward+$value['statistics']['traffic']['forward']['bytes']);
				$rgwest_rx = ($rgwest_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$rgwest_tx = ($rgwest_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $rgwest_vpn = $rgwest_vpn + 1;
				$rgwest[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}
			elseif (strpos($key, "EN_65400") !== false) {
				$EN_anzahlall = $EN_anzahlall + 1;
				$EN_anzahlactive = $EN_anzahlactive + 1;
				$EN_anzahlclient = $EN_anzahlclient + $clients;
				$EN_forward = ($EN_forward+$value['statistics']['traffic']['forward']['bytes']);
				$EN_rx = ($EN_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$EN_tx = ($EN_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $EN_vpn = $EN_vpn + 1;
				$EN[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}
			elseif (strpos($key, "SPR_65400") !== false) {
				$SPR_anzahlall = $SPR_anzahlall + 1;
				$SPR_anzahlactive = $SPR_anzahlactive + 1;
				$SPR_anzahlclient = $SPR_anzahlclient + $clients;
				$SPR_forward = ($SPR_forward+$value['statistics']['traffic']['forward']['bytes']);
				$SPR_rx = ($SPR_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$SPR_tx = ($SPR_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $SPR_vpn = $SPR_vpn + 1;
				$SPR[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}
			elseif (strpos($key, "WIT_65400") !== false) {
				$WIT_anzahlall = $WIT_anzahlall + 1;
				$WIT_anzahlactive = $WIT_anzahlactive + 1;
				$WIT_anzahlclient = $WIT_anzahlclient + $clients;
				$WIT_forward = ($WIT_forward+$value['statistics']['traffic']['forward']['bytes']);
				$WIT_rx = ($WIT_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$WIT_tx = ($WIT_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $WIT_vpn = $WIT_vpn + 1;
				$WIT[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}
			else {
				$ruhrgebiet_anzahlall = $ruhrgebiet_anzahlall + 1;
				$ruhrgebiet_anzahlactive = $ruhrgebiet_anzahlactive + 1;
				$ruhrgebiet_anzahlclient = $ruhrgebiet_anzahlclient + $clients;
				$ruhrgebiet_forward = ($ruhrgebiet_forward+$value['statistics']['traffic']['forward']['bytes']);
				$ruhrgebiet_rx = ($ruhrgebiet_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
				$ruhrgebiet_tx = ($ruhrgebiet_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
				if($fastd === true AND $online === true) $ruhrgebiet_vpn = $ruhrgebiet_vpn + 1;
				$ruhrgebiet[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);
			}

			$global_active = $global_active + 1;
			$global_anzahlclient = $global_anzahlclient + $clients;
			if($fastd === true AND $online === true) $global_vpn = $global_vpn + 1;
			$global_forward = ($global_forward+$value['statistics']['traffic']['forward']['bytes']);
			$global_rx = ($global_rx+$value['statistics']['traffic']['rx']['bytes']+$value['statistics']['traffic']['mgmt_rx']['bytes']);
			$global_tx = ($global_tx+$value['statistics']['traffic']['tx']['bytes']+$value['statistics']['traffic']['mgmt_tx']['bytes']);
			$global_firmware[]=($value['nodeinfo']['software']['firmware']['release'].", ".$value['nodeinfo']['software']['firmware']['base']);

		} else {
			if (strpos($key, "niersufer_65401") !== false) {
				$niersufer_anzahlall = $niersufer_anzahlall + 1;
			}
			elseif (strpos($key, "moers_65401") !== false) {
				$moers_anzahlall = $moers_anzahlall + 1;
			}
			elseif (strpos($key, "Dortmund_65403") !== false) {
				$Dortmund_anzahlall = $Dortmund_anzahlall + 1;
			}
			elseif (strpos($key, "Essen_65406") !== false) {
				$Essen_anzahlall = $Essen_anzahlall + 1;
			}
			elseif (strpos($key, "FFFF_65410") !== false) {
				$FFFF_anzahlall = $FFFF_anzahlall + 1;
			}
			elseif (strpos($key, "FFFL_65405") !== false) {
				$FFFL_anzahlall = $FFFL_anzahlall + 1;
			}
			elseif (strpos($key, "Hamm_65404") !== false) {
				$Hamm_anzahlall = $Hamm_anzahlall + 1;
			}
			elseif (strpos($key, "Bochum_65408") !== false) {
				$Bochum_anzahlall = $Bochum_anzahlall + 1;
			}
			elseif (strpos($key, "Emscherland_65402") !== false) {
				$Emscherland_anzahlall = $Emscherland_anzahlall + 1;
			}
			elseif (strpos($key, "rgwest_65409") !== false) {
				$rgwest_anzahlall = $rgwest_anzahlall + 1;
			}
			elseif (strpos($key, "EN_65400") !== false) {
				$EN_anzahlall = $EN_anzahlall + 1;
			}
			elseif (strpos($key, "SPR_65400") !== false) {
				$SPR_anzahlall = $SPR_anzahlall + 1;
			}
			elseif (strpos($key, "WIT_65400") !== false) {
				$WIT_anzahlall = $WIT_anzahlall + 1;
			}
			else {
				$ruhrgebiet_anzahlall = $ruhrgebiet_anzahlall + 1;

			}
		} 


		$global_anzahlall = $global_anzahlall + 1;

	}

$global_domaenen = 14;

$niersufer_forward = round(($niersufer_forward / 1099511627776),2);
$niersufer_rx = round(($niersufer_rx / 1099511627776),2);
$niersufer_tx = round(($niersufer_tx / 1099511627776),2);
$niersufer_ratio =  number_format(round(($niersufer_anzahlactive / ($niersufer_vpn + 1)) ,1),1);

$moers_forward = round(($moers_forward / 1099511627776),2);
$moers_rx = round(($moers_rx / 1099511627776),2);
$moers_tx = round(($moers_tx / 1099511627776),2);
$moers_ratio =  number_format(round(($moers_anzahlactive / ($moers_vpn + 1)) ,1),1);

$Dortmund_forward = round(($Dortmund_forward / 1099511627776),2);
$Dortmund_rx = round(($Dortmund_rx / 1099511627776),2);
$Dortmund_tx = round(($Dortmund_tx / 1099511627776),2);
$Dortmund_ratio =  number_format(round(($Dortmund_anzahlactive / ($Dortmund_vpn + 1)) ,1),1);

$Essen_forward = round(($Essen_forward / 1099511627776),2);
$Essen_rx = round(($Essen_rx / 1099511627776),2);
$Essen_tx = round(($Essen_tx / 1099511627776),2);
$Essen_ratio =  number_format(round(($Essen_anzahlactive / ($Essen_vpn + 1)) ,1),1);

$FFFF_forward = round(($FFFF_forward / 1099511627776),2);
$FFFF_rx = round(($FFFF_rx / 1099511627776),2);
$FFFF_tx = round(($FFFF_tx / 1099511627776),2);
$FFFF_ratio =  number_format(round(($FFFF_anzahlactive / ($FFFF_vpn + 1)) ,1),1);

$FFFL_forward = round(($FFFL_forward / 1099511627776),2);
$FFFL_rx = round(($FFFL_rx / 1099511627776),2);
$FFFL_tx = round(($FFFL_tx / 1099511627776),2);
$FFFL_ratio =  number_format(round(($FFFL_anzahlactive / ($FFFL_vpn + 1)) ,1),1);

$Hamm_forward = round(($Hamm_forward / 1099511627776),2);
$Hamm_rx = round(($Hamm_rx / 1099511627776),2);
$Hamm_tx = round(($Hamm_tx / 1099511627776),2);
$Hamm_ratio =  number_format(round(($Hamm_anzahlactive / ($Hamm_vpn + 1)) ,1),1);

$Bochum_forward = round(($Bochum_forward / 1099511627776),2);
$Bochum_rx = round(($Bochum_rx / 1099511627776),2);
$Bochum_tx = round(($Bochum_tx / 1099511627776),2);
$Bochum_ratio =  number_format(round(($Bochum_anzahlactive / ($Bochum_vpn + 1)) ,1),1);

$Emscherland_forward = round(($Emscherland_forward / 1099511627776),2);
$Emscherland_rx = round(($Emscherland_rx / 1099511627776),2);
$Emscherland_tx = round(($Emscherland_tx / 1099511627776),2);
$Emscherland_ratio =  number_format(round(($Emscherland_anzahlactive / ($Emscherland_vpn + 1)) ,1),1);

$rgwest_forward = round(($rgwest_forward / 1099511627776),2);
$rgwest_rx = round(($rgwest_rx / 1099511627776),2);
$rgwest_tx = round(($rgwest_tx / 1099511627776),2);
$rgwest_ratio =  number_format(round(($rgwest_anzahlactive / ($rgwest_vpn + 1)) ,1),1);

$EN_forward = round(($EN_forward / 1099511627776),2);
$EN_rx = round(($EN_rx / 1099511627776),2);
$EN_tx = round(($EN_tx / 1099511627776),2);
$EN_ratio =  number_format(round(($EN_anzahlactive / ($EN_vpn + 1)) ,1),1);

$SPR_forward = round(($SPR_forward / 1099511627776),2);
$SPR_rx = round(($SPR_rx / 1099511627776),2);
$SPR_tx = round(($SPR_tx / 1099511627776),2);
$SPR_ratio =  number_format(round(($SPR_anzahlactive / ($SPR_vpn + 1)) ,1),1);

$WIT_forward = round(($WIT_forward / 1099511627776),2);
$WIT_rx = round(($WIT_rx / 1099511627776),2);
$WIT_tx = round(($WIT_tx / 1099511627776),2);
$WIT_ratio =  number_format(round(($WIT_anzahlactive / ($WIT_vpn + 1)) ,1),1);

$ruhrgebiet_forward = round(($ruhrgebiet_forward / 1099511627776),2);
$ruhrgebiet_rx = round(($ruhrgebiet_rx / 1099511627776),2);
$ruhrgebiet_tx = round(($ruhrgebiet_tx / 1099511627776),2);
$ruhrgebiet_ratio =  number_format(round(($ruhrgebiet_anzahlactive / ($ruhrgebiet_vpn + 1)) ,1),1);

$global_forward = round(($global_forward / 1099511627776),2);
$global_rx = round(($global_rx / 1099511627776),2);
$global_tx = round(($global_tx / 1099511627776),2);

$fwkeys=(array_count_values($Bochum));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$Bochum_firmware = $Bochum_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($Dortmund));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$Dortmund_firmware = $Dortmund_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($Essen));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$Essen_firmware = $Essen_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($Emscherland));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$Emscherland_firmware = $Emscherland_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($EN));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$EN_firmware = $EN_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($FFFF));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$FFFF_firmware = $FFFF_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($FFFL));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$FFFL_firmware = $FFFL_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($Hamm));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$Hamm_firmware = $Hamm_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($moers));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$moers_firmware = $moers_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($niersufer));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$niersufer_firmware = $niersufer_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($rgwest));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$rgwest_firmware = $rgwest_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($SPR));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$SPR_firmware = $SPR_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($WIT));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$WIT_firmware = $WIT_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($ruhrgebiet));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$ruhrgebiet_firmware = $ruhrgebiet_firmware.$fwkey.", ".$fwvalue." \r\n";
}

$fwkeys=(array_count_values($global_firmware));
foreach ($fwkeys as $fwkey => $fwvalue) {
	$globalfw = $globalfw.$fwkey.", ".$fwvalue." \r\n";
}


if (isset($_GET["json"])) {

	$curOutput = "";

	$curOutput = $curOutput."{\r\n";
	$curOutput = $curOutput."  \"global\": {\r\n";
	$curOutput = $curOutput."    \"anzahl\": [\r\n";
	$curOutput = $curOutput."      ".$global_domaenen."\r\n";
	$curOutput = $curOutput."    ],\r\n";
	$curOutput = $curOutput."    \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$global_active.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($global_anzahlall - $global_active)."\r\n";
	$curOutput = $curOutput."    },\r\n";
	$curOutput = $curOutput."    \"clients\": [\r\n";
	$curOutput = $curOutput."      ".$global_anzahlclient."\r\n";
	$curOutput = $curOutput."    ],\r\n";
	$curOutput = $curOutput."    \"tunnel\": [\r\n";
	$curOutput = $curOutput."      ".$global_vpn."\r\n";
	$curOutput = $curOutput."    ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$global_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$global_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$global_tx."\"\r\n";
	$curOutput = $curOutput."    }\r\n";
	$curOutput = $curOutput."  },\r\n";
	$curOutput = $curOutput."  \"netze\": {\r\n";

	$curOutput = $curOutput."    \"Hauptdomaene\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$ruhrgebiet_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($ruhrgebiet_anzahlall - $ruhrgebiet_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$ruhrgebiet_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$ruhrgebiet_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$ruhrgebiet_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$ruhrgebiet_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$ruhrgebiet_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($ruhrgebiet_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$ruhrgebiet_firmware),0,(str_replace("\r\n","\",\r\n\"",$ruhrgebiet_firmware)-5))."\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    },\r\n";

	$curOutput = $curOutput."    \"Bochum\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$Bochum_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($Bochum_anzahlall - $Bochum_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$Bochum_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$Bochum_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$Bochum_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$Bochum_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$Bochum_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($Bochum_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$Bochum_firmware),0,(str_replace("\r\n","\",\r\n\"",$Bochum_firmware)-5))."\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    },\r\n";

	$curOutput = $curOutput."    \"Dortmund\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$Dortmund_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($Dortmund_anzahlall - $Dortmund_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$Dortmund_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$Dortmund_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$Dortmund_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$Dortmund_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$Dortmund_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($Dortmund_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$Dortmund_firmware),0,(str_replace("\r\n","\",\r\n\"",$Dortmund_firmware)-5))."\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    },\r\n";

	$curOutput = $curOutput."    \"Essen\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$Essen_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($Essen_anzahlall - $Essen_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$Essen_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$Essen_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$Essen_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$Essen_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$Essen_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($Essen_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$Essen_firmware),0,(str_replace("\r\n","\",\r\n\"",$Essen_firmware)-5))."\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    },\r\n";

	$curOutput = $curOutput."    \"Emscherland\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$Emscherland_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($Emscherland_anzahlall - $Emscherland_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$Emscherland_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$Emscherland_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$Emscherland_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$Emscherland_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$Emscherland_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($Emscherland_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$Emscherland_firmware),0,(str_replace("\r\n","\",\r\n\"",$Emscherland_firmware)-5))."\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    },\r\n";

	$curOutput = $curOutput."    \"EN\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$EN_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($EN_anzahlall - $EN_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$EN_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$EN_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$EN_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$EN_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$EN_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($EN_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$EN_firmware),0,(str_replace("\r\n","\",\r\n\"",$EN_firmware)-5))."\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    },\r\n";

	$curOutput = $curOutput."    \"Fichtenfunk\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$FFFF_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($FFFF_anzahlall - $FFFF_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$FFFF_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$FFFF_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$FFFF_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$FFFF_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$FFFF_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($FFFF_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$FFFF_firmware),0,(str_replace("\r\n","\",\r\n\"",$FFFF_firmware)-6))."\"\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    },\r\n";

	$curOutput = $curOutput."    \"Flachland\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$FFFL_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($FFFL_anzahlall - $FFFL_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$FFFL_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$FFFL_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$FFFL_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$FFFL_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$FFFL_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($FFFL_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$FFFL_firmware),0,(str_replace("\r\n","\",\r\n\"",$FFFL_firmware)-5))."\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    },\r\n";

	$curOutput = $curOutput."    \"Hamm\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$Hamm_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($Hamm_anzahlall - $Hamm_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$Hamm_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$Hamm_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$Hamm_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$Hamm_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$Hamm_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($Hamm_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$Hamm_firmware),0,(str_replace("\r\n","\",\r\n\"",$Hamm_firmware)-5))."\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    },\r\n";

	$curOutput = $curOutput."    \"Moers\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$moers_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($moers_anzahlall - $moers_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$moers_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$moers_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$moers_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$moers_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$moers_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($moers_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$moers_firmware),0,(str_replace("\r\n","\",\r\n\"",$moers_firmware)-5))."\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    },\r\n";

	$curOutput = $curOutput."    \"Niersufer\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$niersufer_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($niersufer_anzahlall - $niersufer_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$niersufer_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$niersufer_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$niersufer_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$niersufer_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$niersufer_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($niersufer_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$niersufer_firmware),0,(str_replace("\r\n","\",\r\n\"",$niersufer_firmware)-5))."\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    },\r\n";

	$curOutput = $curOutput."    \"rgwest\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$rgwest_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($rgwest_anzahlall - $rgwest_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$rgwest_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$rgwest_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$rgwest_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$rgwest_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$rgwest_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($rgwest_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$rgwest_firmware),0,(str_replace("\r\n","\",\r\n\"",$rgwest_firmware)-5))."\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    },\r\n";

	$curOutput = $curOutput."    \"Sprockhoevel\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$SPR_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($SPR_anzahlall - $SPR_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$SPR_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$SPR_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$SPR_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$SPR_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$SPR_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($SPR_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$SPR_firmware),0,(str_replace("\r\n","\",\r\n\"",$SPR_firmware)-5))."\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    },\r\n";

	$curOutput = $curOutput."    \"Witten\": {\r\n";
	$curOutput = $curOutput."     \"nodes\": {\r\n";
	$curOutput = $curOutput."      \"online\": ".$WIT_anzahlactive.",\r\n";
	$curOutput = $curOutput."      \"offline\": ".($WIT_anzahlall - $WIT_anzahlactive)."\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"clients\": [\r\n";
	$curOutput = $curOutput."       ".$WIT_anzahlclient."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."     \"tunnel\": [\r\n";
	$curOutput = $curOutput."       ".$WIT_vpn."\r\n";
	$curOutput = $curOutput."     ],\r\n";
	$curOutput = $curOutput."    \"traffic\": {\r\n";
	$curOutput = $curOutput."      \"forward\": \"".$WIT_forward."\",\r\n";
	$curOutput = $curOutput."      \"rx\": \"".$WIT_rx."\",\r\n";
	$curOutput = $curOutput."      \"tx\": \"".$WIT_tx."\"\r\n";
	$curOutput = $curOutput."     },\r\n";
	$curOutput = $curOutput."     \"firmware\": {\r\n";
	$curOutput = $curOutput."       \"count\": \"".substr_count($WIT_firmware,chr(13))."\",\r\n";
	$curOutput = $curOutput."       \"versions\": [\r\n";
	$curOutput = $curOutput."       \"".substr(str_replace("\r\n","\",\r\n\"",$WIT_firmware),0,(str_replace("\r\n","\",\r\n\"",$WIT_firmware)-5))."\r\n";
	$curOutput = $curOutput."         ]	\r\n";
	$curOutput = $curOutput."       }\r\n";
	$curOutput = $curOutput."    }\r\n";

	$curOutput = $curOutput."  }\r\n";
	$curOutput = $curOutput."}\r\n";


} else {



	$curOutput = "<html><head><title>Knotenübersicht Freifunk Rheinland e.V.</title>";
	$curOutput = $curOutput.'<link rel="icon" type="image/png" href="freifunk.png">';
	$curOutput = $curOutput.'<link rel="apple-touch-icon" type="image/png" href="freifunk.png">';
	$curOutput = $curOutput."<STYLE TYPE=text/css>";
	$curOutput = $curOutput."<!--";
	$curOutput = $curOutput."TD{font-family: Arial; font-size: 11pt;}";

	$curOutput = $curOutput."#rand TD{ border: 1px solid #4F4F4F; border-collapse: separate; }";
	$curOutput = $curOutput."HR{ color: #4F4F4F; background-color: #4F4F4F; }";
	$curOutput = $curOutput."--->";
        $curOutput = $curOutput."</STYLE> \r\n";
        $curOutput = $curOutput."<meta http-equiv=\"refresh\" content=\"60\" /> \r\n";
        $curOutput = $curOutput."<script type=\"text/javascript\"> \r\n";
        $curOutput = $curOutput."var count=60; \r\n";
        $curOutput = $curOutput."var counter=setInterval(timer, 1000); //1000 will  run it every 1 second \r\n";
        $curOutput = $curOutput."function timer() \r\n";
        $curOutput = $curOutput."{ \r\n";
        $curOutput = $curOutput."  count=count-1; \r\n";
        $curOutput = $curOutput."  if (count <= 0) \r\n";
        $curOutput = $curOutput."  { \r\n";
        $curOutput = $curOutput."     clearInterval(counter); \r\n";
        $curOutput = $curOutput."     return; \r\n";
        $curOutput = $curOutput."  } \r\n";
        $curOutput = $curOutput." document.getElementById(\"timer\").innerHTML=\"Seite l&auml;dt neu in \" + count + \" Sekunden\"; // watch for spelling \r\n";
        $curOutput = $curOutput."} \r\n";
        $curOutput = $curOutput."</script> \r\n";

        $curOutput = $curOutput."</head> \r\n";
        $curOutput = $curOutput."<body font=arial> \r\n";
	$curOutput = $curOutput."<table border=0 width=100%><tr><td align=center><table border=0><tr><td><a href='./'><img src='freifunk_header.png' height=50px border=0></a><br>&nbsp;</td></tr><tr><td><table id='rand' cellspacing=1px cellpadding=3px>";

	$curOutput = $curOutput."<tr><td align=center bgcolor='#E0E0E0'><b>&nbsp;Netze&nbsp;<hr noshade>".$global_domaenen."</b></td><td align=center bgcolor='#E0E0E0' colspan=2><b>&nbsp;Anzahl Nodes&nbsp;<hr noshade><a title=ONLINE><font color=green>".$global_active;
	$curOutput = $curOutput."</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a title=OFFLINE><font color=red>".($global_anzahlall - $global_active)."</font></a></b></td><td align=center bgcolor='#E0E0E0'><b>&nbsp;Clients&nbsp;<hr noshade>".$global_anzahlclient;
	$curOutput = $curOutput."</b></td><td align=center bgcolor='#E0E0E0'><b>&nbsp;VPN Tunnel&nbsp;<hr noshade>".$global_vpn."</b></td><td align=center bgcolor='#E0E0E0'><b>&nbsp;Traffic (TB)&nbsp;<hr noshade>".$global_forward."&nbsp;|&nbsp;".$global_rx."&nbsp;|&nbsp;".$global_tx."</b></td><td align=center bgcolor='#E0E0E0'><b>&nbsp;Firmware&nbsp;<hr noshade><a title='".$globalfw."'>".substr_count($globalfw,chr(13))."&nbsp;Versionen</a></b></td></tr>"; 

	$curOutput = $curOutput."<tr><td align=center>Hauptdomäne</td><td align=center><a title=ONLINE><font color=green>".$ruhrgebiet_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($ruhrgebiet_anzahlall - $ruhrgebiet_anzahlactive)."</font></a></td><td align=center>".$ruhrgebiet_anzahlclient."</td><td align=center>".($ruhrgebiet_vpn)."</td><td align=center>".$ruhrgebiet_forward."&nbsp;|&nbsp;".$ruhrgebiet_rx."&nbsp;|&nbsp;".$ruhrgebiet_tx."</td><td align=center><a title='".$ruhrgebiet_firmware."'>".substr_count($ruhrgebiet_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";

	$curOutput = $curOutput."<tr><td align=center>Bochum</td><td align=center><a title=ONLINE><font color=green>".$Bochum_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($Bochum_anzahlall - $Bochum_anzahlactive)."</font></a></td><td align=center>".$Bochum_anzahlclient."</td><td align=center>".($Bochum_vpn)."</td><td align=center>".$Bochum_forward."&nbsp;|&nbsp;".$Bochum_rx."&nbsp;|&nbsp;".$Bochum_tx."</td><td align=center><a title='".$Bochum_firmware."'>".substr_count($Bochum_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";

	$curOutput = $curOutput."<tr><td align=center>Dortmund</td><td align=center><a title=ONLINE><font color=green>".$Dortmund_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($Dortmund_anzahlall - $Dortmund_anzahlactive)."</font></a></td><td align=center>".$Dortmund_anzahlclient."</td><td align=center>".($Dortmund_vpn)."</td><td align=center>".$Dortmund_forward."&nbsp;|&nbsp;".$Dortmund_rx."&nbsp;|&nbsp;".$Dortmund_tx."</td><td align=center><a title='".$Dortmund_firmware."'>".substr_count($Dortmund_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";

	$curOutput = $curOutput."<tr><td align=center>Essen</td><td align=center><a title=ONLINE><font color=green>".$Essen_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($Essen_anzahlall - $Essen_anzahlactive)."</font></a></td><td align=center>".$Essen_anzahlclient."</td><td align=center>".($Essen_vpn)."</td><td align=center>".$Essen_forward."&nbsp;|&nbsp;".$Essen_rx."&nbsp;|&nbsp;".$Essen_tx."</td><td align=center><a title='".$Essen_firmware."'>".substr_count($Essen_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";

	$curOutput = $curOutput."<tr><td align=center>Emscherland</td><td align=center><a title=ONLINE><font color=green>".$Emscherland_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($Emscherland_anzahlall - $Emscherland_anzahlactive)."</font></a></td><td align=center>".$Emscherland_anzahlclient."</td><td align=center>".($Emscherland_vpn)."</td><td align=center>".$Emscherland_forward."&nbsp;|&nbsp;".$Emscherland_rx."&nbsp;|&nbsp;".$Emscherland_tx."</td><td align=center><a title='".$Emscherland_firmware."'>".substr_count($Emscherland_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";

	$curOutput = $curOutput."<tr><td align=center>EN-Kreis</td><td align=center><a title=ONLINE><font color=green>".$EN_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($EN_anzahlall - $EN_anzahlactive)."</font></a></td><td align=center>".$EN_anzahlclient."</td><td align=center>".($EN_vpn)."</td><td align=center>".$EN_forward."&nbsp;|&nbsp;".$EN_rx."&nbsp;|&nbsp;".$EN_tx."</td><td align=center><a title='".$EN_firmware."'>".substr_count($EN_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";

	$curOutput = $curOutput."<tr><td align=center>Fichtenfunk</td><td align=center><a title=ONLINE><font color=green>".$FFFF_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($FFFF_anzahlall - $FFFF_anzahlactive)."</font></a></td><td align=center>".$FFFF_anzahlclient."</td><td align=center>".($FFFF_vpn)."</td><td align=center>".$FFFF_forward."&nbsp;|&nbsp;".$FFFF_rx."&nbsp;|&nbsp;".$FFFF_tx."</td><td align=center><a title='".$FFFF_firmware."'>".substr_count($FFFF_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";

	$curOutput = $curOutput."<tr><td align=center>Flachland</td><td align=center><a title=ONLINE><font color=green>".$FFFL_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($FFFL_anzahlall - $FFFL_anzahlactive)."</font></a></td><td align=center>".$FFFL_anzahlclient."</td><td align=center>".($FFFL_vpn)."</td><td align=center>".$FFFL_forward."&nbsp;|&nbsp;".$FFFL_rx."&nbsp;|&nbsp;".$FFFL_tx."</td><td align=center><a title='".$FFFL_firmware."'>".substr_count($FFFL_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";

	$curOutput = $curOutput."<tr><td align=center>Hamm</td><td align=center><a title=ONLINE><font color=green>".$Hamm_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($Hamm_anzahlall - $Hamm_anzahlactive)."</font></a></td><td align=center>".$Hamm_anzahlclient."</td><td align=center>".($Hamm_vpn)."</td><td align=center>".$Hamm_forward."&nbsp;|&nbsp;".$Hamm_rx."&nbsp;|&nbsp;".$Hamm_tx."</td><td align=center><a title='".$Hamm_firmware."'>".substr_count($Hamm_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";

	$curOutput = $curOutput."<tr><td align=center>Moers</td><td align=center><a title=ONLINE><font color=green>".$moers_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($moers_anzahlall - $moers_anzahlactive)."</font></a></td><td align=center>".$moers_anzahlclient."</td><td align=center>".($moers_vpn)."</td><td align=center>".$moers_forward."&nbsp;|&nbsp;".$moers_rx."&nbsp;|&nbsp;".$moers_tx."</td><td align=center><a title='".$moers_firmware."'>".substr_count($moers_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";

	$curOutput = $curOutput."<tr><td align=center>Niersufer</td><td align=center><a title=ONLINE><font color=green>".$niersufer_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($niersufer_anzahlall - $niersufer_anzahlactive)."</font></a></td><td align=center>".$niersufer_anzahlclient."</td><td align=center>".($niersufer_vpn)."</td><td align=center>".$niersufer_forward."&nbsp;|&nbsp;".$niersufer_rx."&nbsp;|&nbsp;".$niersufer_tx."</td><td align=center><a title='".$niersufer_firmware."'>".substr_count($niersufer_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";

	$curOutput = $curOutput."<tr><td align=center>RG-West</td><td align=center><a title=ONLINE><font color=green>".$rgwest_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($rgwest_anzahlall - $rgwest_anzahlactive)."</font></a></td><td align=center>".$rgwest_anzahlclient."</td><td align=center>".($rgwest_vpn)."</td><td align=center>".$rgwest_forward."&nbsp;|&nbsp;".$rgwest_rx."&nbsp;|&nbsp;".$rgwest_tx."</td><td align=center><a title='".$rgwest_firmware."'>".substr_count($rgwest_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";

	$curOutput = $curOutput."<tr><td align=center>SPR</td><td align=center><a title=ONLINE><font color=green>".$SPR_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($SPR_anzahlall - $SPR_anzahlactive)."</font></a></td><td align=center>".$SPR_anzahlclient."</td><td align=center>".($SPR_vpn)."</td><td align=center>".$SPR_forward."&nbsp;|&nbsp;".$SPR_rx."&nbsp;|&nbsp;".$SPR_tx."</td><td align=center><a title='".$SPR_firmware."'>".substr_count($SPR_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";

	$curOutput = $curOutput."<tr><td align=center>Witten</td><td align=center><a title=ONLINE><font color=green>".$WIT_anzahlactive."</font></a></td><td align=center><a title=OFFLINE><font color=red>".($WIT_anzahlall - $WIT_anzahlactive)."</font></a></td><td align=center>".$WIT_anzahlclient."</td><td align=center>".($WIT_vpn)."</td><td align=center>".$WIT_forward."&nbsp;|&nbsp;".$WIT_rx."&nbsp;|&nbsp;".$WIT_tx."</td><td align=center><a title='".$WIT_firmware."'>".substr_count($WIT_firmware,chr(13))."&nbsp;Versionen</a></td></tr>";


	$curOutput = $curOutput."</table></td></tr><tr><td align=center><font size=-1 color='#808080'><b>Datenstand vom ".$pageload_timestamp."<br>&nbsp;<span id=\"timer\"></span>&nbsp;</b></font></td></tr></table><br><br><br><a href=\"./ffrg.php?json\">Daten als JSON</a></td></tr></table>";
	$curOutput = $curOutput."</body></html>";

}

echo $curOutput;
?>
