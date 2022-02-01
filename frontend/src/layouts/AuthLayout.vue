<template>
  <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <router-view></router-view>
  </div>
</template>


<script>
import {LockClosedIcon} from '@heroicons/vue/solid'

export default {
  components: {
    LockClosedIcon,
  },
}
</script>