
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
clientApp()



const toast = {
    success: (message) => {
        Toastify({
            text: message,
            duration: 3000,
            // destination: "https://github.com/apvarun/toastify-js",
            // newWindow: true,
            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            },
            onClick: function () { } // Callback after click
        }).showToast();
    },
    error: (message) => {
        Toastify({
            text: message,
            duration: 3000,
            // destination: "https://github.com/apvarun/toastify-js",
            // newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "left", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, orange, red)",
            },
            onClick: function () { } // Callback after click
        }).showToast();
    },


}

const getAllData = async (collection) => {
    clientApp()
    let data = []
    return firebase
        .firestore()
        .collection(collection)
        .get()
}

const getData = async (collection, id) => {
    firebase
        .firestore()
        .collection(collection)
        .doc(id)
        .get()
        .then((doc) => {
            if (doc.exists) {
                //console.log("Document data:", doc.data());
                return doc.data()
            } else {
                // doc.data() will be undefined in this case
                //console.log("No such document!");
            }
        }).catch((error) => {
            //console.log("Error getting document:", error);
        });
}

const writeDataWithId = async (collection, id, data) => {
    clientApp()

    firebase
        .firestore()
        .collection(collection)
        .doc(id)
        .set(data)


        .then(() => {
            //console.log("Saved successfully!");
            toast.success("Saved successfully!")

        }).catch((error) => {
            // console.error("Error writing document: ", error);
            toast.error(error.message)
        });
}

const writeData = async (collection, data) => {
    clientApp()

    firebase
        .firestore()
        .collection(collection)
        .doc()
        .set(data)


        .then(() => {
            toast.success("Saved successfully!")
        }).catch((error) => {
            // console.error("Error writing document: ", error);
            toast.error(error.message)
        });
}

const updateData = async (collection, id, data) => {
    clientApp()

    firebase
        .firestore()
        .collection(collection)
        .doc(id)
        .update(data)
        .then(() => {
            toast.success("Document successfully updated!")
        }).catch((error) => {
            console.error("Error updating document: ", error);
            toast.error(error.message)
        });
}
const deleteData = async (collection, id) => {
    clientApp()

    firebase
        .firestore()
        .collection(collection)
        .doc(id)
        .delete()
        .then(() => {
            toast.success("Document successfully deleted!")
        }).catch((error) => {
            console.error("Error removing document: ", error);
            toast.error(error.message)
        });
}

const uploadImage = async (file, pathInFireStorage) => {
    try {
        var ref = firebase.storage().ref(pathInFireStorage);
        return ref.put(file);

    } catch (error) {
        //console.log(error);
    }
}

const getDownloadUrl = async (file, pathInFireStorage) => {
    try {
        var ref = firebase.storage().ref(pathInFireStorage);
        return ref.getDownloadURL();
    } catch (error) {
        //console.log(error);
    }
}

const getDataByField = async (collection, field, value) => {
    firebase
        .firestore()
        .collection(collection)
        .where(field, "==", value)
        .get()
        .then((querySnapshot) => {
            querySnapshot.forEach((doc) => {
                //console.log(doc.data());
                return doc.data()
            });
        }
        );

}
const getRandomId = () => {
    //from timestamp
    var timestamp = new Date().getTime();
    var randomId = timestamp.toString(36) + Math.random().toString(36).substr(2);
    return randomId
}





