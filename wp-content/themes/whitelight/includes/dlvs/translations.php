<?php

function dlvs_translate($key) {

	// English
	$english_list = array();

	// Danish translations
	$danish_list = array(
		"Book vaccination" => "Bestil Vaccination",						// booking button
		"Price" => "Pris",												// vaccination
		"Quantity" => "Antal",											// vaccination
		"Protection" => "Beskyttelse",									// vaccination
		'Vaccination content' => 'Vaccine indhold',						// vaccination
		'Who should be vaccinated?' => 'Hvem bør vaccineres?',			// vaccination
		'Vaccine dose' => 'Vaccine dosis',								// vaccination
		'Who should not be vaccinated?' => 'Hvem bør ikke vaccineres?',	// vaccination
		"Pregnancy and breastfeeding" => "Graviditet og amning",		// vaccination
		"Duration of immunity" => "Beskyttelsestid",					// vaccination
		"Side effects" => "Bivirkninger",								// vaccination
		"New mobile app" => "Ny mobil app", 							// frontpage streamer
		"free of charge" => "helt gratis",								// frontpage streamer
		"bring your doctor with you." => "tag lægen med på rejsen.", 	// frontpage streamer
		"Get it in" => "Hent den i",									// frontpage streamer
		"to learn more about the recommended vaccinations."				// region
			=> "for at lære mere om landet og anbefalede vaccinationer.",
		"Choose country" => "Vælg land",								// country selector dropdown
		"or click on the map" => "eller klik på kortet",				// recommendation map
		"Opening hours" => "Åbningstider",								// clinic
		"Clinics location" => "Se klinikken på kort",					// clinic
		"Phone" => "Telefon",											// clinic
		"Show full-screen map" => "Vis stort kort",						// clinic
		"Call to book" => "Ring for at booke", 							// clinic
		"Type to search" => "Skriv for at søge",						// faq
		"Capital" => "Hovedstad",										// country
		"Population" => "Indbyggere",									// country
		"Updated Malaria Map" => "Opdateret Malaria kort",				// country
		"Latest Disease Surveillance" => "Sidste sygdomsovervågning", 	// country

		// vaccination groups table
		"Vaccination" => "Rejsetid:",
		"All travelers" => "Gr. 1<br />Alle rejsende",
		"+2 weeks" => "Gr. 2<br />1-4 uger",
		"+3 months" => "Gr. 3<br />1-6 mdr.",
		"+6 months" => "Gr. 4<br />6 mdr.",
		"Some recommendations might differ depending on duration of stay in the country. Please contact us if you're in doubt."
			=> "Kolonnerne er delt ind i forventet rejsetid da vaccinationsanbefalinger varierer afhængig af hvor lang tid tilbringer i landet",
		"The following vaccinations are all recommended no matter the duration of stay in the country"
			=> "Alle rejsende. Omfatter forretnings- eller kongresrejse af nogle dages varighed til hovedstad eller anden
storby. Er rejsen af særlig art med mulighed for intens smitteudsættelse, kan Gr. 1 suppleres
med vacciner fra Gr. 2, 3 eller 4.",
		"+2 weeks description"
			=> "1-4 ugers rejsende. Omfatter arrangeret turistrejse af op til fire ugers varighed med dagsudflugter. Er rejsen af
særlig art med mulighed for intens smitteudsættelse, kan Gr. 2 suppleres med vacciner fra Gr.
3 eller 4. Det gælder fx indvandrere på familiebesøg (uanset rejsens varighed), ved seksuel
kontakt med lokale, ved udtalt dårlig hygiejne (tyfus), ved tæt lokal personkontakt (hep. B),
ved ophold med insekteksposition som fx trekkingtur (japansk encephalitis).",
		"+3 months description"
			=> "1-6 måneders rejsende. Omfatter individuel rejse af nogle måneders varighed, fx rygsækrejse. Er rejsen af særlig art
med mulighed for intens smitteudsættelse, kan Gr. 3 suppleres med vacciner fra Gr. 4. Det
gælder fx indvandrere på familiebesøg (uanset rejsens varighed).",
		"+6 months description"
			=> "6 måneders rejsende. Omfatter langvarig individuel rejse i halve år, indvandrere på familiebesøg (uanset rejsens
varighed), udstationering eller tilsvarende hyppigt gentagne besøg.",
		"Explains time in advance of departure to get the vaccination. Please note that some vaccinations require more than one dosis and that the time in that case refers to the first vaccination. There are no problems in getting the vaccinations earlier than the minimum period." =>
			"Nedenfor vises anbefalingerne for hvornår man bør påbegynde sin vaccination i forhold til afrejsetidspunkt. Bemærk at nogle vacciner kræver mere end én vaccination inden afrejse, den viste anbefaling er i så fald det anbefalede tidspunkt for den første vaccination. Der er ingen problemer i at påbegynde sit vaccinationsprogram tidligere end det anbefalede tidspunkt. Med få undtagelser er det bedre at blive vaccineret lidt for sent end ikke at blive vaccineret.",
		"When to get vaccinated" => "Vaccination før rejse",

		// others
		"See a map of malaria risk for this country" => "Kort over aktuel malariarisiko i landet",
		"Information on outbreaks from NaTHNaC" => "Information om sygdomsudbrud i landet",
		"01462 459595" => "70 25 40 80",
		"Type and choose one country at the time:" => "Tast og vælg et land af gangen:",
		"Remove" => "Fjern",
		"Explanation of symbols" => "Symbolforklaring",
		"Recommended" => "Anbefalet",
		"Should be considered" => "Bør overvejes",
		"Chosen countries:" => "Valgte lande:",
		"or try the Trekkingguide if you're visiting multiple countries" => "eller prøv Trekkingguiden hvis du besøger flere lande",
		"Please wait" => "Vent venligst",
		"Need help? Call us on weekdays from 9am-5pm" => "Få hjælp til din bestilling, 8-17 alle hverdage",
		"A part of" => "En del af",
		"European LifeCare Group" => "European LifeCare Group"
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