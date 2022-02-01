import {createRouter, createWebHistory} from "vue-router";
import publicRoutes from './PublicRoutes';
import privateRoutes from './PrivateRoutes';
import store from "../store";

const routes = [...publicRoutes, ...privateRoutes];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    let redirectToRoute = function (name) {
        if (name === from.name) {
            next()
            return;
        }

        next({name: name});
    };

    const loggedUser = store.getters.getLoggedUser;

    // Role
    if (to.meta.roles) {
        if (loggedUser) {
            if (to.meta.roles.includes(loggedUser.role)) return next();
            else return redirectToRoute('error-404');
        } else {
            return redirectToRoute('login');
        }
    }

    // Auth
    if (to.meta.auth) {
        if (loggedUser.token) {
            return next();
        } else {
            return redirectToRoute('login');
        }
    }

    // Guest
    if (to.meta.guest) {
        if (loggedUser.token) {
            return redirectToRoute('dashboard');
        }
        else {
            return next();
        }
    }

    next();
})

export default router;