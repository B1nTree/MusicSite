<?php 
	include '../model/database.php';
	include '../model/artist_db.php';
	include '../model/venue_db.php';
	include '../model/promoter_db.php';
	include '../model/offer_db.php';
        include '../model/agent_db.php';
        include '../model/counter_offer_db.php';
        session_start();
        error_reporting(E_ALL ^ E_NOTICE);
		
if (isset($_POST['action'])) {
    $action = $_POST['action'];

} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
    
} else {
    $action = 'show_offers';
}



if ($action == 'show_offers'){
    
    $Agent_ID = $_SESSION['Agent_ID'];
    $Offers = get_Agent_Offers($Agent_ID);
    
    $acceptedOffers = get_agentacceptedOffers($Agent_ID);
    $rejectedOffers = get_agentrejectedOffers($Agent_ID);
    
    
    include 'show_offers.php';
    
} elseif($action === 'accept_offer'){
    
    if (!isset($_POST['Offer_ID'])){
    } else {
        $Offer_ID = $_POST['Offer_ID'];
    }
    $date = date("Y-m-d");
    $Accepted = accept_Offer($Offer_ID, $date);
    
    //$Locations = get_Locations();
    $Agent_ID = $_SESSION['Agent_ID'];
    $Offers = get_Agent_Offers($Agent_ID);
    
    $acceptedOffers = get_agentacceptedOffers($Agent_ID);
    $rejectedOffers = get_agentrejectedOffers($Agent_ID);
    
    include 'show_offers.php';

} elseif($action === 'reject_offer'){
    $Offer_ID = $_POST['Offer_ID'];
    reject_Offer($Offer_ID);
    
    $Promoter_ID = $_SESSION['Promoter_ID'];
    $Offers = get_Offers($Promoter_ID);
    //$Locations = get_Locations();
    include 'offer_list.php';

} elseif ($action == 'view_counter_offers'){
    // Get Offer data
    
    if (!isset($_SESSION['Agent_ID'])){
        echo ' $_SESSION[Agent_ID] is not set. ';
        echo $_SESSION['user_name']; //this proves that SESSION is in fact working
    } else{
        echo $_SESSION['Agent_ID'];
        $Agent_ID = $_SESSION['Agent_ID'];
    }
    
    

    $CounterOffers = get_counter_Offers($Agent_ID);
    
    
    $Locations = get_Locations();

    // Display the Offer list
    include 'view_counter_offers.php';    
    
    
} elseif($action === 'accept_counter_offer'){
    
    if (!isset($_POST['CounterOffer_ID'])){
    } else {
        $CounterOffer_ID = $_POST['CounterOffer_ID'];
    }
    
    $Accepted = accept_counter_Offer($CounterOffer_ID);
    
    //$Locations = get_Locations();
    $Agent_ID = $_SESSION['Agent_ID'];
    $CounterOffers = get_counter_Offers($Agent_ID);
    
    include 'view_counter_offers.php';

    
}elseif($action === 'reject_counter_offer'){
    
    ///////  Validate that the Counter_ID has been passed from $_POST
    if (!isset($_POST['CounterOffer_ID'])){
    } else {
        $CounterOffer_ID = $_POST['CounterOffer_ID'];
    }
    
    $Accepted = reject_counter_offer($CounterOffer_ID);
    
    //$Locations = get_Locations();
    $Agent_ID = $_SESSION['Agent_ID'];
    $CounterOffers = get_counter_Offers($Agent_ID);
    
    include 'view_counter_offers.php';
    
} elseif($action === 'counter_offer'){
    //This is the view for all counter offer's belonging to the logged in Agent
    
    $Agent_ID = $_SESSION['Agent_ID'];
    
    $Artists = get_Artists();
    $Venues = get_Venues();
    $Promoters = get_Promoters();    
    
    $CounterOffer_ID = $_POST['CounterOffer_ID'];
    $CounterOffer = get_counter_Offer($CounterOffer_ID);
    
    include 'counter_offer.php';
    
} elseif( $action === 'submit_counter_offer') {
    //This is the action to submit a counter offer by an Agent
    
    $Agent_ID = $_SESSION['Agent_ID'];
    
    include 'counter_offer_POST_data.php';
    
    $Artist_ID = artistName_to_Artist_ID($artistName);
    $Venue_ID = venueName_to_Venue_ID($venueName); 
    
    $submitCounterOffer = submit_counter_Offer($Offer_ID, $counterOfferStatus, $Artist_ID, $Agent_ID, $Venue_ID, $counterOfferDate, $counterOfferGuarantee, $counterOfferBonus, $counterOfferHotel, $counterOfferTechnical, $counterOfferMediaSupport, $counterOfferSellableCap, $counterOfferAgeLimit, $counterOfferEventType, $counterOfferGATicket1, $counterOfferGATIcket2, $counterOfferLoadIn, $counterOfferDoors, $counterOfferSetTime, $counterOfferCurfew);
    include 'show_offers.php';
    
} elseif ( $action === 'generate_contract'){
    
    $Promoter_ID = $_SESSION['Promoter_ID'];
    
    $Offer_ID = $_POST['Offer_ID'];
    $Offer = get_Offer($Offer_ID);
    include 'generate_contract.php';
    
} else {

	echo 'action is missing or something';

}

?>