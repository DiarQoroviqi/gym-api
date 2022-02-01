import Login from "../views/Login.vue";
import AuthLayout from "../layouts/AuthLayout.vue";

export default [
    {
        path: '/login',
        redirect: '/login',
        name: 'Auth',
        component: AuthLayout,
        children: [
            {
                path: '/login',
                name: 'login',
                component: Login,
            },
        ]
    },
]