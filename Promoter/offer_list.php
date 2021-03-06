<?php include '../header.php'; 
?>

<div id = 'container'>

			<h3>Sent Offers</h3>
			<table border="1">
			<tr>
				<th>Offer ID</th>
				<th>For Artist</th>
				<th>Venue</th>
				<th>Offer Status</th>
			</tr>
                        <?php foreach ($Offers as $Offer){?>
                         
                        <tr>
                                <td><?php echo $Offer['Offer_ID']; ?></td>
                                
                                <?php $artistName = get_artistName($Offer['Artist_ID']); ?>
                                <td><?php echo $artistName; ?></td>
                                
                                <?php $venueName = get_venueName($Offer['Venue_ID']); ?>
                                <td><?php echo $venueName['venueName']; ?></td>
                                
                                <td><?php echo $Offer['offerStatus']; ?></td>
                                
                     
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

                        <p><a href=".?action=offer_form">Create an Offer</a></p>

</div>

<?php include '../footer.php'; ?>