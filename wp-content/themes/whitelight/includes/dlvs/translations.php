<?php

function dlvs_translate($key) {

	// English
	$english_list = array();

	// Danish translations
	$danish_list = array(
		"Book vaccination" => "Bestil Vaccination",					// booking button
		"Price" => "Pris",											// vaccination
		"Quantity" => "Antal",										// vaccination
		"Protection" => "Beskyttelse",								// vaccination
		'Vaccination content' => 'Vaccine indhold',					// vaccination
		'Who should be vaccinated?' => 'Hvem bør vaccineres?',		// vaccination
		'Vaccine dose' => 'Vaccine dosis',							// vaccination
		'Who should not be vaccinated?' => 'Hvem bør ikke vaccineres?',// vaccination
		"Pregnancy and breastfeeding" => "Graviditet og amning",	// vaccination
		"Duration of immunity" => "Beskyttelsestid",				// vaccination
		"Side effects" => "Bivirkninger",							// vaccination
		"New mobile app" => "Ny mobil app", 						// frontpage streamer
		"free of charge" => "helt gratis",							// frontpage streamer
		"bring your doctor with you." => "tag lægen med på rejsen.", // frontpage streamer
		"Get it in" => "Hent den i",								// frontpage streamer
		"Capital" => "Hovedstad",									// country
		"Population" => "Indbyggere",								// country
		"to learn more about the recommended vaccinations." => "for at lære mere om landet og anbefalede vaccinationer.", // region
		"Choose country" => "Vælg land",							// country selector dropdown
		"or click on the map" => "eller klik på kortet",			// recommendation map
		"Opening hours" => "Åbningstider",							// clinic
		"Clinics location" => "Se klinikken på kort",				// clinic
		"Phone" => "Telefon",										// clinic
		"Show full-screen map" => "Vis stort kort",					// clinic
		"Type to search" => "Skriv for at søge",					// faq
		"Updated Malaria Map" => "Opdateret Malaria kort",			// Country
		"Latest Disease Surveillance" => "Sidste sygdomsovervågning", // Country
		"Call to book" => "Ring for at booke", 		// clinic,
		"All travelers" => "Gruppe 1",
		"+2 weeks" => "Gruppe 2",
		"+3 months" => "Gruppe 3",
		"+6 months" => "Gruppe 4",
		"All travelers description" => "Alle rejsende. Omfatter forretnings- eller kongresrejse af nogle dages varighed til hovedstad eller anden
storby. Er rejsen af særlig art med mulighed for intens smitteudsættelse, kan Gr. 1 suppleres
med vacciner fra Gr. 2, 3 eller 4.",
		"+2 weeks description" => "1-4 ugers rejsende. Omfatter arrangeret turistrejse af op til fire ugers varighed med dagsudflugter. Er rejsen af
særlig art med mulighed for intens smitteudsættelse, kan Gr. 2 suppleres med vacciner fra Gr.
3 eller 4. Det gælder fx indvandrere på familiebesøg (uanset rejsens varighed), ved seksuel
kontakt med lokale, ved udtalt dårlig hygiejne (tyfus), ved tæt lokal personkontakt (hep. B),
ved ophold med insekteksposition som fx trekkingtur (japansk encephalitis).",
		"+3 months description" => "1-6 måneders rejsende. Omfatter individuel rejse af nogle måneders varighed, fx rygsækrejse. Er rejsen af særlig art
med mulighed for intens smitteudsættelse, kan Gr. 3 suppleres med vacciner fra Gr. 4. Det
gælder fx indvandrere på familiebesøg (uanset rejsens varighed).",
		"+6 months description" => "6 måneders rejsende. Omfatter langvarig individuel rejse i halve år, indvandrere på familiebesøg (uanset rejsens
varighed), udstationering eller tilsvarende hyppigt gentagne besøg.",
		"See a map of malaria risk for this country" => "Kort over aktuel malariarisiko i landet",
		"Information on outbreaks from NaTHNaC" => "Information om sygdomsudbrud i landet",
		"01462 459595" => "70 25 40 80"
	);

	// get english translation
	if(current_language() == "en"){
		$translated = $english_list[$key];

	// get Danish translation
	}else{
		$translated = $danish_list[$key];
	}

	if(!$translated){
		$translated = $key;
	}

	return $translated;
}