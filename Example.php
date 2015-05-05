<?php
	require __DIR__ . '/SourceQuery/SourceQuery.class.php';
	// For the sake of this example
	//Header( 'Content-Type: text/plain' );
	Header( 'X-Content-Type-Options: nosniff' );
	
	// Edit this ->
	define( 'SQ_SERVER_ADDR', '37.187.170.178' ); //zero one
	//define( 'SQ_SERVER_ADDR', '31.186.251.213' );
	/*
	working IP's:
	81.88.208.198	75 Spieler
	85.159.42.196	78
	31.186.251.213	74
	*/
	define( 'SQ_SERVER_PORT', 2303 );
	define( 'SQ_TIMEOUT',     1 );
	define( 'SQ_ENGINE',      SourceQuery :: SOURCE );
	// Edit this <-
	
	$Query = new SourceQuery( );
	
	try
	{
		$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );
		echo '<pre>';
		print_r( $Query->GetInfo( ) );
		echo $Query->GetInfo()['Players'];
		print_r( $Query->GetPlayers( ) );
		print_r( $Query->GetRules( ) );
		echo '</pre>';
	}
	catch( Exception $e )
	{
		echo $e->getMessage( );
	}
	
	$Query->Disconnect( );

	$ts_ip = "ts.zero-one.cc"; // Change to your server's IP external or domain name
	$ts_port = "10011"; // Make sure this port is open on the router or firewall

	$online0 = @fsockopen($ts_ip, $ts_port, $errno, $errstr, 1);
	if($online0 >= 1) echo 'ONLINE';
	else echo 'OFFLINE';
