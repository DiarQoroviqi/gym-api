export default {
    logout: (state) => {
        state.user.data = {};
        state.user.token = null;
        localStorage.removeItem('token');
    },
    displayLoader: (state, display) => {
        state.displayLoader = display;
    },
    setUser: (state, userData) => {
        state.user.token = userData.token;
        state.user.data = userData.user;
        localStorage.setItem('token', userData.token);
    },
}