import { StatusBar } from "expo-status-bar";
import React, { useState, useEffect } from "react";

// https://react-native-async-storage.github.io/async-storage/docs/usage/
import AsyncStorage from '@react-native-async-storage/async-storage';
import * as Location from 'expo-location';
import axios from "axios";

import {
    StyleSheet,
    Text,
    View,
    Image,
    TextInput,
    Button,
    TouchableOpacity,
    Alert,
} from "react-native";
import { Axios } from "axios";



export default function App() {
    const [username, onChangeText] = React.useState("");
    const [password, onChangePass] = React.useState("");
    const [is_logged_in, setLoginStatus] = React.useState(false);
    const [user_id, changeUserId] = React.useState(null);


    const domain = "http://192.168.1.40/gps-rfid-tracking-system-for-students/public";

    const [location, setLocation] = useState(null);
    const [errorMsg, setErrorMsg] = useState(null);

    useEffect(() => {
        (async () => {
            let { status } = await Location.requestForegroundPermissionsAsync();
            if (status !== 'granted') {
                setErrorMsg('Permission to access location was denied');
                return;
            }

            let location = await Location.getCurrentPositionAsync({});
            // console.log("Location: ", location.coords);
            setLocation(location);
            reloadApp();
            storeUserGps(location.coords);
        })();

    }, []);

    const reloadApp = () => {
        try {
            getData().then(res => {
                if (res.status != 400) {
                    onChangeText(res.username);
                    setLoginStatus(true);
                }
                console.log(res)
            });

        } catch (e) {

        }

    }

    const myfun = async () => {
        alert("Auth", `username: ${username}, Pass: ${password}`);
        storeData(username);
        // let username_local = await AsyncStorage.getItem('@user_key');
        // console.log("user: ", username_local);
        getData().then(res => console.log("Data user: ", res));
    }

    const authLogin = () => {

        axios.post(domain + "/api/v1/login", {
            "username": username,
            "password": password
        })
            .then(response => {
                storeData(response.data.user);
                setLoginStatus(true);
            })
            .catch(() => console.log("Username/Password is wrong!"))
    }

    const logOut = async () => {
        try {
            await AsyncStorage.clear();
            setLoginStatus(false);
        } catch (e) {
            // clear error
        }
        console.log('Logged Out!')
    }


    const storeData = async (value) => {
        try {
            const jsonValue = JSON.stringify(value)
            await AsyncStorage.setItem('userData', jsonValue)
        } catch (e) {
            // saving error
        }
    }

    const setObjectValue = async (value) => {
        try {
            const jsonValue = JSON.stringify(value)
            await AsyncStorage.setItem('key', jsonValue)
        } catch (e) {
            // save error
        }

        console.log('Done.')
    }


    const getData = async () => {
        try {
            const jsonString = await AsyncStorage.getItem('userData')
            const obj = JSON.parse(jsonString);
            obj.status = 200;
            if (obj !== null) {
                // value previously stored
                return obj;
            }
        } catch (e) {
            // error reading value
            const obj = {
                status: 400
            }
            return obj;
        }
    }

    const storeUserGps = (location) => {
        setInterval(() => {
            getData().then(res => {
                // console.log("user_id: ", res.id);
                // console.log("location.latitude: ", location.latitude);
                // console.log("location.longitude: ", location.longitude);
                if (res.status == 200) {

                    axios.post(domain + "/api/v1/store-gps/" + res.id, {
                        "lat": location.latitude,
                        "lng": location.longitude
                    })
                        .then(response => {
                            console.log(response.data);
                        })
                        .catch(e => console.log(e))
                }
            });
        }, 10000);
    }

    return (
        <View style={styles.container}>
            {/* <Image style={styles.image} source={require("./assets/log2.png")} /> */}

            {!is_logged_in &&
                <>
                    <StatusBar style="auto" />
                    <View style={styles.inputView}>
                        <TextInput
                            style={styles.TextInput}
                            placeholder="Username"
                            placeholderTextColor="#003f5c"
                            onChangeText={(username) => onChangeText(username)}
                        />
                    </View>

                    <View style={styles.inputView}>
                        <TextInput
                            style={styles.TextInput}
                            placeholder="Password."
                            placeholderTextColor="#003f5c"
                            secureTextEntry={true}
                            onChangeText={(password) => onChangePass(password)}
                        />
                    </View>

                    {/* <TouchableOpacity>
                    <Text style={styles.forgot_button}>Forgot Password?</Text>
                </TouchableOpacity> */}

                    <TouchableOpacity onPress={authLogin} style={styles.loginBtn}>
                        <Text style={styles.loginText}>LOGIN</Text>
                    </TouchableOpacity>
                </>
            }

            {is_logged_in &&
                <>
                    <Text>Hi, {username}! You have successfully Logged in!</Text>
                    <TouchableOpacity onPress={logOut} style={styles.loginBtn}>
                        <Text style={styles.loginText}>LOG OUT</Text>
                    </TouchableOpacity>
                </>
            }


        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: "#fff",
        alignItems: "center",
        justifyContent: "center",
    },

    image: {
        marginBottom: 40,
    },

    inputView: {
        backgroundColor: "#d1faff",
        borderRadius: 30,
        width: "70%",
        height: 45,
        marginBottom: 20,

        alignItems: "center",
    },

    TextInput: {
        height: 50,
        flex: 1,
        padding: 10,
        marginLeft: 20,
    },

    forgot_button: {
        height: 30,
        marginBottom: 30,
    },

    loginBtn: {
        width: "80%",
        borderRadius: 25,
        height: 50,
        alignItems: "center",
        justifyContent: "center",
        marginTop: 40,
        backgroundColor: "#29a8cf"
    },
});