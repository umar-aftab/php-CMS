<?php

		$fee_1  = "INSERT INTO fees (";
		$fee_1 .= " FEE_TYPE, PRICE, HOURS";
		$fee_1 .= ") VALUES (";
		$fee_1 .= " 'Formula1', '32.00', '2'";
		$fee_1 .= ")";

		$fee_2  = "INSERT INTO fees (";
		$fee_2 .= " FEE_TYPE, PRICE, HOURS";
		$fee_2 .= ") VALUES (";
		$fee_2 .= " 'Formula2', '64.00', '4'";
		$fee_2 .= ")";

		$fee_3  = "INSERT INTO fees (";
		$fee_3 .= " FEE_TYPE, PRICE, HOURS";
		$fee_3 .= ") VALUES (";
		$fee_3 .= " 'Formula3', '96.00', '6'";
		$fee_3 .= ")";

		$fee_4  = "INSERT INTO fees (";
		$fee_4 .= " FEE_TYPE, PRICE, HOURS";
		$fee_4 .= ") VALUES (";
		$fee_4 .= " 'Formula4', '128.00', '8'";
		$fee_4 .= ")";


		$fee_5  = "INSERT INTO fees (";
		$fee_5 .= " FEE_TYPE, PRICE, HOURS";
		$fee_5 .= ") VALUES (";
		$fee_5 .= " 'Formula5', '160.00', '10'";
		$fee_5 .= ")";

		$fee_6  = "INSERT INTO fees (";
		$fee_6 .= " FEE_TYPE, PRICE, HOURS";
		$fee_6 .= ") VALUES (";
		$fee_6 .= " 'Quran', '2.50', '1'";
		$fee_6 .= ")";

		$fee_7  = "INSERT INTO fees (";
		$fee_7 .= " FEE_TYPE, PRICE, HOURS";
		$fee_7 .= ") VALUES (";
		$fee_7 .= " 'Arabic', '4.00', '1'";
		$fee_7 .= ")";


		$connection->multi_query($fee_1);
		$connection->multi_query($fee_2);
		$connection->multi_query($fee_3);
		$connection->multi_query($fee_4);
		$connection->multi_query($fee_5);
		$connection->multi_query($fee_6);
		$connection->multi_query($fee_7);

		if (!$connection) {
			die("Insert Query Failed.");
		}


?>	