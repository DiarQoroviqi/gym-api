import Dashboard from "../views/Dashboard.vue";
import AuthLayout from "../layouts/AuthLayout.vue";

export default [
    {
        path: '/',
        redirect: '/dashboard',
        name: 'dashboard',
        component: AuthLayout,
        meta: { auth: true },
        children: [
            {
                path: '/dashboard',
                name: 'dashboard',
                component: Dashboard
            }
        ]
    },
]