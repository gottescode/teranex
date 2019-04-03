<?php 
$apiKey="46066412";
$apiSecret="7b91fa012e94c1e8e42d728aa42db7f09ac3507d";
include("opentok.phar");
use OpenTok\OpenTok;

$opentok = new OpenTok($apiKey, $apiSecret);
use OpenTok\MediaMode;
use OpenTok\ArchiveMode;

  /// ============ Creating Sessions ====================////////////////

// Create a session that attempts to use peer-to-peer streaming:
$session = $opentok->createSession();

// A session that uses the OpenTok Media Router, which is required for archiving:
$session = $opentok->createSession(array( 'mediaMode' => MediaMode::ROUTED ));

// A session with a location hint:
 $session = $opentok->createSession(array( 'location' => '12.34.56.78' ));
 
 // An automatically archived session:
$sessionOptions = array(
    'archiveMode' => ArchiveMode::ALWAYS,
    'mediaMode' => MediaMode::ROUTED
);
  $session = $opentok->createSession($sessionOptions); 


// Store this sessionId in the database for later use
 echo $sessionId = $session->getSessionId(); 
  
 
//Generating Tokens //

use OpenTok\Session;
use OpenTok\Role;

// Generate a Token from just a sessionId (fetched from a database)
$token = $opentok->generateToken($sessionId);
// Generate a Token by calling the method on the Session (returned from createSession)
$token = $session->generateToken();

// Set some options in a token
 echo "<br/>".$token = $session->generateToken(array(
    'role'       => Role::MODERATOR,
    'expireTime' => time()+(7 * 24 * 60 * 60), // in one week
    'data'       => 'name=Johnny'
));