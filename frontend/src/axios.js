// filepath: src/axios.js
import axios from 'axios';

const instance = axios.create({
    baseURL: 'http://127.0.0.1:8000/api', // Cambia esto si tu backend está en otro puerto o dominio
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
});

export default instance;