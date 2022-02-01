<template>
  <div class="sm:mx-auto sm:w-full sm:max-w-md">
    <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow" />
    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
      Sign in to your account
    </h2>
  </div>
  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
      <div class="space-y-6">
        <div>

          <label for="email" class="block text-sm font-medium text-gray-700">
            Email address
          </label>
          <div class="mt-1">
            <input v-model="user.email" id="email" name="email" type="email" autocomplete="email" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            <span class="w-full text-red-500" v-if="errors.email">{{ errors.email[0] }}</span>
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">
            Password
          </label>
          <div class="mt-1">
            <input v-model="user.password" id="password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            <span class="w-full text-red-500" v-if="errors.password">{{ errors.password[0] }}</span>
          </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input v-model="user.remember_me" id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
            <label for="remember-me" class="ml-2 block text-sm text-gray-900">
              Remember me
            </label>
          </div>

          <div class="text-sm">
            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
              Forgot your password?
            </a>
          </div>
        </div>

        <div>
          <button @click="login()" type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Sign in
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { LockClosedIcon } from '@heroicons/vue/solid'
import store from '../store';
import {useRouter} from 'vue-router';
import {ref} from "vue";
// import axiosClient from "../utils/axios-client";
// import {useStore} from "vuex";

const router = useRouter();

const user = {
  email: null,
  password: null,
  remember_me: false,
};

let errors = ref('');

function login() {
  store.dispatch('login', user)
    .then(() => {
      router.push({ name: 'dashboard'});
    })
    .catch((error) => {
      errors.value = error.response.data.errors;
    });
}
</script>