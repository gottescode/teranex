// replace these values with those generated in your TokBox Account




// (optional) add server code here
$(document).ready(function() {
  // Make an Ajax request to get the OpenTok API key, session ID, and token from the server
    initializeSession();

});

//alert(apiKey+''+sessionId)

function initializeSession() {
  var session = OT.initSession(apiKey, sessionId);
  
  // Subscribe to a newly created stream
  session.on('streamCreated', function(event) {
    session.subscribe(event.stream, 'subscriber', {
      insertMode: 'append',
	  name: u_name
    });
  });

	session.connect(token, function(error) {
		if (error) {
			if(error.name == 'OT_AUTHENTICATION_ERROR') {
				alert('Token Expired');
			} else {
				alert('An unknown error occurred connecting. Please try again later.');
			}
		}
	});
  
  session.on('sessionDisconnected', function(event) {
    console.log('You were disconnected from the session.', event.reason);
  });

  // Connect to the session
 /* session.connect(token, function(error) {
    // If the connection is successful, initialize a publisher and publish to the session
    if (!error) {
      var publisher = OT.initPublisher('publisher', {
        insertMode: 'append',
        width: '100%',
        height: '100%'
      });

      session.publish(publisher);
    } else {
      console.log('There was an error connecting to the session: ', error.code, error.message);
    }
  });*/
  
  document.getElementById('publish').addEventListener('click', function(){
    
	     var publisherOptions = {
      insertMode: 'append',
      width: '100%',
      height: '100%',
      name: u_name
    };
	  
		publisher = session.publish('publisher', publisherOptions, function(err) {
			  if (err) {
				switch (err.name) {
				 
				  case "OT_CREATE_PEER_CONNECTION_FAILED":
					alert("Publishing your video failed. This could be due to a restrictive firewall.");
					break;
				  default:
					alert("An unknown error occurred while trying to publish your video. Please try again later.");
				}
				publisher.destroy();
				publisher = null;
			  }
			});
  });
  
  document.getElementById('unpublish').addEventListener('click', function(){
			 session.unpublish(publisher);
		});
  
}

