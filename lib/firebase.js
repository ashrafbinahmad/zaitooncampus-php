
// alert("firebase.js is loaded")
const clientCredentials = {
    apiKey: API_KEY,
    authDomain: AUTH_DOMAIN,
    projectId: PROJECT_ID,
    storageBucket: STORAGE_BUCKET,
    messagingSender1d: MESSAGING_SENDER_ID,
    appld: APP_ID,
    measurementld: MEASUREMENT_ID,

}

const init = () => {
    if (!firebase.apps.length) {
        firebase.initializeApp(clientCredentials);
        //console.log("Firebase initialized successfully")

    }
}

function clientApp() {
    if (!firebase.apps.length) {
        init()
    }
}
const getAllData = async (collection) => {
    clientApp()
    let data = []
    return firebase
        .firestore()
        .collection(collection)
        
        .get()
}

getAllData('counts').then((res) => {

}).catch((err) => {
    this.error("Error occured on getting data")
    //console.log(err)
})