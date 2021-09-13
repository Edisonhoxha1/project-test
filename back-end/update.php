<?php
   include('connection.php');

	//update 
	$xml=simplexml_load_file("updateData.xml") or die("Error: Cannot create object");
		
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

	//get pID
	$getpID_query = "SELECT pID FROM product WHERE productID='$productID' ";
	$getpID_result = mysqli_query($conn, $getpID_query);

	if (mysqli_num_rows($getpID_result) > 0) {
		while($row = mysqli_fetch_assoc($getpID_result)) {
			$pID = $row['pID'];
		}
	}else {
		$conn->close();
	}

	//update product table
	$update_product = "UPDATE product SET bleachingCode='$bleachingCode', defaultLanguage='$defaultLanguage', dryCleaningCode='$dryCleaningCode', dryingCode='$dryingCode', fasteningTypeCode='$fasteningTypeCode', ironingCode='$ironingCode', productID='$productID', pulloutTypeCode='$pulloutTypeCode', sapPacket='$sapPacket', updateImages='$updateImages', waistlineCode='$waistlineCode', washabilityCode='$washabilityCode' WHERE productID='$productID'  ";

	if(mysqli_query($conn, $update_product)){
		echo "Records were updated successfully, product table <br>";
	} else {
		echo "ERROR: Could not able to execute $update_product. " . mysqli_error($conn);
	}  


	//get defID
	$getdefID_query = "SELECT defID FROM definitions WHERE pID='$pID' ";
	$getderID_result = mysqli_query($conn, $getdefID_query);

	if(mysqli_num_rows($getderID_result) > 0) {
		while($row = mysqli_fetch_assoc($getderID_result)) {
			$defID = $row['defID'];
		}
	}else{
		$conn->close();
	}

	//update definitions table
	$locale = $xml->definitions->locale;
	$update_def = "UPDATE definitions SET locale='$locale' WHERE defID='$defID' ";

	if(mysqli_query($conn, $update_def)){
		
		echo "Records were updated successfully,definitions table. <br>";
	} else {
		echo "ERROR: Could not able to execute $update_def. " . mysqli_error($conn);
	} 


	//get detID
	$detID_array = [];
	$getdetID_query = "SELECT detID FROM detailsdata WHERE defID='$defID' ";
	$getdetID_result = mysqli_query($conn, $getdetID_query);

	if(mysqli_num_rows($getdetID_result) > 0) {
		while($row = mysqli_fetch_assoc($getdetID_result)) {
			$detID = $row['detID'];
			array_push($detID_array, $detID);
		}
	}else {
		$conn->close();
	}

	//update detailsdata table
	$x = 0;
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
		
		$update_det = "UPDATE detailsData SET cedi='$cedi', childWeightFrom='$childWeightFrom', childWeightTo='$childWeightTo', color_code='$color_code', color_description='$color_description', countryImages='$countryImages', defaultSku='$defaultSku', preferredEan='$preferredEan', sapAssortmentLevel='$sapAssortmentLevel', sapPrice='$sapPrice', season='$season', showOnLineSku='$showOnLineSku', size_code='$size_code', size_description='$size_description', skuID='$skuID', skuName='$skuName', stateOfArticle='$stateOfArticle', umSAPprice='$umSAPprice', volume='$volume', `weight`='$weight' WHERE detID='$detID_array[$x]' ";

		if(mysqli_query($conn, $update_det)){
			echo "Records were updated successfully, detailsData table. <br>";
		} else {
			echo "ERROR: Could not able to execute $update_det. " . mysqli_error($conn);
		} 
		$x++;
	}


	//update to headerdata	
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

		$update_head = "UPDATE headerdata SET bag='$bag', bleachingDescription='$bleachingDescription', brand='$brand', brandCode='$brandCode', `catalog`='$catalog', composition='$composition', creationDateInDatabase='$creationDateInDatabase', custom1='$custom1', custom2='$custom2', custom3='$custom3', drinkHolder='$drinkHolder', dryCleaningDescription='$dryCleaningDescription', dryingDescription='$dryingDescription', EShopDisplayName='$EShopDisplayName', EShopLongDescription='$EShopLongDescription', ergonomicSeat='$ergonomicSeat', fasteningTypeDescription='$fasteningTypeDescription', fasteningTypeTextile='$fasteningTypeTextile', flat='$flat', freeDelivery='$freeDelivery', gender='$gender', indicatorOfItHasToBeAssembled='$indicatorOfItHasToBeAssembled', ironingDescription='$ironingDescription', lastDateChanged='$lastDateChanged', lastUserChanged='$lastUserChanged', productFeatures='$productFeatures', productMissingFeatures='$productMissingFeatures', pulloutType='$pulloutType', pulloutTypeDescription='$pulloutTypeDescription', punnet='$punnet', sapCategoryID='$sapCategoryID', sapCategoryName='$sapCategoryName', sapDivisionID='$sapDivisionID', sapDivisionName='$sapDivisionName', sapFamilyDescription='$sapFamilyDescription', sapFamilyID='$sapFamilyID', sapFamilyName='$sapFamilyName', sapMacrocategoryID='$sapMacrocategoryID', sapMacrocategoryName='$sapMacrocategoryName', sapName='$sapName', sapUniverseID='$sapUniverseID', sapUniverseName='$sapUniverseName', showOnLine='$showOnLine', sizeGuide='$sizeGuide', waistlineDescription='$userOfCreation', waistlineDescription='$waistlineDescription', washability='$washability', washabilityDescription='$washabilityDescription', zipStopper='$zipStopper' WHERE defID='$defID' ";

		if(mysqli_query($conn, $update_head)){
			echo "Records were updated successfully.";
		} else {
			echo "ERROR: Could not able to execute $update_head. " . mysqli_error($conn);
		} 
	}

?>
 