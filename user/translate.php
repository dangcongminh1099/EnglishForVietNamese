<?php
if(isset($_GET["key"]))
{
    
    $key=$_GET["key"];
    $data = http_build_query(
		array(
			'src' => $key,
            'ev' => '1',
            'key' => 'web'
		)
	);
    $opts = array(
        'http' => array(
            'method'  => 'POST',
            'header' =>
        "Content-Type: application/x-www-form-urlencoded\r\n".
        "Authorization: Bearer sdf541gs6df51gsd1bsb16etb16teg1etr1ge61g\n",
            'content' => $data
        )
    );
    $context = stream_context_create( $opts ); 
    ?> 
    <h5 class="tieudedich"> >> Dịch thuật</h5>
    <?php
    echo "<span style='color:red'> -- ".file_get_contents("https://vikitranslator.com/d", false, $context)."</span><br>";
    $encode=urlencode($key);
    $chitiet=file_get_contents("https://vikitranslator.com/tudien?tu=$encode&ngonngu=anhviet&tudien=lingoes&linhvuc=free&key=web");
    $vidu=file_get_contents("https://vikitranslator.com/vidu?tu=_".$encode."_&td=lav&key=web&cn=0");
    if(strlen($chitiet)>2)
    {
    ?>
        <h5 class="tieudedich"> >> Dictionary </h5>
    <?php
        echo $chitiet;
    }
    if(strlen($vidu)>3)
    {
    ?>
        <h5 class="tieudedich"> >> Example</h5>
    <?php
        $vidu=explode("||",$vidu);
        for ($i=0; $i <count($vidu) ; $i++) { 
        ?>
            <ul>
                <li><?php echo str_replace("$key"," <span style='background-color:yellow'>$key</span> ",$vidu[$i]) ; ?></li>
            </ul>
        <?php
        }
    }
    
}
?>