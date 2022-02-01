import {createStore} from "vuex";

import getters from './getters';
import actions from './actions';
import mutations from './mutations'

const state = {
    user: {
        data: {
            name: 'Diar',
            email: 'qoroviqidiar@gmail.com',
            imageUrl:
              "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
        },
        token: 123,
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