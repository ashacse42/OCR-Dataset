<?php 
$q=mysqli_query($db,"select * from user ORDER BY user_id DESC");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any user exists !!!</h2>";
}
else
{
?>
<script>
	function DeleteUser(id)
	{
		if(confirm("You want to delete this record ?"))
		{
		window.location.href="delete_user.php?id="+id;
		}
	}
	
	function ApproveUser(id)
	{
		if(confirm("Are you sure to approve this user ?"))
		{
		window.location.href="approve_user.php?id="+id;
		}
	}
</script>
<h2 style="color:#00FFCC">All Users</h2>

<table class="table table-bordered">
	<Tr class="success">
		<th>Sr.No</th>
		<th>Name</th>
		<th>Email</th>
	</Tr>
		<?php 


$i=1;
while($row=mysqli_fetch_assoc($q))
{

echo "<Tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['email']."</td>";
echo "</Tr>";
$i++;
}
		?>
		
</table>
<?php }?>