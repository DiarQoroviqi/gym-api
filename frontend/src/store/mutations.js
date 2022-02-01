export default {
    logout: (state) => {
        state.user.data = {};
        state.use.token = null;
        localStorage.removeItem('token');
    },
    displayLoader: (state, display) => {
        state.displayLoader = display;
    },
    logUser: (state, userData) => {
        state.user.token = userData.token;
        state.user.data = userData.user;
        localStorage.setItem('token', userData.token);
    },
}