import Login from "../views/Login.vue";
import GuestLayout from "../layouts/GuestLayout.vue";

export default [
    {
        path: '/login',
        redirect: '/login',
        name: 'Auth',
        component: GuestLayout,
        children: [
            {
                path: '/login',
                name: 'login',
                component: Login,
            },
            {
                path: 'reset-password',
                name: 'resetPassword',
                component: null,
            },
        ]
    },
]