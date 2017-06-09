<?php include_once 'header.php';?>
<div class="container-fluid">
	<h2>All members</h2>
	<table cellspacing="0">
		<thead>
			<td>Photo</td>
			<td>Name</td>
			<td>Email</td>
		</thead>


			<?php
				foreach($data['members'] as $item)
				{
					if($item['photo'] == '')
					{
						$item['photo'] = 'user-icon.png';
					}
					echo'
					<tr>
						<td class="user-image"><img src="/img/' . $item['photo'] . '" alt=""></td>
						<td>' . $item['first_name'] . ' ' . $item['last_name'] . '</td>
						<td>' . $item['email'] . '</td>
					</tr>
					';
				}
			?>

	</table>
    <div class="tabs-pagination">
    <?php
        for($i = 0; $i < $data['tabs']; $i++)
        {
            echo '<a href="/main/allMembers/'. $i . '" class="btn btn-default">' . $i . '</a>';
        }

    ?>
    </div>

</div>
<?php include_once 'footer.php';?>
