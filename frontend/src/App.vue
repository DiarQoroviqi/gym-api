<template>
  <!--  if displayLoader is true -->
  <loader-component v-if="displayLoader"></loader-component>

  <notifications group="notify" />

  <router-view></router-view>
</template>

<script>
import loaderComponent from "./components/LoaderComponent.vue";
import {useStore} from "vuex";
import {computed} from "vue";

export default {
  components: {
    loaderComponent,
  },
  setup() {
    const store = useStore();

    return {
      displayLoader: computed(() => store.getters.getDisplayLoader),
    }
  }
}
</script>

