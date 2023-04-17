<?php
//subject list

class checkboxlist{
	public function sublist()
	{
		echo'
			
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="English"><span>English</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Math"><span>Math</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Social Science"><span>Social Science</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="General Science"><span>General Science</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Religion"><span>Religion</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="ICT"><span>ICT</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Physics"><span>Physics</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Chemistry"><span>Chemistry</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Higher Math"><span>Higher Math</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Biology"><span>Biology</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Sociology"><span>Sociology</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Economics"><span>Economics</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Accounting"><span>Accounting</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="History"><span>History</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Finance"><span>Finance</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Statistics"><span>Statistics</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Civics"><span>Civics</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Computer Science"><span>Computer Science</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Art"><span>Art</span></div>
			<div class="divp35"><input type="text" name="sublist[]" " placeholder="Others, Please Specify" value=""<span></span></div>


		';
	}
	//sub list unchecked box
	public function sublistcombo()
	{
		echo'
			<select name="sublistcombo" style="width: 180px;">
					
			  <option value="None">None</option>
			  <option value="English">English</option>
			  <option value="Math">Math</option>
			  <option value="Social Science">Social Science</option>
			  <option value="General Science">General Science</option>
			  <option value="Religion">Religion</option>
			  <option value="ICT">ICT</option>
			  <option value="Physics">Physics</option>
			  <option value="Chemistry">Chemistry</option>
			  <option value="Higher Math">Higher Math</option>
			  <option value="Biology">Biology</option>
			  <option value="Sociology">Sociology</option>
			  <option value="Economics">Economics</option>
			  <option value="Accounting">Accounting</option>
			  <option value="History">History</option>
			  <option value="Finance">Finance</option>
			  <option value="Statistics">Statistics</option>
			  <option value="Civics">Civics</option>
			  <option value="Computer Science">Computer Science</option>
			</select>


		';
	}

	public function classlist()
	{
		echo '
			<div class="divp35"><input type="checkbox" name="class_list[]" value="One Hour"><span>One Hour</span></div>
			<div class="divp35"><input type="checkbox" name="class_list[]" value="Two Hours"><span>Two Hours</span></div>
			<div class="divp35"><input type="checkbox" name="class_list[]" value="Three Hours"><span>Three Hours</span></div>
			<div class="divp35"><input type="checkbox" name="class_list[]" value="Four Hours"><span>Four Hours</span></div>
			<div class="divp35"><input type="checkbox" name="class_list[]" value="Five Hours"><span>Five Hours</span></div>
			<div class="divp35"><input type="checkbox" name="class_list[]" value="Flexible"><span>Flexible Hours</span></div>
		';
	}

	public function classlistcombo()
	{
		echo '
			<select style="width: 180px;" name="classlistcombo">
				<option value="None">None</option>	
			  <option value="One Hour">One Hour</option>
			  <option value="Two Hours">Two Hours</option>
			  <option value="Three Hours">Three Hours</option>
			  <option value="Four Hours">Four Hours</option>
			  <option value="Five Hours">Five Hours</option>
			  <option value="Flexible">Flexible Hours</option>
			</select>
		';
	}

	public function mediumlist()
	{
		echo '
			<div class="divp35"><input type="checkbox" name="medium_list[]" value="Filipino/Tagalog"><span>Filipino/Tagalog</span></div>
			<div class="divp35"><input type="checkbox" name="medium_list[]" value="English"><span>English</span></div>
			<div class="divp35"><input type="checkbox" name="medium_list[]" value="Any"><span>Any</span></div>
		';
	}

	public function mediumlistcombo()
	{
		echo '
			<select name="mediumlistcombo" style="width: 180px;">
					
			  <option value="None">None</option>
			  <option value="Filipino/Tagalog">Filipino/Tagalog</option>
			  <option value="English">English</option>
			  <option value="Any">Any</option>
			</select>
		';
	}
}

?>