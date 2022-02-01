import { createApp } from 'vue'
import store from './store'
import router from './router';
import './index.css'
import App from './App.vue'
import Notifications from '@kyvg/vue3-notification';

const app = createApp(App);

app.config.globalProperties.$backendUrl = import.meta.env.VITE_BACKEND_URL
app.use(store)
    .use(router)
    .use(Notifications)
    .mount('#app')

