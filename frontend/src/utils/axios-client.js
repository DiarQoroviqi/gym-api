import { notify } from '@kyvg/vue3-notification';
import axios from 'axios';
import store from "../store";

const axiosClient = axios.create({
    baseURL: import.meta.env.VITE_BACKEND_URL,
});

// axiosClient.interceptors.request.use((config) => {
//     config.headers.Authorization = `Bearer ${store.state.user.token}`;
// })

axiosClient.interceptors.request.use(
    (config) => {
        store.dispatch('displayLoader', true);
        return config;
    },
    (error) => {
        store.dispatch('displayLoader', false);
        return Promise.reject(error);
    }
);

axiosClient.interceptors.response.use(
    (response) => {
        store.dispatch('displayLoader', false);
        return response;
    },
    (error) => {
        store.dispatch('displayLoader', false);

        let errors;

        if (error.response) {
            // Session Expired
            if (401 === error.response.status) {
                errors = error.response.data.message;
                store.dispatch('logOut');
            }

            // Backend error
            if (500 === error.response.status) {
                errors = error.response.data.message;
            }

            // 404
            if (error.response.status == 404) {
                errors = 'Page not found!';
            }
        }

        notify({
            title: 'Error',
            text: String(errors),
        });
        return Promise.reject(error);
    }
);

export default axiosClient;
