<?php

	/**
	* Helper Function
	*/

	class Helper
	{
		function __construct()
		{
		}

		public function convertDaytoHari($day){
			$hari = '';
			switch ($day) {
				case 'Monday':
					$hari = 'Senin';
					break;
				case 'Tuesday':
					$hari = 'Selasa';
					break;
				case 'Wednesday':
					$hari = 'Rabu';
					break;
				case 'Thursday':
					$hari = 'Kamis';
					break;
				case 'Friday':
					$hari = 'Jumat';
					break;
				case 'Saturday':
					$hari = 'Sabtu';
					break;
				case 'Sunday ':
					$hari = 'Minggu';
					break;
			}

			return $hari;
		}

		public function convertAngkatoRp($angka){
			
			$rp = "Rp " . number_format($angka,2,',','.');
			return $rp;
		}

		public function convertAngkatoValue($angka){
			$val = number_format($angka,2,',','.');
			return $val;
		}


		public function formatDateId($date){
			if ($date == "" || $date == "0000-00-00" || $date == " ") {
				return "-";
			}

			$date = date_create($date);
			$date =  date_format($date,"d/m/Y");

			return $date;
		}

	}

	$helper = new Helper();

?>