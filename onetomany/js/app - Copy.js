var apiKey = '45761632';
    sessionId = '2_MX40NTc2MTYzMn5-MTQ4NjU0MTk5NDM2NX5PUDN2TGoxZ2VsdFZWS0NDcm9MVVRDUzZ-fg';
    token = 'T1==cGFydG5lcl9pZD00NTc2MTYzMiZzaWc9MzVjNjY5MjcxN2ZkNGY4MWQ2MjRmYmUzNjRlN2FhYzYyYjgwNjU3NzpzZXNzaW9uX2lkPTJfTVg0ME5UYzJNVFl6TW41LU1UUTROalUwTVRrNU5ETTJOWDVQVUROMlRHb3haMlZzZEZaV1MwTkRjbTlNVlZSRFV6Wi1mZyZjcmVhdGVfdGltZT0xNDg2NTQxOTk0JnJvbGU9bW9kZXJhdG9yJm5vbmNlPTE0ODY1NDE5OTQuMzg2OTExMjAzMTI3ODY=';

$(document).ready(function() {
  // Make an Ajax request to get the OpenTok API key, session ID, and token from the server

    initializeSession();

});

function initializeSession() {
  var session = OT.initSession(apiKey, sessionId);

  // Subscribe to a newly created stream
  session.on('streamCreated', function(event) {
    session.subscribe(event.stream, 'subscriber', {
      insertMode: 'append'
    });
  });

  session.on('sessionDisconnected', function(event) {
    console.log('You were disconnected from the session.', event.reason);
  });

  // Connect to the session
  session.connect(token, function(error) {
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
  });
}
