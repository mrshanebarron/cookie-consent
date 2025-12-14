<template>
  <Teleport to="body">
    <Transition name="slide">
      <div v-if="show" :class="['fixed left-0 right-0 z-50 p-4', position === 'top' ? 'top-0' : 'bottom-0']">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg border border-gray-200 p-4 sm:p-6 flex flex-col sm:flex-row items-center gap-4">
          <p class="text-sm text-gray-600 flex-1">{{ message }}</p>
          <div class="flex gap-2 flex-shrink-0">
            <button v-if="showDecline" @click="decline" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">{{ declineText }}</button>
            <button @click="accept" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">{{ acceptText }}</button>
          </div>
        </div>
      </div>
    </Transition>
  </Teleport>
</template>

<script>
import { ref, onMounted } from 'vue';

export default {
  name: 'SbCookieConsent',
  props: {
    message: { type: String, default: 'We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.' },
    acceptText: { type: String, default: 'Accept' },
    declineText: { type: String, default: 'Decline' },
    showDecline: { type: Boolean, default: true },
    position: { type: String, default: 'bottom' },
    cookieName: { type: String, default: 'cookie_consent' },
    cookieExpiry: { type: Number, default: 365 }
  },
  emits: ['accepted', 'declined'],
  setup(props, { emit }) {
    const show = ref(false);
    const getCookie = (name) => document.cookie.split('; ').find(row => row.startsWith(name + '='))?.split('=')[1];
    const setCookie = (name, value, days) => { document.cookie = `${name}=${value};path=/;max-age=${days * 86400}`; };
    const accept = () => { setCookie(props.cookieName, 'accepted', props.cookieExpiry); show.value = false; emit('accepted'); };
    const decline = () => { setCookie(props.cookieName, 'declined', props.cookieExpiry); show.value = false; emit('declined'); };
    onMounted(() => { show.value = !getCookie(props.cookieName); });
    return { show, accept, decline };
  }
};
</script>

<style scoped>
.slide-enter-active, .slide-leave-active { transition: transform 0.3s ease; }
.slide-enter-from, .slide-leave-to { transform: translateY(100%); }
</style>
