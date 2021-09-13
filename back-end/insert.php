<?php
    include('connection.php');
    //productID is suppose unique

    //insert to product table

	$xml=simplexml_load_file("data.xml") or die("Error: Cannot create object");
	
	$bleachingCode=$xml->bleachingCode;	
	$defaultLanguage = $xml->defaultLanguage;
	$dryCleaningCode = $xml->dryCleaningCode;
	$dryingCode = $xml->dryingCode;
	$fasteningTypeCode = $xml->fasteningTypeCode;
	$ironingCode = $xml->ironingCode;
	$productID = $xml->productID;
	$pulloutTypeCode = $xml->pulloutTypeCode;
	$sapPacket = $xml->sapPacket;
	$updateImages = $xml->updateImages;
	$waistlineCode = $xml->waistlineCode;
	$washabilityCode = $xml->washabilityCode;

	$insert_product = "INSERT INTO product (bleachingCode, defaultLanguage, dryCleaningCode, dryingCode, fasteningTypeCode, ironingCode, productID, pulloutTypeCode, sapPacket, updateImages, waistlineCode, washabilityCode)
			VALUES ('$bleachingCode', '$defaultLanguage', '$dryCleaningCode', '$dryingCode', '$fasteningTypeCode', '$ironingCode', '$productID', '$pulloutTypeCode', '$sapPacket', '$updateImages', '$waistlineCode', '$washabilityCode' )";

	if ($conn->query($insert_product) === TRUE) {
		$pID = $conn->insert_id;
		echo "New record created successfully. Last inserted ID is: " . $pID;
	} else {
		echo "Error: " . $insert_product . "<br>" . $conn->error;
		$conn->close();
	}


	//insert to definitions table
		
	$locale = $xml->definitions->locale;

	$insert_definitions = "INSERT INTO definitions (locale, pID) VALUES ('$locale', '$pID')";

	if($conn->query($insert_definitions) == TRUE) {
		$defID = $conn->insert_id;
		echo "New record created successfully. Last inserted ID is: " . $defID;
	}else {
		echo "Error: " . $insert_definitions . "<br>" . $conn->error;
		$conn->close();
	}

	//insert to detailsData		

	foreach($xml->definitions->detailsData as $detailsData) {
		
		$cedi = $detailsData->cedi;
		$childWeightFrom = $detailsData->childWeightFrom;
		$childWeightTo = $detailsData->childWeightTo;
		$color_code = $detailsData->color_code;
		$color_description = $detailsData->color_description;
		$countryImages = $detailsData->countryImages;
		$defaultSku = $detailsData->defaultSku;
		$preferredEan = $detailsData->preferredEan;
		$sapAssortmentLevel = $detailsData->sapAssortmentLevel;
		$sapPrice = $detailsData->sapPrice;
		$season = $detailsData->season;
		$showOnLineSku = $detailsData->showOnLineSku;
		$size_code = $detailsData->size_code;
		$size_description = $detailsData->size_description;
		$skuID = $detailsData->skuID;
		$skuName = $detailsData->skuName;
		$stateOfArticle = $detailsData->stateOfArticle;
		$umSAPprice = $detailsData->umSAPprice;
		$volume = $detailsData->volume;
		$weight = $detailsData->weight;

		$insert_detailsData = "INSERT INTO detailsdata (cedi, childWeightFrom, childWeightTo, color_code, color_description, countryImages, defaultSku, preferredEan, sapAssortmentLevel,
			sapPrice, season, showOnLineSku, size_code, size_description, skuID, skuName, stateOfArticle, umSAPprice, volume, `weight`, defID) VALUES ('$cedi', '$childWeightFrom', '$childWeightTo', '$color_code', '$color_description', '$countryImages', '$defaultSku', '$preferredEan', '$sapAssortmentLevel',
			'$sapPrice', '$season', '$showOnLineSku', '$size_code', '$size_description', '$skuID', '$skuName', '$stateOfArticle', '$umSAPprice', '$volume', '$weight', '$defID') ";
	

		if($conn->query($insert_detailsData) == TRUE) {
			$detID = $conn->insert_id;
			echo "New record created successfully. Last inserted ID is: " . $detID;
		}else {
			echo "Error: " . $insert_detailsData . "<br>" . $conn->error;
			$conn->close();
		}
	} 


	//insert to headerdata	

	foreach($xml->definitions->headerData as $headerData) {
		$bag = $headerData->bag;
		$bleachingDescription = $headerData->bleachingDescription;
		$brand = $headerData->brand;
		$brandCode = $headerData->brandCode;
		$catalog = $headerData->catalog;
		$composition = $headerData->composition;
		$creationDateInDatabase = $headerData->creationDateInDatabase;
		$custom1 = $headerData->custom1;
		$custom2 = $headerData->custom2;
		$custom3 = $headerData->custom3;
		$drinkHolder = $headerData->drinkHolder;
		$dryCleaningDescription = $headerData->dryCleaningDescription;
		$dryingDescription = $headerData->dryingDescription;
		$EShopDisplayName = $headerData->EShopDisplayName;
		$EShopLongDescription = $headerData->EShopLongDescription;
		$ergonomicSeat = $headerData->ergonomicSeat;
		$fasteningTypeDescription = $headerData->fasteningTypeDescription;
		$fasteningTypeTextile = $headerData->fasteningTypeTextile;
		$flat = $headerData->flat;
		$freeDelivery = $headerData->freeDelivery;
		$gender = $headerData->gender;
		$indicatorOfItHasToBeAssembled = $headerData->indicatorOfItHasToBeAssembled;
		$ironingDescription = $headerData->ironingDescription;
		$lastDateChanged = $headerData->lastDateChanged;
		$lastUserChanged = $headerData->lastUserChanged;
		$productFeatures = $headerData->productFeatures;
		$productMissingFeatures = $headerData->productMissingFeatures;
		$pulloutType = $headerData->pulloutType;
		$pulloutTypeDescription = $headerData->pulloutTypeDescription;
		$punnet = $headerData->punnet;
		$sapCategoryID = $headerData->sapCategoryID;
		$sapCategoryName = $headerData->sapCategoryName;
		$sapDivisionID = $headerData->sapDivisionID;
		$sapDivisionName = $headerData->sapDivisionName;
		$sapFamilyDescription = $headerData->sapFamilyDescription;
		$sapFamilyID = $headerData->sapFamilyID;
		$sapFamilyName = $headerData->sapFamilyName;
		$sapMacrocategoryID = $headerData->sapMacrocategoryID;
		$sapMacrocategoryName = $headerData->sapMacrocategoryName;
		$sapName = $headerData->sapName;
		$sapUniverseID = $headerData->sapUniverseID;
		$sapUniverseName = $headerData->sapUniverseName;
		$showOnLine = $headerData->showOnLine;
		$sizeGuide = $headerData->sizeGuide;
		$userOfCreation = $headerData->userOfCreation;
		$waistlineDescription = $headerData->waistlineDescription;
		$washability = $headerData->washability;
		$washabilityDescription = $headerData->washabilityDescription;
		$zipStopper = $headerData->zipStopper;

		$insert_headerData = "INSERT INTO headerData (bag, bleachingDescription, brand, brandCode, `catalog`, composition, creationDateInDatabase, custom1, custom2, custom3,
			drinkHolder, dryCleaningDescription, dryingDescription, EShopDisplayName, EShopLongDescription, ergonomicSeat, fasteningTypeDescription, fasteningTypeTextile,
			flat, freeDelivery, gender, indicatorOfItHasToBeAssembled, ironingDescription, lastDateChanged, lastUserChanged, productFeatures, productMissingFeatures,
			pulloutType, pulloutTypeDescription, punnet, sapCategoryID, sapCategoryName, sapDivisionID, sapDivisionName, sapFamilyDescription, sapFamilyID,
			sapFamilyName, sapMacrocategoryID, sapMacrocategoryName, sapName, sapUniverseID, sapUniverseName, showOnLine, sizeGuide, userOfCreation, waistlineDescription,
			washability, washabilityDescription, zipStopper, defID) VALUES ('$bag', '$bleachingDescription', '$brand', '$brandCode', '$catalog', '$composition', '$creationDateInDatabase', '$custom1', '$custom2', '$custom3',
			'$drinkHolder', '$dryCleaningDescription', '$dryingDescription', '$EShopDisplayName', '$EShopLongDescription', '$ergonomicSeat', '$fasteningTypeDescription', '$fasteningTypeTextile',
			'$flat', '$freeDelivery', '$gender', '$indicatorOfItHasToBeAssembled', '$ironingDescription', '$lastDateChanged', '$lastUserChanged', '$productFeatures', '$productMissingFeatures',
			'$pulloutType', '$pulloutTypeDescription', '$punnet', '$sapCategoryID', '$sapCategoryName', '$sapDivisionID', '$sapDivisionName', '$sapFamilyDescription', '$sapFamilyID',
			'$sapFamilyName', '$sapMacrocategoryID', '$sapMacrocategoryName', '$sapName', '$sapUniverseID', '$sapUniverseName', '$showOnLine', '$sizeGuide', '$userOfCreation', '$waistlineDescription',
			'$washability', '$washabilityDescription', '$zipStopper', '$defID') ";

		if(!mysqli_query($conn, $insert_headerData)){
			echo("Error description: " . mysqli_error($conn));
		}
	}

?>