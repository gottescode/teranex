var apiKey = '46220382';
    sessionId = '1_MX40NjIyMDM4Mn5-MTU0MjYwODI2NzI4OH53dzliTm9jVnorNVBuSHEzQjRxRFNqdFN-fg';
    token = 'T1==cGFydG5lcl9pZD00NjIyMDM4MiZzaWc9NTU5MmZjMGJiN2Y3NmRlNDliM2EzZTQ4NGJhYjc0YmNhODk3MWQ3YjpzZXNzaW9uX2lkPTFfTVg0ME5qSXlNRE00TW41LU1UVTBNall3T0RJMk56STRPSDUzZHpsaVRtOWpWbm9yTlZCdVNIRXpRalJ4UkZOcWRGTi1mZyZjcmVhdGVfdGltZT0xNTQyNjA4MjY3JnJvbGU9bW9kZXJhdG9yJm5vbmNlPTE1NDI2MDgyNjcuMzAzNTY3NzM2MjczMg==';


var session = OT.initSession(apiKey, sessionId);
    
alert(type)

if(type == 'p') {
  publisher = OT.initPublisher('publisher');
  session.connect(token, function(error) {
    if (error) {
      console.error('Failed to connect', error);
    } else {
      session.publish(publisher, function(error) {
        if (error) {
          console.error('Failed to publish', error);
        }
      });
    }
  });
}

if(type == 's') {
  publisher = OT.initPublisher('publisher');
  session.connect(token, function(error) {
    if (error) {
      console.error('Failed to connect', error);
    } else {
      session.publish(publisher, function(error) {
        if (error) {
          console.error('Failed to publish', error);
        }
      });
    }
  });
  
  session.on('streamCreated', function(event) {
    session.subscribe(event.stream, 'subscribers', {
      insertMode : 'append'
    }, function(error) {
      if (error) {
        console.error('Failed to subscribe', error);
      }
    });
  });
}

document.getElementById('unpublish').addEventListener('click', function(){
       session.unpublish(publisher);
    });
