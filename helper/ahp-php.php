<center>
<a href="index.php">Kembali</a><br />
<style type="text/css">
<!--
body,td,th {
	font-family: Georgia, Times New Roman, Times, serif;
	font-size: 13px;
	color: #333333;
}
-->
</style>
<?php
	function tampiltabel($arr)
	{
		echo '<table width="500" border="0" cellspacing="1" cellpadding="3" bgcolor="#000099">';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
			  for ($j=0;$j<count($arr[$i]);$j++)
			  {
			    echo '<td bgcolor="#FFFFFF">'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table>';
	}

	function tampilbaris($arr)
	{
		echo '<table width="500" border="0" cellspacing="1" cellpadding="3" bgcolor="#000099">';
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td bgcolor="#FFFFFF">'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table>';
	}

	function tampilkolom($arr)
	{
		echo '<table width="500" border="0" cellspacing="1" cellpadding="3" bgcolor="#000099">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td bgcolor="#FFFFFF">'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo '</table>';
	}

	$kriteria = array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");

	$x = array();
	
	$alternatif = array("Galaxy", "BB", "iPhone", "Lumia");
	
	$costbenefit = array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
if (!isset($_POST['button']))
{
?>	
  <form id="form1" name="form1" method="post" action="">
  PERBANDINGAN KRITERIA
  <br />
	<table width="500" border="1" cellspacing="0" cellpadding="1">
	  <tr>
		<td>Kriteria 1 </td>
		<td>Perbandingan</td>
		<td>Kriteria 2 </td>
	  </tr>
  <?php
    for ($i=0;$i<count($kriteria);$i++)
	{
        for ($j=0;$j<count($kriteria);$j++)
		{
            if ($i < $j)
            { 
	  ?>
	  <tr>
		<td><?php echo $kriteria[$i]; ?></td>
		<td><label>
		  <select name="P<?php echo $i; ?>_<?php echo $j; ?>" id="P<?php echo $i; ?>_<?php echo $j; ?>" style="width:400px;">
			<option value=""></option>
			<option value="1"><?php echo $kriteria[$i]; ?> Sama Penting Dengan <?php echo $kriteria[$j]; ?> (Nilai=1)</option>
			<option value="3"><?php echo $kriteria[$i]; ?> Sedikit Lebih Penting Dari <?php echo $kriteria[$j]; ?> (Nilai=3)</option>
			<option value="5"><?php echo $kriteria[$i]; ?> Lebih Penting Dari <?php echo $kriteria[$j]; ?> (Nilai=5)</option>
			<option value="7"><?php echo $kriteria[$i]; ?> Lebih Mutlak Penting Dari <?php echo $kriteria[$j]; ?> (Nilai=7)</option>
			<option value="9"><?php echo $kriteria[$i]; ?> Mutlak Penting Dari <?php echo $kriteria[$j]; ?> (Nilai=9)</option>
			<option value="2"><?php echo $kriteria[$i]; ?> Nilai Berdekatan Dengan <?php echo $kriteria[$j]; ?> (Nilai=2)</option>
			<option value="0.333333333333333"><?php echo $kriteria[$j]; ?> Sedikit Lebih Penting Dari <?php echo $kriteria[$i]; ?> (Nilai=1/3)</option>
			<option value="0.2"><?php echo $kriteria[$j]; ?> Lebih Penting Dari <?php echo $kriteria[$i]; ?> (Nilai=1/5)</option>
			<option value="0.142857142857143"><?php echo $kriteria[$j]; ?> Lebih Mutlak Penting Dari <?php echo $kriteria[$i]; ?> (Nilai=1/7)</option>
			<option value="0.111111111111111"><?php echo $kriteria[$j]; ?> Mutlak Penting Dari <?php echo $kriteria[$i]; ?> (Nilai=1/9)</option>
			<option value="0.5"><?php echo $kriteria[$j]; ?> Nilai Berdekatan Dengan <?php echo $kriteria[$i]; ?> (Nilai=1/2)</option>
		  </select>
		</label></td>
		<td><?php echo $kriteria[$j]; ?></td>
	  </tr>
	  <?php 
			}
		}
	} 
				?>
	</table>
    Contoh :<br/>
    Harga Lebih Penting Dari Kualitas (Nilai=5)<br/>
    Harga Lebih Penting Dari Fitur (Nilai=5)<br/>
    Harga Lebih Penting Dari Populer (Nilai=5)<br/>
    Harga Sedikit Lebih Penting Dari Purna Jual (Nilai=3)<br/>
    Harga Sedikit Lebih Penting Dari Keawetan (Nilai=3)<br/>
    Kualitas Sama Penting Dengan Fitur (Nilai=1) <br/>
    Kualitas Sama Penting Dengan Populer (Nilai=1) <br/>
    Purna Jual Sedikit Lebih Penting Dari Kualitas (Nilai=1/3) <br/>
    Keawetan Sedikit Lebih Penting Dari Kualitas (Nilai=1/3) <br/>
    Fitur Sama Penting Dengan Populer (Nilai=1) <br/>
    Purna Jual Sedikit Lebih Penting Dari Fitur (Nilai=1/3) <br/>
    Keawetan Sedikit Lebih Penting Dari Fitur (Nilai=1/3) <br/>
    Purna Jual Lebih Penting Dari Populer (Nilai=1/3) <br/>
    Keawetan Sedikit Lebih Penting Dari Populer (Nilai=1/3) <br/>
    Purna Jual Sama Penting Dengan Keawetan (Nilai=1) <br/>    
    <div align="left"><input type="submit" name="button" id="button" value="Proses" /></div>
</form>
<?php
}
else
{
	$x[0][0] = 3500;
	$x[0][1] = 70;
	$x[0][2] = 10;
	$x[0][3] = 80;
	$x[0][4] = 3000;
	$x[0][5] = 36;
	$x[1][0] = 4500;
	$x[1][1] = 90;
	$x[1][2] = 10;
	$x[1][3] = 60;
	$x[1][4] = 2500;
	$x[1][5] = 48;
	$x[2][0] = 4000;
	$x[2][1] = 80;
	$x[2][2] = 9;
    $x[2][3] = 90;
    $x[2][4] = 2000;
    $x[2][5] = 48;
    $x[3][0] = 4000;
	$x[3][1] = 70;
	$x[3][2] = 8;
	$x[3][3] = 50;
	$x[3][4] = 1500;
	$x[3][5] = 60;
		
	$k = array();
	for ($i=0;$i<count($kriteria);$i++)
	{
        for ($j=0;$j<count($kriteria);$j++)
		{
    		if ($i < $j)
			{ 
				$k[$i][$j] = $_POST['P'.$i.'_'.$j];
			}
			else if ($i == $j)
			{
				$k[$i][$j] = 1;
			}
			else
			{
				$k[$i][$j] = 1 / ($_POST['P'.$j.'_'.$i]);
			}
		}
	}
	

	//jika menggunakan nilai statis
	$k[0][0] = 1;
	$k[0][1] = 5;
	$k[0][2] = 5;
	$k[0][3] = 5;
	$k[0][4] = 3;
	$k[0][5] = 3;
	$k[1][0] = 0.2;
	$k[1][1] = 1;
	$k[1][2] = 1;
	$k[1][3] = 1;
	$k[1][4] = 0.333333333;
	$k[1][5] = 0.333333333;
	$k[2][0] = 0.2;
	$k[2][1] = 1;
	$k[2][2] = 1;
	$k[2][3] = 1;
	$k[2][4] = 0.333333333;
	$k[2][5] = 0.333333333;
	$k[3][0] = 0.2;
	$k[3][1] = 1;
	$k[3][2] = 1;
	$k[3][3] = 1;
	$k[3][4] = 0.333333333;
	$k[3][5] = 0.333333333;
	$k[4][0] = 0.333333333;
	$k[4][1] = 3;
	$k[4][2] = 3;
	$k[4][3] = 3;
	$k[4][4] = 1;
	$k[4][5] = 1;
	$k[5][0] = 0.333333333;
	$k[5][1] = 3;
	$k[5][2] = 3;
	$k[5][3] = 3;
	$k[5][4] = 1;
	$k[5][5] = 1;

	
	$jk = array();
	for ($i=0;$i<count($kriteria);$i++)
	{
		$jk[$i]=0;
		for ($j=0;$j<count($kriteria);$j++)
		{			
			$jk[$i] += $k[$j][$i];
		}
	}
	
	$nk = array();
	for ($i=0;$i<count($kriteria);$i++)
	{
		for ($j=0;$j<count($kriteria);$j++)
		{			
			$nk[$i][$j] = $k[$i][$j] / $jk[$j];
		}
	}

	$jnk = array();
	for ($i=0;$i<count($kriteria);$i++)
	{
		$jnk[$i] = 0;
		for ($j=0;$j<count($kriteria);$j++)
		{			
			$jnk[$i] += $nk[$i][$j]; 
		}
	}

	$w = array();
	for ($i=0;$i<count($kriteria);$i++)
	{
		$w[$i] = $jnk[$i] / count($kriteria); 
	}
	
	$kw = array();
	for ($i=0;$i<count($kriteria);$i++)
	{
		$kw[$i] = 0;
		for ($j=0;$j<count($kriteria);$j++)
		{			
			$kw[$i] += $k[$i][$j] * $w[$j]; 
		}
	}

	$t=0;
	for ($i=0;$i<count($kriteria);$i++)
	{
		$t += $kw[$i] / $w[$i]; 
	}
	$t = $t / count($kriteria);
	
	$ci = ($t - count($kriteria)) / (count($kriteria) - 1);
	
	$cr = $ci / 1.24;
	
	$nilaimin = array();
	
	for ($i=0;$i<count($kriteria);$i++)
	{
		$nilaimin[$i] = 1000000;
		
		if ($costbenefit[$i] == "cost")
		{
			for ($j=0;$j<count($alternatif);$j++)
			{	
				if ($nilaimin[$i] > $x[$j][$i])
				{
					$nilaimin[$i] = $x[$j][$i];
				}		
			}
		}
		else
		{
			$nilaimin[$i] = -1000000;
		
			for ($j=0;$j<count($alternatif);$j++)
			{	
				if ($nilaimin[$i] < $x[$j][$i])
				{
					$nilaimin[$i] = $x[$j][$i];
				}
			}
		}
	}
	
	$minkar = array();
	for ($i=0;$i<count($alternatif);$i++)
	{
		for ($j=0;$j<count($kriteria);$j++)
		{			
			//if ($j == 0)
			if ($costbenefit[$j] == "cost")
			{
				$minkar[$i][$j] = $nilaimin[$j] / $x[$i][$j]; 
			}
			else
			{
				$minkar[$i][$j] = $x[$i][$j] / $nilaimin[$j]; 
			}
		}
	}
	
	$jmlmin = array();
	for ($i=0;$i<count($kriteria);$i++)
	{
		$jmlmin[$i] = 0;
		for ($j=0;$j<count($alternatif);$j++)
		{			
			$jmlmin[$i] = $jmlmin[$i] + $minkar[$j][$i];
		}
	}
	
	$normmin = array();
	for ($i=0;$i<count($alternatif);$i++)
	{
		for ($j=0;$j<count($kriteria);$j++)
		{			
				$normmin[$i][$j] = $minkar[$i][$j] / $jmlmin[$j]; 
		}
	}
	
	$hsl = array();
	for ($i=0;$i<count($alternatif);$i++)
	{
		$hsl[$i] = 0;
		for ($j=0;$j<count($kriteria);$j++)
		{			
			$hsl[$i] += $normmin[$i][$j] * $w[$j]; 
		}
	}
	
	$alternatifrangking = array();
	$hasilrangking = array();
	
	for ($i=0;$i<count($alternatif);$i++)
	{
		$hasilrangking[$i] = $hsl[$i];
		$alternatifrangking[$i] = $alternatif[$i];
	}
	
	for ($i=0;$i<count($alternatif);$i++)
	{
		for ($j=$i;$j<count($alternatif);$j++)
		{
			if ($hasilrangking[$j] > $hasilrangking[$i])
			{
				$tmphasil = $hasilrangking[$i];
				$tmpalternatif = $alternatifrangking[$i];
				$hasilrangking[$i] = $hasilrangking[$j];
				$alternatifrangking[$i] = $alternatifrangking[$j];
				$hasilrangking[$j] = $tmphasil;
				$alternatifrangking[$j] = $tmpalternatif;
			}
		}
	}
	
?>
<br />
alternatif =
<?php tampilbaris($alternatif); ?>
<br />
kriteria =
<?php tampilbaris($kriteria); ?>
<br />
costbenefit =
<?php tampilbaris($costbenefit); ?>
<br />
x=
<?php tampiltabel($x); ?>
<br />
k=
<?php tampiltabel($k); ?>
<br />
jk=
<?php tampilbaris($jk); ?>
<br />
nk=
<?php tampiltabel($nk); ?>
<br />
jnk=
<?php tampilkolom($jnk); ?>
<br />
w=
<?php tampilkolom($w); ?>
<br />
kw=
<?php tampilkolom($kw); ?>
<br />
t=
<?php echo $t; ?>
<br />
ci=
<?php echo $ci; ?>
<br />
cr=
<?php echo $cr; ?>
<br />
min=
<?php tampilkolom($nilaimin); ?>
<br />
minkar=
<?php tampiltabel($minkar); ?>
<br />
jmlmin=
<?php tampilkolom($jmlmin); ?>
<br />
normmin=
<?php tampiltabel($normmin); ?>
<br />
hsl=
<?php tampilkolom($hsl); ?>
<br />
hasilranking=
<?php tampilkolom($hasilrangking); ?>
<br />
alternatifranking=
<?php tampilkolom($alternatifrangking); ?>
<br />
alternatif terbaik = <?php echo $alternatifrangking[0]; ?> dengan nilai terbesar = <?php echo $hasilrangking[0]; ?>
<?php
}
?>
<br /><a href="index.php">Kembali</a>