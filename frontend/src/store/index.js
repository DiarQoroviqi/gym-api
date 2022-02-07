import {createStore} from "vuex";

import getters from './getters';
import actions from './actions';
import mutations from './mutations'

const state = {
    user: {
        data: {},
        token: localStorage.getItem('token'),
    },
    displayLoader: false,
}

const store = createStore({
    state,
    getters,
    actions,
    mutations,
    modules: {},
})

export default store;