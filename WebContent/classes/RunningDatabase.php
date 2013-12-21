<?php 
class RunningDatabase
{
	private $m_race;
	
	//Variables for connecting to your database.
	//These variable values come from your hosting account.
	private $m_hostname;
	private $m_username;
	private $m_dbname;
	private $m_password;
	
	private $m_connection;
	
	// race info
	private $m_name;
	private $m_city;
	private $m_state;
	private $m_date;
	private $m_num_pictures;
	
	function __construct($race, $hostname, $username, $dbname, $password)
	{
		$this->m_race=$race;
		$this->m_hostname=$hostname;
		$this->m_username=$username;
		$this->m_dbname=$dbname;
		
		$this->m_connection=mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Unable to
				connect to database! Please try again later.");
		
	}
	
	function read_race_info()
	{
		$query="SELECT * FROM races WHERE Identifier='$this->m_race'";
		$result=$this->m_connection->query($query);
		
		$result_row = $result->fetch_assoc();
		
		$datetime = strtotime($result_row[Date]);
		
		$this->m_name = $result_row[Name];
		$this->m_city = $result_row[City];
		$this->m_state = $result_row[State];
		
		$this->m_num_pictures = $result_row[NumPictures];
		
		$this->m_date = date('m-d-Y', $datetime);
	}
	
	function get_connection()
	{
		return $this->m_connection;
	}
	
	function get_name()
	{
		return $this->m_name;
	}
	
	function get_city()
	{
		return $this->m_city;
	}
	
	function get_state()
	{
		return $this->m_state;
	}
	
	function get_date()
	{
		return $this->m_date;
	}
	
	function get_num_pictures()
	{
		return $this->m_num_pictures;
	}
	
	function get_race_results()
	{
		$query="SELECT * FROM $this->m_race ORDER BY Place";
		$result=$this->m_connection->query($query);
		
		return $result;
	}
	
	function find_runner($nameToFind)
	{
		$query="SELECT * FROM $this->m_race ORDER BY Place";
		$result=$this->m_connection->query($query);
		
		$num_rows=mysqli_num_rows($result);
		$i=0;
			
		while ($i<$num_rows)
		{
			$result_row = $result->fetch_assoc();
			
			$firstName=$result_row[FirstName];
			$lastName=$result_row[LastName];
		
			$fullName=$firstName.' '.$lastName;
			
			$levenshtein = levenshtein ( $nameToFind , $fullName );
			
			//echo $nameToFind.' '.$fullName.' '.$levenshtein.'<br>';
				
			if ($levenshtein<2)
			{
				return $result_row;	
			}
			
			$i++;
		}
	}
	
	function build_table_string()
	{
		$query="SELECT * FROM $this->m_race ORDER BY Place";
		$result=$this->m_connection->query($query);
		
		$num_rows=mysqli_num_rows($result);
		$i=0;
		
		echo '<thead>';
		
		echo '<tr>
		<th class="place">Place</th> 
		<th class="photo">Photo</th>
		<th class="name">First Name</th> 
		<th class="name">Last Name</th> 
		<th class="age">Age</th> 
		<th class="time">Time</th> 
		<th class="club">Club</th>
		<th class="friend">Friend</th>
		</tr>';
		
		echo '</thead>';
	
		echo '<tbody>';
		
		while ($i<$num_rows)
		{
			$result_row = $result->fetch_assoc();
		
			$datetime = strtotime($result_row[Time]);
		
			// call the utility that parses the time as a race time
			$time = parse_race_time($datetime);
		
			$id='r'.$i;
		
			echo '<tr id='.$id.'>
			<td>'.$result_row[Place].'</td>
			<td class="photo"></td>
			<td>'.$result_row[FirstName].'</td>
			<td>'.$result_row[LastName].'</td>
			<td>'.$result_row[Age].'</td>
			<td>'.$time.'</td>
			<td class="club">'.$result_row[Club].'</td>
			<td class="friend"></td>
			</tr>';
			$i++;
		}

		echo '</tbody>';
	}
	
	function get_race_links($link_base)
	{
		$query="SELECT * FROM races ORDER BY Date DESC";
		$result=$this->m_connection->query($query);
		
		return $result;
	}
	
	function build_race_links($link_base)
	{
		$query="SELECT * FROM races ORDER BY Date DESC";
		$result=$this->m_connection->query($query);
		
		
		echo '<tr><th>Date</th><th>Race</th></tr>';
		
		while ($result_row=$result->fetch_assoc())
		{
			$datetime = strtotime($result_row[Date]);
			
			$id=$result_row[Identifier];
			$racename = $result_row[Name];
			$city = $result_row[City];
			$state = $result_row[State];
			$date = date('m-d-Y', $datetime);
			
			echo '<tr>';
			echo '<td>'.$date.'</td>';
			
			echo '<td><a href=result.php?race='.$id.'">';
			echo $racename.' '.$city.', '.$state.'</a></td>';
			
			echo '</tr>';
		}
		
		
	
	/*	$query="SELECT * FROM races";
		$result=$this->m_connection->query($query);
	
		echo '<table border="1">';
	
		$num_rows=mysqli_num_rows($result);
	
		while ($result_row = mysqli_fetch_array($result))
		{
			echo '<a href="'.$link_base.'?race='.$result_row[0].'">';
			echo $result_row[1].' '.$result_row[2].'</a><br>';
		}
		echo '</table>';*/
	}
	
	function add_photo($photo_name)
	{
		$query="INSERT INTO ".$this->m_race."_pics  VALUES ('".$photo_name."')";
		//echo '<br>'.$query.'<br>';
		//$this->m_connection->query($query);
		mysqli_query($this->m_connection, $query);
	}
	
	

}
?>