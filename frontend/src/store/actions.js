import axiosClient from "../utils/axios-client";

const displayLoader = (context, display) => {
    context.commit('displayLoader', display);
};
const login = ({commit}, user) => {
    return axiosClient.post('/login', user)
        .then(({data}) => {
            console.log(data);
            commit('logUser', data);
            return data;
        });
}

export default {
    displayLoader,
    login,
}