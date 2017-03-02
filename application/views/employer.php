
     <!--END NAV SECTION -->
    <section  id="services-sec">
        <div class="container">
             <div class="row go-marg">
			 <div class="col-md-12">
				<table border="1px">
					<thead>
						<tr style="color:red">
						<th> NAME:</th>
						<th>Email Id:</th>
						<th>Username:</th>
						<th>phone:</th>
						<th>Group name:</th>
						</tr>
					</thead>
					<tbody style="color:blue">
			<?php 
			if(count($employers) > 0){
			foreach ($employers as $emp){
				//echo '<pre>';print_r($emp);exit;?>
			<tr>
			<td><?php echo htmlentities($emp['firstname']);?><?php echo htmlentities($emp['lastname']);?></td>
			<td><?php echo htmlentities($emp['email']);?></td>
			<td><?php echo htmlentities($emp['username']);?></td>
			<td><?php echo htmlentities($emp['phone']);?></td>
			<td><?php echo htmlentities($emp['group_name']);?></td>
		
			</td>
			</tr>
			<?php } } else { echo '<tr><td colspan="4" align="center">No customers</td></tr>';} ?>
		 </tbody>

				</table>
              </div>
            </div>
          
    </section>
    <!--END HOME SECTION-->
  
    
