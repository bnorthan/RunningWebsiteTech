<?php 
class GrandPrix
{
	private $m_race;
	private $m_connection;
	private $m_scoring_array;
	
	function __construct($connection, $race)
	{
		$this->m_connection=$connection;
		$this->m_race=$race;
		
		$this->m_scoring_array=array(12,10,8,7,6,5,4,3,2,1);
	}
	
	function construct_womens_table()
	{
		$this->construct_table('Female');
	}
	
	function construct_mens_table()
	{
		$this->construct_table('Male');
	}
	
	function get_result($who)
	{
		$query="SELECT FirstName, LastName FROM $this->m_race WHERE Category = '$who'";
		$result=$this->m_connection->query($query);
			
		return($result);
	}
	
	function echo_row($data)
	{
		if ($data!=null) echo '<td>'.$data[0].' '.$data[1] . '</td>';
		else echo '<td></td>';
	}
	
	function construct_table($gender)
	{
		
		$result20=$this->get_result($gender.' 1-29');
		$result30=$this->get_result($gender.' 30-39');
		$result40=$this->get_result($gender.' 40-49');
		$result50=$this->get_result($gender.' 50-59');
		$result60=$this->get_result($gender.' 60-69');
		$result70=$this->get_result($gender.' 70-99');
	
		echo '<table border="1">';
		
		echo '<tr><th> </th> <th></th><th>'.$gender.' Open</th><th>'.$gender.' 30-39</th><th>'.$gender.' 40-49</th><th>'.$gender.' 50-59</th><th>'.$gender.' 60-69</th><th>'.$gender.' 70-99</th></tr>';
		
		//while ($result_row = $result->fetchRow(DB_FETCHMODE_ASSOC))
		//while($result_row = mysqli_fetch_array($result))
		for ($i=1;$i<=10;$i++)
		{
			$result_row20 = mysqli_fetch_array($result20);
			$result_row30 = mysqli_fetch_array($result30);
			$result_row40 = mysqli_fetch_array($result40);
			$result_row50 = mysqli_fetch_array($result50);
			$result_row60 = mysqli_fetch_array($result60);
			$result_row70 = mysqli_fetch_array($result70);
		
			echo '<tr><td>'.$i.'</td><td>'.$this->m_scoring_array[$i-1].'</td>';
		
			$this->echo_row($result_row20);
			$this->echo_row($result_row30);
			$this->echo_row($result_row40);
			$this->echo_row($result_row50);
			$this->echo_row($result_row60);
			$this->echo_row($result_row70);
		}
		
		echo '</table>';
	}
}?>