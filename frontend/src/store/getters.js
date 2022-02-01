const getLoggedUser = (state) => {
    return state.user;
};

const getDisplayLoader = (state) => {
    return state.displayLoader;
}

export default {
    getLoggedUser,
    getDisplayLoader,
}