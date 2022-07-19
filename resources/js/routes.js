import Test from './components/Test';
import Example from './components/ExampleComponent';
import NotFound from './components/NotFound';
import Login from './modules/Login/Login'

export default {
    mode: 'history',
    fallback: true,
    linkActiveClass: 'font-semibold',
    routes: [
        {
            path: '*',
            name: 'notFound',
            component: NotFound,
        },
        {
            path: '/',
            name: 'home',
            component: Test,
        },
        {
            path: '/example',
            name: 'example',
            component: Example,
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
        },
    ]
}
