importScripts("https://www.gstatic.com/firebasejs/10.7.1/firebase-app-compat.js");
importScripts("https://www.gstatic.com/firebasejs/10.7.1/firebase-messaging-compat.js");

fetch("/firebase-sw-config")
  .then(res => res.json())
  .then(config => {

    firebase.initializeApp({
      apiKey: config.api_key,
      authDomain: config.auth_domain,
      projectId: config.project_id,
      storageBucket: config.storage_bucket,
      messagingSenderId: config.messagingSenderId,
      appId: config.app_id
    });

    const messaging = firebase.messaging();

    messaging.onBackgroundMessage(function(payload) 
    {
        console.log("Background message:", payload);

        self.registration.showNotification(payload.notification.title, {
            body: payload.notification.body,
            icon: "/logo.png"
        });
    });

  });