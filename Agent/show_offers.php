
<?php include '../header.php'; 
?>

<div id = 'container'>

    <form action="index.php" method="post">
        <input type="hidden" name="action" id="action" value="view_counter_offers"/>
        <input type="submit" name="submit" value="View Counter Offers"/>
    </form>
			<h3>Current Offers</h3>
			<table border ="1">
			<tr>
				<th>Offer ID</th>
				<th>For Artist</th>
                                <th>Promoter</th>
				<th>Venue</th>
                                <th>Artist Guarantee</th>
				<th>Offer Status</th>
			</tr>
                        <?php foreach ($Offers as $Offer){?>
                         
                        <tr>
                                <td><?php echo $Offer['Offer_ID']; ?></td>
                                
                                <?php $artistName = get_artistName($Offer['Artist_ID']); ?>
                                <td><?php echo $artistName; ?></td>
                                 
                                <?php $promoterName = get_promoterName($Offer['Promoter_ID']); ?>
                                <td><?php echo $promoterName; ?></td>
                                
                                <?php $venueName = get_venueName($Offer['Venue_ID']); ?>
                                <td><?php echo $venueName['venueName']; ?></td>
                                <td><?php echo $Offer['offerGuarantee']; ?></td>
                                <td><?php echo $Offer['offerStatus']; ?></td>
                                <td><form action = "." method = "post">
                                        <input type = "hidden" name = "action" value = "accept_offer" />
                                        <input type = "hidden" name = "Offer_ID" value ="<?php echo $Offer['Offer_ID']; ?>" />
                                        <input type ="submit" value ="Accept">
                                    </form>
                                </td>
                                <td><form action = "." method = "post">
                                        <input type = "hidden" name = "action" value = "reject_offer" />
                                        <input type = "hidden" name = "Offer_ID" value ="<?php echo $Offer['Offer_ID']; ?>" />
                                        <input type ="submit" value ="Reject">
                                    </form>
                                </td>
                                <td>
                                    <form action = "." method ="post">
                                        <input type ="hidden" name="action" value="counter_offer" />
                                        <input type ="hidden" name ="Offer_ID" id = "Offer_ID" value="<?php echo $Offer['Offer_ID']; ?>" />
                                        <input type ="submit" value ="Counter Offer">
                                    </form>
                                </td>
                        
                        <?php } ?>
                        </tr>
			</table>
                        
                        <h3>Accepted Offers</h3>
			<table border="1">
			<tr>
				<th>Offer ID</th>
				<th>For Artist</th>
				<th>Venue</th>
				<th>Offer Status</th>
			</tr>
                        <?php foreach ($acceptedOffers as $acceptedOffer){?>
                         
                        <tr>
                                <td><?php echo $acceptedOffer['Offer_ID']; ?></td>
                                
                                <?php $artistName = get_artistName($acceptedOffer['Artist_ID']); ?>
                                <td><?php echo $artistName; ?></td>
                                
                                <?php $venueName = get_venueName($acceptedOffer['Venue_ID']); ?>
                                <td><?php echo $venueName['venueName']; ?></td>
                                
                                <td>Accepted</td>
                                
                                <td>
                                    <form action = "." method ="post">
                                        <input type ="hidden" name="action" value="generate_contract" />
                                        <input type ="hidden" name ="Offer_ID" id = "Offer_ID" value="<?php echo $acceptedOffer['Offer_ID']; ?>" />
                                        <input type ="submit" value ="Generate Contract">
                                    </form>
                                </td> 
                        <?php } ?>
                        </tr>
			</table>
                        
                                                <h3>Rejected Offers</h3>
			<table border="1">
			<tr>
				<th>Offer ID</th>
				<th>For Artist</th>
				<th>Venue</th>
				<th>Offer Status</th>
			</tr>
                        <?php foreach ($rejectedOffers as $rejectedOffer){?>
                         
                        <tr>
                                <td><?php echo $rejectedOffer['Offer_ID']; ?></td>
                                
                                <?php $artistName = get_artistName($rejectedOffer['Artist_ID']); ?>
                                <td><?php echo $artistName; ?></td>
                                
                                <?php $venueName = get_venueName($rejectedOffer['Venue_ID']); ?>
                                <td><?php echo $venueName['venueName']; ?></td>
                                
                                <td>Rejected</td>
                        <?php } ?>
                        </tr>


			</table>
                        
                        

</div>

<?php include '../footer.php'; ?>

