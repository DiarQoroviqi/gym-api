import axiosClient from "../utils/axios-client";

const displayLoader = (context, display) => {
    context.commit('displayLoader', display);
};
const login = ({commit}, user) => {
    return axiosClient.post('/login', user)
        .then(({data}) => {
            commit('setUser', data);
            return data;
        });
}

const logout = ({commit}) => {
    return axiosClient.post('/logout')
        .then(response => {
            commit('logout');
            return response;
        });
}

export default {
    displayLoader,
    login,
    logout,
}